<?php

namespace Zubi\DeviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zubi\DeviceBundle\Entity\Measurement
 */
class Measurement
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $stationId
     */
    private $stationId;

    /**
     * @var datetime $timestamp
     */
    private $timestamp;

    /**
     * @var integer $measureTypeId
     */
    private $measureTypeId;

    /**
     * @var float $value
     */
    private $value;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stationId
     *
     * @param integer $stationId
     */
    public function setStationId($stationId)
    {

        if(!is_int($stationId) || $stationId <= 0)
            throw new \InvalidArgumentException('Invalid Station ID');
        
        $this->stationId = $stationId;
            
    }

    /**
     * Get stationId
     *
     * @return integer 
     */
    public function getStationId()
    {
        return $this->stationId;
    }

    /**
     * Set timestamp
     *
     * @param datetime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        if(!is_a($timestamp, '\DateTime' ))
            throw new \InvalidArgumentException('Invalid Timestamp');

        $this->timestamp = $timestamp;
    }

    /**
     * Get timestamp
     *
     * @return datetime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set measureTypeId
     *
     * @param integer $measureTypeId
     */
    public function setMeasureTypeId($measureTypeId)
    {
        if(!is_int($measureTypeId) || $measureTypeId <= 0)
            throw new \InvalidArgumentException('Invalid Measure Type ID');

        $this->measureTypeId = $measureTypeId;
    }

    /**
     * Get measureTypeId
     *
     * @return integer 
     */
    public function getMeasureTypeId()
    {
        return $this->measureTypeId;
    }

    /**
     * Set value
     *
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }
}