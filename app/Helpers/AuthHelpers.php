<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AuthHelpers
{
    public static function isMasterAdmin()
    {
        return Auth::check() && Auth::user()->nik === 'KT-24081493' || Auth::user()->nik == 'KT-13040085';
    }
}