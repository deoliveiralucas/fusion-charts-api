# FusionCharts - API #
__http://www.fusioncharts.com/__
## [PHPClasses](http://www.phpclasses.org/package/9002-PHP-Generate-graphical-charts-using-FusionCharts-API.html)

## Description ##
This package can provide the data to generate graphical charts using the FusionCharts Library.

It provides a base class that can generate JSON for rendering several types of charts supported by the FusionCharts taking XML code that defines the parameters of the charts.

The package comes also with specialized classes that can generate the necessary XML code with the parameters for several types of charts.

Currently it comes with classes for rendering charts of types column, line, plot, pie and pareto.

The chart classes provide a fluent interface to define any of the supported parameters like the chart data values, chart size, colors, labels, fonts, and other chart specific parameters.

## Requirement ##

- PHP 5.3 >

- Download the FusionCharts Javascript library in the [oficial website](http://www.fusioncharts.com/)

- Import these two files to your HTML page: **fusioncharts.charts.js** and **fusioncharts.js**

## Install ##
```
composer require deoliveiralucas/fusion-charts-api
```

## Example ##

- Columns
``` php
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
```

- Please see [EXAMPLES](https://github.com/deoliveiralucas/fusion-charts-api/tree/master/example/public) for details.

## Contributing ##

- Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

- GNU General Public License Versions. Please see [License File](http://opensource.org/licenses/gpl-license.html) for more information.
