<?php
namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;

class MailchimpService
{
    protected $client;
    protected $apiKey;
    protected $dataCenter;

    public function __construct()
    {
        $this->apiKey = config('services.mailchimp.api_key');
        $this->dataCenter = substr($this->apiKey, strpos($this->apiKey, '-') + 1);
        $this->client = new Client([
            'base_uri' => "https://{$this->dataCenter}.api.mailchimp.com/3.0/",
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode("username:{$this->apiKey}"),
                'Content-Type' => 'application/json',
            ],
        ]);

    }

  /**
   * @param $email
   * @param $listId
   * @return array
   */
  public function subscribeToList($email, $listId): array
    {
        try {
            $response = $this->client->post("lists/{$listId}/members", [
                'json' => [
                    'email_address' => $email,
                    'status' => 'subscribed',
                ],
            ]);
            return ['code' => $response->getStatusCode() ,  'status' =>'success', "message"=>"Email Subscribe Successfully"];
        } catch (GuzzleException $e) {
            return  ['code' => $e->getCode() ,  'status' =>'error', "message"=>$e->getMessage()];
        }
    }

  /**
   * @param $email
   * @param $listId
   * @return array|void
   */
  public function UnsubscribeToList($email, $listId)
    {
        if (!empty($this->client)) {
            $subscriberHash = md5(strtolower($email));
            try {
                $resPonse =  $this->client->put("lists/$listId/members/$subscriberHash", [
                    'status' => 'unsubscribed',
                ]);
                return ['code' => $resPonse->getStatusCode() ,  'status' =>'success', "message"=>"Email Subscribe UnSubScribed"];

            } catch (GuzzleException $e) {
                return  ['code' => $e->getCode() ,  'status' =>'error', "message"=>$e->getMessage()];
            }
        }
    }
}
?>
