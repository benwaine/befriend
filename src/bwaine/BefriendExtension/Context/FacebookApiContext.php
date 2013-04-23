<?php

namespace BefriendExtension\Context;

use Behat\Behat\Context\BehatContext;
use Bwaine\FacebookTestUserClient\Client;
use BefriendExtension\Context\FacebookClientAwareInterface;

class FacebookApiContext extends BehatContext implements FacebookClientAwareInterface {

    protected $facebookClient;
    
    protected $appId;
    
    protected $appSecret;
    
    protected $appAccessToken;
    
    protected $userRegistry = array();
    
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
        $this->appSecret = $secret;
    }
    
    protected function getAppAccessToken() {

        if(!isset($this->appAccessToken)) {

            $command = $this->facebookClient->getCommand(
                    'ObtainAppAccessToken', 
                    array(
                        "client_id" => $this->appId, 
                        "client_secret" => $this->appSecret)
                    );
            
            $response = $command->execute();
            
            $this->appAccessToken = $response['access_token'];
        }
        
        return $this->appAccessToken;
    }

    /**
     * @Given /^the facebook user "([^"]*)" exists$/
     */
    public function theFacebookUserExists($name)
    {
        $token = $this->getAppAccessToken();
        
        $command = $this->facebookClient->getCommand(
                'CreateUser',
                array(
                    "appId" => $this->appId,
                    "access_token" => $token,
                    "name" => $name)
                
                );
        
        $response = $command->execute();
        
        $this->userRegistry[$name] = $response;
    }
}

