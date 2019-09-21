<?php


namespace AnthraxisBR\Client;


class RDClient extends Client
{

    /**
     * @var string
     */
    private $uri = 'https://api.rd.services';

    /**
     * @var string
     */
    private $accessToken = '';

    public function __construct(array $config = [])
    {
        if(isset($config['access_token'])){
            $this->setAccessToken($config['access_token']);
            if(!isset($config['headers'])){
                $config['headers'] = [];
            }
            $config['headers']['Authorization'] = 'Bearer ' . $this->getAccessToken();
            unset($config['access_token']);
        }

        parent::__construct($config);
    }


    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return (string) $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = (string) $accessToken;
    }


}