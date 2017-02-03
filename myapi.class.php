<?php
require_once 'api.class.php';

class MyAPI extends API
{
    protected $usermodel;
    // protected $db;

    public function __construct($request, $origin) 
    {
        parent::__construct($request);

        // // Abstracted out for example
        // $APIKey = "1234567890"; // new Models\APIKey();
        // $User = "yellownest"; // new Models\User();

        // print_r($request);

        // if (!array_key_exists('apiKey', $this->request)) 
        // {
        //     throw new Exception('No API Key provided');
        // } 
        // else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) 
        // {
        //     throw new Exception('Invalid API Key');
        // } 
        // else if (array_key_exists('token', $this->request) && !$User->get('token', $this->request['token'])) 
        // {
        //     throw new Exception('Invalid User Token');
        // }

        // $this->User = $User;
    }
        
    /**
     * example endpoint
     */
    protected function example()
    {
        if ($this->method == "GET")
        {
            $this->response(
                $data = array(
                    'code' => 200,
                    'message' => "I am an example endpoint",
                    'status' => "success"
                ), 400
            );
        }
        else
        {
            return "Only accepts GET request";
        }
    }
}