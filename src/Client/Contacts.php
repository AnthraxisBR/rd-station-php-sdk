<?php


namespace AnthraxisBR\Client;


use Psr\Http\Message\ResponseInterface;

class Contacts extends RDClient
{


    /**
     * @var string
     */
    private $uriRoute = '/platform/contacts';


    public function uuid(string $uuid) : ResponseInterface
    {
        $this->prepare((string) '/' . $uuid);
        return $this->get($this->getUrl());
    }

    public function email(string $email) : ResponseInterface
    {
        $this->prepare((string) '/email:' . $email);
        return $this->get($this->getUrl());
    }

    public function updateUuid(string $uuid, array $data) : ResponseInterface
    {
        $this->prepare((string) '/' . $uuid);
        return $this->get($this->getUrl(),
            [
                'json' => $data
            ]
        );
    }

    public function updateIdentifier(string $identifier, string $value, array $data) : ResponseInterface
    {
        $this->prepare((string) '/' . $identifier . ':' . $value);
        return $this->get($this->getUrl(),
            [
                'json' => $data
            ]
        );
    }


}