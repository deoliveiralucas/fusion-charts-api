<?php

// Data from db
$months = array('Jan', 'Feb', 'Mar', 'Apr');
$valColumns = array(100, 150, 80, 100);
$valLines = array(50, 75, 150, 140);

$chart = new FusionCharts_Chart_ColumnLine('chart-container');

$categories = new FusionCharts_Tag_Categories();
foreach ($months  as $month) {
    $category = new FusionCharts_Tag_Category($month);
    $categories->addCategory($category);
}

$columns = new FusionCharts_Tag_DataSet();
foreach ($valColumns as $value) {
    $column = new FusionCharts_Tag_Set($value);
    $columns->addSet($column);
}

$lines = new FusionCharts_Tag_DataSet();
foreach ($valLines as $value) {
    $line = new FusionCharts_Tag_Set($value);
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
