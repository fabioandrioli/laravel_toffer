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
        'discount',
        'observacao',
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Photo::class);
    }

    public function specifications(){
        return $this->hasMany(Specification::class);
    }

    public function search($filter = null){
        return $results = $this
                    ->where('title','LIKE',"%{$filter}%")
                    ->orWhere('description','LIKE',"%{$filter}%")
                    ->paginate(8);
    }
}
