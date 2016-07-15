<?php

namespace FusionCharts\Tag;

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class VTrendLines extends AbstractTag
{
    /**
     * @var array
     */
    protected $lines = array();

    /**
     * @param Line $line
     * @return VTrendLines
     */
    public function addLine(Line $line)
    {
        $this->lines[] = $line->getXML();
        return $this;
    }

    /**
     * @return string
     */
    public function getXMLLines()
    {
        return implode(' ', $this->lines);
    }

    /**
     * @see AbstractTag::getXML()
     */
    public function getXML()
    {
        return sprintf(
            '<vtrendlines %s>%s</vtrendlines>',
            $this->getXMLAttributes(),
            $this->getXMLLines()
        );
    }
}
