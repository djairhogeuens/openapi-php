<?php declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->in('example');

$config = new PhpCsFixer\Config();
return $config->setFinder($finder);
