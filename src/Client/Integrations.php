<?php


namespace AnthraxisBR\Client;


use Psr\Http\Message\ResponseInterface;

/**
 * @see https://developers.rdstation.com/pt-BR/reference/webhooks
 * Class Integrations
 * @package AnthraxisBR\Client
 */
class Integrations extends RDClient
{

    /**
     * @var string
     */
    private $uriRoute = '/integrations';

    /**
     * @see https://developers.rdstation.com/pt-BR/reference/webhooks
     * Returns a list with all webhook subscriptions from your account.
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getWebhook() : ResponseInterface
    {
        $this->prepare('/webhooks');
        return $this->get($this->getUrl());
    }

    public function createWebhook(array $data) : ResponseInterface
    {
        $this->prepare('/webhooks');
        return $this->get($this->getUrl(), [
            'json' => $data
        ]);
    }

    public function updateWebhook(string $uuid, array $data) : ResponseInterface
    {
        $this->prepare('/webhooks/' . $uuid);
        return $this->put($this->getUrl(), [
            'json' => $data
        ]);
    }

    public function deleteWebhook(string $uuid) : ResponseInterface
    {
        $this->prepare('/webhooks/' . $uuid);
        return $this->delete($this->getUrl());
    }
}