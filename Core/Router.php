<?php


namespace Core;

/*
class Router
{
    private $routes = [
        'abonne'    => 'App\Controller\AbonneController', 
        'emprunt'    => 'App\Controller\EmpruntController', 
        'livre'    => 'App\Controller\LivreController', 
    ];

    public function getControllerName()
    {
        if(isset($_GET['page']) && isset($this->routes[$_GET['page']])) {
            // la route demandée dans $_GET
            return $this->routes[$_GET['page']];
        } else {
            // le cas par défaut
            return 'App\Controller\AbonneController';
        }
    }

    public function dispatch()
    {
        $controllerName = $this->getControllerName();
        $controller = new $controllerName;
        // $controller->handleRequest();
        $controller->index();
    }
}
*/

// Router avec réécriture d'url
// Pour une url : monsite.fr/controller/methode/arg1/arg2/...
// Nous devons mettre en place un .htaccess permettant de rediriger toutes les urls sur index.php
/*
Créez un fichier .htaccess à la racine du projet et copier coller les lignes suivantes :
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
*/

class Router
{
    public function dispatch()
    {
        $url = $_SERVER['REQUEST_URI'];
        // var_dump($url);
        // /phpoo_freyja_9/crud-mvc-router/abonne/index/arg1/arg2?truc=test

        // On enlève depuis la fin les arguments potentiels GET
        $url = strtok($url, '?');
        // var_dump($url);
        // /phpoo_freyja_9/crud-mvc-router/abonne/index/arg1/arg1

        // On enlève le chemin de notre projet du fait d'être en local, à supprimer en ligne
        if(strpos($url, '/phpoo_freyja_9/crud-mvc-router') === 0) {
            $url = substr($url, strlen('/phpoo_freyja_9/crud-mvc-router'));
            // var_dump($url);
            // /abonne/index/arg1/arg2
        }

        // on enlève le slash initial
        $url = ltrim($url, '/');
        // var_dump($url);        

        $segments = explode('/', $url);
        // var_dump($segments);
        /*
            array (size=4)
            0 => string 'abonne' (length=6)
            1 => string 'index' (length=5)
            2 => string 'arg1' (length=4)
            3 => string 'arg2' (length=4)
        */

        // On vérifie si la classe existe sinon un cas par défaut
        $controllerName = (isset($segments[0]) && $segments[0] != '') ? ucfirst($segments[0]) . 'Controller' : 'AbonneController';

        $methodName = (isset($segments[1]) && $segments[1] != '') ? $segments[1] : 'index';

        // on rajoute le namespace
        $controllerClass = '\\App\\Controller\\' . $controllerName;

        $controllerPath = 'App/Controller/' . $controllerName . '.php';

        if(!file_exists($controllerPath)) {
            // throw new \Exception('Classe introuvable');
            $controllerClass = '\\App\\Controller\\AbonneController';
        }

        $controller = new $controllerClass;

        if(!method_exists($controller, $methodName)) {
            // throw new \Exception('methode introuvable');
            $methodName = 'index';
        }

        // on prépare un tableau qui contient tous les arguments présents dans l'url
        $params = array_slice($segments, 2);
        // var_dump($params);

        /*
            array (size=2)
            0 => string 'arg1' (length=4)
            1 => string 'arg1' (length=4)
        */

        // on déclenche.
        call_user_func_array( array($controller, $methodName), $params );
    }
}

