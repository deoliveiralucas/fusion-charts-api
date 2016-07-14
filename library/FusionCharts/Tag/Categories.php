<?php

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class FusionCharts_Tag_Categories extends FusionCharts_Tag_Abstract
{
    /**
     * @var array
     */
    protected $categories = array();

    /**
     * @param FusionCharts_Tag_Category $category
     * @return FusionCharts_Tag_Categories
     */
    public function addCategory(FusionCharts_Tag_Category $category)
    {
        $this->categories[] = $category->getXML();
        return $this;
    }

    /**
     * @return string
     */
    public function getXMLCategories()
    {
        return implode(' ', $this->categories);
    }

    /**
     * (non-PHPdoc)
     * @see FusionCharts_Tag_Abstract::getXML()
     */
    public function getXML()
    {
        return '<categories ' . $this->getXMLAttributes() . '>' . $this->getXMLCategories() . '</categories>';
    }
}
