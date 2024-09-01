<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'category_id' => 2,
                'name' => 'Kale CURLY /chou frisé',
                'slug' => Str::slug('Kale CURLY /chou frisé'),
                'price' => 2500.00,
                'measurement' => 'Bunch',
                'description' => 'Nice',
                'created_at' => Carbon::parse('2018-07-31 12:15:10'),
                'updated_at' => Carbon::parse('2024-06-29 12:03:20'),
                'status' => 'Available',
            ],
            [
                'id' => 2,
                'category_id' => 2,
                'name' => 'Baby Spinach',
                'slug' => Str::slug('Baby Spinach'),
                'price' => 1500.00,
                'measurement' => 'bunch',
                'description' => 'good',
                'created_at' => Carbon::parse('2018-07-31 12:21:10'),
                'updated_at' => Carbon::parse('2024-06-18 14:06:30'),
                'status' => 'Not Available',
            ],
            [
                'id' => 3,
                'category_id' => 2,
                'name' => 'Button Mushrooms',
                'slug' => Str::slug('Button Mushrooms'),
                'price' => 4000.00,
                'measurement' => 'PUNNET OF 250G',
                'description' => 'fresh',
                'created_at' => Carbon::parse('2018-07-31 12:23:13'),
                'updated_at' => Carbon::parse('2024-01-04 16:33:24'),
                'status' => 'Available',
            ],
            [
                'id' => 4,
                'category_id' => 2,
                'name' => 'Parsley/Persil',
                'slug' => Str::slug('Parsley/Persil'),
                'price' => 500.00,
                'measurement' => 'bunch',
                'description' => 'fresh',
                'created_at' => Carbon::parse('2018-07-31 12:31:44'),
                'updated_at' => Carbon::parse('2021-07-30 06:16:47'),
                'status' => 'Available',
            ],
            [
                'id' => 5,
                'category_id' => 2,
                'name' => 'Okra',
                'slug' => Str::slug('Okra'),
                'price' => 4500.00,
                'measurement' => 'Kg',
                'description' => 'fresh',
                'created_at' => Carbon::parse('2018-07-31 12:32:40'),
                'updated_at' => Carbon::parse('2021-09-15 15:06:14'),
                'status' => 'Available',
            ],
            [
                'id' => 6,
                'category_id' => 2,
                'name' => 'Endives',
                'slug' => Str::slug('Endives'),
                'price' => 5000.00,
                'measurement' => 'Kg',
                'description' => 'Fresh',
                'created_at' => Carbon::parse('2018-07-31 12:35:18'),
                'updated_at' => Carbon::parse('2024-02-21 14:15:08'),
                'status' => 'Not Available',
            ],
            [
                'id' => 7,
                'category_id' => 2,
                'name' => 'Fennel/Fenouil',
                'slug' => Str::slug('Fennel/Fenouil'),
                'price' => 800.00,
                'measurement' => 'pieces',
                'description' => 'fresh',
                'created_at' => Carbon::parse('2018-07-31 12:47:41'),
                'updated_at' => Carbon::parse('2023-03-12 22:27:31'),
                'status' => 'Available',
            ],
            [
                'id' => 8,
                'category_id' => 2,
                'name' => 'Red Radish/Radis rouge',
                'slug' => Str::slug('Red Radish/Radis rouge'),
                'price' => 500.00,
                'measurement' => 'Bunch',
                'description' => 'fresh',
                'created_at' => Carbon::parse('2018-07-31 12:55:20'),
                'updated_at' => Carbon::parse('2021-07-28 16:30:41'),
                'status' => 'Available',
            ],
            [
                'id' => 9,
                'category_id' => 2,
                'name' => 'White Radish/Radis blanc',
                'slug' => Str::slug('White Radish/Radis blanc'),
                'price' => 500.00,
                'measurement' => 'Bunch',
                'description' => 'Fresh',
                'created_at' => Carbon::parse('2018-07-31 12:59:05'),
                'updated_at' => Carbon::parse('2021-07-28 16:31:26'),
                'status' => 'Available',
            ],
        ]);
    }
}
