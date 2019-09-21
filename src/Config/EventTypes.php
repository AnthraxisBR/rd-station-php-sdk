<?php

namespace AnthraxisBR\Config;

class EventTypes
{

    const OPPORTUNITY_LOST = (string) 'OPPORTUNITY_LOST';
    const SALE = (string) 'SALE';
    const OPPORTUNITY = (string) 'OPPORTUNITY';
    const CONVERSION = (string) 'CONVERSION';
    const ORDER_PLACED = (string) 'ORDER_PLACED';
    const ORDER_PLACED_ITEM = (string) 'ORDER_PLACED_ITEM';
    const CART_ABANDONED = (string) 'CART_ABANDONED';
    const CART_ABANDONED_ITEM = (string) 'CART_ABANDONED_ITEM';
    const CHAT_STARTED = (string) 'CHAT_STARTED';
    const CHAT_FINISHED = (string) 'CHAT_FINISHED';
    const MEDIA_PLAYBACK_STARTED = (string) 'MEDIA_PLAYBACK_STARTED';
    const MEDIA_PLAYBACK_STOPPED = (string) 'MEDIA_PLAYBACK_STOPPED';
    const CALL_FINISHED = (string) 'CALL_FINISHED';
}