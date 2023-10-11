<?php
namespace App\Services\Notification;

use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Contract\Messaging;

use Kreait\Firebase\Messaging\CloudMessage;

class Notification
{
    /**
     * @var Auth
     */
    private $auth;
    private $messaging;

    /**
     * Firebase constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth,Messaging $messaging)
    {
        $this->auth = $auth;
        $this->messaging = $messaging;
    }

    /**
     * @param $phone
     * @return bool
     * @throws \Kreait\Firebase\Exception\AuthException
     * @throws \Kreait\Firebase\Exception\FirebaseException
     */
    public function getUser($phone)
    {
        try {
            $user = $this->auth->getUserByPhoneNumber($phone);
            return true;
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) { 
           // echo $e->getMessage();
            return false;
        }
    }

    /**
     * @param $deviceToken
     * @param array $notification
     * @param array $data
     * @throws \Kreait\Firebase\Exception\FirebaseException
     * @throws \Kreait\Firebase\Exception\MessagingException
     */
    public function sendMessage($deviceToken,$notification = [], $data= [])
    {
         $message = CloudMessage::fromArray([
            'token' => $deviceToken,
            'notification' => $notification, // optional
            'data' => $data, // optional
        ]);

        $this->messaging->send($message);
    }

    /**
     * @param $deviceToken
     * @param array $notification
     * @param array $data
     * @throws \Kreait\Firebase\Exception\FirebaseException
     * @throws \Kreait\Firebase\Exception\MessagingException
     */
    public function sendMulticast($deviceToken,$notification = [], $data= [])
    {
         $message = CloudMessage::fromArray([
            'notification' => $notification, // optional
            'data' => $data, // optional
        ]);

        $this->messaging->sendMulticast($message,$deviceToken);
    }

    public function createCustomToken($id){

        return  $this->auth->createCustomToken($id);
    }
}
