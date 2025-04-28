<?php

/**
 * |--------------------------------------------------------------------------
 * | Set up your lessons configuration
 * |--------------------------------------------------------------------------
 * |
 * | The route configuration is for setting up the route prefix and middleware.
 * | The user configuration is for setting up the user model and columns.
 * | The seo configuration is for setting up the default meta tags for the lessons.
 * | The recaptcha configuration is for setting up the recaptcha for the lessons.
 */

use Firefly\FilamentBlog\Models\User;

return [
    'tables' => [
        'prefix' => 'fblog_', // keep this unless you want to rename all database tables
    ],
    'route' => [
        'prefix' => 'lessons', // ✅ changed from 'blogs' to 'lessons'
        'middleware' => ['web'],
        //        'home' => [
        //            'name' => 'filamentlessons.home',
        //            'url' => env('APP_URL'),
        //        ],
        'login' => [
            'name' => 'filamentlessons.post.login', // ✅ changed from 'filamentblog.post.login'
        ],
    ],
    'user' => [
        'model' => User::class,
        'foreign_key' => 'user_id',
        'columns' => [
            'name' => 'name',
            'avatar' => 'profile_photo_path', // column name for avatar
        ],
    ],
    'seo' => [
        'meta' => [
            'title' => 'Filament Lessons', // ✅ changed from 'Filament Blog'
            'description' => 'This is filament lessons seo meta description', // ✅ changed
            'keywords' => [],
        ],
    ],

    'recaptcha' => [
        'enabled' => false, // true or false
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret_key' => env('RECAPTCHA_SECRET_KEY'),
    ],
];
