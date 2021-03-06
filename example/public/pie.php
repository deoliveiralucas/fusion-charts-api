<?php

use FusionCharts\Chart\Pie;
use FusionCharts\Tag\Set;

// Data from db
$values = array(
    'Jan' => 100,
    'Feb' => 200,
    'Mar' => 150,
    'Apr' => 210
);

$chart = new Pie('chart-container');

$chart
    ->setName('Chart Pie Example')
    ->setWidth(800)
    ->setHeight(400)
    ->setAttribute('showlegend', '1')
    ->setAttribute('showlabels', '0');

$slice = new Set();
foreach ($values as $name => $value){
    $slice
        ->setAttribute('issliced', '1')
        ->setAttribute('label', $name)
        ->setAttribute('value', $value);

    $chart->addSlice($slice);
}

// render chart in the index.php
