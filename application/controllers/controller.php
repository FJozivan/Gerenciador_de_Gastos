<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('admin/despesasModel','', TRUE);

		$result['data']  = date('Y-m-d');
		$ano= date('Y');
		$mes = date('m');
		//echo "<script type=\"text/javascript\">alert('bla');</script>";
		$Sald['Saldo'] = $this->despesasModel->get_Saldo();
		$result['dados'] = $this->despesasModel->get_data($mes, $ano);
		$result['lancamentos'] = $this->despesasModel->get_lancamentos_data($result['data']);
		//$this->load->view('includes/topo');
		//$this->load->view('modais');
		//$this->load->view('login',$result);
		//$this->load->view('includes/rodape');

		$this->load->view('includes/topo');
		$this->load->view('includes/menu',$Sald);
		$this->load->view('modais');
		$this->load->view('paginaInicial',$result);
		$this->load->view('includes/rodape');

	}

	public function Filtro()
	{
		$this->load->model('admin/despesasModel','', TRUE);

		$Sald['Saldo'] = $this->despesasModel->get_Saldo();

		$ano= $this->input->post('ano');
		$mes = $this->input->post('mes');

		$opcao = 0;
		$opcao = $this->input->post('option');

		if($opcao == 1){
			$result['dados'] = $this->despesasModel->get_data($mes, $ano);
			$this->load->view('includes/topo');
			$this->load->view('includes/menu',$Sald);
			$this->load->view('modais');
			$this->load->view('filtroDespesas',$result);
			$this->load->view('includes/rodape');

		}else if($opcao == 2){
			$result['receitas'] = $this->despesasModel->get_receitas($mes, $ano);
			$this->load->view('includes/topo');
			$this->load->view('includes/menu',$Sald);
			$this->load->view('modais');
			$this->load->view('filtroReceitas',$result);
			$this->load->view('includes/rodape');

		}
	}

	public function lancamentos($data,$idlancamento)
	{
		$this->load->model('admin/despesasModel','', TRUE);
		$Sald['Saldo'] = $this->despesasModel->get_Saldo();
		$result['data']  = date('Y-m-d');
		$result['lancamentos'] = $this->despesasModel->get_lancamentos_data($data);
		$result['Editar'] = $this->despesasModel->get_lancamento($idlancamento);
		$this->load->view('includes/topo');
		$this->load->view('includes/menu',$Sald);
		$this->load->view('modais');
		$this->load->view('lancamento',$result);
		$this->load->view('includes/rodape');

	}

	public function Receitas($idReceita)
	{
		$this->load->model('admin/despesasModel','', TRUE);
		$Sald['Saldo'] = $this->despesasModel->get_Saldo();
		$result['data']  = date('Y-m-d');
		$result['receitas'] = $this->despesasModel->get_receitas(date('m'), date('Y'));
		$result['Editar'] = $this->despesasModel->get_receita($idReceita);
		$this->load->view('includes/topo');
		$this->load->view('includes/menu',$Sald);
		$this->load->view('modais');
		$this->load->view('receitas',$result);
		$this->load->view('includes/rodape');

	}

	public function verItens($idlancamento,$idItem)
	{
		$this->load->model('admin/despesasModel','', TRUE);
		$Sald['Saldo'] = $this->despesasModel->get_Saldo();
		$result['itens'] = $this->despesasModel->get_itens($idlancamento);
		$result['lancs'] = $this->despesasModel->get_lancamento($idlancamento);
		$result['Editar'] = $this->despesasModel->get_item($idItem);
		$this->load->view('includes/topo');
		$this->load->view('includes/menu',$Sald);
		$this->load->view('modais');
		$this->load->view('Itens',$result);
		$this->load->view('includes/rodape');

	}
	
	public function salvarlancamento() {
		$this->load->model('admin/despesasModel','', TRUE);

		$data['descricaoL'] = $this->input->post('desc');
		$data['data'] = $this->input->post('data');

		$result = $this->despesasModel->insert('lancamentos', $data);
		redirect('controller');
	}

	public function salvarItem() {
		$this->load->model('admin/despesasModel','', TRUE);

		$data['idLanc'] = $this->input->post('idL');
		$data['descricao'] = $this->input->post('desc');
		$data['valor'] = $this->input->post('valor');
		
		$a = $data['idLanc'];		
		$this->despesasModel->insertItem('item', $data);
		redirect("controller/verItens/$a/0");
	}

	public function salvarReceita() {
		$this->load->model('admin/despesasModel','', TRUE);

		$data['descricaoR'] = $this->input->post('descReceita');
		$data['valor'] = $this->input->post('valorReceita');
		$data['data'] = date('Y-m-d');

		$result = $this->despesasModel->insertReceita('receita', $data);
		redirect('controller');
	}

	public function deletarItem($idItem){
		$this->load->model('admin/despesasModel','', TRUE);
		$idlancamento = $this->despesasModel->deleteItem('item',$idItem);	
		redirect("controller/verItens/$idlancamento/0");
	} 

	public function deletarLancamento($idlancamento){
		$this->load->model('admin/despesasModel','', TRUE);
		$this->despesasModel->deleteLancamento('lancamentos',$idlancamento);	
		redirect("controller");
	}

	public function deletarReceita($idReceita){
		$this->load->model('admin/despesasModel','', TRUE);
		$this->despesasModel->deleteReceita('receita',$idReceita);	
		redirect("controller/Receitas/0");
	}

	public function listarLancamentos(){
		$this->load->model('admin/despesasModel','', TRUE);

		$result['lancamento'] = $this->despesasModel->get_lancamentos();
	}

	public function alterarLancamento(){

		$this->load->model('admin/despesasModel','', TRUE);

		$idLancamento = $this->input->post('idLancamento');

		$data['descricaoL'] = $this->input->post('desc');

		$a = $this->input->post('data');

		$this->despesasModel->updateLancamento($data,$idLancamento);	

		redirect("controller/lancamentos/$a/0");
	}

	public function alterarItem(){

		$this->load->model('admin/despesasModel','', TRUE);

		$idItem = $this->input->post('idItem');
		$idlancamento = $this->input->post('idLanc');
		$data['descricao'] = $this->input->post('desc');
		$data['valor'] = $this->input->post('valor');

		$this->despesasModel->updateItem($data, $idItem, $idlancamento);

		redirect("controller/verItens/$idlancamento/0");
	}

	public function alterarReceita(){

		$this->load->model('admin/despesasModel','', TRUE);

		$idReceita = $this->input->post('idReceita');
		$data['descricaoR'] = $this->input->post('desc');
		$data['valor'] = $this->input->post('valor');

		$this->despesasModel->updateReceita($data, $idReceita);

		redirect("controller/Receitas/0");
	}

	public function cadAdmin(){
		$this->load->model('admin/Admin','', TRUE);

		$dados['nomeAdmin'] = $this->input->post('desc');
		$dados['Email'] = $this->input->post('email');
		$dados['Senha'] = md5($this->input->post('senha'));

		$this->Admin->insert($dados);

		redirect("controller/Receitas/0");	
	}
}
