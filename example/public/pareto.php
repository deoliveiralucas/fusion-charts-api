<?php

use FusionCharts\Chart\Pareto;
use FusionCharts\Tag\Set;

// Data from db
$values = array(
    'Jan' => 100,
    'Feb' => 200,
    'Mar' => 150,
    'Apr' => 210
);

$chart = new Pareto('chart-container');

$chart
    ->setName('Chart Pareto Example')
    ->setWidth(800)
    ->setHeight(400)
    ->setLabelRotate(true)
    ->setXdescription('x values')
    ->setYdescription('y values')
    ->setAttribute('showyaxisvalues', '0');

$column = new Set();
foreach ($values as $description => $value) {
    $column
        ->setAttribute('label', $description)
        ->setAttribute('value', $value);

    $chart->addColumn($column);
}

// render chart in the index.php
