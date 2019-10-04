## Unofficial RD Station PHP SDK

## Considerações:

Fiz esse projeto como parte de outro projeto 'Gerador de SDK automático', que ainda não está pronto para ser publicado.

Veja um exemplo de uma SDK gerada totalmente via **BIA** (meu robo e base do gerador) na documentação da Google Cloud Platform: https://github.com/AnthraxisBR/generated-google-cloud-platform-php-sdk.

Como não tenho nenhuma conta na RD, essa SDK nunca foi testada em produção (até 03 de outubro 2019).


## Instalação

    composer require composer require anthraxisbr/rd-php-sdk

## Configuração

Crie o arquivo '.env'

    cp .env.example .env
    
Preencha os valores do arquivo com seu client id e client secret, e sua url de redirecionamento.

## Gerar o Access Token

https://developers.rdstation.com/pt-BR/authentication

Para gerar o token, chame o método autorize da classe `src/Client/Authentication.php`, e tenha um rota que chame a a função `callback` da mesma classe.

Autenticando:
    
    $AuthClient = new AnthraxisBR\Client\Authentication();
    $AuthClient->authorize();

Solicitando Access Token:

    $code = $_GET['code'];
    $AuthClient->callback($code);
  
Autenticando com sucesso, a resposta de ´callback´ será um objeto de `Response`;

Revogando um token:


    $AuthClient->revoke($token, $token_type_hint);

    
## Informações da conta

https://developers.rdstation.com/pt-BR/reference/account_infos

Para utilizar a SDK com rotas que ginecessitam de autenticação, apenas instancia a classe informando o valor de access token como argumento:

    $AccountInfoClient = new AnthraxisBR\Client\AccountInfo('access token');

Localizando nome da conta:

    $AccountInfoClient->getAccountInfo()
    
Localizando Tracking Code:

    $AccountInfoClient->getTrackingCode()


## Contatos

Instanciando o client:

    
    $ContactsClient = new AnthraxisBR\Client\Contacts('access token');

Localizando o contato pelo uui:

    $ContactsClient->getContactFromUuid('uuid');
    
Localizando o contato pelo e-mail:

    $ContactsClient->getContactFromEmail('email');
    
    
Atualizando o usuário pelo uuid:
    
    Veja o corpo: https://developers.rdstation.com/pt-BR/reference/contacts
    
    $ContactsClient->updateUserFromUuid('uuid', $data);

Atualizando o usuário pelo e-mail:

    Veja o corpo: https://developers.rdstation.com/pt-BR/reference/contacts
    
    $ContactsClient->updateUserFromEmail('email', $data);

## Funil de Contato

Instanciando o client:
    
    $ContactsFunnelsClient = new AnthraxisBR\Client\ContactsFunnels('access token');

Recuperar os funis atrelados a um contato pelo uuid:

    $ContactsFunnelsClient->getUserFunnelsFromUuid('uuid');


Recuperar os funis atrelados a um contato pelo e-mail:
    
    Veja o corpo: https://developers.rdstation.com/pt-BR/reference/contacts/funnels

    $ContactsFunnelsClient->updateUserFunnel($funnelName, $uuid ,$email, $data);

## Eventos

O disparo de evento, é chamado de trigger:

    Veja o corpo: https://developers.rdstation.com/pt-BR/reference/events
    
Instanciando o client:
    
    $Events = new AnthraxisBR\Client\Events('access token');

Exemplo do corpo
    
    {
        "email": "email@email.com",
        "funnel_name": "default"
    }
    

Nova oportunidade:
    
    $Events->newOpportunity($data);
       
Ganhar Oportunidade:
    
    $Events->wonOpportunity($data);
    
Perder Oportunidade:
    
    $Events->lostOpportunity($data);
      
Receber pedido:
    
    $Events->orderPlaced($data);
      
Incluir item no pedido:
    
    $Events->orderPlacedItem($data);
      
      
Carrinho abandonado:
    
    $Events->cartAbandoned($data);
      
    
Item abandonado no carrinho:
    
    $Events->cartAbandonedItem($data);
    
Item abandonado no carrinho:
    
    $Events->cartAbandonedItem($data);

Chat iniciado:

    $Events->chatStarted($data);

Chat Encerrado:

    $Events->chatFinished($data);

Ligação finalizada:

    $Events->callFinished($data);

Interação de midia:

    
    $Events->mediaPlaybackStarted($data);



## TODO

 - Melhorar documentação
 - Implementar os testes das classes
 - Testar SDK com uma conta de verdade
 - Implementar recurso para validar as requisições
 - Implementar tratamento de errosg
