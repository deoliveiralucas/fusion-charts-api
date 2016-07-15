<?php

namespace FusionCharts\Tag;

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class Set extends AbstractTag
{
    /**
     * @param int|float $value
     */
    public function __construct($value = null)
    {
        if (isset($value)) {
            $this->setAttribute('value', $value);
        }
    }

    /**
     * @see AbstractTag::getXML()
     */
    public function getXML()
    {
        return sprintf('<set %s />', $this->getXMLAttributes());
    }
}
