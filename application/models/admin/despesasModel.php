<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class despesasModel extends CI_Model {
	
	public function insert($tabela, $data) {
		$result = $this->db->insert($tabela, $data);
		return $result;
	}

	public function insertItem($tabela, $data) {
		$this->db->insert($tabela, $data);
		$id = $data['idLanc'];
		$valorInserir = $data['valor'];
		$result = $this->db->query("select Valor from lancamentos where idLancamento = $id")->result();
		$result2 = $this->db->query("select ValorSaldo from saldo where id = 1")->result();
		foreach ($result as $r) {
			$valorTotal = $valorInserir + $r->Valor;
		}

		foreach ($result2 as $r2) {
			$valorSaldo = $r2->ValorSaldo;
		}
		$ValorSubtraido = $valorSaldo - $valorInserir;
		$this->db->query("UPDATE saldo SET ValorSaldo = $ValorSubtraido WHERE id = 1");
		$this->db->query("UPDATE lancamentos SET Valor = $valorTotal WHERE idLancamento = $id");

	}

	public function updateItem($data, $idItem, $id) {

		$novoValorItem = $data['valor'];

		$result1 = $this->db->query("select valor from item where idItem = $idItem")->result();

		foreach ($result1 as $r1) {
			$valorAnteriorItem = $r1->valor;
		}

		$result3 = $this->db->query("select Valor from lancamentos where idLancamento = $id")->result();
		
		foreach ($result3 as $r3) {
			$valorLanc = $r3->Valor;
		}

		$result4 = $this->db->query("select ValorSaldo from saldo where id = 1")->result();

		foreach ($result4 as $r4) {
			$valorSaldo = $r4->ValorSaldo;
		}

		$valorInserirLancamento = $valorLanc + ($novoValorItem - $valorAnteriorItem);
		$valorInserirSaldo = $valorSaldo - ($novoValorItem - $valorAnteriorItem);
		
		$this->db->query("UPDATE saldo SET ValorSaldo = $valorInserirSaldo WHERE id = 1");
		$this->db->query("UPDATE lancamentos SET Valor = $valorInserirLancamento WHERE idLancamento = $id");
		$this->db->where('idItem', $idItem);
		$this->db->update('item', $data);

	}
	public function updateReceita($data, $idReceita) {
		
		$novoValorReceita = $data['valor'];

		$result1 = $this->db->query("select valor from receita where idReceita = '$idReceita'")->result();

		foreach ($result1 as $r1) {
			$valorAnteriorReceita = $r1->valor;
		}

		$result4 = $this->db->query("select ValorSaldo from saldo where id = 1")->result();

		foreach ($result4 as $r4) {
			$valorSaldo = $r4->ValorSaldo;
		}

		$valorInserirSaldo = $valorSaldo + ($novoValorReceita - $valorAnteriorReceita);
		
		$this->db->query("UPDATE saldo SET ValorSaldo = $valorInserirSaldo WHERE id = 1");

		$this->db->where('idReceita', $idReceita);
		$this->db->update('receita', $data);
		
	}

	public function updateLancamento($data, $idLancamento) {
		
		$this->db->where('idLancamento', $idLancamento);
		$this->db->update('lancamentos', $data);
		
	}

	public function insertReceita($tabela, $data) {
		$this->db->insert($tabela, $data);
		$valor = $data['valor'];
		$result = $this->db->query("select ValorSaldo from saldo WHERE id = '1'")->result();

		foreach ($result as $res) {
			$valorSaldo = $res->ValorSaldo;
		}

		$valorAdicionado = $valorSaldo + $valor;
		$this->db->query("UPDATE saldo SET ValorSaldo = $valorAdicionado WHERE id = 1");
	}

	public function deleteReceita($tabela, $idReceita) {
		$result1 = $this->db->query("select valor from $tabela where idReceita = $idReceita")->result();
		foreach ($result1 as $r) {
			$valorReceita = $r->valor;
		}

		$result = $this->db->query("select ValorSaldo from saldo where id = 1")->result();

		$this->db->where('idReceita', $idReceita);
		$this->db->delete($tabela);

		foreach ($result as $res) {
			$valorSaldo = $res->ValorSaldo;
		}
		$valorTotal = $valorSaldo - $valorReceita;
		$this->db->query("UPDATE saldo SET ValorSaldo = $valorTotal WHERE id = 1");
	}
	public function deleteLancamento($tabela,$idLancamento) {
		$result = $this->db->query("select idItem from item where idLanc = $idLancamento")->result();

		foreach ($result as $r) {
			$this->deleteItem('item', $r->idItem);
		}
		$this->db->where('idLancamento', $idLancamento);
		$this->db->delete($tabela);
	}

	public function deleteItem($tabela, $idItem) {

		$result1 = $this->db->query("select idLanc from item where idItem = $idItem")->result();
		foreach ($result1 as $r) {
			$idLancamento = $r->idLanc;
		}

		$result = $this->db->query("select Valor from lancamentos where idLancamento = $idLancamento")->result();
		$result2 = $this->db->query("select valor from item where idItem = $idItem")->result();
		$result3 = $this->db->query("select ValorSaldo from saldo where id = 1")->result();

		$this->db->where('idItem', $idItem);
		$this->db->delete($tabela);

		foreach ($result as $res) {
			$valorLanc = $res->Valor;
		}

		foreach ($result2 as $re) {
			$valorSubtrai = $re->valor;
		}

		foreach ($result3 as $r3) {
			$valorSaldo = $r3->ValorSaldo;
		}
		echo "<script>alert('kkkkk')</script>";

		$valorAdicionado = $valorSaldo + $valorSubtrai;

		$valorTotal = $valorLanc - $valorSubtrai;

		$this->db->query("UPDATE saldo SET ValorSaldo = $valorAdicionado WHERE id = 1");

		$this->db->query("UPDATE lancamentos SET Valor = $valorTotal WHERE idLancamento = $idLancamento");

		return $idLancamento;
	}

	public function get_lancamentos() {

		$result = $this->db->query("Select * FROM lancamentos")->result();
		return $result;
	}

	public function get_lancamentos_data($data) {

		$result = $this->db->query("Select * FROM lancamentos where data = '$data'")->result();
		return $result;
	}

	public function get_data($mes,$ano) {

		$result = $this->db->query("Select distinct l.data, COALESCE(SUM(l.Valor), 0) AS valor FROM lancamentos as l where YEAR(l.data) = $ano AND MONTH(l.data) = $mes GROUP BY l.data desc")->result();
		return $result;
	}

	public function get_receitas($mes, $ano) {

		$result = $this->db->query("Select * FROM receita where year(data) = '$ano' and month(data) = '$mes'")->result();
		return $result;
	}

	public function get_receita($id) {

		$result = $this->db->query("Select * FROM receita where idReceita = '$id'")->result();
		return $result;
	}


	public function get_lancamento($idLancamento) {

		$result = $this->db->query("Select * FROM lancamentos where idLancamento = $idLancamento")->result();
		return $result;
	}

	public function get_item($idItem) {

		$result = $this->db->query("Select * FROM item where idItem = $idItem")->result();
		return $result;
	}

	public function get_itens($codigo) {
		//$this->db->join('tipos', 'cod_tipo = tipos_cod_tipo', 'inner');
		//$this->db->where('cod_noticia', $codigo);
		//$result = $this->db->get('noticias')->result();

		$result = $this->db->query("Select l.idLancamento, l.descricaoL,l.data, i.* from lancamentos as l inner join item as i on l.idLancamento = i.idLanc where l.idLancamento = '$codigo'")->result();
		return $result;
		
	}

	public function get_Saldo() {

		$result = $this->db->query("Select * FROM saldo")->result();
		return $result;
	}

}
