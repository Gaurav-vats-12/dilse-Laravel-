<?php
namespace App\Services;
use MailchimpMarketing\ApiClient;
class MailchimpService
{
    protected $mailchimp;

    public function __construct()
    {
        $this->mailchimp = new ApiClient();
        $this->mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.api_key'),
            'server' => 'us8', // Replace with your Mailchimp server prefix
        ]);
    }

    public function subscribeToList($email, $listId)
    {
        return $this->mailchimp->lists->addListMember($listId, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }

    public function UnsubscribeToList( $email, $listId)
    {
        return $this->mailchimp->lists->addListMember($listId, [
            'email_address' => $email,
            'status' => 'unsubscribed',
        ]);
    }



}



?>
