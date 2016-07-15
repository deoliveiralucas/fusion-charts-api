<?php

namespace FusionCharts\Chart;

use FusionCharts\Tag\Categories;
use FusionCharts\Tag\DataSet;
use FusionCharts\Tag\TrendLines;

/**
 * Class to create line chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class LineChart extends AbstractChart
{

    /**
     * @var string
     */
    const CHART_TYPE = 'MSLine';
    
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
     * @param Categories $categories
     * @return Line
     */
    public function addCategories(Categories $categories)
    {
        $this->categories[] = $categories->getXML();
        return $this;
    }

    /**
     * @param DataSet $dataSet
     * @return Line
     */
    public function addLine(DataSet $dataSet)
    {
        $this->lines[] = $dataSet->getXML();
        return $this;
    }

    /**
     * @param TrendLines $trendLines
     * @return Line
     */
    public function addTrendLines(TrendLines $trendLines)
    {
        $this->trendLines[] = $trendLines->getXML();
        return $this;
    }

    /**
     * @param boolean $rotate
     * @return Line
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
        $this->setAttribute('caption', $this->name);
    }

    /**
     * @see AbstractChart::getXML()
     */
    public function getXML()
    {
        $this->startDefaultAttributes();
        
        $xmlChart  = "<chart " . $this->getAsXMLAttributes($this->attribute) . " >";
        $xmlChart .= implode(' ', $this->categories) . implode(' ', $this->lines);
        $xmlChart .= implode(' ', $this->trendLines);
        $xmlChart .= "</chart>";

        return $xmlChart;
    }
}
