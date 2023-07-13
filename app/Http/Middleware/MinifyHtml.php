<?php

namespace App\Http\Middleware;

use RenatoMarinho\LaravelPageSpeed\Middleware\PageSpeed;

class MinifyHtml extends PageSpeed
{

    public function apply($buffer)
    {
        $replace = [
            '/<!--(.*?)-->/s' => '',
            '/ src            ="(.*?)"/' => ' src=$1',
            '/ width          ="(.*?)"/' => ' width=$1',
            '/ height         ="(.*?)"/' => ' height=$1',
            '/ name           ="(.*?)"/' => ' name=$1',
            '/ charset        ="(.*?)"/' => ' charset=$1',
            '/ align          ="(.*?)"/' => ' align=$1',
            '/ border         ="(.*?)"/' => ' border=$1',
            '/ crossorigin    ="(.*?)"/' => ' crossorigin=$1',
            '/ type           ="(.*?)"/' => ' type=$1',
            "/\n([\S])/"      => '$1',
            "/\r/"            => '',
            "/\t/"            => '',
            "/ +/"            => ' ',
            '/\>\s+/s'        => '> ',
            '/\s+</s'         => ' <',

        ];

        return $this->replace($replace, $buffer);
    }
}
