<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Поље :attribute мора бити прихваћено.',
    'accepted_if' => 'Поље :attribute мора бити прихваћено када је :other :value.',
    'active_url' => 'Поље :attribute мора бити важећи URL.',
    'after' => 'Поље :attribute мора бити датум после :date.',
    'after_or_equal' => 'Поље :attribute мора бити датум после или једнак :date.',
    'alpha' => 'Поље :attribute мора садржати само слова.',
    'alpha_dash' => 'Поље :attribute мора садржати само слова, бројеве, цртице и доње црте.',
    'alpha_num' => 'Поље :attribute мора садржати само слова и бројеве.',
    'array' => 'Поље :attribute мора бити низ.',
    'ascii' => 'Поље :attribute мора садржати само једнобајтне алфанумеричке карактере и симболе.',
    'before' => 'Поље :attribute мора бити датум пре :date.',
    'before_or_equal' => 'Поље :attribute мора бити датум пре или једнак :date.',
    'between' => [
        'array' => 'Поље :attribute мора имати између :min и :max ставки.',
        'file' => 'Поље :attribute мора бити између :min и :max килобајта.',
        'numeric' => 'Поље :attribute мора бити између :min и :max.',
        'string' => 'Поље :attribute мора бити између :min и :max карактера.',
    ],
    'boolean' => 'Поље :attribute мора бити тачно или нетачно.',
    'can' => 'Поље :attribute садржи неовлашћену вредност.',
    'confirmed' => 'Потврда поља :attribute се не поклапа.',
    'contains' => 'Пољу :attribute недостаје обавезна вредност.',
    'current_password' => 'Лозинка је нетачна.',
    'date' => 'Поље :attribute мора бити важећи датум.',
    'date_equals' => 'Поље :attribute мора бити датум једнак :date.',
    'date_format' => 'Поље :attribute мора одговарати формату :format.',
    'decimal' => 'Поље :attribute мора имати :decimal децимала.',
    'declined' => 'Поље :attribute мора бити одбијено.',
    'declined_if' => 'Поље :attribute мора бити одбијено када је :other :value.',
    'different' => 'Поља :attribute и :other морају бити различита.',
    'digits' => 'Поље :attribute мора имати :digits цифара.',
    'digits_between' => 'Поље :attribute мора имати између :min и :max цифара.',
    'dimensions' => 'Поље :attribute има неважеће димензије слике.',
    'distinct' => 'Поље :attribute има дуплирану вредност.',
    'doesnt_end_with' => 'Поље :attribute се не сме завршавати једним од следећих: :values.',
    'doesnt_start_with' => 'Поље :attribute не сме почети са једним од следећих: :values.',
    'email' => 'Поље :attribute мора бити важећа е-адреса.',
    'ends_with' => 'Поље :attribute мора завршавати једним од следећих: :values.',
    'enum' => 'Изабрана вредност за :attribute је неважећа.',
    'exists' => 'Изабрана вредност за :attribute је неважећа.',
    'extensions' => 'Поље :attribute мора имати једну од следећих екстензија: :values.',
    'file' => 'Поље :attribute мора бити датотека.',
    'filled' => 'Поље :attribute мора имати вредност.',
    'gt' => [
        'array' => 'Поље :attribute мора имати више од :value ставки.',
        'file' => 'Поље :attribute мора бити веће од :value килобајта.',
        'numeric' => 'Поље :attribute мора бити веће од :value.',
        'string' => 'Поље :attribute мора имати више од :value карактера.',
    ],
    'gte' => [
        'array' => 'Поље :attribute мора имати :value или више ставки.',
        'file' => 'Поље :attribute мора бити веће или једнако :value килобајта.',
        'numeric' => 'Поље :attribute мора бити веће или једнако :value.',
        'string' => 'Поље :attribute мора имати више или једнако :value карактера.',
    ],
    'hex_color' => 'Поље :attribute мора бити валидна хексадецимална боја.',
    'image' => 'Поље :attribute мора бити слика.',
    'in' => 'Изабрана вредност за :attribute је неважећа.',
    'in_array' => 'Поље :attribute мора постојати у :other.',
    'integer' => 'Поље :attribute мора бити цео број.',
    'ip' => 'Поље :attribute мора бити важећа IP адреса.',
    'ipv4' => 'Поље :attribute мора бити важећа IPv4 адреса.',
    'ipv6' => 'Поље :attribute мора бити важећа IPv6 адреса.',
    'json' => 'Поље :attribute мора бити важећи JSON стринг.',
    'list' => 'Поље :attribute мора бити листа.',
    'lowercase' => 'Поље :attribute мора бити мало слово.',
    'lt' => [
        'array' => 'Поље :attribute мора имати мање од :value ставки.',
        'file' => 'Поље :attribute мора бити мање од :value килобајта.',
        'numeric' => 'Поље :attribute мора бити мање од :value.',
        'string' => 'Поље :attribute мора имати мање од :value карактера.',
    ],
    'lte' => [
        'array' => 'Поље :attribute не сме имати више од :value ставки.',
        'file' => 'Поље :attribute мора бити мање или једнако :value килобајта.',
        'numeric' => 'Поље :attribute мора бити мање или једнако :value.',
        'string' => 'Поље :attribute мора имати мање или једнако :value карактера.',
    ],
    'mac_address' => 'Поље :attribute мора бити важећа MAC адреса.',
    'max' => [
        'array' => 'Поље :attribute не сме имати више од :max ставки.',
        'file' => 'Поље :attribute не сме бити веће од :max килобајта.',
        'numeric' => 'Поље :attribute не сме бити веће од :max.',
        'string' => 'Поље :attribute не сме имати више од :max карактера.',
    ],
    'max_digits' => 'Поље :attribute не сме имати више од :max цифара.',
    'mimes' => 'Поље :attribute мора бити датотека типа: :values.',
    'mimetypes' => 'Поље :attribute мора бити датотека типа: :values.',
    'min' => [
        'array' => 'Поље :attribute мора имати барем :min ставки.',
        'file' => 'Поље :attribute мора бити барем :min килобајта.',
        'numeric' => 'Поље :attribute мора бити барем :min.',
        'string' => 'Поље :attribute мора имати барем :min карактера.',
    ],
    'min_digits' => 'Поље :attribute мора имати барем :min цифара.',
    'missing' => 'Поље :attribute мора недостајати.',
    'missing_if' => 'Поље :attribute мора недостајати када је :other :value.',
    'missing_unless' => 'Поље :attribute мора недостајати осим ако је :other :value.',
    'missing_with' => 'Поље :attribute мора недостајати када је :values присутан.',
    'missing_with_all' => 'Поље :attribute мора недостајати када су сви :values присутни.',
    'multiple_of' => 'Поље :attribute мора бити умножак од :value.',
    'not_in' => 'Изабрана вредност за :attribute је неважећа.',
    'not_regex' => 'Формат поља :attribute је неважећи.',
    'numeric' => 'Поље :attribute мора бити број.',
    'password' => [
        'letters' => 'Поље :attribute мора садржати барем једно слово.',
        'mixed' => 'Поље :attribute мора садржати барем једно велико и једно мало слово.',
        'numbers' => 'Поље :attribute мора садржати барем један број.',
        'symbols' => 'Поље :attribute мора садржати барем један симбол.',
        'uncompromised' => 'Дати :attribute се појавио у цурењу података. Изаберите други :attribute.',
    ],
    'present' => 'Поље :attribute мора бити присутно.',
    'present_if' => 'Поље :attribute мора бити присутно када је :other :value.',
    'present_unless' => 'Поље :attribute мора бити присутно осим ако је :other :value.',
    'present_with' => 'Поље :attribute мора бити присутно када је :values присутан.',
    'present_with_all' => 'Поље :attribute мора бити присутно када су сви :values присутни.',
    'prohibited' => 'Поље :attribute је забрањено.',
    'prohibited_if' => 'Поље :attribute је забрањено када је :other :value.',
    'prohibited_if_accepted' => 'Поље :attribute је забрањено када је :other прихваћен.',
    'prohibited_if_declined' => 'Поље :attribute је забрањено када је :other одбијен.',
    'prohibited_unless' => 'Поље :attribute је забрањено осим ако је :other у :values.',
    'prohibits' => 'Поље :attribute забрањује да :other буде присутно.',
    'regex' => 'Формат поља :attribute је неважећи.',
    'required' => 'Поље :attribute је обавезно.',
    'required_array_keys' => 'Поље :attribute мора садржати уносе за: :values.',
    'required_if' => 'Поље :attribute је обавезно када је :other :value.',
    'required_if_accepted' => 'Поље :attribute је обавезно када је :other прихваћен.',
    'required_if_declined' => 'Поље :attribute је обавезно када је :other одбијен.',
    'required_unless' => 'Поље :attribute је обавезно осим ако је :other у :values.',
    'required_with' => 'Поље :attribute је обавезно када је :values присутан.',
    'required_with_all' => 'Поље :attribute је обавезно када су сви :values присутни.',
    'required_without' => 'Поље :attribute је обавезно када :values није присутан.',
    'required_without_all' => 'Поље :attribute је обавезно када ништа од :values није присутно.',
    'same' => 'Поља :attribute и :other се морају поклапати.',
    'size' => [
        'array' => 'Поље :attribute мора садржати :size ставки.',
        'file' => 'Поље :attribute мора бити :size килобајта.',
        'numeric' => 'Поље :attribute мора бити :size.',
        'string' => 'Поље :attribute мора бити :size карактера.',
    ],
    'starts_with' => 'Поље :attribute мора почети једним од следећих: :values.',
    'string' => 'Поље :attribute мора бити стринг.',
    'timezone' => 'Поље :attribute мора бити важећа временска зона.',
    'unique' => 'Вредност за :attribute је већ заузета.',
    'uploaded' => 'Поље :attribute није успело да се отпреми.',
    'uppercase' => 'Поље :attribute мора бити велико слово.',
    'url' => 'Поље :attribute мора бити важећи URL.',
    'ulid' => 'Поље :attribute мора бити важећи ULID.',
    'uuid' => 'Поље :attribute мора бити важећи UUID.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */


    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [],

];
