<?php

use FusionCharts\Chart\ColumnLine;
use FusionCharts\Tag\Categories;
use FusionCharts\Tag\Category;
use FusionCharts\Tag\DataSet as Columns;
use FusionCharts\Tag\Set as Column;

// Data from db
$months = array('Jan', 'Feb', 'Mar', 'Apr');
$values = array(100, 200, 150, 210);

$chart = new ColumnLine('chart-container');

$categories = new Categories();
foreach ($months as $month) {
    $category = new Category($month);
    $categories->addCategory($category);
}

$columns = new Columns();
foreach ($values as $value) {
    $column = new Column($value);
    $columns->addSet($column);
}

$chart
    ->setName('Chart Columns Example')
    ->setWidth(800)
    ->setHeight(400)
    ->setLabelRotate(true)
    ->setXdescription('x values')
    ->setYdescription('y values')
    ->setAttribute('showyaxisvalues', '0')
    ->addCategories($categories)
    ->addColumns($columns);

// render chart in the index.php
