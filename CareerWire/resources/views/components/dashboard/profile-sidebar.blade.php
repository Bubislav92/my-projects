{{-- 
    Napomena: Ovaj fajl se nalazi u resources/views/dashboard/profile-sidebar.blade.php
    i služi kao navigacija u levom delu Dashboard stranice.
    Svi linkovi koriste definisanu 'carrerwire-green' boju za aktivno stanje.
--}}
<nav class="p-4 space-y-4 bg-white rounded-lg shadow-sm h-full">

    {{-- ================================================= --}}
    {{-- I. UPRAVLJANJE PROFILOM --}}
    {{-- ================================================= --}}
    <section class="space-y-1">
        <h3 class="text-xs font-semibold uppercase text-gray-400 mb-2 border-b border-gray-100 pb-1">
            {{ __('Управљање Профилом') }}
        </h3>

        {{-- 1. Основни подаци --}}
        <a href="{{ route('profile.edit') }}" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('profile.edit') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Основни Подаци (Идентитет)') }}
        </a>

        {{-- 2. Радно Искуство --}}
        <a href="{{ route('experience.edit') }}" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('experience.edit') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Радно Искуство') }}
        </a>
        
        {{-- 3. Образовање (Нови линк) --}}
        <a href="#" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('education.edit') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Образовање') }}
        </a>
        
        {{-- 4. Вештине и Сертификати (Нови линк) --}}
        <a href="#" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('skills.edit') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Вештине и Сертификати') }}
        </a>

        {{-- 5. Јавни Преглед (Нови линк) --}}
        <a href="{{ Auth::user()->id }}" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('profile.show') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Преглед Јавног Профила') }}
        </a>
    </section>

    {{-- ================================================= --}}
    {{-- II. ПОДЕШАВАЊА НАЛОГА --}}
    {{-- ================================================= --}}
    <section class="border-t border-gray-200 pt-4 mt-4 space-y-1">
        <h3 class="text-xs font-semibold uppercase text-gray-400 mb-2 border-b border-gray-100 pb-1">
            {{ __('Подешавања Налога') }}
        </h3>
        
        {{-- 6. Лозинка и Безбедност --}}
        <a href="{{ route('profile.edit') }}" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('profile.edit.password') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Лозинка и Безбедност') }}
        </a>
        
        {{-- 7. Подешавања Приватности --}}
        <a href="{{ route('profile.edit.privacy') }}" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('profile.edit.privacy') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Приватност и Подаци') }}
        </a>

        {{-- 8. Обавештења (Нови линк) --}}
        <a href="#" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('notifications.edit') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Подешавање Обавештења') }}
        </a>
        
        {{-- 9. Повезани Налози (Нови линк) --}}
        <a href="#" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('social.connections') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Повезани Налози') }}
        </a>
    </section>

    {{-- ================================================= --}}
    {{-- III. АКТИВНОСТИ И ПОСЛОВИ --}}
    {{-- ================================================= --}}
    <section class="border-t border-gray-200 pt-4 mt-4 space-y-1">
        <h3 class="text-xs font-semibold uppercase text-gray-400 mb-2 border-b border-gray-100 pb-1">
            {{ __('Активности и Послови') }}
        </h3>

        {{-- 10. Сачувани Послови (Нови линк) --}}
        <a href="#" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('jobs.saved') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Сачувани Огласи') }}
        </a>

        {{-- 11. Апликације (Нови линк) --}}
        <a href="#" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('jobs.applied') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Моје Апликације') }}
        </a>
        
        {{-- 12. Моји Огласи (Само за Компаније) --}}
        <a href="{{ route('jobs.manage') }}" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out 
                  {{ request()->routeIs('jobs.manage') ? 'bg-carrerwire-green/10 text-carrerwire-green font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
            {{ __('Моји Огласи (Управљање)') }}
        </a>
    </section>

    {{-- ================================================= --}}
    {{-- IV. ОСТАЛО --}}
    {{-- ================================================= --}}
    <section class="border-t border-gray-200 pt-4 mt-4 space-y-1">
        <a href="#" 
           class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md text-red-500 hover:bg-red-50 hover:text-red-700 transition duration-150 ease-in-out">
            {{ __('Обриши Налог') }}
        </a>
    </section>

</nav>
