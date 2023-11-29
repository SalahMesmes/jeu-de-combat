<?php

namespace combats\controller;

use combats\model\IndexManager;

class IndexController extends Controller
{
    private $_manager;
    
    public function __construct()
    {
        $this->_manager = new IndexManager();
        parent::__construct();
    }


    public function defaultAction()
    {
        $nbPlayer = $this->_manager->getNumberOfPlayer();
        $data = [
            'nbPlayer'  => $nbPlayer
        ];
        $this->render( 'index', $data );
    }

    public function logoutAction()
    {
        session_destroy();
        header('Location: .');
        exit();
    }
}