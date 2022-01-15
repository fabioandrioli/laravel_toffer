<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateOrder extends Model
{
    use HasFactory;
    protected $fillable = ["description","order_id","data"];
}
