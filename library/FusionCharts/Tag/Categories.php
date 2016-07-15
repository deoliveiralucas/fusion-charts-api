<?php

namespace FusionCharts\Tag;

/**
 * @package Tag
 * @version 3.0
 * @author Lucas de Oliveira
 * @copyright 2014 - 2015 Lucas de Oliveira
 */
class Categories extends AbstractTag
{
    /**
     * @var array
     */
    protected $categories = array();

    /**
     * @param Category $category
     * @return Categories
     */
    public function addCategory(Category $category)
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
     * @see AbstractTag::getXML()
     */
    public function getXML()
    {
        return sprintf(
            '<categories %s>%s</categories>',
            $this->getXMLAttributes(),
            $this->getXMLCategories()
        );
    }
}
