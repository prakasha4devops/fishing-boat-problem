<?php
/**
 *
 * Prakash Admane <prakashadmane@gmaill.com>
 */

namespace AppBundle\Service;

use AppBundle\Entity\Boat;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class CalculateRequirement
 * @package AppBundle\Service
 */
class CalculateRequirement
{
    /**
     * @var ContainerInterface|Container
     */
    protected $container;
    /**
     * @var integer
     */
    private $slRadio;

    /**
     * @var integer
     */
    private $hullSpeed;

    /**
     * @var integer
     */
    private $hullLength;

    /**
     * @var integer
     */
    private $coefficientWyman;

    /**
     * @var  integer
     */
    private $displacement;

    /**
     * CalculateRequirement constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Get HP
     *
     * @param Boat $data
     * @return float
     */
    public function getHorsePower(Boat $data)
    {
        $this->getSlRadio($data);
        $this->getHullSpeed($data);
        $this->getCoefficientWyman();
        $this->getDisplacement($data);

        return ($this->displacement / 1000) * pow($this->hullSpeed / ($this->coefficientWyman * sqrt($this->hullSpeed)), 3);

    }

    /**
     * Get SL Radio
     *
     * @param Boat $data
     */
    private function getSlRadio(Boat $data)
    {
        $this->slRatio = ($data->getButtockAngle() * -0.2) + 2.9;
    }

    /**
     * Get Hull Speed
     *
     * @param Boat $data
     */
    private function getHullSpeed(Boat $data)
    {

        $this->hullLength = $data->getHullLength();

        if ($data->getLengthUnit() != 'feet') {
            $this->hullLength = $this->convertToFeet($this->hullLength, $data->getLengthUnit());
        }
        $this->hullSpeed = $this->slRatio * (sqrt($this->hullLength));

    }

    /**
     * Convert to Feet
     *
     * @param $hullLength
     * @param $lengthUnit
     * @return mixed
     */
    private function convertToFeet($hullLength, $lengthUnit)
    {

        switch ($lengthUnit) {
            case 'inch' :
                $hullLength = $hullLength * 0.0833333;
                break;
            case 'meter' :
                $hullLength = $hullLength * 3.28084;
                break;
            default:
                break;
        }
        return $hullLength;
    }

    /**
     *  get CW
     */
    private function getCoefficientWyman()
    {
        $this->coefficientWyman = 0.8 + (0.17 * $this->slRatio);
    }

    /**
     * Get Displacement
     *
     * @param Boat $data
     */
    private function getDisplacement(Boat $data)
    {
        $this->displacement = $data->getDisplacement();

        if ($data->getDispUnit() != 'lbs') {

            switch ($data->getDispUnit()) {
                case 'kilogram' :
                    $this->displacement = $this->displacement * 2.20462;
                    break;
                case 'gram' :
                    $this->displacement = $this->displacement * 0.00220462;
                    break;
                default:
                    break;
            }
        }
    }
}