<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CaptchaController extends Controller
{
    public function authCaptchaResume(Request $request)
    {
        if (!$request->ajax()) {
            return [
                'message' => 'Method not allow!',
                'type'    => 'error',
                'status'  => 0
            ];
        }

        $captcha = $request->get('recaptcha');
        if (!$captcha) {
            return [
                'message' => 'Captcha can not null!',
                'type'    => 'error',
                'status'  => 0
            ];
        }
        $client   = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);
        $response = $client->post('siteverify', [
            'query' => [
                'secret'   => config('captcha.recaptcha_secret'),
                'response' => $captcha
            ]
        ]);
        $result   = json_decode($response->getBody())->success;
        if ($result) {
            \DB::table('users')->where('id', \Auth::user()->id)
                ->update(['count_comment' => 0]);

            return [
                'message' => 'Success',
                'type'    => 'error',
                'status'  => 0
            ];
        }

        return [
            'message' => 'Fail !',
            'type'    => 'error',
            'status'  => 0
        ];
    }
}
