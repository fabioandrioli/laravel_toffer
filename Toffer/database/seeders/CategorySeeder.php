<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Eletrônicos',
            'slug' => 'eletronicos',
            'description' => 'Produtos eletronicos em geral'
        ]);

        Category::create([
            'name' => 'Brinquedos',
            'slug' => 'brinquedos',
            'description' => 'Produtos eletronicos em geral'
        ]);
    }
}
