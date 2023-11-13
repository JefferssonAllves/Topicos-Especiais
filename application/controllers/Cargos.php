<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cargos extends CI_Controller
{
	public function index()
	{
		$data = array(
			'cargos' => $this->core_model->get_all('cargos'),
		);

		$this->load->view('cargos/index', $data);
	}

	public function insert($table = null, $data = null)
	{
		if (!$this->input->post()) {
			redirect('/');
		}

		$data = elements(
			array(
                'cargid',
                'cargcodigo',
                'cargdescricao',
			),
			$this->input->post()
		);

		$data = html_escape($data);

		if ($this->core_model->insert('cargos', $data)) {
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

			),
			$this->input->post()
		);

		$data = html_escape($data);

		$id = $this->input->post()['cargoid'];

		if ($this->core_model->update('cargos', $data, 'cargoid', $id)) {
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

		$id = $this->input->post()['cargoid'];

		if ($this->core_model->delete('cargos', 'cargoid', $id)) {
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
