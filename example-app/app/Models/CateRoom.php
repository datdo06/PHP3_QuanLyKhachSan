<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CateRoom extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'loaiphong';
    protected $fillable = ['id', 'name'];
}
