<?php


namespace AnthraxisBR\Client;


use Psr\Http\Message\ResponseInterface;

/**
 * @see https://developers.rdstation.com/pt-BR/reference/contacts
 * Class Contacts
 * @package AnthraxisBR\Client
 */
class Contacts extends RDClient
{


    /**
     * @var string
     */
    private $uriRoute = '/platform/contacts';

    /**
     * Returns data about a specific Contact
     * @param string $uuid
     * @return ResponseInterface
     */
    public function getContactFromUuid(string $uuid) : ResponseInterface
    {
        $this->prepare((string) '/' . $uuid);
        return $this->get($this->getUrl());
    }

    /**
     * Returns data about a specific Contact
     * @param string $email
     * @return ResponseInterface
     */
    public function getContactFromEmail(string $email) : ResponseInterface
    {
        $this->prepare((string) '/email:' . $email);
        return $this->get($this->getUrl());
    }

    /**
     * Updates the properties of a Contact.
     * @param string $uuid
     * @param array $data
     * @return ResponseInterface
     */
    public function updateUserFromUuid(string $uuid, array $data) : ResponseInterface
    {
        $this->prepare((string) '/' . $uuid);
        return $this->get($this->getUrl(),
            [
                'json' => $data
            ]
        );
    }

    /**
     * With an UPSERT like behavior, this endpoint is capable of both updating the properties of a Contact or creating a new Contact. Whatever is used as an identifier cannot appear in the request payload as a field. This will result in a BAD_REQUEST error.
     * @param string $identifier
     * @param string $value
     * @param array $data
     * @return ResponseInterface
     */
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