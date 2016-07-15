<?php

use FusionCharts\Chart\LineChart;
use FusionCharts\Tag\Categories;
use FusionCharts\Tag\Category;
use FusionCharts\Tag\DataSet;
use FusionCharts\Tag\Set;
use FusionCharts\Tag\Line;
use FusionCharts\Tag\TrendLines;

// Data from db
$months = array('Jan', 'Feb', 'Mar', 'Apr');
$valLine1 = array(100, 200, 150, 210);
$valLine2 = array(50, 300, 90, 400);

$chart = new LineChart('chart-container');

$categories = new Categories();
foreach ($months as $month) {
    $categories->addCategory(new Category($month));
}

$line1 = new DataSet();
foreach ($valLine1 as $value) {
    $line1->addSet(new Set($value));
}

$line2 = new DataSet();
foreach ($valLine2 as $value) {
    $line2->addSet(new Set($value));
}

$trendLine1 = new Line();
$trendLine1
    ->setValue(250)
    ->setColor('FF0000')
    ->setDisplayValue('Trendline1 Example: 250')
    ->setValueOnRight();

$trendLine2 = clone $trendLine1;
$trendLine2
    ->setValue(390)
    ->setDisplayValue('Trendline2 Example: 390');

$trendLines = new TrendLines();
$trendLines
    ->addLine($trendLine1)
    ->addLine($trendLine2);

$chart
    ->setName('Line Chart Example')
    ->setWidth(800)
    ->setHeight(400)
    ->setAttribute('showvalues', '0')
    ->setLabelRotate(true)
    ->addCategories($categories)
    ->addLine($line1)
    ->addLine($line2)
    ->addTrendLines($trendLines);

// render chart in the index.php