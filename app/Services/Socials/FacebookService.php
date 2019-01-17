<?php

namespace App\Services\Socials;

class FacebookService{
    private $base_url = "https://graph.facebook.com";

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


}
