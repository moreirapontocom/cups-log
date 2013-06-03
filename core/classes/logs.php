<?php
include_once('main.php');

class Logs extends Cupslog {

	public function get_log() {
		include($this->connection);

		$this->query = "SELECT * FROM jobs ORDER BY data_impressao DESC";
		$rs = $db->Execute($this->query);
		if ( $rs ){
			
			$totalResults = $rs->RecordCount();
			if ( $totalResults > 0 ) {
				
				while ( !$rs->EOF ) {
					$codigo			= $rs->fields['codigo'];
					$impressora		= $rs->fields['impressora'];
					$usuario		= $rs->fields['usuario'];
					$cupsid			= $rs->fields['cupsid'];
					$data_impressao	= $rs->fields['data_impressao'];
					$pages			= $rs->fields['pages'];
					$ip				= $rs->fields['ip'];
					$nome_documento	= $rs->fields['nome_documento'];

					$results[] = array(
						'codigo'			=> $codigo,
						'impressora'		=> $impressora,
						'usuario'			=> $usuario,
						'cupsid'			=> $cupsid,
						'data_impressao'	=> $data_impressao,
						'pages'				=> $pages,
						'ip'				=> $ip,
						'nome_documento'	=> $nome_documento
					);

					$rs->MoveNext();
				}

				return $results;
				
			} else
				return 0;

		} else
			return false;
	}




	public function get_printers() {
		include($this->connection);

		$this->query = "SELECT impressora FROM jobs GROUP BY impressora ORDER BY impressora ASC";
		$rs = $db->Execute($this->query);
		if ( $rs ){

			$totalResults = $rs->RecordCount();
			if ( $totalResults > 0 ) {

				while ( !$rs->EOF ) {
					$impressora		= $rs->fields['impressora'];

					$results[] = array(
						'impressora'		=> $impressora,
					);

					$rs->MoveNext();
				}

				return $results;
				
			} else
				return 0;

		} else
			return false;
	}
	
	
	
	public function get_users() {
		include($this->connection);

		$this->query = "SELECT usuario FROM jobs GROUP BY usuario ORDER BY usuario ASC";
		$rs = $db->Execute($this->query);
		if ( $rs ){

			$totalResults = $rs->RecordCount();
			if ( $totalResults > 0 ) {

				while ( !$rs->EOF ) {
					$usuario		= $rs->fields['usuario'];

					$results[] = array(
						'usuario'		=> $usuario,
					);

					$rs->MoveNext();
				}

				return $results;
				
			} else
				return 0;

		} else
			return false;
	}
	
	
	var $printer;
	var $user;
	var $date_from;
	var $date_to;

	public function report() {
		include($this->connection);

		if ( !empty($this->printer) && !empty($this->user) && !empty($this->date_from) && !empty($this->date_to) ) {
				
				
				
			if ( $this->printer == '*' )
				$query_printer = " AND impressora <> '' ";
			else
				$query_printer = " AND impressora = '".$this->printer."' ";

			if ( $this->user == '*' )
				$query_user = " AND usuario <> '' ";
			else
				$query_user = " AND usuario = '".$this->user."' ";
			
			echo $this->query = "
				SELECT * FROM jobs 
				WHERE data_impressao BETWEEN '".$this->date_from."' AND '".$this->date_to."' 
				".$query_printer."
				".$query_user."
				ORDER BY data_impressao ASC";
			$rs = $db->Execute($this->query);
			if ( $rs ) {
				$totalResults = $rs->RecordCount();
				if ( $totalResults > 0 ) {
					while ( !$rs->EOF ) {
						$codigo			= $rs->fields['codigo'];
						$impressora		= $rs->fields['impressora'];
						$usuario		= $rs->fields['usuario'];
						$cupsid			= $rs->fields['cupsid'];
						$data_impressao	= $rs->fields['data_impressao'];
						$pages			= $rs->fields['pages'];
						$ip				= $rs->fields['ip'];
						$nome_documento	= $rs->fields['nome_documento'];
	
						$results[] = array(
							'codigo'			=> $codigo,
							'impressora'		=> $impressora,
							'usuario'			=> $usuario,
							'cupsid'			=> $cupsid,
							'data_impressao'	=> $data_impressao,
							'pages'				=> $pages,
							'ip'				=> $ip,
							'nome_documento'	=> $nome_documento
						);

						$rs->MoveNext();
					}
	
					return $results;

				} else
					return 0;
			} else
				return false;
			
		}
	}



}
?>