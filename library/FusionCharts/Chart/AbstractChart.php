<?php

namespace FusionCharts\Chart;

use InvalidArgumentException as ArgumentException;

/**
 * Abstract class to create fusionchart classes
 *
 * @version 3.0
 * @package Chart
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
abstract class AbstractChart
{

    /**
     * @var string
     */
    const CHART_FORMAT_XML = 'xml';

    /**
     * @var string
     */
    protected $idElement;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $width;

    /**
     * @var integer
     */
    protected $height;

    /**
     * @var array
     */
    protected $attribute = array();

    /**
     * @var config
     */
    protected $config = array();

    /**
     * @param string $idElement
     */
    public function __construct($idElement)
    {
        if (is_null($idElement)) {
            throw new ArgumentException(
                'You must set the id of the element in the constructor to render the chart'
            );
        }

        $this->idElement = (string) $idElement;
    }

    /**
     * @param string $name
     * @return AbstractChart
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param integer $width
     * @return AbstractChart
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param integer $height
     * @return AbstractChart
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return AbstractChart
     */
    public function setAttribute($name, $value)
    {
        $this->attribute[$name] = $value;
        return $this;
    }

    /**
     * @param array $config
     * @return array
     */
    public function setConfig(array $config)
    {
        $this->config = (array) $config;
        return $this;
    }

    /**
     * @return string
     */
    public function getJSONConfig()
    {
        $config = array(
            'type'       => static::CHART_TYPE,
            'dataFormat' => static::CHART_FORMAT_XML,
            'renderAt'   => $this->idElement,
            'width'      => $this->width,
            'height'     => $this->height,
            'dataSource' => $this->getXML()
        );

        if (count($this->config)) {
            $config = array_merge($config, $this->config);
        }

        return json_encode($config);
    }

    /**
     * Initiate all default values to build the chart
     *
     * @return void
     */
    abstract protected function startDefaultAttributes();

    /**
     * Return the XML to render the chart
     *
     * @return string xml
     */
    abstract public function getXML();

    /**
     * @param array $attributes
     * @return string XML
     */
    protected function getAsXMLAttributes(array $attributes = null)
    {
        if (! $attributes) {
            return '';
        }

        $xmlAttrbs = array();
        foreach ($attributes as $key => $value) {
            $xmlAttrbs[] = $key . "='" . $value . "'";
        }

        return implode(' ', $xmlAttrbs);
    }
}
