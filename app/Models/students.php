<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    public $timestamps = false; //by default timestamp true
    use HasFactory;
    protected $fillable = [
        'name','password', 'email', 'address', 'profilepicture', 'currentschool', 'previousschool', 'parentsdetails', 'assignedteacher', 'roleflag'
   ];
}
