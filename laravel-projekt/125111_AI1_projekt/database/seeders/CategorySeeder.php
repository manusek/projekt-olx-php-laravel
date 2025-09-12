<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Motoryzacja', 'img' => 'car2.png']);
        Category::create(['name' => 'Rowery', 'img' => 'bike.png' ]);
        Category::create(['name' => 'Elektronika', 'img' => 'phone2.png']);
        Category::create(['name' => 'Rolnictwo', 'img' => 'tractor.png']);
        Category::create(['name' => 'Zwierzęta', 'img' => 'animal.png']);
        Category::create(['name' => 'Sport i Hobby', 'img' => 'sport.png']);
        Category::create(['name' => 'Praca', 'img' => 'worok.png']);
        Category::create(['name' => 'Muzyka', 'img' => 'guitar.png']);
        Category::create(['name' => 'Moda', 'img' => 'pants.png']);
    }
}
