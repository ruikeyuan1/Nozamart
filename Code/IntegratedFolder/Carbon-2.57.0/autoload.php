$ composer require nesbot/carbon
{
    "require": {
        "nesbot/carbon": "^2.16"
    }
}
<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

printf("Now: %s", Carbon::now());