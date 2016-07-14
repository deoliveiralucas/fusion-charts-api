<?php

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Tag_DataSet extends FusionCharts_Tag_Abstract
{
    /**
     * @var array
     */
    protected $sets = array();

    /**
     * @param FusionCharts_Tag_Set $set
     * @return FusionCharts_Tag_DataSet
     */
    public function addSet(FusionCharts_Tag_Set $set)
    {
        $this->sets[] = $set->getXML();
        return $this;
    }

    /**
     * @return string
     */
    public function getXMLSets()
    {
        return implode(' ', $this->sets);
    }

    /**
     * (non-PHPdoc)
     * @see FusionCharts_Tag_Abstract::getXML()
     */
    public function getXML()
    {
        return '<dataset ' . $this->getXMLAttributes() . '>' . $this->getXMLSets() . '</dataset>';
    }
}
