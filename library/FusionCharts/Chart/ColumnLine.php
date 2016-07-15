<?php

namespace FusionCharts\Chart;

use FusionCharts\Tag\DataSet;
use FusionCharts\Tag\Categories;
use FusionCharts\Tag\TrendLines;

/**
 * Class to create columnline chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class ColumnLine extends AbstractChart
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
     * @param DataSet $dataSet
     * @return ColumnLine
     */
    public function addColumns(DataSet $dataSet)
    {
        $this->columns[] = $dataSet->getXML();
        return $this;
    }

    /**
     * @param DataSet $dataSet
     * @return ColumnLine
     */
    public function addLine(DataSet $dataSet)
    {
        $dataSet->setAttribute('parentyaxis', 'S');
        $dataSet->setAttribute('renderas', 'Line');

        $this->lines[] = $dataSet->getXML();
        return $this;
    }

    /**
     * @param Categories $categories
     * @return ColumnLine
     */
    public function addCategories(Categories $categories)
    {
        $this->categories[] = $categories->getXML();
        return $this;
    }

    /**
     * @param TrendLines $trendLines
     * @return ColumnLine
     */
    public function addTrendLines(TrendLines $trendLines)
    {
        $this->trendLines[] = $trendLines->getXML();
        return $this;
    }

    /**
     * @param bool $rotate
     * @return ColumnLine
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
            ->setAttribute('xaxisname', $this->xDesc)
            ->setAttribute('pyaxisname', $this->yDesc)
            ->setAttribute('animation', '1');
    }

    /**
     * @see AbstractChart::getXML()
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
