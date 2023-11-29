<?php

namespace combats\controller;

abstract class Controller
{

    public function __construct()
    {
        if( isset( $_REQUEST['action']) ) {
            $action = $_REQUEST['action'] . 'Action';
            $this->$action();
          /*  array_shift( $_REQUEST );
            if( empty( $_REQUEST ) ) {
                $this->$action();
            } else {
                $this->$action( $_REQUEST );
            }*/
        } else {
            $this->defaultAction();
        }
    }

    abstract public function defaultAction();


    protected function render( $view, $data=[] )
    {
        extract( $data );
        $filenameView = 'view/' . ucfirst( $view ) . 'View.php';
        if( file_exists( $filenameView ) ) { 
            require_once $filenameView;
        } else {
            die( 'View file not exist' );
        }
    }


}