<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders')->insert([
            'Item_Image' => Str::random(5).'PNG',
            'Quantity' => '20',
            'Address_Type' => 'Office',
            'Street' => '11-A',
            'Flat_no' => '501',
            'City' => 'Rawalpindi',
            'Zipcode' => '4400',
            'phno' => '03435515668',
            
        ]);
    }
}
