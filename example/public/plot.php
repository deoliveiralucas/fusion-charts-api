<?php

use FusionCharts\Chart\Plot;
use FusionCharts\Tag\Categories;
use FusionCharts\Tag\Category;
use FusionCharts\Tag\DataSet;
use FusionCharts\Tag\Set;

// Data from db
$months = array('Jan', 'Feb', 'Mar', 'Apr');
$xValues = array(100, 200, 300, 400);
$yValues = array(150, 120, 200, 220);

$chart = new Plot('chart-container');

$categories = new Categories();
foreach ($months as $index => $month) {
    $category = new Category();
    $category
        ->setAttribute('label', $month)
        ->setAttribute('x', $xValues[$index])
        ->setAttribute('showVerticalLine', '1');

    $categories->addCategory($category);
}

$plots = new DataSet();
$plots
    ->setAttribute('color', '000080')
    ->setAttribute('anchorbgcolor', '000080')
    ->setAttribute('anchorradius', '4')
    ->setAttribute('anchorsides', '4');

foreach ($yValues as $index => $value) {
    $plot = new Set();
    $plot
        ->setAttribute('y', $value)
        ->setAttribute('x', $xValues[$index]);

    $plots->addSet($plot);
}

$chart
    ->setName('Chart Plot Example')
    ->setWidth(800)
    ->setHeight(400)
    ->setLabelRotate(true)
    ->setXdescription('x values')
    ->setYdescription('y values')
    ->setAttribute('showyaxisvalues', '0')
    ->addCategories($categories)
    ->addPlots($plots);

// render chart in the index.php
