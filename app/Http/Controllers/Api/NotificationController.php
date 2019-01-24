<?php

namespace App\Http\Controllers\Api;

use App\Common\DateCommon;
use Illuminate\Http\Request;
use Validator;

class NotificationController extends ControllerApi
{
    public function createRequestToken(Request $request){
        $rules = array(
            'customer_id' => 'required',
            'fire_base_device' => 'required',
            'fire_base_token' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $result = $this->fireBaseService->createRequestToken($request->customer_id, $request->fire_base_device, $request->fire_base_token);
        if($result){
            return $this->jsonSuccess('Create fireBase token success');
        }
        return $this->jsonError(['customer_id' => 'Customer do not exists'], 'Customer do not exists');
    }

    public function pushNotification(Request $request){
        $rules = array(
            'customer_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $this->fireBaseService->pushNotification($request->customer_id, $request->title, $request->body);
        return $this->jsonSuccess('Push notification success');
    }

    private function notificationToJson($notification){
        $notificationItem = new \StdClass();
        $notificationItem->notification_id = $notification->id;
        $notificationItem->customer_id = $notification->to_customer_id;
        $notificationItem->title = $notification->title;
        $notificationItem->body = $notification->body;
        $notificationItem->is_read = $notification->is_read;
        $notificationItem->created_at = DateCommon::dateToString($notification->created_at,'d-m-Y H:i');
        return $notificationItem;
    }

    public function listNotification(Request $request){
        $rules = array(
            'customer_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $notifications = $this->notificationService->getByCustomer($request->customer_id);
        $listNotification = [];
        foreach ($notifications as $notification){
            $notificationItem = $this->notificationToJson($notification);
            $listNotification[] = $notificationItem;
        }
        return $this->json($listNotification);
    }

    public function readNotification(Request $request){
        $rules = array(
            'notification_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $this->notificationService->updateRead($request->notification_id);
        return $this->jsonSuccess('Update read notification success');
    }

    public function deleteNotification(Request $request){
        $rules = array(
            'notification_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $this->notificationService->deleteNotification($request->notification_id);
        return $this->jsonSuccess('Delete read notification success');
    }

    public function countNotificationUnRead(Request $request){
        $rules = array(
            'customer_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $count = $this->notificationService->countNotificationUnRead($request->customer_id);
        return $this->json(array('count' => $count));
    }
}
