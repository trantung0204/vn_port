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
            'value'         => 0
        ]);
        OptionValue::create([
            'name'          => '<p>Lịch sử hình thành công ty</p>',
            'option_id'     => $introduce_id,
            'value'         => 1
        ]);
        OptionValue::create([
            'name'          => '<p>Tầm nhìn sứ mệnh</p>',
            'option_id'     => $introduce_id,
            'value'         => 2
        ]);
        OptionValue::create([
            'name'          => '<p>Sơ đồ tổ chức</p>',
            'option_id'     => $introduce_id,
            'value'         => 3
        ]);
        OptionValue::create([
            'name'          => '<p>Ban lãnh đạo</p>',
            'option_id'     => $introduce_id,
            'value'         => 4
        ]);
        OptionValue::create([
            'name'          => '<p>Luồng lạch</p>',
            'option_id'     => $introduce_id,
            'value'         => 5
        ]);
        OptionValue::create([
            'name'          => '<p>Cầu cảng</p>',
            'option_id'     => $introduce_id,
            'value'         => 6
        ]);
        OptionValue::create([
            'name'          => '<p>Diện t&iacute;ch bến b&atilde;i ngo&agrave;i trời đ&atilde; ho&agrave;n th&agrave;nh 23 ha, thuận lợi cho việc đổ b&atilde;i v&agrave; tập kết h&agrave;ng h&oacute;a. Bề mặt b&atilde;i kh&aacute; bằng phẳng v&agrave; rộng r&atilde;i, sạch sẽ.</p>

                <p><img src="http://dev.vn-port.org/img/khobai1.jpg" style="width:100%" /></p>

                <p><img src="http://dev.vn-port.org/img/khobai2.jpg" style="width:100%" /></p>

                <p>Diện t&iacute;ch kho đ&atilde; ho&agrave;n th&agrave;nh: 3 kho, tổng diện t&iacute;ch 15.000 M2, c&oacute; hệ thống ph&ograve;ng ch&aacute;y chữa ch&aacute;y tự động, được trang bị cẩu trục, &aacute;p lực nền 25T/M2.</p>

                <p><img src="http://dev.vn-port.org/img/khobai3.jpg" style="width:100%" /></p>

                <p><img src="http://dev.vn-port.org/img/khobai4.jpg" style="width:100%" /></p>',
            'option_id'     => $introduce_id,
            'value'         => 7
        ]);
        OptionValue::create([
            'name'          => '<table border="1" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                        <p><strong>T&Ecirc;N THIẾT BỊ</strong></p>
                        </td>
                        <td>
                        <p><strong>SỐ LƯỢNG</strong></p>
                        </td>
                        <td>
                        <p><strong>NĂNG LỰC</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Cẩu Gottwald</p>
                        </td>
                        <td>
                        <p>01</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 100T, tầm với 36m</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Cẩu ch&acirc;n đế cố định</p>
                        </td>
                        <td>
                        <p>02</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 40T, tầm với 32m</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Cẩu ch&acirc;n đế di động</p>
                        </td>
                        <td>
                        <p>04</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 40T, tầm với 36m</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Cổng trục b&atilde;i</p>
                        </td>
                        <td>
                        <p>03</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 25T</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Cổng trục n&acirc;ng Container</p>
                        </td>
                        <td>
                        <p>02</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 45 Tấn</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Cẩu b&aacute;nh x&iacute;ch</p>
                        </td>
                        <td>
                        <p>01</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 150 Tấn</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Cẩu b&aacute;nh x&iacute;ch</p>
                        </td>
                        <td>
                        <p>01</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 60 Tấn</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;T&agrave;u lai</p>
                        </td>
                        <td>
                        <p>02</p>
                        </td>
                        <td>
                        <p>&nbsp;3.500Hp, 2.000Hp</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Xe n&acirc;ng h&agrave;ng c&aacute;c loại</p>
                        </td>
                        <td>
                        <p>04</p>

                        <p>01</p>

                        <p>05</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 25T</p>

                        <p>&nbsp;Sức n&acirc;ng 8T</p>

                        <p>&nbsp;Sức năng 3.5T</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Xe n&acirc;ng Container</p>
                        </td>
                        <td>
                        <p>02</p>
                        </td>
                        <td>
                        <p>&nbsp;Sức n&acirc;ng 45 tấn, tầm với 15m</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Xe cuốc gầu</p>
                        </td>
                        <td>
                        <p>06</p>

                        <p>04</p>
                        </td>
                        <td>
                        <p>&nbsp;Dung t&iacute;ch g&agrave;u 1.6M3</p>

                        <p>&nbsp;Dung t&iacute;ch g&agrave;u&nbsp; &nbsp;0.93M3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Xe ủi</p>
                        </td>
                        <td>
                        <p>​03</p>

                        <p>03</p>
                        </td>
                        <td>
                        <p>&nbsp;D41</p>

                        <p>&nbsp;D61</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;X&uacute;c lật</p>
                        </td>
                        <td>
                        <p>06</p>

                        <p>04</p>

                        <p>01</p>
                        </td>
                        <td>
                        <p>&nbsp;Dung t&iacute;ch g&agrave;u 5M3;</p>

                        <p>&nbsp;Dung t&iacute;ch g&agrave;u 3,5M3;</p>

                        <p>&nbsp;Dung t&iacute;ch g&agrave;u 1,5M3;</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Xe qu&eacute;t r&aacute;c</p>
                        </td>
                        <td>
                        <p>​01</p>

                        <p>02</p>
                        </td>
                        <td>
                        <p>&nbsp; 0.62 M3</p>

                        <p>&nbsp;10 M3</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Xe dọn vệ sinh hầm t&agrave;u</p>
                        </td>
                        <td>
                        <p>04</p>
                        </td>
                        <td>
                        <p>&nbsp;0.5 M3</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Xe rửa bến b&atilde;i</p>
                        </td>
                        <td>
                        <p>01</p>
                        </td>
                        <td>
                        <p>10 M3</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Gầu ngoạm thủy lực</p>
                        </td>
                        <td>
                        <p>​05</p>

                        <p>06</p>
                        </td>
                        <td>
                        <p>&nbsp;20 M3</p>

                        <p>&nbsp;6 M3</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Gầu ngoạm hoa thị</p>
                        </td>
                        <td>
                        <p>​09</p>

                        <p>10</p>
                        </td>
                        <td>
                        <p>&nbsp;6 M3</p>

                        <p>&nbsp;0.45 M3</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;B&agrave;n c&acirc;n</p>
                        </td>
                        <td>
                        <p>02</p>
                        </td>
                        <td>
                        <p>120T</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Phễu</p>
                        </td>
                        <td>
                        <p>03</p>
                        </td>
                        <td>
                        <p>L&agrave;m h&agrave;ng rời như thạch cao, than, c&aacute;m v.v.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Khung chụp Container</p>
                        </td>
                        <td>
                        <p>04</p>

                        <p>04</p>
                        </td>
                        <td>
                        <p>&nbsp;20F</p>

                        <p>&nbsp;40F</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Băng tải gỗ dăm</p>
                        </td>
                        <td>
                        <p>1</p>
                        </td>
                        <td>
                        <p>1200 Tấn/h</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>&nbsp;Băng tải chuyển đ&aacute;, clinker</p>
                        </td>
                        <td>
                        <p>1</p>
                        </td>
                        <td>
                        <p>400 Tấn/h</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p>&nbsp;</p>

            <p><img alt="" src="http://dev.vn-port.org/img/hethong1.jpg" style="width:500px" /></p>

            <p><img alt="" src="http://dev.vn-port.org/img/hethong2.jpg" style="width:500px" /></p>

            <p><img alt="" src="http://dev.vn-port.org/img/hethong3.jpg" style="width:500px" /></p>',
            'option_id'     => $introduce_id,
            'value'         => 8
        ]);
        OptionValue::create([
            'name'          => '<p>Các giấy tờ đã được cấp</p>',
            'option_id'     => $introduce_id,
            'value'         => 9
        ]);
        OptionValue::create([
            'name'          => '<p>Năng lực tiếp nhận tàu</p>',
            'option_id'     => $introduce_id,
            'value'        	=> 10
        ]);
    }
}
