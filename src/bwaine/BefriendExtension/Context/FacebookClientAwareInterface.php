<?php

namespace BefriendExtension\Context;
use Bwaine\FacebookTestUserClient\Client;

interface FacebookClientAwareInterface {
    public function setClient(Client $client);
    public function setAppId($id);
    public function setAppSecret($secret);
}

