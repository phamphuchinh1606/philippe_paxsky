<?php

namespace App\Services\Socials;
use App\Logics\CustomerLogic;
use App\Logics\FireBaseTokenLogic;
use App\Logics\UserLogic;
use App\Models\FireBaseToken;
use App\Services\NotificationService;
use App\Services\BaseService;

class FireBaseService extends BaseService{
    private $fireBaseTokenLogic;
    private $customerLogic;
    private $userLogic;

    private $notificationService;

    private $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    private $legacyServerKey  = "AIzaSyDKBmEcSOMo72ftBiGkaky-N4C5lZsMCoI";

    public function __construct(FireBaseTokenLogic $fireBaseTokenLogic, CustomerLogic $customerLogic, UserLogic $userLogic ,NotificationService $notificationService)
    {
        $this->fireBaseTokenLogic = $fireBaseTokenLogic;
        $this->customerLogic = $customerLogic;
        $this->userLogic = $userLogic;
        $this->notificationService = $notificationService;
    }

    public function find($id){
        return $this->fireBaseTokenLogic->find($id);
    }

    public function findByUserDevice($userId, $token){
        return $this->fireBaseTokenLogic->findByUserDevice($userId, $token);
    }

    public function findByCustomerDevice($customerId, $token){
        return $this->fireBaseTokenLogic->findByCustomerDevice($customerId, $token);
    }

    public function createRequestToken($customerId, $device, $token){
        $customer = $this->customerLogic->find($customerId);
        if(isset($customer)){
            //Check create update token
            $fireBaseToken = $this->fireBaseTokenLogic->findByCustomerDevice($customer->id, $device);
            if(isset($fireBaseToken)){
                $fireBaseToken->token = $token;
            }else{
                $fireBaseToken = new FireBaseToken();
                $fireBaseToken->user_id = $customer->user_id;
                $fireBaseToken->customer_id = $customer->id;
                $fireBaseToken->token = $token;
                $fireBaseToken->device = $device;
            }
            $this->fireBaseTokenLogic->save($fireBaseToken);
            return true;
        }
        return false;
    }

    public function pushNotification($customerId, $title, $message, $content = null){
        $customer = $this->customerLogic->find($customerId);
        if(isset($customer)){
            $fireBaseTokens = $this->fireBaseTokenLogic->getTokenByCustomerId($customerId);
            if(isset($fireBaseTokens)){
                foreach ($fireBaseTokens as $fireBaseToken){
                    $this->notification(
                        $fireBaseToken->token,
                        $title, $message
                    );
                }
                //Save Data notification
                $this->notificationService->create($customerId, $title, $message, $content);
            }
        }
    }

    private function notification($token, $title, $body)
    {
        $fcmUrl = $this->fcmUrl;
        $token=$token;

        $notification = [
            'title' => $title,
            'sound' => true,
            'body' => $body
        ];

        $extraNotificationData = ["message" => $notification, "moredata" => $body];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token,
            'content_available' => true,
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key='.$this->legacyServerKey,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        return true;
    }

}
