<?php

use App\Controllers\PagesController;

$route->get('/', [new PagesController, 'welcome']);