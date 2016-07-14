<?php

/**
 * Class to create pie chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Chart_Pie extends FusionCharts_Chart_Abstract
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
     * @param FusionCharts_Tag_Set $set
     * @return FusionCharts_Chart_Pie
     */
    public function addSlice(FusionCharts_Tag_Set $set)
    {
        $this->slices[] = $set->getXML();
        return $this;
    }

    /**
     * @see FusionCharts_Chart_Abstract::startDefaultAttributes()
     */
    protected function startDefaultAttributes()
    {
        $this
            ->setAttribute('caption', $this->name)
            ->setAttribute('theme', 'fint');
    }

    /**
     * @see FusionChartAbstract::getXML()
     */
    public function getXML()
    {
        $this->startDefaultAttributes();
        
        $xmlChart = "<chart " . $this->getAsXMLAttributes($this->attribute) . " >" . implode(' ', $this->slices) . "</chart>";

        return $xmlChart;
    }
}
