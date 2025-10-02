<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Радно Искуство') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Додајте или уредите своје радно искуство и образовне податке.') }}
        </p>
    </header>

    {{-- Овде ће ићи форма за додавање новог искуства --}}
    @include('experience.partials.create-experience-form')

    <div class="mt-6 space-y-6">
        <h3 class="text-md font-medium text-gray-900 mt-8">
            {{ __('Постојеће Искуство') }}
        </h3>
        
        {{-- Приказ свих постојећих искустава --}}
        @forelse ($experiences as $experience)
            <div class="border-t pt-4">
                <p class="font-semibold">{{ $experience->title }} @ {{ $experience->company_name }}</p>
                <p class="text-sm text-gray-500">
                    {{ $experience->start_date->format('M Y') }} - 
                    {{ $experience->is_current ? 'Тренутно' : $experience->end_date?->format('M Y') }}
                </p>
                {{-- Укључивање мале компоненте за уређивање/брисање --}}
                @include('experience.partials.edit-delete-buttons', ['experience' => $experience])
            </div>
        @empty
            <p class="text-sm text-gray-500">Још увек нисте додали радно искуство.</p>
        @endforelse
    </div>
</section>