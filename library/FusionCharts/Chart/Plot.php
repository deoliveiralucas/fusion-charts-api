<?php

namespace FusionCharts\Chart;

use FusionCharts\Tag\Categories;
use FusionCharts\Tag\DataSet;
use FusionCharts\Tag\VTrendLines;
use FusionCharts\Tag\TrendLines;

/**
 * Class to create plot chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class Plot extends AbstractChart
{

    /**
     * @var string
     */
    const CHART_TYPE = 'Scatter';
    
    /**
     * @var string
     */
    protected $xDesc;

    /**
     * @var string
     */
    protected $yDesc;

    /**
     * @var string
     */
    protected $labels;

    /**
     * @var array
     */
    protected $categories = array();

    /**
     * @var array
     */
    protected $plots = array();

    /**
     * @var array
     */
    protected $vTrendlines = array();

    /**
     * @var array
     */
    protected $trendLines = array();

    /**
     * @param string $xDesc
     * @return Plot
     */
    public function setXdescription($xDesc)
    {
        $this->xDesc = $xDesc;
        return $this;
    }

    /**
     * @param string $yDesc
     * @return Plot
     */
    public function setYdescription($yDesc)
    {
        $this->yDesc = $yDesc;
        return $this;
    }

    /**
     * @param Categories $categories
     * @return Plot
     */
    public function addCategories(Categories $categories)
    {
        $this->categories[] = $categories->getXML();
        return $this;
    }

    /**
     * @param DataSet $dataSet
     * @return Plot
     */
    public function addPlots(DataSet $dataSet)
    {
        $this->plots[] = $dataSet->getXML();
        return $this;
    }

    /**
     * @param VTrendLines $vTrendLines
     * @return Plot
     */
    public function addVTrendLines(VTrendLines $vTrendLines)
    {
        $this->vTrendlines[] = $vTrendLines->getXML();
        return $this;
    }

    /**
     * @param TrendLines $trendLines
     * @return Plot
     */
    public function addTrendLines(TrendLines $trendLines)
    {
        $this->trendLines[] = $trendLines->getXML();
        return $this;
    }

    /**
     * @param boolean $rotate
     * @return Plot
     */
    public function setLabelRotate($rotate = true)
    {
        if ($rotate == true) {
            $this->setAttribute('labelDisplay', 'Rotate');
            $this->setAttribute('slantLabels', '1');
        }
        return $this;
    }

    /**
     * @see AbstractChart::startDefaultAttributes()
     */
    protected function startDefaultAttributes()
    {
        $this
            ->setAttribute('caption', $this->name)
            ->setAttribute('yaxisname', $this->yDesc)
            ->setAttribute('xaxisname', $this->xDesc)
            ->setAttribute('palette', '2')
            ->setAttribute('animation', '1')
            ->setAttribute('bgcolor', 'FFFFFF')
            ->setAttribute('showborder', '0');
    }

    /**
     * @see AbstractChart::getXML()
     */
    public function getXML()
    {
        $this->startDefaultAttributes();
        
        $xmlChart  = "<chart " . $this->getAsXMLAttributes($this->attribute) . ">";
        $xmlChart .= implode(' ', $this->categories) . implode(' ', $this->plots);
        $xmlChart .= implode(' ', $this->trendLines) . implode(' ', $this->vTrendlines);
        $xmlChart .= "</chart>";

        return $xmlChart;
    }
}
