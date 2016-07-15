<?php

namespace FusionCharts\Tag;

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class TrendLines extends AbstractTag
{
    /**
     * @var array
     */
    protected $lines = array();

    /**
     * @param Line $line
     * @return TrendLines
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
            '<trendlines %s>%s</trendlines>',
            $this->getXMLAttributes(),
            $this->getXMLLines()
        );
    }
}
