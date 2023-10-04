<?php

namespace App\Services;

use AdrienGras\PKCE\PKCEUtils;
use Zalo\Zalo;

class ZaloOAService
{
    public Zalo $zaloSDK;
    public function __construct()
    {
        $config = array(
            'app_id' => '4215271155965009593',
            'app_secret' => 'D2rkRIPN5SDO5B8Npkwj'
        );
        $this->zaloSDK = new Zalo($config);
    }

    public function getAccessToken()
    {
        $codeVerifier = 'P-xUn98q2Xi5oDB_fof70tZUfSdGAdeZDTdSnlPn3GWrbihXb6SW70ovZl3gTMazH86zrPjd9Zj9zSdqY1WA6odbs_UE4KWhMQovsVLQPouGhD_rtJvyB3dynP_HK4ak8glWtCLs6savqfJUdtjnL4V_xiF6HNO_T929mgaNDKPUszRXyYbl3mdFk9sQ1mip2hgqXknGOMX9giwhg7Sr67tades30cG62yEIk9j_3GiWcgw-m25V1pZjlSYa16jHTyJTuFK6QcjfUQot-fmqQbW8Rhwyp8rp5ZbUc_M_sNaYEng1r-3ENWKfBekt-h4T3He7nPRTuIL5eWZ7fWRU7mAPVU3LUCyO4_8Auf4ba393ooQwqLgJ7HQiOB1UMIPvB7arW4G8FG';
        $helper = $this->zaloSDK->getRedirectLoginHelper();
        $zaloToken = $helper->getZaloToken($codeVerifier);
        dd($zaloToken);
        $accessToken = $zaloToken->getAccessToken();
        dd($accessToken);
    }
}