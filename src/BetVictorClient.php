<?php

namespace Armandsar\BetVictorBroccoli;

use Armandsar\BetVictorBroccoli\Exceptions\MeetingNotFoundException;
use Armandsar\BetVictorBroccoli\Exceptions\ResourceNotFoundException;

class BetVictorClient extends BaseApiClient
{
    public function loadOutcomes($url)
    {
        $json = $this->get($url);
        $outcomes = array_get($json, 'market.outcomes');
        if (is_null($outcomes)) {
            throw new ResourceNotFoundException();
        }
        return collect($outcomes);
    }

    public function sports($options = [])
    {
        $json = $this->get('sports', $options);
        return collect($json['sports']);
    }

    public function meetings($sportId, $options = [])
    {
        $json = $this->get('sport/' . $sportId . '/meetings', $options);
        return collect($json['meetings']);
    }

    public function meetingEvents($sportId, $meetingId, $options = [])
    {
        $json = $this->get('sport/' . $sportId . '/meeting/' . $meetingId . '/events', $options);
        $events = array_get($json, 'events');
        if (is_null($events)) {
            throw new MeetingNotFoundException();
        }
        return collect($events);
    }

    public function eventMarkets($sportId, $meetingId, $eventId, $options = [])
    {
        $json = $this->get('sport/' . $sportId . '/meeting/' . $meetingId . '/event/' . $eventId . '/markets', $options);
        $markets = array_get($json, 'markets');

        if (is_null($markets)) {
            throw new ResourceNotFoundException();
        }
        return collect($markets);
    }

}
