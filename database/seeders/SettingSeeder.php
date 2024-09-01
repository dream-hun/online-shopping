<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'mobile_one' => '0784929046',
                'mobile_two' => '0785477042',
                'whatsapp' => '0728177613',
                'email_one' => 'frankuwuzuyinema@yahoo.fr',
                'email_two' => 'tumukundebea@gmail.com',
                'shipping_fee' => 2200,
                'address' => 'KACYIRU- KG549 #2',
                'about_us' => 'GARDEN OF EDEN PRODUCE is a Rwandan company which organically grows and deliver variety of fresh groceries (fruits, vegetables and herbs) mostly those which were unavailable on Rwandan market before. And mainly we focus on veggies, fruits and herbs with tremendous healthy benefits. By experience gained from our father who was in this business 40 years the quality of our groceries is guaranteed.',
            ],

        ];
        Setting::insert($settings);
    }
}
