<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $table = 'users';

    protected $fillable = [
        'nik',
        'nama',
        'email',
        'telp',
        'foto',
        'password',
        'id_role',
        'divisi',
        'company',
        'jabatan',
    ];

    // protected $primaryKey = 'id_user';
    // public $incrementing = false;
    // public $timestamps = false;
    // protected $keyType = 'string'; // Change to 'int' if id_user is an integer

    // public function getAuthIdentifierName()
    // {
    //     return 'id_user';
    // }
}
