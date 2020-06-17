<?php
require_once 'vendor/autoload.php';
require_once 'path_info.php';
$loader = new \Twig\Loader\FilesystemLoader('user_templates');
$twig = new \Twig\Environment($loader, ['debug' => 'true',]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
require_once 'db.php';