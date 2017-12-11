<?php

namespace Armandsar\BetVictorBroccoli;

class BetVictorClient extends BaseApiClient
{

    public function sports($options = [])
    {
        $json = $this->get('sports', $options);
        return collect($json['sports']);
    }

}
