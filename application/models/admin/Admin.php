<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

	public function insert('Admin', $data) {
		$this->db->insert($tabela, $data);
		$result = $this->db->query("SELECT idAdmin FROM Admin ORDER BY idAdmin DESC LIMIT 1");

		foreach ($result as $r) {
			$id = $r->idAdmin;
		}
		$this->db->query("INSERT INTO `Saldo`(`idAdmin`) VALUES ('$id')");
		
		return $result;
	}
}
	