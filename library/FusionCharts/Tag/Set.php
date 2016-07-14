<?php

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Tag_Set extends FusionCharts_Tag_Abstract
{
    /**
     * @param number $value
     */
    public function __construct($value = null)
    {
        if (isset($value)) {
            $this->setAttribute('value', $value);
        }
    }

    /**
     * (non-PHPdoc)
     * @see FusionCharts_Tag_Abstract::getXML()
     */
    public function getXML()
    {
        return '<set ' . $this->getXMLAttributes() . ' />';
    }
}
