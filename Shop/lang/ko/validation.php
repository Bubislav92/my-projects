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

    'accepted' => ':attribute 필드는 승인되어야 합니다.',
    'accepted_if' => ':other이 :value일 때 :attribute 필드는 승인되어야 합니다.',
    'active_url' => ':attribute 필드는 유효한 URL이어야 합니다.',
    'after' => ':attribute 필드는 :date 이후 날짜여야 합니다.',
    'after_or_equal' => ':attribute 필드는 :date 이후이거나 같은 날짜여야 합니다.',
    'alpha' => ':attribute 필드는 문자만 포함할 수 있습니다.',
    'alpha_dash' => ':attribute 필드는 문자, 숫자, 대시(-), 밑줄(_)만 포함할 수 있습니다.',
    'alpha_num' => ':attribute 필드는 문자와 숫자만 포함할 수 있습니다.',
    'array' => ':attribute 필드는 배열이어야 합니다.',
    'ascii' => ':attribute 필드는 한 바이트의 영숫자 문자와 기호만 포함해야 합니다.',
    'before' => ':attribute 필드는 :date 이전 날짜여야 합니다.',
    'before_or_equal' => ':attribute 필드는 :date 이전이거나 같은 날짜여야 합니다.',
    'between' => [
        'array' => ':attribute 필드는 :min에서 :max 사이의 항목을 포함해야 합니다.',
        'file' => ':attribute 필드는 :min에서 :max 킬로바이트 사이여야 합니다.',
        'numeric' => ':attribute 필드는 :min에서 :max 사이여야 합니다.',
        'string' => ':attribute 필드는 :min에서 :max 문자 사이여야 합니다.',
    ],
    'boolean' => ':attribute 필드는 참 또는 거짓이어야 합니다.',
    'can' => ':attribute 필드는 승인되지 않은 값을 포함합니다.',
    'confirmed' => ':attribute 확인 필드가 일치하지 않습니다.',
    'contains' => ':attribute 필드에 필요한 값이 누락되었습니다.',
    'current_password' => '비밀번호가 올바르지 않습니다.',
    'date' => ':attribute 필드는 유효한 날짜여야 합니다.',
    'date_equals' => ':attribute 필드는 :date와 같은 날짜여야 합니다.',
    'date_format' => ':attribute 필드는 :format 형식과 일치해야 합니다.',
    'decimal' => ':attribute 필드는 :decimal 소수점 자리가 있어야 합니다.',
    'declined' => ':attribute 필드는 거부되어야 합니다.',
    'declined_if' => ':other이 :value일 때 :attribute 필드는 거부되어야 합니다.',
    'different' => ':attribute 필드와 :other 필드는 달라야 합니다.',
    'digits' => ':attribute 필드는 :digits 자리여야 합니다.',
    'digits_between' => ':attribute 필드는 :min에서 :max 자리 사이여야 합니다.',
    'dimensions' => ':attribute 필드의 이미지 크기가 유효하지 않습니다.',
    'distinct' => ':attribute 필드에 중복된 값이 있습니다.',
    'doesnt_end_with' => ':attribute 필드는 다음 중 하나로 끝나면 안 됩니다: :values.',
    'doesnt_start_with' => ':attribute 필드는 다음 중 하나로 시작하면 안 됩니다: :values.',
    'email' => ':attribute 필드는 유효한 이메일 주소여야 합니다.',
    'ends_with' => ':attribute 필드는 다음 중 하나로 끝나야 합니다: :values.',
    'enum' => '선택된 :attribute 값이 유효하지 않습니다.',
    'exists' => '선택된 :attribute 값이 유효하지 않습니다.',
    'extensions' => ':attribute 필드는 다음 확장자 중 하나여야 합니다: :values.',
    'file' => ':attribute 필드는 파일이어야 합니다.',
    'filled' => ':attribute 필드는 값이 있어야 합니다.',
    'gt' => [
        'array' => ':attribute 필드는 :value개 이상의 항목을 포함해야 합니다.',
        'file' => ':attribute 필드는 :value 킬로바이트보다 커야 합니다.',
        'numeric' => ':attribute 필드는 :value보다 커야 합니다.',
        'string' => ':attribute 필드는 :value 문자보다 길어야 합니다.',
    ],
    'gte' => [
        'array' => ':attribute 필드는 :value개 이상의 항목을 포함해야 합니다.',
        'file' => ':attribute 필드는 :value 킬로바이트 이상이어야 합니다.',
        'numeric' => ':attribute 필드는 :value 이상이어야 합니다.',
        'string' => ':attribute 필드는 :value 문자 이상이어야 합니다.',
    ],
    'hex_color' => ':attribute 필드는 유효한 16진수 색상이어야 합니다.',
    'image' => ':attribute 필드는 이미지여야 합니다.',
    'in' => '선택된 :attribute 값이 유효하지 않습니다.',
    'in_array' => ':attribute 필드는 :other에 존재해야 합니다.',
    'integer' => ':attribute 필드는 정수여야 합니다.',
    'ip' => ':attribute 필드는 유효한 IP 주소여야 합니다.',
    'ipv4' => ':attribute 필드는 유효한 IPv4 주소여야 합니다.',
    'ipv6' => ':attribute 필드는 유효한 IPv6 주소여야 합니다.',
    'json' => ':attribute 필드는 유효한 JSON 문자열이어야 합니다.',
    'list' => ':attribute 필드는 목록이어야 합니다.',
    'lowercase' => ':attribute 필드는 소문자여야 합니다.',
    'lt' => [
        'array' => ':attribute 필드는 :value개 미만의 항목을 포함해야 합니다.',
        'file' => ':attribute 필드는 :value 킬로바이트 미만이어야 합니다.',
        'numeric' => ':attribute 필드는 :value 미만이어야 합니다.',
        'string' => ':attribute 필드는 :value 문자 미만이어야 합니다.',
    ],
    'lte' => [
        'array' => ':attribute 필드는 :value개 이하의 항목을 포함해야 합니다.',
        'file' => ':attribute 필드는 :value 킬로바이트 이하여야 합니다.',
        'numeric' => ':attribute 필드는 :value 이하여야 합니다.',
        'string' => ':attribute 필드는 :value 문자 이하여야 합니다.',
    ],
    'mac_address' => ':attribute 필드는 유효한 MAC 주소여야 합니다.',
    'max' => [
        'array' => ':attribute 필드는 :max개 이상의 항목을 포함할 수 없습니다.',
        'file' => ':attribute 필드는 :max 킬로바이트보다 클 수 없습니다.',
        'numeric' => ':attribute 필드는 :max보다 클 수 없습니다.',
        'string' => ':attribute 필드는 :max 문자보다 길 수 없습니다.',
    ],
    'max_digits' => ':attribute 필드는 :max 자리보다 많을 수 없습니다.',
    'mimes' => ':attribute 필드는 다음 유형의 파일이어야 합니다: :values.',
    'mimetypes' => ':attribute 필드는 다음 유형의 파일이어야 합니다: :values.',
    'min' => [
        'array' => ':attribute 필드는 최소한 :min개 항목을 포함해야 합니다.',
        'file' => ':attribute 필드는 최소한 :min 킬로바이트여야 합니다.',
        'numeric' => ':attribute 필드는 최소한 :min이어야 합니다.',
        'string' => ':attribute 필드는 최소한 :min 문자여야 합니다.',
    ],
    'min_digits' => ':attribute 필드는 최소한 :min 자리여야 합니다.',
    'missing' => ':attribute 필드가 누락되어야 합니다.',
    'missing_if' => ':other이 :value일 때 :attribute 필드가 누락되어야 합니다.',
    'missing_unless' => ':other이 :value가 아닌 한 :attribute 필드가 누락되어야 합니다.',
    'missing_with' => ':values이(가) 있을 때 :attribute 필드가 누락되어야 합니다.',
    'missing_with_all' => ':values이(가) 모두 있을 때 :attribute 필드가 누락되어야 합니다.',
    'multiple_of' => ':attribute 필드는 :value의 배수여야 합니다.',
    'not_in' => '선택된 :attribute 값이 유효하지 않습니다.',
    'not_regex' => ':attribute 필드의 형식이 유효하지 않습니다.',
    'numeric' => ':attribute 필드는 숫자여야 합니다.',
    'password' => [
        'letters' => ':attribute 필드는 하나 이상의 문자를 포함해야 합니다.',
        'mixed' => ':attribute 필드는 하나 이상의 대문자와 소문자를 포함해야 합니다.',
        'numbers' => ':attribute 필드는 하나 이상의 숫자를 포함해야 합니다.',
        'symbols' => ':attribute 필드는 하나 이상의 기호를 포함해야 합니다.',
        'uncompromised' => '제공된 :attribute이 데이터 유출에서 발견되었습니다. 다른 :attribute을 선택하세요.',
    ],
    'present' => ':attribute 필드는 존재해야 합니다.',
    'present_if' => ':other이 :value일 때 :attribute 필드는 존재해야 합니다.',
    'present_unless' => ':other이 :value가 아닌 한 :attribute 필드는 존재해야 합니다.',
    'present_with' => ':values이(가) 있을 때 :attribute 필드는 존재해야 합니다.',
    'present_with_all' => ':values이(가) 모두 있을 때 :attribute 필드는 존재해야 합니다.',
    'prohibited' => ':attribute 필드는 금지됩니다.',
    'prohibited_if' => ':other이 :value일 때 :attribute 필드는 금지됩니다.',
    'prohibited_if_accepted' => ':other이(가) 승인되었을 때 :attribute 필드는 금지됩니다.',
    'prohibited_if_declined' => ':other이(가) 거부되었을 때 :attribute 필드는 금지됩니다.',
    'prohibited_unless' => ':other이 :values에 없는 한 :attribute 필드는 금지됩니다.',
    'prohibits' => ':attribute 필드는 :other의 존재를 금지합니다.',
    'regex' => ':attribute 필드의 형식이 유효하지 않습니다.',
    'required' => ':attribute 필드는 필수입니다.',
    'required_array_keys' => ':attribute 필드는 다음 항목에 대한 항목을 포함해야 합니다: :values.',
    'required_if' => ':other이 :value일 때 :attribute 필드는 필수입니다.',
    'required_if_accepted' => ':other이(가) 승인되었을 때 :attribute 필드는 필수입니다.',
    'required_if_declined' => ':other이(가) 거부되었을 때 :attribute 필드는 필수입니다.',
    'required_unless' => ':other이 :values에 없는 한 :attribute 필드는 필수입니다.',
    'required_with' => ':values이(가) 있을 때 :attribute 필드는 필수입니다.',
    'required_with_all' => ':values이(가) 모두 있을 때 :attribute 필드는 필수입니다.',
    'required_without' => ':values이(가) 없을 때 :attribute 필드는 필수입니다.',
    'required_without_all' => ':values이(가) 모두 없을 때 :attribute 필드는 필수입니다.',
    'same' => ':attribute 필드와 :other 필드는 일치해야 합니다.',
    'size' => [
        'array' => ':attribute 필드는 :size개 항목을 포함해야 합니다.',
        'file' => ':attribute 필드는 :size 킬로바이트여야 합니다.',
        'numeric' => ':attribute 필드는 :size여야 합니다.',
        'string' => ':attribute 필드는 :size 문자여야 합니다.',
    ],
    'starts_with' => ':attribute 필드는 다음 중 하나로 시작해야 합니다: :values.',
    'string' => ':attribute 필드는 문자열이어야 합니다.',
    'timezone' => ':attribute 필드는 유효한 시간대여야 합니다.',
    'unique' => ':attribute 값은 이미 사용 중입니다.',
    'uploaded' => ':attribute 필드 업로드에 실패했습니다.',
    'uppercase' => ':attribute 필드는 대문자여야 합니다.',
    'url' => ':attribute 필드는 유효한 URL이어야 합니다.',
    'ulid' => ':attribute 필드는 유효한 ULID여야 합니다.',
    'uuid' => ':attribute 필드는 유효한 UUID여야 합니다.',


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