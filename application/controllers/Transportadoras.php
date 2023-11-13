<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transportadoras extends CI_Controller
{
	public function index()
	{
		$data = array(
			'transportadoras' => $this->core_model->get_all('transportadoras'),
		);

		$this->load->view('transportadoras/index', $data);
	}

	public function insert($table = null, $data = null)
	{
		if (!$this->input->post()) {
			redirect('/');
		}

		$data = elements(
			array(
				'tranid',
				'trancnpj',
				'tranrazaosocial',
				'tranendereco',
				'trannumero',
				'tranbairro',
				'trancidade',
				'tranestado',
			),
			$this->input->post()
		);

		$data = html_escape($data);

		if ($this->core_model->insert('transportadoras', $data)) {
			$this->session->set_flashdata('success', 'Dados salvos com sucesso!');
		} else {
			$this->session->set_flashdata('error', 'Erro ao salvar os dados!');
		}

		redirect($this->router->fetch_class());
	}

	public function edit()
	{
		if (!$this->input->post()) {
			redirect('/');
		}
		$data = elements(
			array(
				'tranid',
				'trancnpj',
				'tranrazaosocial',
				'tranendereco',
				'trannumero',
				'tranbairro',
				'trancidade',
				'tranestado',
			),
			$this->input->post()
		);

		$data = html_escape($data);

		$id = $this->input->post()['tranid'];

		if ($this->core_model->update('transportadoras', $data, 'tranid', $id)) {
			$this->session->set_flashdata('success', 'Alteração realizada com sucesso!');
		} else {
			$this->session->set_flashdata('error', 'Erro ao alterar os dados!');
		}

		redirect($this->router->fetch_class());

		echo '<pre>';
		print_r($this->input->post());
		exit();
	}

	public function delete()
	{
		if (!$this->input->post()) {
			redirect('/');
		}

		$id = $this->input->post()['tranid'];

		if ($this->core_model->delete('transportadoras', 'tranid', $id)) {
			$this->session->set_flashdata('success', 'Exclusão realizada com sucesso!');
		} else {
			$this->session->set_flashdata('error', 'Erro ao excluir os dados!');
		}

		redirect($this->router->fetch_class());

		echo '<pre>';
		print_r($this->input->post());
		exit();
	}
}
