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
            'name'=>'M10 TWS Wireless Bluetooth Earbuds',
            'price'=>'699',
            'category_id'=>'3',
            'description'=>'The M10 TWS Earbuds provide high-quality audio. These earbuds are equipped with innovative sound gadgets that produce crystal-clear sound with powerful bass and sharp treble, letting you experience your favorite tunes and movies.',
            'gallery'=>'https://images.priceoye.pk/m10-tws-wireless-bluetooth-earbuds-pakistan-priceoye-c02r7-500x500.webp',
            'stock_count'=>'19',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Air 31 TWS Transparent Earbuds',
            'price'=>'799',
            'category_id'=>'3',
            'description'=>'It has accurate display of case and each headset battery level. 
            It has touch sensor on both earbuds allows you to answer calls or switch music without 
            resching your phone',
            'gallery'=>'https://images.priceoye.pk/air-31-tws-transparent-earbuds-pakistan-priceoye-mtv4f-500x500.webp',
            'stock_count'=>'0',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Lenovo HE05X Neckband Wireless',
            'price'=>'999',
            'category_id'=>'3',
            'description'=>'It has large battery capacity, using low-power micro-power technology 
            combined with chip loe-power technology, greately improving the use time',
            'gallery'=>'https://images.priceoye.pk/lenovo-he05x-neckband-wireless-pakistan-priceoye-cd8lm-500x500.webp',
            'stock_count'=>'9',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Redmi Buds 4 Active',
            'price'=>'4199',
            'category_id'=>'3',
            'description'=>'Each earbud comes equipped with a high-sensitivity microphone that helps 
            reduce background noise interruptions, ensuring clear speech for effective communication, 
            even in noisy environments.',
            'gallery'=>'https://images.priceoye.pk/redmi-buds-4-active-pakistan-priceoye-0laiv-500x500.webp',
            'stock_count'=>'0',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Lenovo LP75 Wireless Ear-hook Sports Headphones',
            'price'=>'3499',
            'category_id'=>'3',
            'description'=>'Adaptive Equalizer with Galaxy AI adjusts audio based on how your Buds 
            sit in your ears. That means every time you put Buds in, you can bring out the best in 
            every playlist. Let Adaptive Noise Control with Galaxy AI work its magic to automatically 
            tune out unwanted conversation, car noise, and more.',
            'gallery'=>'https://images.priceoye.pk/lenovo-lp75-wireless-ea…s-headphones-pakistan-priceoye-nykud-500x500.webp',
            'stock_count'=>'99',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
        //
    }
}
