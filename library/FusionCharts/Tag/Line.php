<?php

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Tag_Line extends FusionCharts_Tag_Abstract
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
     * @return FusionCharts_Tag_Line
     */
    public function setColor($color)
    {
        $this->setAttribute('color', $color);
        return $this;
    }

    /**
     * @param string $displayValue
     * @return FusionCharts_Tag_Line
     */
    public function setDisplayValue($displayValue)
    {
        $this->setAttribute('displayValue', $displayValue);
        return $this;
    }

    /**
     * @param number $value
     * @throws InvalidArgumentException
     * @return FusionCharts_Tag_Line
     */
    public function setValue($value)
    {
        if (! is_numeric($value)) {
            throw new InvalidArgumentException(sprintf("Value %s must be numeric", $value));
        }

        $this->setAttribute('startvalue', $value);
        return $this;
    }

    /**
     * It doesn't work for column charts
     * @return FusionCharts_Tag_Line
     */
    public function setValueOnRight()
    {
        $this->setAttribute('valueonright', '1');
        return $this;
    }

    /**
     * (non-PHPdoc)
     * @see FusionCharts_Tag_Abstract::getXML()
     */
    public function getXML()
    {
        return '<line ' . $this->getXMLAttributes() . ' />';
    }
}
