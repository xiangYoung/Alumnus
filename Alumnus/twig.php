<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('../Alumnus');
$twig = new Twig_Environment($loader, array(
    /* 'cache' => './compilation_cache', */
));
?>