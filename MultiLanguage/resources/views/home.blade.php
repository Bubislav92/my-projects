<h2>Hello</h2>

<h1>{{ __('messages.welcome') }}</h1>


<div style="margin: 20px; font-family: Arial, sans-serif;">
    <select onchange="window.location.href = this.value"
            style="padding: 10px 15px;
                   border: 1px solid #ccc;
                   border-radius: 5px;
                   background-color: #f9f9f9;
                   font-size: 16px;
                   cursor: pointer;
                   appearance: none; /* Uklanja sistemski stil za select */
                   -webkit-appearance: none; /* Za WebKit browsere */
                   -moz-appearance: none; /* Za Firefox */
                   background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%204%205%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M2%200L0%202h4zm0%205L0%203h4z%22%2F%3E%3C%2Fsvg%3E'); /* Custom arrow */
                   background-repeat: no-repeat;
                   background-position: right 10px center;
                   background-size: 10px;">

        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                    {{ app()->getLocale() == $localeCode ? 'selected' : '' }}
                    style="padding: 10px;">
                {{ $properties['native'] }}
            </option>
        @endforeach
    </select>
</div>