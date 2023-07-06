<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class Admin extends Model implements AuthenticatableContract
{
    use HasFactory, AuthenticatableTrait;
    use Notifiable;

    protected $table='admins';
    protected $fillable=[
        'name','email','password',
    ];
}
