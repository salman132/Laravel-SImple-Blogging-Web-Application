<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Laravel Blog',
            'contact_number' => '01686235902',
            'email' => 'salman.auvi@gmail.com',
            'address' => 'Dhaka, Bangladesh',



        ]);
    }
}
