<?php

namespace App\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;

/**
 * Class Client
 *
 * @author andy@andy-thorne.co.uk
 */
class Client extends BaseClient
{
    /** @var string */
    private $appName;

    /** @var string */
    private $appDescription;

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getAppName();
    }


    /**
     * @return string
     */
    public function getAppName(): ?string
    {
        return $this->appName;
    }

    /**
     * @param string $appName
     * @return Client
     */
    public function setAppName(string $appName): Client
    {
        $this->appName = $appName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAppDescription(): ?string
    {
        return $this->appDescription;
    }

    /**
     * @param string $appDescription
     * @return Client
     */
    public function setAppDescription(string $appDescription): Client
    {
        $this->appDescription = $appDescription;

        return $this;
    }
}
