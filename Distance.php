<?php

/**
 * Created by PhpStorm.
 * User: emilychen
 * Date: 24/09/15
 * Time: 6:30 PM
 */
class Distance
{
    private $originId;
    private $destinationId;
    private $distanceText;
    private $distanceValue;
    private $durationText;
    private $durationValue;

    /**
     * @return mixed
     */
    public function getOriginId()
    {
        return $this->originId;
    }

    /**
     * @param mixed $originId
     */
    public function setOriginId($originId)
    {
        $this->originId = $originId;
    }

    /**
     * @return mixed
     */
    public function getDestinationId()
    {
        return $this->destinationId;
    }

    /**
     * @param mixed $destinationId
     */
    public function setDestinationId($destinationId)
    {
        $this->destinationId = $destinationId;
    }

    /**
     * @return mixed
     */
    public function getDistanceText()
    {
        return $this->distanceText;
    }

    /**
     * @param mixed $distanceText
     */
    public function setDistanceText($distanceText)
    {
        $this->distanceText = $distanceText;
    }

    /**
     * @return mixed
     */
    public function getDistanceValue()
    {
        return $this->distanceValue;
    }

    /**
     * @param mixed $distanceValue
     */
    public function setDistanceValue($distanceValue)
    {
        $this->distanceValue = $distanceValue;
    }

    /**
     * @return mixed
     */
    public function getDurationText()
    {
        return $this->durationText;
    }

    /**
     * @param mixed $durationText
     */
    public function setDurationText($durationText)
    {
        $this->durationText = $durationText;
    }

    /**
     * @return mixed
     */
    public function getDurationValue()
    {
        return $this->durationValue;
    }

    /**
     * @param mixed $durationValue
     */
    public function setDurationValue($durationValue)
    {
        $this->durationValue = $durationValue;
    }



}