<?php

namespace FusionCharts\Tag;

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class DataSet extends AbstractTag
{
    /**
     * @var array
     */
    protected $sets = array();

    /**
     * @param Set $set
     * @return DataSet
     */
    public function addSet(Set $set)
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
     * @see AbstractTag::getXML()
     */
    public function getXML()
    {
        return sprintf(
            '<dataset %s>%s</dataset>',
            $this->getXMLAttributes(),
            $this->getXMLSets()
        );
    }
}
