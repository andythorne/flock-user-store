<?php

namespace App\Entity;

/**
 * Session.
 */
class Session
{
    /**
     * @var string
     */
    private $sessData;

    /**
     * @var int
     */
    private $sessTime;

    /**
     * @var int
     */
    private $sessLifetime;

    /**
     * @var string
     */
    private $sessId;

    /**
     * Set sessData.
     *
     * @param string $sessData
     *
     * @return Session
     */
    public function setSessData($sessData)
    {
        $this->sessData = $sessData;

        return $this;
    }

    /**
     * Get sessData.
     *
     * @return string
     */
    public function getSessData()
    {
        return $this->sessData;
    }

    /**
     * Set sessTime.
     *
     * @param int $sessTime
     *
     * @return Session
     */
    public function setSessTime($sessTime)
    {
        $this->sessTime = $sessTime;

        return $this;
    }

    /**
     * Get sessTime.
     *
     * @return int
     */
    public function getSessTime()
    {
        return $this->sessTime;
    }

    /**
     * Set sessLifetime.
     *
     * @param int $sessLifetime
     *
     * @return Session
     */
    public function setSessLifetime($sessLifetime)
    {
        $this->sessLifetime = $sessLifetime;

        return $this;
    }

    /**
     * Get sessLifetime.
     *
     * @return int
     */
    public function getSessLifetime()
    {
        return $this->sessLifetime;
    }

    /**
     * Set sessId.
     *
     * @param string $sessId
     *
     * @return Session
     */
    public function setSessId($sessId)
    {
        $this->sessId = $sessId;

        return $this;
    }

    /**
     * Get sessId.
     *
     * @return string
     */
    public function getSessId()
    {
        return $this->sessId;
    }
}
