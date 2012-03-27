<?php

namespace Zubi\DeviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Zubi\DeviceBundle\Entity\MeasurementType
 */
class MeasurementType
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $unit
     */
    private $unit;

    /**
     * @var ArrayCollection $measurements
     */
    private $measurements;

    public function __construct() {
        $measurements = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set unit
     *
     * @param string $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Add measurements
     *
     * @param Zubi\DeviceBundle\Entity\Measurement $measurements
     */
    public function addMeasurement(\Zubi\DeviceBundle\Entity\Measurement $measurements)
    {
        $this->measurements[] = $measurements;
    }

    /**
     * Get measurements
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMeasurements()
    {
        return $this->measurements;
    }
}