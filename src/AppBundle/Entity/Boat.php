<?php
/**
 *
 * Prakash Admane <prakashadmane@gmaill.com>
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="boat")
 */
class Boat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="digit")
     * @ORM\Column(type="string")
     */
    private $hullLength;

    /**
     * @ORM\Column(type="string")
     */
    private $lengthUnit;

    /**
     * @Assert\NotBlank()
     * @ORM\JoinColumn(nullable=false)
     */
    private $buttockAngle;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="digit")
     * @ORM\Column(type="string")
     */
    private $displacement;

    /**
     * @ORM\Column(type="string")
     */
    private $dispUnit;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getHullLength()
    {
        return $this->hullLength;
    }

    /**
     * @param mixed $hullLength
     */
    public function setHullLength($hullLength)
    {
        $this->hullLength = $hullLength;
    }

    /**
     * @return mixed
     */
    public function getLengthUnit()
    {
        return $this->lengthUnit;
    }

    /**
     * @param mixed $lengthUnit
     */
    public function setLengthUnit($lengthUnit)
    {
        $this->lengthUnit = $lengthUnit;
    }

    /**
     * @return mixed
     */
    public function getButtockAngle()
    {
        return $this->buttockAngle;
    }

    /**
     * @param mixed $buttockAngle
     */
    public function setButtockAngle($buttockAngle)
    {
        $this->buttockAngle = $buttockAngle;
    }

    /**
     * @return mixed
     */
    public function getDisplacement()
    {
        return $this->displacement;
    }

    /**
     * @param mixed $displacement
     */
    public function setDisplacement($displacement)
    {
        $this->displacement = $displacement;
    }

    /**
     * @return mixed
     */
    public function getDispUnit()
    {
        return $this->dispUnit;
    }

    /**
     * @param mixed $dispUnit
     */
    public function setDispUnit($dispUnit)
    {
        $this->dispUnit = $dispUnit;
    }
}