<?php

namespace FusionCharts\Tag;

use InvalidArgumentException as ArgumentException;

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class Line extends AbstractTag
{
    /**
     * @param number $value
     */
    public function __construct($value = null)
    {
        if (isset($value)) {
            $this->setValue($value);
        }
    }

    /**
     * @param string $color
     * @return Line
     */
    public function setColor($color)
    {
        $this->setAttribute('color', $color);
        return $this;
    }

    /**
     * @param string $displayValue
     * @return Line
     */
    public function setDisplayValue($displayValue)
    {
        $this->setAttribute('displayValue', $displayValue);
        return $this;
    }

    /**
     * @param int|float $value
     * @throws ArgumentException
     * @return Line
     */
    public function setValue($value)
    {
        if (! is_numeric($value)) {
            throw new ArgumentException(sprintf("Value %s must be numeric", $value));
        }

        $this->setAttribute('startvalue', $value);
        return $this;
    }

    /**
     * It doesn't work for column charts
     *
     * @return Line
     */
    public function setValueOnRight()
    {
        $this->setAttribute('valueonright', '1');
        return $this;
    }

    /**
     * @see AbstractTag::getXML()
     */
    public function getXML()
    {
        return sprintf('<line %s />', $this->getXMLAttributes());
    }
}
