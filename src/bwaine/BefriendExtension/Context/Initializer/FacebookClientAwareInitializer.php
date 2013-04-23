<?php

namespace BefriendExtension\Context\Initializer;

use Behat\Behat\Context\ContextInterface;
use Behat\Behat\Context\Initializer\InitializerInterface;
use BefriendExtension\Context\FacebookClientAwareInterface;
use Bwaine\FacebookTestUserClient\Client;

class FacebookClientAwareInitializer implements InitializerInterface {
    
    protected $facebookClient;
    
    public function __construct(Client $client) {
        $this->facebookClient = $client;
    }
    
    public function initialize(ContextInterface $context) {
        $context->setClient($this->facebookClient);
    }

    public function supports(ContextInterface $context) {
        return $context instanceof FacebookClientAwareInterface;
    }

    
}

