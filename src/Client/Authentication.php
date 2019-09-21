<?php


namespace AnthraxisBR\Client;

class Authentication extends Client
{

    private $clientId = '';

    private $clientSecret = '';

    private $redirectUrl = '';

    private $accessToken = '';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

}