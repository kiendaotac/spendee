<?php

use AdrienGras\PKCE\PKCEUtils;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $config = array(
        'app_id' => '4215271155965009593',
        'app_secret' => 'D2rkRIPN5SDO5B8Npkwj'
    );
    $zalo = new Zalo\Zalo($config);
    $oaCallbackUrl = "https://11452796f1e9ce.lhr.life/callback";
    $codeVerifier = PKCEUtils::generateCodeVerifier();
    $codeChallenge = PKCEUtils::generateCodeChallenge($codeVerifier);
    $state = "LOCAL";
    return redirect($zalo->getOAuth2Client()->getAuthorizationUrlByOA($oaCallbackUrl, $codeChallenge, $state));
    return 1;
    $zaloToken = $helper->getZaloToken($codeVerifier); // get zalo token
    $accessToken = $zaloToken->getAccessToken();
    dd($zaloToken);
//    $linkOAGrantPermission2App = $helper->getLoginUrlByOA($oaCallbackUrl, $codeChallenge, $state); // This is url for admin OA grant permission to app
//    return redirect($linkOAGrantPermission2App);
//    return view('welcome');
});

Route::get('callback', function () {
    \Illuminate\Support\Facades\Log::info('callback', request()->all());
    return response()->json(request()->all());
});

Route::get('test', function () {
    $zalo = new \App\Services\ZaloOAService();
    $zalo->getAccessToken();
});
