<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotes extends BaseController
{
	public Quotes_model $quotes;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Quotes_model', 'quotes');
	}

	public function index()
	{
		$quotes = $this->quotes->all();

		$csrf = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];

		$this->load->view('app/quotes', [
			'page' => 'Running Text',
			'quotes' => $quotes,
			'csrf' => $csrf,
		]);
	}

	public function insert()
	{
		$this->form_validation->set_rules([
			[
				'field' => 'quote',
				'label' => 'Quote',
				'rules' => 'required',
				'errors' => [
					'required' => 'Quote cannot be empty',
				],
			],
		]);

		if (!$this->form_validation->run()) {
			$failed = current($this->form_validation->error_array());
			$this->session->set_flashdata('failed', $failed);
			return redirect(current_url());
		}

		$quote = $this->input->post('quote');
		$insert = $this->quotes->insert(['quote' => $quote]);

		if ($insert) {
			$this->session->set_flashdata('success', 'Quote added successfully.');
			return redirect(current_url());
		}

		$this->session->set_flashdata('failed', 'Quote failed to add.');
		return redirect(current_url());
	}

	public function update($id)
	{
		$quote = $this->quotes->find($id);

		if (!$quote) {
			$this->session->set_flashdata('failed', 'Quote could not be found.');
			return redirect('screen/quotes');
		}

		$this->form_validation->set_rules([
			[
				'field' => 'quote',
				'label' => 'Quote',
				'rules' => 'required',
				'errors' => [
					'required' => 'Quote cannot be empty',
				],
			],
		]);

		if (!$this->form_validation->run()) {
			$failed = current($this->form_validation->error_array());
			$this->session->set_flashdata('failed', $failed);
			return redirect('screen/quotes');
		}

		$quote = $this->input->post('quote');
		$update = $this->quotes->update($id, ['quote' => $quote]);

		if ($update) {
			$this->session->set_flashdata('success', 'Quote updated successfully.');
			return redirect('screen/quotes');
		}

		$this->session->set_flashdata('failed', 'Quote failed to update.');
		return redirect('screen/quotes');
	}

	public function delete($id)
	{
		$delete = $this->quotes->delete($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Quote deleted successfully.');
			return redirect('screen/quotes');
		}

		$this->session->set_flashdata('failed', 'Quote failed to update.');
		return redirect('screen/quotes');
	}
}
