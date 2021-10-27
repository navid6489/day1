<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    
    protected $fillable = [
         'name', 'email', 'password'
    ];
}
