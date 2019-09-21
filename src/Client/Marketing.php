<?php


namespace AnthraxisBR\Client;


use Psr\Http\Message\ResponseInterface;

class Marketing extends RDClient
{

    /**
     * @var string
     */
    private $uriRoute = '/marketing';

    /**
     * Returns the account name from your RD Station Marketing account.
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function accountInfo() : ResponseInterface
    {
        $this->prepare('/account_info');
        return $this->get($this->getUrl());
    }

    /**
     * Returns the RD Station Marketing tracking code so it can be embedded on websites or CMS.
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function trackingCode() : ResponseInterface
    {
        $this->prepare('/tracking_code');
        return $this->get($this->getUrl());
    }
}