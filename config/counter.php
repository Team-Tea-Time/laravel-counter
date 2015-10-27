<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Throttling
    |--------------------------------------------------------------------------
    |
    | Here you can control throttling of counters. Uses sessions.
    |
    | Set scope to true or false to enable or disable throttling globally, or
    | specify an array of counter keys to apply throttling only to those
    | counters (e.g. ['views', 'likes']).
    |
    | Set interval to the minimum time, in seconds, required between
    | increments.
    |
    */

    'throttling' => [
        'scope'     => false,
        'interval'  => 10
    ],

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    |
    | The name of your app's User model, and a closure to return the user ID.
    | These are used to associate counter activity with users.
    |
    */

    'user' => [
        'model' => App\User::class,
        'id'    => function ()
        {
            return auth()->check() ? auth()->user()->id : 0;
        }
    ]

];
