<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'basketball',
            'type' => 'val',
            'value' => '120'
        ]);

        Coupon::create([
            'code' => 'naymar',
            'type' => 'percent',
            'percent_off' => '20'
        ]);
    }
}
