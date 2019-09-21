<?php


namespace AnthraxisBR\Client;


use GuzzleHttp\Psr7\Response;

class Contacts extends RDClient
{


    /**
     * @var string
     */
    private $uriRoute = '/platform/contacts';


    public function uuid(string $uuid) : Response
    {
        $this->prepare((string) '/' . $uuid);
        return $this->get($this->getUrl());
    }

    public function email(string $email) : Response
    {
        $this->prepare((string) '/email:' . $email);
        return $this->get($this->getUrl());
    }

    public function updateUuid(string $uuid, array $data) : Response
    {
        $this->prepare((string) '/' . $uuid);
        return $this->get($this->getUrl(),
            [
                'json' => $data
            ]
        );
    }

    public function updateIdentifier(string $identifier, string $value, array $data) : Response
    {
        $this->prepare((string) '/' . $identifier . ':' . $value);
        return $this->get($this->getUrl(),
            [
                'json' => $data
            ]
        );
    }


}