<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Fruits',
                'slug' => 'fruits',
                'created_at' => Carbon::create('2018', '07', '30', '10', '12', '17'),
                'updated_at' => Carbon::create('2020', '11', '30', '14', '51', '30'),
                'status' => 'available',
            ],
            [
                'id' => 2,
                'name' => 'Vegetables',
                'slug' => 'vegetables',
                'created_at' => Carbon::create('2018', '07', '30', '10', '30', '07'),
                'updated_at' => Carbon::create('2018', '10', '23', '10', '23', '33'),
                'status' => 'available',
            ],
            [
                'id' => 3,
                'name' => 'Others',
                'slug' => 'others',
                'created_at' => Carbon::create('2018', '07', '31', '13', '10', '39'),
                'updated_at' => Carbon::create('2018', '10', '23', '14', '45', '20'),
                'status' => 'available',
            ],
            [
                'id' => 4,
                'name' => 'Condiments',
                'slug' => 'condiments',
                'created_at' => Carbon::create('2018', '08', '01', '13', '33', '53'),
                'updated_at' => Carbon::create('2022', '05', '04', '11', '51', '48'),
                'status' => 'not-available',
            ],
            [
                'id' => 7,
                'name' => 'Dry Goods',
                'slug' => 'dry-goods',
                'created_at' => Carbon::create('2018', '10', '26', '07', '28', '34'),
                'updated_at' => Carbon::create('2022', '05', '04', '11', '48', '44'),
                'status' => 'not-available',
            ],
            [
                'id' => 9,
                'name' => 'Dairy Products',
                'slug' => 'dairy-products',
                'created_at' => Carbon::create('2018', '11', '01', '07', '56', '35'),
                'updated_at' => Carbon::create('2018', '11', '01', '07', '56', '35'),
                'status' => 'available',
            ],
            [
                'id' => 10,
                'name' => 'Seedling ( plants)',
                'slug' => 'seedling-plants',
                'created_at' => Carbon::create('2019', '05', '22', '12', '31', '14'),
                'updated_at' => Carbon::create('2019', '09', '20', '14', '23', '47'),
                'status' => 'available',
            ],
            [
                'id' => 11,
                'name' => 'J.Lynn Products',
                'slug' => 'j-lynn-products',
                'created_at' => Carbon::create('2020', '03', '27', '16', '23', '20'),
                'updated_at' => Carbon::create('2020', '03', '27', '16', '23', '20'),
                'status' => 'available',
            ],
            [
                'id' => 12,
                'name' => 'Heaven Hotel Products',
                'slug' => 'heaven-hotel-products',
                'created_at' => Carbon::create('2020', '03', '29', '17', '53', '00'),
                'updated_at' => Carbon::create('2020', '12', '05', '17', '17', '51'),
                'status' => 'not-available',
            ],
            [
                'id' => 13,
                'name' => 'Meat',
                'slug' => 'meat',
                'created_at' => Carbon::create('2020', '04', '16', '17', '52', '21'),
                'updated_at' => Carbon::create('2020', '04', '16', '17', '52', '21'),
                'status' => 'available',
            ],
            [
                'id' => 14,
                'name' => 'Beelight Products',
                'slug' => 'beelight-products',
                'created_at' => Carbon::create('2020', '04', '17', '15', '09', '54'),
                'updated_at' => Carbon::create('2020', '04', '17', '15', '09', '54'),
                'status' => 'available',
            ],
            [
                'id' => 15,
                'name' => 'Coffee',
                'slug' => 'coffee',
                'created_at' => Carbon::create('2020', '05', '05', '15', '49', '28'),
                'updated_at' => Carbon::create('2020', '05', '05', '15', '49', '28'),
                'status' => 'available',
            ],
            [
                'id' => 16,
                'name' => 'Honey',
                'slug' => 'honey',
                'created_at' => Carbon::create('2020', '09', '01', '07', '50', '06'),
                'updated_at' => Carbon::create('2020', '09', '01', '07', '50', '06'),
                'status' => 'available',
            ],
            [
                'id' => 17,
                'name' => 'Fruit Salad',
                'slug' => 'fruit-salad',
                'created_at' => Carbon::create('2021', '03', '22', '17', '30', '41'),
                'updated_at' => Carbon::create('2021', '03', '22', '17', '35', '09'),
                'status' => 'available',
            ],
        ];

        // Insert the categories into the database
        Category::insert($categories);
    }
}
