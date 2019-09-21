<?php


namespace AnthraxisBR\Client;


use Psr\Http\Message\ResponseInterface;

class ContactsFunnels extends RDClient
{

    /**
     * @var string
     */
    private $uriRoute = '/contacts/{identifier}/funnels/{funnel_name}';

    public function getUserFunnelsFromUuid(string $uuid, string $funnelName) : ResponseInterface
    {
        $this->prepareUriRoute($uuid, $funnelName);
        $this->prepare();
        $this->get($this->getUrl());
    }

    public function getUserFunnelsFromEmail(string $email, string $funnelName) : ResponseInterface
    {
        $this->prepareUriRoute('email:' . $email, $funnelName);
        $this->prepare();
        $this->get($this->getUrl());
    }



    public function updateUserFunnel(string $funnelName, string $uuid = '', string $email = '', array $data = []) : ResponseInterface
    {
        if(!empty($uuid)){
            $this->prepareUriRoute($uuid, $funnelName);
        }

        if(!empty($email)){
            $this->prepareUriRoute('email:' . $email, $funnelName);
        }

        $this->prepare();
        return $this->put($this->getUrl(), [
            'json' => $data
        ]);
    }

    public function prepareUriRoute(string $identifier, string $funnelName) : void
    {
        $this->setUri(str_replace('{identifier}', $identifier, $this->getUri()));
        $this->setUri(str_replace('{funnel_name}', $funnelName, $this->getUri()));
    }
}