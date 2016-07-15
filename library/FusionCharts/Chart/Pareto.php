<?php

namespace FusionCharts\Chart;

use FusionCharts\Tag\Set;

/**
 * Class to create pareto chart
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class Pareto extends AbstractChart
{

    /**
     * @var string
     */
    const CHART_TYPE = 'Pareto3D';

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
    protected $sets = array();

    /**
     * @param string $xDesc
     * @return Pareto
     */
    public function setXdescription($xDesc)
    {
        $this->xDesc = $xDesc;
        return $this;
    }

    /**
     * @param string $yDesc
     * @return Pareto
     */
    public function setYdescription($yDesc)
    {
        $this->yDesc = $yDesc;
        return $this;
    }

    /**
     * @param Set $set
     * @return Pareto
     */
    public function addColumn(Set $set)
    {
        $this->sets[] = $set->getXML();
        return $this;
    }

    /**
     * @param boolean $rotate
     * @return Pareto
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

        $xmlChart = sprintf(
            '<chart %s >%s</chart>',
            $this->getAsXMLAttributes($this->attribute),
            implode(' ', $this->sets)
        );

        return $xmlChart;
    }
}
