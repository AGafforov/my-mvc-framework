<?php

require "autoload.php";
$config = require("app/config/config.php");

\app\libraries\App::build($_REQUEST, $config);
