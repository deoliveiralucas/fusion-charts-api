<?php

namespace FusionCharts\Tag;

/**
 * Abstract class to create tag
 *
 * @version 3.0
 * @package Tag
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
abstract class AbstractTag
{
    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * @param string $name
     * @param number $value
     * @return AbstractTag
     */
    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getXMLAttributes()
    {
        $attributes = array();
        foreach ($this->attributes as $key => $attribute) {
            $attributes[] = $key . "=" . "'" . $attribute . "'";
        }

        return implode(' ', $attributes);
    }

    /**
     * Return the component XML
     *
     * @return string
     */
    abstract public function getXML();
}
