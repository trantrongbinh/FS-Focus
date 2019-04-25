<?php

return [

    // Application Name
    'name' => env('APPLICATION_NAME') ?: 'FullStack Focus',

    // Mail Notification
    'mail_notification' => env('MAIL_NOTIFICATION') ?: false,

    // Default Avatar
    'default_avatar' => env('DEFAULT_AVATAR') ?: '/images/default.png',

    // Default Icon
    'default_icon' => env('DEFAULT_ICON') ?: '/images/favicon.ico',

    // Color Theme
    'color_theme' => 'gray-theme',

    // Meta
    'meta' => [
        'keywords' => 'laravel,vuejs',
        'description' => 'Share to Study'
    ],

    // Social Share
    'social_share' => [
        'article_share'    => env('ARTICLE_SHARE') ?: true,
        'discussion_share' => env('DISCUSSION_SHARE') ?: true,
        'sites'            => env('SOCIAL_SHARE_SITES') ?: 'google,twitter',
        'mobile_sites'     => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'google,twitter',
    ],

    // Google Analytics
    'google' => [
        'id'   => env('GOOGLE_ANALYTICS_ID', 'Google-Analytics-ID'),
        'open' => env('GOOGLE_OPEN') ?: false
    ],

    // Article Page
    'article' => [
        'title'       => 'Follow One Course Until Successful',
        'description' => ' Thất bại không phải là ngõ cụt! Thất bại là khi động lực không còn. Ngã ở đâu đứng lên ở đó rồi một ngày chúng ta sẽ thành công! ',
        'number'      => 15,
        'sort'        => 'desc',
        'sortColumn'  => 'published_at',
    ],

    // Discussion Page
    'discussion' => [
        'number' => 20,
        'sort'   => 'desc',
        'sortColumn' => 'created_at',
    ],

    // Footer
    'footer' => [
        'github' => [
            'open' => true,
            'url'  => 'https://github.com',
        ],
        'twitter' => [
            'open' => false,
            'url'  => 'https://twitter.com'
        ],
        'facebook' => [
            'open' => true,
            'url'  => 'https://facebook.com'
        ],
        'meta' => '© FS-Focus Blog 2018.',
        'author' => 'BKFA Team 😎 😀 😉 😛',
    ],

    'license' => 'Sống thì đừng quan tâm người khác nói gì về mình, bởi chỉ có bạn mới biết mình là ai.',

    'str_limit' => [
        'name' => 14,
        'content_discussion' => [
            'min' => 1000,
            'max' => 3000,
        ],
        'title_post' => 45,
    ],

    'number_limit' => [
        'notification' => 7,
    ],
];
