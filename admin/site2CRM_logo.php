<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

$dir = plugin_dir_url( __DIR__ ).'assets/images/Site2CRM-Logo.png';

echo '<img style="position:fixed; z-index:100; opacity:0.4; right:6vw; bottom:4vh; height:10%;" alt="Site2CRM" src="';

echo $dir;
echo '" ></img>';
