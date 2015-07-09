<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Hashids Config
    |--------------------------------------------------------------------------
    */

    'salt' => config('app.key'),
    'length' => 8,
    'alphabet' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',

];
