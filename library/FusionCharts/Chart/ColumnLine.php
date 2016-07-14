<?php

/**
 * Class to create columnline chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Chart_ColumnLine extends FusionCharts_Chart_Abstract
{

    /**
     * @var string
     */
    const CHART_TYPE = 'MSColumn3DLineDY';

    /**
     * @var string
     */
    protected $xDesc;

    /**
     * @var string
     */
    protected $yDesc;

    /**
     * @var array
     */
    protected $columns = array();

    /**
     * @var array
     */
    protected $lines = array();

    /**
     * @var array
     */
    protected $categories = array();

    /**
     * @var array
     */
    protected $trendLines = array();

    /**
     * @param string $xDesc
     * @return FusionCharts_Chart_ColumnLine
     */
    public function setXdescription($xDesc)
    {
        $this->xDesc = $xDesc;
        return $this;
    }

    /**
     * @param string $yDesc
     * @return FusionCharts_Chart_ColumnLine
     */
    public function setYdescription($yDesc)
    {
        $this->yDesc = $yDesc;
        return $this;
    }

    /**
     * @param FusionCharts_Tag_DataSet $dataSet
     * @return FusionCharts_Chart_ColumnLine
     */
    public function addColumns(FusionCharts_Tag_DataSet $dataSet)
    {
        $this->columns[] = $dataSet->getXML();
        return $this;
    }

    /**
     * @param FusionCharts_Tag_DataSet $dataSet
     * @return FusionCharts_Chart_ColumnLine
     */
    public function addLine(FusionCharts_Tag_DataSet $dataSet)
    {
        $dataSet->setAttribute('parentyaxis', 'S');
        $dataSet->setAttribute('renderas', 'Line');

        $this->lines[] = $dataSet->getXML();
        return $this;
    }

    /**
     * @param FusionCharts_Tag_Categories $categories
     * @return FusionCharts_Chart_ColumnLine
     */
    public function addCategories(FusionCharts_Tag_Categories $categories)
    {
        $this->categories[] = $categories->getXML();
        return $this;
    }

    /**
     * @param FusionCharts_Tag_TrendLines $trendLines
     * @return FusionCharts_Chart_ColumnLine
     */
    public function addTrendLines(FusionCharts_Tag_TrendLines $trendLines)
    {
        $this->trendLines[] = $trendLines->getXML();
        return $this;
    }

    /**
     * @param bool $rotate
     * @return FusionCharts_Chart_ColumnLine
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
            ->setAttribute('xaxisname', $this->xDesc)
            ->setAttribute('pyaxisname', $this->yDesc)
            ->setAttribute('animation', '1');
    }

    /**
     * @see FusionCharts_Chart_Abstract::getXML()
     */
    public function getXML()
    {
        $this->startDefaultAttributes();
        
        $xmlChart  = "<chart " . $this->getAsXMLAttributes($this->attribute) . " >";
        $xmlChart .= implode(' ', $this->categories) . implode(' ', $this->columns);
        $xmlChart .= implode(' ', $this->lines) . implode(' ', $this->trendLines);
        $xmlChart .= "</chart>";

        return $xmlChart;
    }
}
