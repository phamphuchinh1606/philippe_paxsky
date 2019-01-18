<?php

namespace App\Services\Socials;

class FacebookService{
    private $base_url = "https://graph.facebook.com";
    private $base_url_phone = "https://graph.accountkit.com/v1.3";

    public function getUserInfo($access_token){
        $client = new \GuzzleHttp\Client;
        $params = "id,name,email,address,birthday,gender,first_name,last_name,picture";
        $url = $this->base_url."/me?fields=$params&access_token=$access_token";
        try{
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => $access_token,
                ],
            ]);
            $response = json_decode($response->getBody(), true);
        }catch (\Exception $exception){
            $messageError = $exception->getMessage();
            if(strpos($messageError, 'Invalid OAuth access token') !== false ){
                $messageError = "Invalid OAuth access token";
            }
            return $messageError;
        }

        return $response;
    }

    public function getUserInfoByMobilePhone($access_token){
        $app_secret = env("FACEBOOK_ACCOUNT_KIT_SECRET","9e9700f849e0ed6b998cd310d264f211") ;
        $appsecret_proof = hash_hmac('sha256', $access_token, $app_secret);
        $client = new \GuzzleHttp\Client;
        $url = $this->base_url_phone."/me/?access_token=$access_token&appsecret_proof=$appsecret_proof";
        try{
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => $access_token,
                ],
            ]);
            $response = json_decode($response->getBody(), true);
        }catch (\Exception $exception){
            $messageError = $exception->getMessage();
            if(strpos($messageError, 'Invalid OAuth access token') !== false ){
                $messageError = "Invalid OAuth access token";
            }
            return $messageError;
        }
        return $response;
    }


}
