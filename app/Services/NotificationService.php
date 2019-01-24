<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\{UserLogic, NotificationLogic};
use App\Models\Notification;

class NotificationService extends BaseService{
    private $userLogic;

    protected $notificationLogic;

    public function __construct(UserLogic $userLogic, NotificationLogic $notificationLogic)
    {
        $this->userLogic = $userLogic;
        $this->notificationLogic = $notificationLogic;
    }

    public function find($id){
        return $this->notificationLogic->find($id);
    }

    public function getByCustomer($customerId){
        return $this->notificationLogic->getByCustomer($customerId);
    }

    public function countNotificationUnRead($customerId){
        return $this->notificationLogic->countNotificationUnRead($customerId);
    }

    public function create($customerId, $title, $body){
        $notification = new Notification();
        $notification->to_customer_id = $customerId;
        $notification->title = $title;
        $notification->body = $body;
        $this->notificationLogic->save($notification);
    }

    public function updateRead($notificationId){
        $notification = $this->notificationLogic->find($notificationId);
        if(isset($notification)){
            $notification->is_read = Constant::$STATUS_READ_ON;
            $this->notificationLogic->save($notification);
        }
    }

    public function updateReadByCustomer($customerId){
        $notifications = $this->notificationLogic->getByCustomer($customerId);
        if(isset($notifications)){
            foreach ($notifications as $notification){
                $notification->is_read = Constant::$STATUS_READ_ON;
                $this->notificationLogic->save($notification);
            }
        }
    }

    public function deleteNotification($notificationId){
        $notification = $this->notificationLogic->find($notificationId);
        if(isset($notification)){
            $notification->is_delete = Constant::$STATUS_READ_ON;
            $this->notificationLogic->save($notification);
        }
    }

}
