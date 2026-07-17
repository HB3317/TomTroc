<?php

spl_autoload_register(function ($className): void {
    if (file_exists('services/' . $className . '.php')) {
        require_once 'services/' . $className . '.php';
    }

    if (file_exists('config/' . $className . '.php')) {
        require_once 'config/' . $className . '.php';
    }

    if (file_exists('models/' . $className . '.php')) {
        require_once 'models/' . $className . '.php';
    }

    if (file_exists('managers/' . $className . '.php')) {
        require_once 'managers/' . $className . '.php';
    }

    if (file_exists('controllers/' . $className . '.php')) {
        require_once 'controllers/' . $className . '.php';
    }

    if (file_exists('views/' . $className . '.php')) {
        require_once 'views/' . $className . '.php';
    }
});
