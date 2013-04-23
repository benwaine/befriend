<?php

namespace BefriendExtension\Context\Initializer;

use Behat\Behat\Context\ContextInterface;
use Behat\Behat\Context\Initializer\InitializerInterface;
use BefriendExtension\Context\FacebookClientAwareInterface;
use Bwaine\FacebookTestUserClient\Client;

class FacebookClientAwareInitializer implements InitializerInterface {
    
    protected $facebookClient;
    
    protected $appId;
    
    protected $appSecret;
    
    public function __construct(Client $client, $appId, $appSecret) {
        $this->facebookClient = $client;
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }
    
    public function initialize(ContextInterface $context) {
        $context->setClient($this->facebookClient);
        $context->setAppId($this->appId);
        $context->setAppSecret($this->appSecret);
        
    }

    public function supports(ContextInterface $context) {
        return $context instanceof FacebookClientAwareInterface;
    }

    
}

