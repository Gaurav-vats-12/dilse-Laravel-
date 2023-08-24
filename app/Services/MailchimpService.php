<?php
namespace App\Services;
use DrewM\MailChimp\MailChimp;
use MailchimpMarketing\ApiClient;

class MailchimpService
{
    protected $mailchimp;

    public function __construct()
    {
        $this->mailchimp = new MailChimp(config('services.mailchimp.api_key'));

//        $this->mailchimp = new ApiClient();
//       $mail =  $this->mailchimp->setConfig([
//            'apiKey' => config('services.mailchimp.api_key'),
//            'server' => config('services.mailchimp.server'), // Replace with your Mailchimp server prefix
//        ]);
    }

    public function subscribeToList($email, $listId)
    {
        if (!empty($this->mailchimp)) {
            return  $this->mailchimp->post('lists/' . $listId . '/members', [
                'email_address' => $email,
                'status' => 'subscribed',
            ]);
        }




//        return $this->mailchimp->lists->addListMember($listId, [
//            'email_address' => $email,
//            'status' => 'subscribed',
//        ]);
    }

    public function UnsubscribeToList( $email, $listId)
    {
        if (!empty($this->mailchimp)) {
            $subscriberHash = md5(strtolower($email));
           return  $this->mailchimp->put("lists/$listId/members/$subscriberHash", [
                'status' => 'unsubscribed',
            ]);
        }
    }



}



?>
