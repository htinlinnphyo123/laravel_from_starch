<?php
    
    namespace App\Service;
    use MailchimpMarketing\ApiClient;
    class MailchimpNewspaper implements Newspaper
    {
        public function __construct(protected ApiClient $client)
        {
            //
        }
        public function subscribe(string $email,$list=null)
        {
            $list ??= config('services.mailchimp.lists.list_id');

            return $this->client->lists->addListMember($list,[
                'email_address' => $email,
                'status' => 'subscribed'
            ]);
        }


    }


?>