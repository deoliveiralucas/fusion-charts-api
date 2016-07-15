<?php

namespace FusionCharts\Tag;

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class Category extends AbstractTag
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
     * @see AbstractTag::getXML()
     */
    public function getXML()
    {
        return sprintf('<category %s />', $this->getXMLAttributes());
    }
}
