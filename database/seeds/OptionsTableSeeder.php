<?php

use Illuminate\Database\Seeder;
use App\Admin\Option;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::truncate();

        Option::create([
            'code'      =>  'CONTACT',
            'name'          => 'Liên hệ',
        ]);

        Option::create([
            'code'      =>  'INTRODUCE',
            'name'          => 'Giới thiệu',
        ]);
    }
}
