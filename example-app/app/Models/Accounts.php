<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = ['id', 'name', 'email', 'image', 'password'];

//    protected $guarded = ['date_of_birth', 'image', 'address', 'role_id'];

}
