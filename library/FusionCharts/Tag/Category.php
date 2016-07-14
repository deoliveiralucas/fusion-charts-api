<?php

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Tag_Category extends FusionCharts_Tag_Abstract
{
    /**
     * @param string $label
     */
    public function __construct($label = null)
    {
        if (isset($label)) {
            $this->setAttribute('label', $label);
        }
    }

    /**
     * (non-PHPdoc)
     * @see FusionCharts_Tag_Abstract::getXML()
     */
    public function getXML()
    {
        return '<category ' . $this->getXMLAttributes() . ' />';
    }
}
