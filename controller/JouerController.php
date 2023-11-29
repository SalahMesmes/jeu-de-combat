<?php
namespace combats\controller;

use combats\controller\Controller;
use combats\model\Personnages;
use combats\model\PersonnagesManager;

class JouerController extends Controller
{
    private $persoManager;
    private $listAllPlayers;
    private $persoToPlay;
    private $listPersoToHit;

    public function __construct()
    {
        $this->persoManager = new PersonnagesManager();
        if( isset(  $_SESSION['persoToPlay'] ) ) {
            $this->persoToPlay = $_SESSION['persoToPlay'];
            $this->listPersoToHit = $this->persoManager->getListPlayerToHit( $this->persoToPlay->getId() );
        }
        $this->listAllPlayers = $this->persoManager->getAllPlayers();
        parent::__construct();
    }


    public function defaultAction()
    {
        $data = [
            'listAllPlayers'  => $this->listAllPlayers
        ];
        $this->render('jouer', $data);
    }

    /**
     * Use a character
     */
    public function utiliserAction() 
    {
        $data = [
            'listAllPlayers'  => $this->listAllPlayers
        ];
        if( isset( $_REQUEST['id'] ) ) {
            unset( $_SESSION['persoToPlay'] );
            $this->persoToPlay = $this->persoManager->getOnePlayer( $_REQUEST['id'] );
            $_SESSION['persoToPlay'] = $this->persoToPlay;
            $this->listPersoToHit = $this->persoManager->getListPlayerToHit( $_REQUEST['id'] );
            $data['persoToPlay'] = $this->persoToPlay;
            $data['listPersoToHit'] = $this->listPersoToHit;
        }
        $this->render( 'jouer', $data );
    }

    /**
     * Hit a character
     */
    public function frapperAction() 
    {
        $persoToHit = $this->persoManager->getOnePlayer( $_REQUEST['idhit'] );
        $retour = $persoToHit->ajoutDegats();
        if( $retour === Personnages::PERSONNAGE_FRAPPE ) {
            if( $this->persoManager->updatePlayer( $persoToHit ) ) {
                $message = [
                    'type'  => 'success'
                ];
                $message['mess'] = 'Le personnage <b>' . $persoToHit->getNom() . '</b> a bien été frappé !';
                $message['mess'] .= '<br/>Il a reçu ' . Personnages::QTE_DEGATS . ' point de dégat.';
            }
        } else {
            if( $this->persoManager->deletePlayer( $persoToHit->getId() ) ) {
                $message = [
                    'type' => 'success',
                    'mess' => 'Vous avez tué le personnage : ' . $persoToHit->getNom()
                ];
            }
        }
        if( $this->persoManager->updatePlayer( $this->persoToPlay ) ) {
            $this->persoToPlay->ajoutExperience();
            $this->listPersoToHit = $this->persoManager->getListPlayerToHit( $this->persoToPlay->getId() );
            $data = [
                'persoToPlay'       => $this->persoToPlay,
                'listAllPlayers'    => $this->listAllPlayers,
                'listPersoToHit'    => $this->listPersoToHit,
                'message'           => $message
            ];
        }
        $this->render('jouer', $data);
    }
}