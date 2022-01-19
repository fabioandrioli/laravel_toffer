<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function dateOrder(){
        return $this->hasMany(DateOrder::class,"order_id");
    }

    
    public function search($filter = null){
        return $results = $this
                    ->where('situation','LIKE',"%{$filter}%")
                    ->orWhere('status','LIKE',"%{$filter}%")
                    ->paginate(8);
    }
}
