<?php

class Master_model extends CI_Model
{
	public function __construct()
	{
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
	public function get_data($table, $id = null, $order_by = null, $keyword = null, $filter = null)
	{
		//  default Take All data
		$query = $this->db->order_by(($table === "mahasiswa") ? 'no_daftar' :'id', 'DESC')->limit(10)->get($table);

		if ($id != null) {
			return $this->db->get_where($table, array(($table === "mahasiswa") ? 'no_daftar' : 'id' => $id))->result()[0];
		}

		// Logic for searching keyword
		if ($keyword != null) {
			// Default Column value
			$column = ($table === 'mahasiswa') ? 'nama_lengkap' : '';

			// final query for spesific data
			$query = $this->db->like($column, $keyword)->get($table);
		}

		// Logic for get Orderby
		if ($order_by != null) {
			$query = $this->db->order_by($order_by, 'DESC')->get($table);
		}


		// Logic for get data with order
		if ($filter != null) {

			// Looping data
			foreach ($filter as $key => $value) {

				// kondition when spesific key
				if (
					strpos($table, 'kas') !== false ||
					$key == "tanggal_pembayaran" ||
					$key == "total_tagihan" ||
					$key == "id_barang" ||
					$key == "tanggal" ||
					$key == "debit" ||
					$key == "kredit" ||
					$key == "harga" ||
					$key == "jumlah"
				) {
					// gate order by
					$this->db->order_by($key, $value);
				} else {
					// get like data
					$this->db->like($key, $value);
				}
			}
			$query = $this->db->get($table);
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
}
