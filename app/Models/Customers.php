<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['name', 'address', 'checked', 'description', 'interest', 'date_of_birth','email','account','credit_card'];
}
