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

    'accepted' => ':attribute پێویستە پەسەند بکرێت.',
    'active_url' => ':attribute یەکێکە لە ڕووتە تایبەتیەکان.',
    'after' => ':attribute پێویستە ڕووداویەکی پاش :date بێت.',
    'after_or_equal' => ':attribute پێویستە ڕووداویەکی پاش یان هەمانەند با :date بێت.',
    'alpha' => ':attribute تەنها دەتوانێت پەیوەند بە پەیڤەکان بێت.',
    'alpha_dash' => ':attribute تەنها دەتوانێت پەیوەند بە پەیڤەکان، ژمارەکان و خطەکان بێت.',
    'alpha_num' => ':attribute تەنها دەتوانێت پەیوەند بە پەیڤەکان و ژمارەکان بێت.',
    'array' => ':attribute پێویستە پەیوەند بە ڕووداوەکان بێت.',
    'before' => ':attribute پێویستە ڕووداویەکی پێش :date بێت.',
    'before_or_equal' => ':attribute پێویستە ڕووداویەکی پێش یان هەمانەند با :date بێت.',
    'between' => [
        'numeric' => ':attribute پێویستە نێوان :min و :max بێت.',
        'file' => ':attribute پێویستە نێوان :min و :max کیلوبایت بێت.',
        'string' => ':attribute پێویستە نێوان :min و :max تێکسە بێت.',
        'array' => ':attribute پێویستە نێوان :min و :max تێم بێت.',
    ],
    'boolean' => ':attribute پێویستە راست یان هەڵە بێت.',
    'confirmed' => ':attribute پەسەندکردنەکە هەمانەند نییە.',
    'date' => ':attribute ڕووداویەکی ڕاست نییە.',
    'date_format' => ':attribute ڕووداویەکە ڕوونیەکەی ڕوونی :format نییە.',
    'different' => ':attribute و :other پێویستە جیاواز بێت.',
    'digits' => ':attribute پێویستە :digits ژمارە بێت.',
    'digits_between' => ':attribute پێویستە نێوان :min و :max ژمارە بێت.',
    'dimensions' => ':attribute ئامرازە ڕووداویەکان نادروستە.',
    'distinct' => ':attribute پێویستە ئامرازەی جیاواز بێت.',
    'email' => ':attribute پێویستە ئیمەیڵی ڕاست بێت.',
    'exists' => ':attribute هەڵبژێردراوە تەنها بەرەوپێشە.',
    'file' => ':attribute پێویستە فایل بێت.',
    'filled' => ':attribute پێویستە بەرزترین وەڵام بێت.',
    'gt' => [
        'numeric' => ':attribute پێویستە گەورەتر بێت لە :value.',
        'file' => ':attribute پێویستە گەورەتر بێت لە :value کیلوبایت.',
        'string' => ':attribute پێویستە گەورەتر بێت لە :value تێکسە.',
        'array' => ':attribute پێویستە زیاتر بێت لە :value تێم.',
    ],
    'gte' => [
        'numeric' => ':attribute پێویستە گەورەتر یان هەمانەند بێت لە :value.',
        'file' => ':attribute پێویستە گەورەتر یان هەمانەند بێت لە :value کیلوبایت.',
        'string' => ':attribute پێویستە گەورەتر یان هەمانەند بێت لە :value تێکسە.',
        'array' => ':attribute پێویستە بێت لە :value تێم یان زیاتر.',
    ],
    'image' => ':attribute پێویستە وێنە بێت.',
    'in' => ':attribute هەڵبژێردراوە نادروستە.',
    'in_array' => ':attribute پێویستە لە :other هەبێت.',
    'integer' => ':attribute پێویستە ژمارەیەکی پەیوەند پێویست بێت.',
    'ip' => ':attribute پێویستە پەیوەند بە ڕووداوێکی IP بێت.',
    'ipv4' => ':attribute پێویستە پەیوەند بە ڕووداوێکی IPv4 بێت.',
    'ipv6' => ':attribute پێویستە پەیوەند بە ڕووداوێکی IPv6 بێت.',
    'json' => ':attribute پێویستە پەیوەند بە تێکسەی JSON بێت.',
    'lt' => [
        'numeric' => ':attribute پێویستە کەمتر بێت لە :value.',
        'file' => ':attribute پێویستە کەمتر بێت لە :value کیلوبایت.',
        'string' => ':attribute پێویستە کەمتر بێت لە :value تێکسە.',
        'array' => ':attribute پێویستە کەمتر بێت لە :value تێم.',
    ],
    'lte' => [
        'numeric' => ':attribute پێویستە کەمتر یان هەمانەند بێت لە :value.',
        'file' => ':attribute پێویستە کەمتر یان هەمانەند بێت لە :value کیلوبایت.',
        'string' => ':attribute پێویستە کەمتر یان هەمانەند بێت لە :value تێکسە.',
        'array' => ':attribute پێویستە نەبێت زیاتر لە :value تێم.',
    ],
    'max' => [
        'numeric' => ':attribute ناتوانێت گەورەتر بێت لە :max.',
        'file' => ':attribute ناتوانێت گەورەتر بێت لە :max کیلوبایت.',
        'string' => ':attribute ناتوانێت گەورەتر بێت لە :max تێکسە.',
        'array' => ':attribute ناتوانێت زیاتر بێت لە :max تێم.',
    ],
    'mimes' => ':attribute پێویستە فایلێک بێت لە جۆرەکان: :values.',
    'mimetypes' => ':attribute پێویستە فایلێک بێت لە جۆرەکان: :values.',
    'min' => [
        'numeric' => ':attribute پێویستە بەرەوپێش :min.',
        'file' => ':attribute پێویستە بەرەوپێش :min کیلوبایت.',
        'string' => ':attribute پێویستە بەرەوپێش :min تێکسە.',
        'array' => ':attribute پێویستە بەرەوپێش :min تێم.',
    ],
    'not_in' => ':attribute هەڵبژێردراوە نادروستە.',
    'not_regex' => ':attribute ڕوونیەکەی نەدروستە.',
    'numeric' => ':attribute پێویستە ژمارەیەک بێت.',
    'present' => ':attribute پێویستە پەیوەندەیەک بێت.',
    'regex' => ':attribute ڕوونیەکەی نەدروستە.',
    'required' => ':attribute پێویستە بەکاربردن بێت.',
    'required_if' => ':attribute پێویستە بەکاربردن بێت کاتێک :other هەمانەند :value.',
    'required_unless' => ':attribute پێویستە بەکاربردن بێت ئەگەر :other لە :values نەبێت.',
    'required_with' => ':attribute پێویستە بەکاربردن بێت کاتێک :values پێویستە.',
    'required_with_all' => ':attribute پێویستە بەکاربردن بێت کاتێک هەموو :values پێویستە.',
    'required_without' => ':attribute پێویستە بەکاربردن بێت کاتێک :values پێویست نەبێت.',
    'required_without_all' => ':attribute پێویستە بەکاربردن بێت کاتێک هیچکەس :values نەبێت.',
    'same' => ':attribute و :other پێویستە هاوبەش بێت.',
    'size' => [
        'numeric' => ':attribute پێویستە بەرەوپێش :size.',
        'file' => ':attribute پێویستە بەرەوپێش :size کیلوبایت.',
        'string' => ':attribute پێویستە بەرەوپێش :size تێکسە.',
        'array' => ':attribute پێویستە بەرەوپێش :size تێم.',
    ],
    'string' => ':attribute پێویستە تێکسەیەک بێت.',
    'timezone' => ':attribute پێویستە ڕووداویەکی تایبەتی هەبێت.',
    'unique' => ':attribute پێشتر بەرزە.',
    'uploaded' => ':attribute نە توانرا باربکات.',
    'url' => ':attribute ڕوونیەکەی نەدروستە.',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [],


];
