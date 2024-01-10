<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'current_password',        // Do not trim the 'current_password' attribute
        'password',                // Do not trim the 'password' attribute
        'password_confirmation',   // Do not trim the 'password_confirmation' attribute
    ];
}
