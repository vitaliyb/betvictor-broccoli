<?php

namespace Armandsar\BetVictorBroccoli;

class BetVictorClient extends BaseApiClient
{

    public function sports($options = [])
    {
        return $this->get('sports', $options);
    }

}
