<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
           
        [
            'name'=>'Ultra Smart Watch With 10 Straps',
            'price'=>'1909',
            'category'=>'2',
            'description'=>'Turn on the sleep mode, advice to help you sleep, even it is a nap, the watch will not miss.',
            'gallery'=>'https://images.priceoye.pk/ultra-10-smart-watch-pakistan-priceoye-bdr4e.jpg',
        ],
        [
            'name'=>'Ultra Smart Watch With 10 Straps',
            'price'=>'3499',
            'category'=>'2',
            'description'=>'Large color touchscreen with a hih resolution of 320 x 320 pixels can dislpay vivid and life like visuals which are so captivating that you will nevet want to look away. Its responsive touch lets you effortlessly control the watch.',
            'gallery'=>'https://images.priceoye.pk/realme-watch-pakistan-priceoye-07yxc.jpg',
        ],
        [
            'name'=>'Xiaomi Redmi Watch 5 Active',
            'price'=>'8699',
            'category'=>'2',
            'description'=>'Clear calling experience with the help of best in the segment noise cancellation on your wrist',
            'gallery'=>'https://images.priceoye.pk/xiaomi-redmi-watch-5-active-pakistan-priceoye-81y8e.jpeg',
        ],
        [
            'name'=>'G9 Ultra Pro Smartwatch',
            'price'=>'2799',
            'category'=>'2',
            'description'=>'You will get timely notifications about what is happening on your phone without having to look at it time and again. This smartwatch has functions ranging from the number of steps you take in a day to sleep monitoring to fine tune your daily living. Plus, voice assistant options in some watches help you perform multiple functions with your voice.',
            'gallery'=>'https://images.priceoye.pk/g9-ultra-pro-smartwatch-pakistan-priceoye-8n6fq.jpg',
        ],
        [
            'name'=>'Zero Delta Smartwatch',
            'price'=>'8999',
            'category'=>'2',
            'description'=>'The expansive 2.04" AMOLED display offer exceptional clarity and vivid colors. Every detail is reproduced with stunning precision, making it a joy to navigate menus, view messages and track your fitness progress.',
            'gallery'=>'https://images.priceoye.pk/zero-delta-smartwatch-pakistan-priceoye-evbwf.jpg',
        ],
        ]);
        //
    }
}
