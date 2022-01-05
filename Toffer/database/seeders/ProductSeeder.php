<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::first();
        Product::create([
            'name' => 'Relógio Clock smart',
            'slug' => 'relogio-clock-smart',
            'description' => 'Relógio a prova de aguá',
            'category_id' => $category->id,
            'price' => 89.90,
            'type' => 'unidade',
            'qtd' => 10,
        ]);
    }
}
