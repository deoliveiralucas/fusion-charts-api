<?php

use FusionCharts\Chart\ColumnLine;
use FusionCharts\Tag\Categories;
use FusionCharts\Tag\Category;
use FusionCharts\Tag\DataSet as Columns;
use FusionCharts\Tag\Set as Column;

// Data from db
$months = array('Jan', 'Feb', 'Mar', 'Apr');
$valColumns = array(100, 150, 80, 100);
$valLines = array(50, 75, 150, 140);

$chart = new ColumnLine('chart-container');

$categories = new Categories();
foreach ($months  as $month) {
    $category = new Category($month);
    $categories->addCategory($category);
}

$columns = new Columns();
foreach ($valColumns as $value) {
    $column = new Column($value);
    $columns->addSet($column);
}

$lines = new Columns();
foreach ($valLines as $value) {
    $line = new Column($value);
    $lines->addSet($line);
}

$chart
    ->setName('Chart ColumnsLine Example')
    ->setWidth(800)
    ->setHeight(400)
    ->setLabelRotate(true)
    ->setXdescription('x values')
    ->setYdescription('y values')
    ->setAttribute('showyaxisvalues', '0')
    ->addCategories($categories)
    ->addColumns($columns)
    ->addLine($lines);

// render chart in the index.php
