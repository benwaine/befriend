<?php

namespace BefriendExtension\Context;

use Behat\Behat\Context\BehatContext;
use Bwaine\FacebookTestUserClient\Client;
use BefriendExtension\Context\FacebookClientAwareInterface;

class FacebookApiContext extends BehatContext implements FacebookClientAwareInterface {

    protected $facebookClient;
    
    protected $appId;
    
    protected $appSecret;
    
    public function setClient(Client $client) {
        $this->facebookClient = $client;
    }
    
    public function getClient() {
        if(is_null($this->facebookClient)) {
            throw new \RuntimeException("No Facebook API client set for the 
                FacebookApiContext. Pass a Facebook API client into the class 
                using setClient");
        }
        
        return $this->facebookClient;
    }

    public function setAppId($id) {
        $this->appId = $id;
    }

    public function setAppSecret($secret) {
        $this->setAppSecret = $secret;
    }

    /**
     * @Given /^the facebook user "([^"]*)" exists$/
     */
    public function theFacebookUserExists($arg1)
    {
    }
}

