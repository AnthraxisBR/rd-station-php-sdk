<?php


namespace AnthraxisBR\Client;


use GuzzleHttp\Psr7\Response;

class Marketing extends RDClient
{

    /**
     * @var string
     */
    private $uriRoute = '/marketing';

    /**
     * Marketing constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * Returns the account name from your RD Station Marketing account.
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function accountInfo() : Response
    {
        $this->prepare('/account_info');
        return $this->get($this->getUrl());
    }

    /**
     * Returns the RD Station Marketing tracking code so it can be embedded on websites or CMS.
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function trackingCode() : Response
    {
        $this->prepare('/tracking_code');
        return $this->get($this->getUrl());
    }
}