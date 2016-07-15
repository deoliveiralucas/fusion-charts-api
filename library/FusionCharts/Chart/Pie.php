<?php

namespace FusionCharts\Chart;

use FusionCharts\Tag\Set;

/**
 * Class to create pie chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class Pie extends AbstractChart
{

    /**
     * @var string
     */
    const CHART_TYPE = 'Pie3D';

    /**
     * @var array
     */
    protected $slices = array();

    /**
     * @param Set $set
     * @return Pie
     */
    public function addSlice(Set $set)
    {
        $this->slices[] = $set->getXML();
        return $this;
    }

    /**
     * @see AbstractChart::startDefaultAttributes()
     */
    protected function startDefaultAttributes()
    {
        $this
            ->setAttribute('caption', $this->name)
            ->setAttribute('theme', 'fint');
    }

    /**
     * @see AbstractChart::getXML()
     */
    public function getXML()
    {
        $this->startDefaultAttributes();

        $xmlChart = sprintf(
            '<chart %s >%s</chart>',
            $this->getAsXMLAttributes($this->attribute),
            implode(' ', $this->slices)
        );

        return $xmlChart;
    }
}
