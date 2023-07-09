<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseModel extends CI_Model
{
	protected string $table;
	protected string $returnType = 'object';
	protected bool $useTimestamps = false;
	protected bool $useSoftDeletes = false;

	private function execute($method = 'row')
	{
		if ($this->returnType === 'object') {
			return $method;
		}

		return $method + '_array';
	}

	public function where($field, $value)
	{
		$this->db->where($field, $value);
		return $this;
	}

	public function all()
	{
		if ($this->useSoftDeletes) {
			$this->db->where('deleted_at IS NULL', null, false);
		}

		if ($this->useTimestamps) {
			$this->db->order_by('created_at', 'desc');
		}

		return $this->db->get($this->table)->{$this->execute('result')}();
	}

	public function find($id)
	{
		$this->db->where('id', $id);

		if ($this->useSoftDeletes) {
			$this->db->where('deleted_at IS NULL', null, false);
		}

		return $this->db->get($this->table)->{$this->execute('row')}();
	}

	public function findBy($column, $value)
	{
		$this->db->where($column, $value);

		if ($this->useSoftDeletes) {
			$this->db->where('deleted_at IS NULL', null, false);
		}

		return $this->db->get($this->table)->{$this->execute('row')}();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data = [])
	{
		if (gettype($id) !== 'array') {
			$this->db->where('id', $id);
		} else {
			$data = $id;
		}

		if ($this->useSoftDeletes) {
			$this->db->where('deleted_at IS NULL', null, false);
		}

		return $this->db->update($this->table, $data);
	}

	public function delete($id = null)
	{
		if ($id) {
			$this->db->where('id', $id);
		}

		if ($this->useSoftDeletes) {
			$this->db->where('deleted_at IS NULL', null, false);
		}

		return $this->db->update($this->table, ['deleted_at' => date('Y-m-d H:i:s')]);
	}
}
