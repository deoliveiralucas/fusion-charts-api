<?php

/**
 * Class to create plot chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Chart_Plot extends FusionCharts_Chart_Abstract
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
     * @return FusionCharts_Chart_Plot
     */
    public function setXdescription($xDesc)
    {
        $this->xDesc = $xDesc;
        return $this;
    }

    /**
     * @param string $yDesc
     * @return FusionCharts_Chart_Plot
     */
    public function setYdescription($yDesc)
    {
        $this->yDesc = $yDesc;
        return $this;
    }

    /**
     * @param FusionCharts_Tag_Categories $categories
     * @return FusionCharts_Chart_Plot
     */
    public function addCategories(FusionCharts_Tag_Categories $categories)
    {
        $this->categories[] = $categories->getXML();
        return $this;
    }

    /**
     * @param FusionCharts_Tag_DataSet $dataSet
     * @return FusionCharts_Chart_Plot
     */
    public function addPlots(FusionCharts_Tag_DataSet $dataSet)
    {
        $this->plots[] = $dataSet->getXML();
        return $this;
    }

    /**
     * @param FusionCharts_Tag_VTrendLines $vTrendLines
     * @return FusionCharts_Chart_Plot
     */
    public function addVTrendLines(FusionCharts_Tag_VTrendLines $vTrendLines)
    {
        $this->vTrendlines[] = $vTrendLines->getXML();
        return $this;
    }

    /**
     * @param FusionCharts_Tag_TrendLines $trendLines
     * @return FusionCharts_Chart_Plot
     */
    public function addTrendLines(FusionCharts_Tag_TrendLines $trendLines)
    {
        $this->trendLines[] = $trendLines->getXML();
        return $this;
    }

    /**
     * @param boolean $rotate
     * @return FusionCharts_Chart_Plot
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
     * @see FusionCharts_Chart_Abstract::startDefaultAttributes()
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
     * @see FusionChartAbstract::getXML()
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
