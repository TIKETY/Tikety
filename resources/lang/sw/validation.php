<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute lazima ikubaliwe.',
    'active_url' => ':attribute sio URL sahihi.',
    'after' => ':attribute lazima iwe tarehe baada ya :date.',
    'after_or_equal' => ':attribute lazima iwe tarehe baada au sawa na:date.',
    'alpha' => ':attribute inaweza kuwa na herufi pekee.',
    'alpha_dash' => ':attribute inaweza kuwa na herufi, namba, dashi na mstarichini.',
    'alpha_num' => ':attribute inaweza kuwa na herufi na namba pekee.',
    'array' => ':attribute lazima iwe ni safu.',
    'before' => ':attribute lazima iwe tarehe kabla ya :date.',
    'before_or_equal' => ':attribute lazima iwe tarehe kabala au sawa na :date.',
    'between' => [
        'numeric' => ':attribute lazima iwe kati ya :min na :max.',
        'file' => ':attribute lazima iwe kati ya :min na :max kilobytes.',
        'string' => ':attribute lazima iwe kati ya :min na :max herufi.',
        'array' => ':attribute lazima iwe na vitu kati ya :min na :max.',
    ],
    'boolean' => ':attribute lazima iwe kweli au sio kweli.',
    'confirmed' => ':attribute uthibitisho sio sahihi.',
    'date' => ':attribute sio tarehe sahihi.',
    'date_equals' => ':attribute lazima iwe tarehe sawa na :date.',
    'date_format' => ':attribute hazifanani na format ya :format.',
    'different' => ':attribute na :other lazima ziwe tofauti.',
    'digits' => ':attribute lazima iwe :digits namba.',
    'digits_between' => ':attribute lazima iwe kati ya :min na :max .',
    'dimensions' => ':attribute ina ukubwa wa picha usiokubalika.',
    'distinct' => ':attribute inajirudia.',
    'email' => ':attribute lazima iwe barua pepe sahihi.',
    'ends_with' => ':attribute lazima iishie na : :values.',
    'exists' => 'chaguo la :attribute sio sahihi.',
    'file' => ':attribute lazima iwe ni file.',
    'filled' => ':attribute lazima iwe na thamani.',
    'gt' => [
        'numeric' => ':attribute lazima iwe kubwa kuliko :value.',
        'file' => ':attribute lazima iwe kubwa kuliko :value kilobytes.',
        'string' => ':attribute lazima iwe kubwa kuliko :value herufi.',
        'array' => ':attribute lazima iwe na zaidi ya vitu :value .',
    ],
    'gte' => [
        'numeric' => ':attribute lazima iwe kubwa kuliko au sawa na :value.',
        'file' => ':attribute lazima iwe kubwa kuliko au sawa na :value kilobytes.',
        'string' => ':attribute lazima iwe kubwa kuliko au sawa na :value herufi.',
        'array' => ':attribute lazima iwe na :value vitu au zaidi.',
    ],
    'image' => ':attribute lazima iwe ni picha.',
    'in' => 'Chaguo la :attribute haliifai.',
    'in_array' => ' :attribute haipo kwenye :other.',
    'integer' => ':attribute lazima iwe number.',
    'ip' => ':attribute lazima iwe IP address.',
    'ipv4' => ':attribute lazima iwe valid IPv4 address.',
    'ipv6' => ':attribute lazima iwe valid IPv6 address.',
    'json' => ':attribute lazima iwe valid JSON string.',
    'lt' => [
        'numeric' => ':attribute lazima iwe ndogo kuliko :value.',
        'file' => ':attribute lazima iwe ndogo kuliko :value kilobytes.',
        'string' => ':attribute lazima iwe ndogo kuliko :value herufi.',
        'array' => ':attribute must have less than :value vitu.',
    ],
    'lte' => [
        'numeric' => ':attribute lazima iwe ndogo kuliko or equal :value.',
        'file' => ':attribute lazima iwe ndogo kuliko or equal :value kilobytes.',
        'string' => ':attribute lazima iwe ndogo kuliko or equal :value herufi.',
        'array' => ':attribute must not have more than :value vitu.',
    ],
    'max' => [
        'numeric' => ':attribute haiwezi kuwa kubwa kuliko :max.',
        'file' => ':attribute haiwezi kuwa kubwa kuliko :max kilobytes.',
        'string' => ':attribute haiwezi kuwa kubwa kuliko :max herufi.',
        'array' => ':attribute haiwezi kuwa kubwa kuliko vitu :max.',
    ],
    'mimes' => ':attribute lazima iwe file lenye aina ya: :values.',
    'mimetypes' => ':attribute lazima iwe file lenye aina ya: :values.',
    'min' => [
        'numeric' => ':attribute lazima iwe na kiwangu cha chini cha :min.',
        'file' => ':attribute lazima iwe na kiwangu cha chini cha :min kilobytes.',
        'string' => ':attribute lazima iwe na kiwango cha chini :min herufi.',
        'array' => ':attribute lazima iwe na kiwangu cha chini cha vitu :min',
    ],
    'multiple_of' => ':attribute lazima iwe zidisho la :value',
    'not_in' => 'chaguo :attribute sio sahihi.',
    'not_regex' => ':attribute format sio sahihi.',
    'numeric' => ':attribute lazima iwe number.',
    'password' => 'Neno la Siri sio sahihi',
    'present' => ':attribute lazima iwepo',
    'regex' => ':attribute format sio sahihi',
    'required' => ':attribute inahitajika.',
    'required_if' => ':attribute inahitajika wakati :other ni :value.',
    'required_unless' => ':attribute inahitajika isipokuwa :other ipo ndani ya :values.',
    'required_with' => ':attribute inahitajika wakati :values is present.',
    'required_with_all' => ':attribute inahitajika wakati :values are present.',
    'required_without' => ':attribute inahitajika wakati :values is not present.',
    'required_without_all' => ':attribute inahitajika wakati none of :values are present.',
    'same' => ':attribute na :other lazima zifanane.',
    'size' => [
        'numeric' => ':attribute lazima iwe :size.',
        'file' => ':attribute lazima iwe :size kilobytes.',
        'string' => ':attribute lazima iwe :size herufi.',
        'array' => ':attribute lazima iwe na ukubwa wa :size.',
    ],
    'starts_with' => ':attribute lazima ianze na: :values.',
    'string' => ':attribute lazima iwe maneno.',
    'timezone' => ':attribute lazima iwe eneo sahihi.',
    'unique' => ':attribute imeshachukuliwa.',
    'uploaded' => ':attribute imefeli kupakia.',
    'url' => ':attribute format sio sahihi.',
    'uuid' => ':attribute lazima iwe UUID sahihi.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
