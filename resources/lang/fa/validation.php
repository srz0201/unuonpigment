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

    'accepted' => ':attribute باید پذیرفته شده باشد.',
    'active_url' => 'آدرس :attribute معتبر نیست',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'alpha' => ':attribute باید شامل حروف الفبا باشد.',
    'alpha_dash' => ':attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.',
    'alpha_num' => ':attribute باید شامل حروف الفبا و عدد باشد.',
    'array' => ':attribute باید شامل آرایه باشد.',
    'before' => ':attribute باید تاریخی قبل از :date باشد.',
    'between' => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file' => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array' => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean' => 'The :attribute field must be true or false',
    'confirmed' => ':attribute با تاییدیه مطابقت ندارد.',
    'date' => ':attribute یک تاریخ معتبر نیست.',
    'date_format' => ':attribute با الگوی :format مطاقبت ندارد.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم باشد.',
    'email' => 'فرمت :attribute معتبر نیست.',
    'exists' => ':attribute انتخاب شده، معتبر نیست.',
    'image' => ':attribute باید تصویر باشد.',
    'in' => ':attribute انتخاب شده، معتبر نیست.',
    'integer' => ':attribute باید نوع داده ای عددی (integer) باشد.',
    'ip' => ':attribute باید IP آدرس معتبر باشد.',
    'max' => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file' => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array' => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes' => ':attribute باید یکی از فرمت های :values باشد.',
    'min' => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file' => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string' => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array' => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'not_in' => ':attribute انتخاب شده، معتبر نیست.',
    'numeric' => ':attribute باید شامل عدد باشد.',
    'regex' => ':attribute یک فرمت معتبر نیست',
    'required' => 'فیلد :attribute الزامی است',
    'required_if' => 'فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.',
    'required_with' => ':attribute الزامی است زمانی که :values موجود است.',
    'required_with_all' => ':attribute الزامی است زمانی که :values موجود است.',
    'required_without' => ':attribute الزامی است زمانی که :values موجود نیست.',
    'required_without_all' => ':attribute الزامی است زمانی که :values موجود نیست.',
    'same' => ':attribute و :other باید مانند هم باشند.',
    'size' => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file' => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string' => ':attribute باید برابر با :size کاراکتر باشد.',
        'array' => ':attribute باسد شامل :size آیتم باشد.',
    ],
    'string' => ':attribute باید حروف باشد',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute قبلا انتخاب شده است.',
    'url' => 'فرمت آدرس :attribute اشتباه است.',

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

    'custom' => [],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'amount' => 'تعداد',
        'base_sell_price' => 'قیمت فروش پایه',
        'discount_sell_price' => 'قیمت فروش با تخفیف',
        'priority' => 'اولویت',
        'status' => 'وضعیت',
        'stuffName' => 'نام کالا',
        'eng_name' => 'نام انگلیسی کالا',
        'category' => 'دسته بندی',
        'stuffType' => 'نوع کالا',
        'tec_info_key' => 'عنوان مشخصات فنی',
        'category_id' => 'دسته بندی',
        'colorName' => 'نام رنگ',
        'colorCode' => 'کد رنگ',
        'name' => 'نام',
        'activationCode' => 'کد تایید',
        'username' => 'نام کاربری',
        'email' => 'پست الکترونیکی',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'رمز عبور',
        'password_confirmation' => 'تایید رمز عبور',
        'city' => 'شهر',
        'country' => 'کشور',
        'address' => 'نشانی',
        'phone' => 'تلفن',
        'mobile' => 'تلفن همراه',
        'mobile-old' => 'تلفن همراه قبلی',
        'age' => 'سن',
        'sex' => 'جنسیت',
        'gender' => 'جنسیت',
        'resetPassCode' => 'کد تغییر رمز عبور',
        'day' => 'روز',
        'month' => 'ماه',
        'year' => 'سال',
        'hour' => 'ساعت',
        'minute' => 'دقیقه',
        'second' => 'ثانیه',
        'title' => 'عنوان',
        'text' => 'متن',
        'content' => 'محتوا',
        'description' => 'توضیحات',
        'excerpt' => 'گلچین کردن',
        'date' => 'تاریخ',
        'time' => 'زمان',
        'available' => 'موجود',
        'g-recaptcha-response' => 'کدتصویری',
        'melli_code' => 'کدملی',
        'state' => 'استان',
        'postal_code' => 'کدپستی',
        'fname' => 'نام',
        'lname' => 'نام خانوادگی',
        'tell' => 'شماره تلفن',
        'urgent_phone_no' => 'شماره تلفن ضروری',
        'size' => 'اندازه',
        'start' => 'تاریخ شروع',
        'end' => 'تاریخ پایان',
        'passwordCode' => 'کد بازیابی رمز عبور',
        'subMenu_id' => 'زیر منو',
        'type' => 'نوع',
        'title_id' => 'عنوان',
        'brand_id' => 'برند',
        'tec_info_value' => 'مقدار مشخصات فنی',
        'permission_id' => 'دسترسی',
        'seller_id' => 'فروشنده',
        'alarm_level' => 'سطح هشدار',
        'weight' => 'وزن',
        'color_id' => 'رنگ',
        'size_id' => 'سایز',
        'product_color_id' => 'کالا',
        'qty' => 'تعداد',
        'buy' => 'بهای تمام شده خرید',
        'tecInfo_id' => 'مشخصات فنی',
        'value' => 'مقدار',
        'sub_title' => 'زیر عنوان',
        'tec_code' => 'عنوان مشخصات فنی',
        'tec_id' => 'مقدار مشخصات فنی',
        'id' => 'شناسه',
        'product' => 'کالا',
        //        "" => "",
        //        "" => "",
    ],
];
