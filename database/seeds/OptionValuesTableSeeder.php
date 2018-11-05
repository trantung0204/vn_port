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
        OptionValue::truncate();
        $contact_id = Option::where('code', 'CONTACT')->first()->id;
        OptionValue::create([
            'name'          => '<p><a>Công ty TNHH MTV Cảng tổng hợp quốc tế Nghi Sơn - NSIP</a></p>
                    <p><a>Trụ sở chính: Hà Tân, Hải Hà, Tĩnh Gia, Thanh Hóa</a></p>
                    <p><a>Điện Thoại: (84) 237 361 3938 – Fax: (84) 237 361 3939</a></p>
                    <p><a href="email:aaa@gmail.com" style="color: black">Email: aaa@gmail.com</a></p>
                    <p><a>Văn Phòng Đại Diện : Phòng 406, Tầng 4, Tòa nhà Citilight, 45 Võ Thị Sáu, Quận 1, Tp.HCM</a>
                    </p>
                    <p><a>Website: canghaiphong.com</a></p>',
            'option_id'     => $contact_id,
            'value'        	=> 0
        ]);
        OptionValue::create([
            'name'          => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59658.04394918709!2d106.66372712153866!3d20.84673329077264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7af39e3f1ad3%3A0xa5ffc85ff87a07e8!2zSOG6o2kgUGjDsm5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1538733440530" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'option_id'     => $contact_id,
            'value'        	=> 1
        ]);
        $introduce_id = Option::where('code', 'INTRODUCE')->first()->id;
        OptionValue::create([
            'name'          => '<p><a>Cảng Sài Gòn trong hệ thống Cảng biển của ngành Hàng hải Việt nam là một cảng có sản lượng và năng
                    suất xếp dỡ
                    hàng đầu của Quốc gia.</a></p>',
            'option_id'     => $introduce_id,
            'value'        	=> 0
        ]);
    }
}
