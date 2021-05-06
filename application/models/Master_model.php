<?php

class Master_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ==================================================
	/*
      MASTER MODEL IS A FLEXSIBLE DESIGN MODEL FOR CRUD
      AND SPESIFIC PROCESS DATA, HOPE ALWAYS SIMPLE
      AND EVERY FUCTION CODE IS RESUSABLE FIRST.
      THINKING FIRST, AND START TYPING FOR.
    */
	// ==================================================


	// DASHBOARD AREA
	public function get_data($table, $id = null, $order_by = null, $keyword = null, $filter = null, $limit = null, $start = null)
	{
		//  default Take All data
		$rowKey = "id";
		if ( $table === "mahasiswa") {
			$rowKey = "no_daftar";
		} else if  ($table === "prodi"){
			$rowKey = "id_prodi";
		}
		$query = $this->db->order_by($rowKey, 'DESC')->limit($limit, $start)->get($table);

		if ($id !== null) {
			return $this->db->get_where($table, array($rowKey => $id))->result()[0];
		}

		// Logic for searching keyword
		if ($keyword !== null) {
			// Default Column value

			$column = "";
			if ($table === "mahasiswa") {
				$column = "nama_lengkap";
			} else if ($table === "prodi") {
				$column = "nama_prodi";
			}

			// final query for spesific data
			$query = $this->db->like($column, $keyword)->limit($limit, $start)->get($table);
		}

		// Logic for get Orderby
		if ($order_by !== null) {
			$query = $this->db->order_by($order_by, 'DESC')->limit($limit, $start)->get($table);
		}


		// Logic for get data with order
		if ($filter !== null) {

			// Looping data
			foreach ($filter as $key => $value) {

				$this->db->like($key, $value);
			}
			$query = $this->db->limit($limit, $start)->get($table);
		}
		return $query->result_array();
	}



	public function set_data($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	public function destroy_data($id, $table)
	{
		// get id data
		$this->db->where($table === 'mahasiswa' ? 'no_daftar' : 'id' , $id);

		// delete it
		return $this->db->delete($table);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
	}


	// Get last data from table
	public function getLastData($field, $tabel)
	{
		// SQL Logic
		$this->db->select("*");
		$this->db->from($tabel);
		$this->db->order_by($tabel === 'mahasiswa' ? 'no_daftar' : 'id', 'DESC');

		$this->db->limit(1);
		// just get spesific field what where showing
		return $this->db->get()->result_array()[0][$field];
	}

	// Get Spesific data
	public function getSpesific($table, $column, $id)
	{
		$query = $this->db->get_where($table, array($column => $id));
		return $query->row_array();
	}

	// Get spesific column value
	public function getColumnValue($table, $column)
	{
		$this->db->select($column);
		return $this->db->get($table)->result_array();
	}


	//    Get all table column name
	public function getListField($table)
	{
		return $this->db->list_fields($table);
	}


	public function calculateSaldo($debit, $kredit)
	{
		return $debit - $kredit;
	}

	public function kali($value1, $value2)
	{
		return $value1 * $value2;
	}

	public function totalSaldo($value1, $value2, $value3)
	{
		$kali  = $this->kali($value1, $value2);
		return $kali - ($kali * ($value3 / 100));
	}

	public function getSameVal($table, $id, $val, $column)
	{
		$kategori = $this->db->get_where($table, array($id => $val))->result();
		$result = 0;
		foreach ($kategori as $item) {
			$result += (int)$item->$column;
		}
		return $result;
	}

	public function getCountRows($table, $seach = null)
	{
		if ($seach) {
			$query = "";
			if ($seach === 'mahasiswa') {
				return $this->db->like("nama_lenkap", $seach)->get($table)->num_rows();
			}

			if ($seach === "prodi"){
				return $this->db->like("nama_prodi", $seach)->get($table)->num_rows();
			}
		}

		return $this->db->get($table)->num_rows();
	}

	public function getJustData($table)
	{
		$col = "";
		if ($table === "mahasiswa") {
			$col = "no_daftar";
		} else if ($table === "prodi") {
			$col = "nama_prodi";
		}
		$query = $this->db->order_by($col, 'DESC')->get($table);
		return $query->result_array();
	}
}
