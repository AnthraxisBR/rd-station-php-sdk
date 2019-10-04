<?php


namespace AnthraxisBR\Client;


class AccountInfo extends RDClient
{


    /**
     * @var string
     */
    private $uriRoute = '/marketing';

    /**
     * Returns account name
     * @return ResponseInterface
     */
    public function getAccountInfo() : ResponseInterface
    {
        $this->prepare((string) '/account_info');
        return $this->get($this->getUrl());
    }

    /**
     * Returns tracking account code
     * @return ResponseInterface
     */
    public function getTrackingCode() : ResponseInterface
    {
        $this->prepare((string) '/tracking_code');
        return $this->get($this->getUrl());
    }
}