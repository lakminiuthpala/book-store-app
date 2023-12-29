<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class Employee extends Model
{
    use HasFactory, Notifiable, Authenticatable, HasRoles, SoftDeletes;
    protected $fillable = [
        'emp_code',
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
        'user_type',
        'role'
    ];
}
