<?php  


namespace App\Controller;


class AbonneController extends \Core\Controller
{
    
    private $dbAbonneRepository;

    public function __construct()
    {
        $this->dbAbonneRepository = new \App\Model\AbonneRepository;
    }
    
    public function index()
    {
        echo 'Controller Abonne';
        // var_dump($param1);
        // var_dump($param2);
    }
}