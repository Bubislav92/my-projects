<div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
    
    <div class="p-4 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-800">Управљање мрежом</h2>
    </div>

    <nav class="flex flex-col">
        
        {{-- ЛИНК 1: Везе (Connections) --}}
        <a href="#" {{-- route('network.connections') --}} 
            class="flex items-center justify-between p-4 text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out border-l-4 border-transparent hover:border-carrerwire-green-dark">
            <span class="font-semibold">Ваше везе</span>
            <span class="text-sm font-medium text-gray-500">234</span>
        </a>

        {{-- ЛИНК 2: Захтеви (Invitations) --}}
        <a href="#" {{-- route('network.requests') --}} 
            class="flex items-center justify-between p-4 text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out border-l-4 border-transparent hover:border-carrerwire-green-dark 
            {{-- Када је овај линк активан, боја може бити истакнута, нпр. border-carrerwire-green --}}">
            <span class="font-semibold">Захтеви за повезивање</span>
            <span class="px-2 py-0.5 text-xs font-bold text-white bg-carrerwire-orange rounded-full">3</span>
        </a>

        {{-- ЛИНК 3: Људи које можда знате (Suggestions) --}}
        <a href="#" {{-- route('network.suggestions') --}} 
            class="flex items-center justify-between p-4 text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out border-l-4 border-transparent hover:border-carrerwire-green-dark">
            <span class="font-semibold">Људи које можда знате</span>
        </a>
        
        {{-- ЛИНК 4: Групе --}}
        <a href="#" {{-- route('network.groups') --}} 
            class="flex items-center justify-between p-4 text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out border-l-4 border-transparent hover:border-carrerwire-green-dark">
            <span class="font-semibold">Групе</span>
        </a>

    </nav>
</div>