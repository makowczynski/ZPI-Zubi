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
     * @var Zubi\DeviceBundle\Entity\Station $station;
     */
    private $station;

    /**
     * @var datetime $timestamp
     */
    private $timestamp;

    /**
     * @var Zubi\DeviceBundle\Entity\MeasurementType $measurementType;
     */
    private $measurementType;

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

    /**
     * Set station
     *
     * @param \Zubi\DeviceBundle\Entity\Station $station
     */
    public function setStation(\Zubi\DeviceBundle\Entity\Station $station)
    {
        $this->station = $station;
    }

    /**
     * Get station
     *
     * @return Zubi\DeviceBundle\Entity\Station 
     */
    public function getStation()
    {
        return $this->station;
    }
    /**
     * @var integer $stationId
     */
    private $stationId;


    /**
     * Set measurementType
     *
     * @param Zubi\DeviceBundle\Entity\MeasurementType $measurementType
     */
    public function setMeasurementType(\Zubi\DeviceBundle\Entity\MeasurementType $measurementType)
    {
        $this->measurementType = $measurementType;
    }

    /**
     * Get measurementType
     *
     * @return Zubi\DeviceBundle\Entity\MeasurementType 
     */
    public function getMeasurementType()
    {
        return $this->measurementType;
    }
}