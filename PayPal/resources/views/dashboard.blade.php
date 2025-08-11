<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        {{-- Glavni kontejner sa Alpine.js za tabove --}}
        <div x-data="{ tab: 'payments' }" class="bg-white dark:bg-gray-900 shadow-xl sm:rounded-lg p-6">
            {{-- Promenjena pozadina za bolji kontrast u dark modu --}}

            <div class="mb-6 border-b border-gray-200 dark:border-gray-700">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <button @click="tab = 'payments'" 
                            :class="tab === 'payments' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400 font-semibold' : 'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-200'"
                            class="whitespace-nowrap border-b-2 px-1 py-3 text-base"> {{-- Povećan font i padding za tabove --}}
                        Payments
                    </button>

                    <button @click="tab = 'refunds'" 
                            :class="tab === 'refunds' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400 font-semibold' : 'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-200'"
                            class="whitespace-nowrap border-b-2 px-1 py-3 text-base">
                        Refunds
                    </button>

                    <button @click="tab = 'request'" 
                            :class="tab === 'request' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400 font-semibold' : 'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-200'"
                            class="whitespace-nowrap border-b-2 px-1 py-3 text-base">
                        Request Refund
                    </button>
                </nav>
            </div>

            <div x-show="tab === 'payments'">
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Your Payments</h3> {{-- Tamniji tekst za bolji kontrast --}}
                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700"> {{-- Dodati border i rounded --}}
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800"> {{-- Tamnija pozadina zaglavlja u dark modu --}}
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Product</th> {{-- Tamniji tekst za zaglavlja --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700"> {{-- Tamnija pozadina tela tabele u dark modu --}}
                            @forelse ($payments as $payment)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700"> {{-- Hover efekat --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $payment->product_name }}</td> {{-- Tamniji tekst za ćelije --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">${{ number_format($payment->amount, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ 
                                            $payment->status == 'completed' ? 'bg-green-100 text-green-800' : 
                                            ($payment->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                            'bg-red-100 text-red-800') 
                                        }}">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500 dark:text-gray-400">No payments found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div x-show="tab === 'refunds'" x-cloak>
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Your Refunds</h3>
                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Payment ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Reason</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Requested At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($refunds as $refund)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $refund->payment_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $refund->reason }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ 
                                            $refund->status == 'approved' ? 'bg-green-100 text-green-800' : 
                                            ($refund->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                            'bg-red-100 text-red-800') 
                                        }}">
                                            {{ ucfirst($refund->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $refund->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500 dark:text-gray-400">No refunds found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div x-show="tab === 'request'" x-cloak>
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Request a Refund</h3>
                <form action="{{ route('refund.request') }}" method="POST" class="space-y-6 p-4 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800"> {{-- Dodati padding, border i pozadinu za formu --}}
                    @csrf
                    <div>
                        <label for="payment_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment ID</label>
                        <input type="text" name="payment_id" id="payment_id" required 
                               class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                      focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500"> {{-- Poboljšane input klase --}}
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="email" id="email" required 
                               class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                      focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500">
                    </div>
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Reason</label>
                        <textarea name="reason" id="reason" rows="4" required 
                                  class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                         focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                                         bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500"></textarea>
                    </div>
                    <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900">
                        Submit Request
                    </button>
                </form>
                {{-- Prikaz poruke o uspehu ili greškama --}}
                @if (session('message'))
                    <div class="mt-4 p-3 rounded-md bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100">
                        {{ session('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mt-4 p-3 rounded-md bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
