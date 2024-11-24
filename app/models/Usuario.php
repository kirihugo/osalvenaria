<?php

namespace app\models;

require_once  dirname( __DIR__ , 1).'/config.php';

use app\core\DBQuery;
use app\core\Where;


class Usuario {

	private $idUsuario;
	private $email;
	private $senha;
	private $nome;
	private $ativo;

	private $tableName  = "hostdeprojetos_osalvenaria.usuarios";
	private $fieldsName = "idUsuario, email, senha, nome, ativo";
	private $fieldKey   = "idUsuario";
	private $dbquery     = null;

	function __construct(){
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate( $idUsuario, $email, $senha, $nome, $ativo){

		 $this->setIdUsuario( $idUsuario );
		 $this->setEmail( $email );
		 $this->setSenha( $senha );
		 $this->setNome( $nome );
		 $this->setAtivo( $ativo );
	}

	public function toArray(){
		 return array(
			 'idUsuario' => $this->getIdUsuario(),
			 'email' => $this->getEmail(),
			 'senha' => $this->getSenha(),
			 'nome' => $this->getNome(),
			 'ativo' => $this->getAtivo(),
		);
	}

	public function toJson(){
		return( json_encode( $this->toArray() ));
	}

	public function toString(){
		 return("\n\t\t\t". implode(", ",$this->toArray()));
	}


	public function save() {
		if($this->getIdUsuario() == 0){
			return( $this->dbquery->insert($this->toArray()));
		}else{
			return( $this->dbquery->update($this->toArray()));
		}
	}

	public function listAll() {
		    $rSet = $this->dbquery->select();
		    return( $rSet );
	}

	public function listByFieldKey( $value ){
		    $where = (new Where())->addCondition('AND', $this->fieldKey , '=', $value);
		    $rSet = $this->dbquery->selectWhere($where);
		    return( $rSet );
	}
	
	public function listByField($fieldName, $value) {
	    // Cria uma condição WHERE usando o campo dinâmico
	    $where = new Where();
	    $where->addCondition('AND', $fieldName, '=', $value);
	    
	    // Chama o DBQuery passando as condições de WHERE
	    $rSet = $this->dbquery->selectWhere($where);
	    
	    return $rSet;
	}
	

	public function delete() {
		if($this->getIdUsuario() != 0){
			return( $this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdUsuario( $idUsuario ){
		 $this->idUsuario = $idUsuario;
	}

	public function getIdUsuario(){
		  return( $this->idUsuario );
	}

	public function setEmail( $email ){
		 $this->email = $email;
	}

	public function getEmail(){
		  return( $this->email );
	}

	public function setSenha( $senha ){
		 $this->senha = $senha;
	}

	public function getSenha(){
		  return( $this->senha );
	}

	public function setNome( $nome ){
		 $this->nome = $nome;
	}

	public function getNome(){
		  return( $this->nome );
	}

	public function setAtivo( $ativo ){
		 $this->ativo = $ativo;
	}

	public function getAtivo(){
		  return( $this->ativo );
	}

}


?>