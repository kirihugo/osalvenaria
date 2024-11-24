<?php

namespace app\controllers;

use app\core\ControllerHandler;
use app\models\Usuario;

require_once  dirname( __DIR__ , 1).'/config.php';

class CtrlUsuario extends ControllerHandler {

	private $usuario = null;

	public function __construct(){
		$this->usuario = new Usuario();
		parent::__construct();
	}

	public function get() {
		$data = $this->usuario->listAll();
		$json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo $json;
	}

	public function post() {		
		$idUsuario = $this->getParameter('idUsuario');
		$email = $this->getParameter('email');
		$senha = $this->getParameter('senha');
		$nome = $this->getParameter('nome');
		$ativo = $this->getParameter('ativo');
	    $this->usuario->populate( $idUsuario, $email, $senha, $nome, $ativo);
		$result = $this->usuario->save();
		echo $result;
	}

	public function put() {		
		$idUsuario = $this->getParameter('idUsuario');
		$email = $this->getParameter('email');
		$senha = $this->getParameter('senha');
		$nome = $this->getParameter('nome');
		$ativo = $this->getParameter('ativo');
	    $this->usuario->populate( $idUsuario, $email, $senha, $nome, $ativo);
		$result = $this->usuario->save();
		echo $result;
	}

	public function delete() {		
		$idUsuario = $this->getParameter('idUsuario');
		$email = $this->getParameter('email');
		$senha = $this->getParameter('senha');
		$nome = $this->getParameter('nome');
		$ativo = $this->getParameter('ativo');
	    $this->usuario->populate( $idUsuario, $email, $senha, $nome, $ativo);
		$result = $this->usuario->delete();
		echo $result;
	}

	public function file(){

	}
}

new CtrlUsuario();
?>