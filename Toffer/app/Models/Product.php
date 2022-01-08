<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'subCategory_id',
        'uuid',
        'image',
        'description',
        'unit_price',
        'type',
        'status',
        'qtd',
        'observacao'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
