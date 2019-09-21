<?php


namespace AnthraxisBR\Client;


use AnthraxisBR\Config\EventFamilies;
use AnthraxisBR\Config\EventTypes;
use Psr\Http\Message\ResponseInterface;

class Events extends RDClient
{

    /**
     * @var string
     */
    private $uriRoute = '/platform/events';

    /**
     * The conversion event represents Contact’s conversions on forms, landing pages, popups and etc.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function newConversion(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::CONVERSION, $data);
    }

    /**
     * The opportunity event, marks a Contact as Opportunity in a specfic RD Station funnel.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function newOpportunity(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::OPPORTUNITY, $data);
    }

    /**
     * The conversion event represents Contact’s conversions on forms, landing pages, popups and etc.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function wonOpportunity(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::SALE, $data);
    }

    /**
     * To mark a Contact as Lost on a specific funnel.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function lostOpportunity(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::OPPORTUNITY_LOST, $data);
    }
    /**
     * To indicate when a Contact has placed an order through an ecommerce platform.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function orderPlaced(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::ORDER_PLACED ,$data);
    }
    /**
     * To indicate which items were included when a Contact has placed an order through the ecommerce platform.
     * @param string $data
     * @return ResponseInterface
     */
    public function orderPlacedItem(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::ORDER_PLACED_ITEM, $data);
    }
    /**
     * To indicate when a Contact abandons a cart on a ecommerce platform.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function cartAbandoned(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::CART_ABANDONED, $data);
    }

    /**
     * To indicate which items were included when a Contact has abandoned a cart through the ecommerce platform.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function cartAbandonedItem(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::CART_ABANDONED_ITEM, $data);
    }

    /**
     * To indicate whenever a chat is initiate with a Contact.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function chatStarted(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::CHAT_STARTED, $data);
    }

    /**
     * To indicate whenever a chat is finished with a Contact.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function chatFinished(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::CHAT_FINISHED, $data);
    }

    /**
     * To indicate whenever a call is finished with a Contact.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function callFinished(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::CALL_FINISHED, $data);
    }

    /**
     * To indicate when a Contact has started to interact with this media.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function mediaPlaybackStarted(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::MEDIA_PLAYBACK_STARTED, $data);
    }

    public function triggerEvent(string $eventType, array $data)
    {
        $this->prepare();
        $payload = [];
        $payload['event_family'] = EventFamilies::CDP;
        $payload['event_type'] = $eventType;
        $payload['payload'] = $data;
        return $this->post($this->getUrl(),[
            'json' => $payload
        ]);
    }

    /**
     * To indicate when a Contact has ended the interaction with this media.
     * @param string $uuid
     * @return ResponseInterface
     */
    public function mediaPlaybackStoped(array $data) : ResponseInterface
    {
        return $this->triggerEvent(EventTypes::MEDIA_PLAYBACK_STOPPED, $data);
    }

}