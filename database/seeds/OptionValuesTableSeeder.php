<?php

use Illuminate\Database\Seeder;
use App\Admin\Option;
use App\Admin\OptionValue;

class OptionValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact_id = Option::where('code', 'CONTACT')->first()->id;
        OptionValue::create([
            'name'          => 'Liên hệ html',
            'option_id'     => $contact_id,
            'value'        	=> 0
        ]);
        OptionValue::create([
            'name'          => 'Bản đồ',
            'option_id'     => $contact_id,
            'value'        	=> 1
        ]);
        $introduce_id = Option::where('code', 'INTRODUCE')->first()->id;
        OptionValue::create([
            'name'          => 'Giới thiệu html',
            'option_id'     => $introduce_id,
            'value'        	=> 0
        ]);
    }
}
