<?php

/**
 * Système d'autoload. 
 * A chaque fois que PHP va avoir besoin d'une classe, il va appeler cette fonction 
 * et chercher dnas les divers dossiers (ici models, controllers, views, services) s'il trouve 
 * un fichier avec le bon nom. Si c'est le cas, il l'inclut avec require_once.
 */
spl_autoload_register(function($className) {
    // On va voir dans le dossier service si la classe existe.
    if (file_exists('services/' . $className . '.php')) {
        require_once 'services/' . $className . '.php';
    }

    // On va voir dans le dossier config si la classe existe.
    if (file_exists('config/' . $className . '.php')) {
        require_once 'config/' . $className . '.php';
    }

    // On va voir dans le dossier  models si la classe existe.
    if (file_exists('models/' . $className . '.php')) {
        require_once 'models/' . $className . '.php';
    }

     // On va voir dans le dossier managers si la classe existe.
    if (file_exists('managers/' . $className . '.php')) {
        require_once 'managers/' . $className . '.php';
    }

    // On va voir dans le dossier controllers si la classe existe.
    if (file_exists('controllers/' . $className . '.php')) {
        require_once 'controllers/' . $className . '.php';
    }

    // On va voir dans le dossier views si la classe existe.
    if (file_exists('views/' . $className . '.php')) {
        require_once 'views/' . $className . '.php';
    }
    
});