<?php


namespace AnthraxisBR\Client;


class Client extends \GuzzleHttp\Client
{
    /**
     * @var string
     */
    private $uriRoute = '';

    /**
     * @var string
     */
    private $uri = '';

    /**
     * @var string
     */
    private $url = '';

    /**
     * @var array
     */
    private $args = [];

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * Prepare request URI from
     * @param string $uriPart
     */
    public function prepare(string $uriPart) : void
    {
        $this->setUrl((string) $this->getUri() . $this->getUriRoute() . $uriPart);
    }

    /**
     * @return array
     */
    public function getArgs() : array
    {
        return (array) $this->args;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setArg($key, $value) : void
    {
        $this->args[$key] = (string) $value;
    }

    /**
     * @return string
     */
    public function getUriRoute() : string
    {
        return (string) $this->uriRoute;
    }

    /**
     * @param string $uriRoute
     */
    public function setUriRoute($uriRoute) : void
    {
        $this->uriRoute = (string) $uriRoute;
    }

    /**
     * @return string
     */
    public function getUri() : string
    {
        return (string) $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri) : void
    {
        $this->uri = (string) $uri;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return (string) $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url) : void
    {
        $this->url = (string) $url;
    }


}