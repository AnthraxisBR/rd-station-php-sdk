<?php


namespace AnthraxisBR\Client;

use AnthraxisBR\Exceptions\AuthenticationException;
use Psr\Http\Message\ResponseInterface;


class Authentication extends RDClient
{

    private $clientId = '';

    private $clientSecret = '';

    private $redirectUrl = '';

    private $accessToken = '';

    private $uriRoute = '/auth/dialog';

    public function __construct(array $config = [])
    {

        $this->setClientId(getenv('CLIENT_ID'));
        $this->setClientSecret(getenv('CLIENT_SECRET'));
        $this->setAccessToken(getenv('ACCES_TOKEN'));
        $this->setRedirectUrl(getenv('REDIRECT_URL'));

        parent::__construct($config);
    }

    /**
     * Direciona o usuário a autenticação com a RD Station
     */
    public function authorize()
    {
        $this->prepare('?client_id=' . $this->getClientId() . '&redirect_url=' . $this->getRedirectUrl());
        $this->redirect();
    }

    public function redirect()
    {
        header('Location: ' . $this->getUrl());
    }

    public function callback(string $code = '') : ResponseInterface
    {
        if($code == ''){
            throw new AuthenticationException('Não foi possível recuperar o code para executar o callback');
        }

        $payload = [];
        $payload['client_id'] = getenv('CLIENT_ID');
        $payload['client_secret'] = getenv('CLIENT_SECRET');
        $payload['code'] = $code;

        return $this->post($this->getUri() . '/auth/token',[
            'json' => $payload
        ]);

    }

    public function revokeToken(string $token = '', string  $type = '')
    {

        if($token == ''){
            throw new AuthenticationException('Infome o token para ser revogado');
        }

        if($type == ''){
            throw new AuthenticationException('Informe o type hint da revogação de token');
        }

        $payload = [];
        $payload['token'] = $token;
        $payload['token_type_hint'] = $type;

        return $this->post($this->getUri() . '/auth/token',[
            'json' => $payload
        ]);

    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret(string $clientSecret): void
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl
     */
    public function setRedirectUrl(string $redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }



}