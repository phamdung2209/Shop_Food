<?php

use Carbon\Carbon;
use Illuminate\Support\Arr;
use function foo\func;

if (!function_exists('upload_image')) {
    /**
     * @param $file [tên file trùng tên input]
     * @param array $extend [ định dạng file có thể upload được]
     * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
     */
    function upload_image($file, $folder = '', array $extend = array())
    {
        $code = 1;
        // lay duong dan anh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];

        // thong tin file
        $info = new SplFileInfo($baseFilename);

        // duoi file
        $ext = strtolower($info->getExtension());

        // kiem tra dinh dang file
        if (!$extend)
            $extend = ['png', 'jpg', 'jpeg', 'webp'];

        if (!in_array($ext, $extend))
            return $data['code'] = 0;

        // Tên file mới
        $nameFile = trim(str_replace('.' . $ext, '', strtolower($info->getFilename())));
        $filename = date('Y-m-d__') . \Illuminate\Support\Str::slug($nameFile) . '.' . $ext;;

        // thu muc goc de upload
        $path = public_path() . '/uploads/' . date('Y/m/d/');
        if ($folder)
            $path = public_path() . '/uploads/' . $folder . '/' . date('Y/m/d/');

        if (!\File::exists($path))
            mkdir($path, 777, true);

        // di chuyen file vao thu muc uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $filename);

        $data = [
            'name'     => $filename,
            'code'     => $code,
            'path'     => $path,
            'path_img' => 'uploads/' . $filename
        ];

        return $data;
    }
}

if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
}


if (!function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = '')
    {
        if (!$image) {
            return '/images/no-image.jpg';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}

if (!function_exists('device_agent')) {
    function device_agent()
    {
        $agent = new Jenssegers\Agent\Agent();

        if ($agent->isMobile()) {
            return 'mobile';
        } elseif ($agent->isDesktop()) {
            return 'desktop';
        } elseif ($agent->isTablet()) {
            return 'tablet';
        }
    }
}

if (!function_exists('number_price')) {
    function number_price($price, $sale = 0)
    {
        if ($sale == 0) {
            return $price;
        }

        $price = ((100 - $sale) * $price) / 100;

        return $price;
    }
}

if (!function_exists('get_data_user')) {
    function get_data_user($type, $field = 'id')
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}

if (!function_exists('get_name_short')) {
    function get_name_short($name)
    {
        if ($name == '') return "[N\A]";

        $name      = trim($name);

        $arrayName = explode(' ', $name,2);
        $string = '';
        if (count($arrayName)) {
            foreach ($arrayName as $item) {
                $string .= mb_substr($item,0,1);
            }
        }

        return $string;
    }
}

if (!function_exists('detectDevice'))
{
    function detectDevice()
    {
        $instance = new Jenssegers\Agent\Agent();

        return $instance;
    }
}

if (!function_exists('get_agent'))
{
    function get_agent()
    {
        return [
            'device'       => detectDevice()->device(),
            'platform'     => $platform = detectDevice()->platform(),
            'platform_ver' => detectDevice()->version($platform),
            'browser'      => $browser = detectDevice()->browser(),
            'browser_ver'  => detectDevice()->version($browser),
            'time'         => Carbon::now()
        ];
    }
}

if( !function_exists('get_time_login'))
{
    function get_time_login($data)
    {
        $data = json_decode($data, true);
        return Arr::last($data);
    }
}

function randString($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = '';
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }

    return $str;
}