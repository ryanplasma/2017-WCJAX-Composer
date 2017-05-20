<?php
// Stuff about my plugin

use CoolCalendar\Taxonomy\EventTaxonomy;

require __DIR__ . '/vendor/autoload.php';

$taxonomy = new EventTaxonomy();
$taxonomy->do_something();