<?php
defined('BASEPATH') or exit('No direct script access allowed');


require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// LIST MODEL
		$this->load->model('master_model');

		// LIST LIBRARY
		$this->load->library('form_validation');
		$this->load->library('session');

		// LIST HELPER
		$this->load->helper('url_helper');

		// DATABSE INIT
		$this->load->database();


	}
	// email
	public function nomor_induk()
	{
		return $this->session->userdata('nomor_induk');
	}
	// USER
	public function user()
	{
		return $this->db->get_where('user', ['nomor_induk' => $this->nomor_induk()])->row_array();
	}

	// CHECK user
	public function check_user()
	{
		if (empty($this->nomor_induk())) {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">
				Oupps, Kamu belum Login!
				</div>'
			);
			redirect('auth');
		}
	}

	public function search_logic()
	{
		// SEARCHING
		// GET KEYWORD
		if ($this->input->post('submit')) {
			return $data['keyword'] = $this->input->post('keyword');
		}
		return $data['keyword'] = 	null;

	}



	public function infoData($title)
	{
		return [
			'title' => $title,
			'selected_dash' => "active",
			'user_login' => $this->user()
		];
	}

	public function notif_simpan()
	{
		return $this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
			Data Disimpan.
		</div>');
	}

	public function notif_Hapus()
	{
		return $this->session->set_flashdata(
			'message',
			'<div class="alert alert-danger" role="alert">
			Data Dihapus.
		</div>');
	}
	public function notif_update()
	{
		return $this->session->set_flashdata(
			'message',
			'<div class="alert alert-primary" role="alert">
			Data Diupdate.
		</div>');
	}


	public function index()
	{
		$this->check_user();
		$data = $this->infoData('SISTEM INFORMASI AKADEMIK (SIMAK) PIKSI GANEHSA');
		$this->view_template('admin/dashboard', $data);
	}

	public function me()
	{
		$this->check_user();

		$data = $this->infoData('My Profile');

		$this->view_template('admin/admin_profile', $data);
	}

	public function admin_list()
	{
		$this->check_user();
		$data = $this->infoData('List Admin');


		$data['admin_list'] = $this->db->get('user')->result_array();

		$this->view_template('admin/admin_list', $data);
	}


	// view per menu
	public function edit_admin($id)
	{
		$this->check_user();
		$data = $this->infoData("Edit Data Admin");

		$data['item'] = $this->belajar_model->get_data($id, 'user');

		$this->view_template('admin/edit_admin', $data);
	}


	public function update_admin()
	{
		$this->check_user();

		$data = $this->post_content('admin');

		if ($this->form_validation->run() === FALSE) {
			redirect('dashboard/admin_list');
		} else {
			$where = array('id' => $this->input->post('id'));

			$this->belajar_model->update_data($where, $data, 'user');
			$this->notif_update();
			redirect('dashboard/admin_list');
		}
	}
	public function destroy_admin($id)
	{
		$this->check_user();

		$this->belajar_model->destroy_data($id, 'user');
		$this->notif_Hapus();
		redirect('dashboard/admin_list');
	}

	// ===================================================
	/*
      DASHBOARD CONTROLLER IS A FLEXSIBLE DESIGN MODEL FOR
      VIEW AND DATA FLOW, HOPE ALWAYS SIMPLE AND EVERY
      FUCTION CODE IS RESUSABLE FIRST. THINK FIRST.
    */
	// ====================================================


	// View Template every dashboard
	public function view_template($content, $data)
	{
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('templates/dashboard_sidebar', $data);
		$this->load->view('templates/dashboard_topbar', $data);
		$this->load->view($content, $data);
		$this->load->view('templates/dashboard_footer');
	}


	// save content
	public function post_content($table)
	{
		// Get all column name of table
		$columns = $this->master_model->getListField($table);

		// declarate null array
		$arr = [];

		// Loop every single column name
		foreach ($columns as $column) {
			// when column name id, email, image, pass, data_created, skip it.
			if (
				$column === 'id' ||
				$column === 'email' ||
				$column === 'image' ||
				$column === 'password' ||
				$column === 'date_created'
			) {
				continue;
			}
			// replace all underscore from column, it's for label in notiv
			$label = ucfirst(str_replace('_', ' ', $column));


			// push every single value to array variable
			$arr += array($column => $this->input->post($column));
		}

		return $arr;
	}


	// Notif is notification for every CRUD Proses
	public function notif($status, $label)
	{
		return $this->session->set_flashdata(
			'message',
			shell_exec("<div class=\"alert alert-\$status\" role=\"alert\">\n      Data \$label.\n    </div>")
		);
	}


	// ===================== CRUDS ========================
	/*
       THIS CONTROLLER I WANT, IT'S FLEXIBLE FOR MANY VIEW
       AND MODEL. KEEP SIMPLE, CLEAN AND BEAUTIFUL CODE,
       HOPE EVERY PROGRAMMER HAS BEAUTIFUL SYTAX
    */
	// ====================================================


	// READ
	public function show($info)
	{
		// check user session
		$this->check_user();

		// ================================================
		/*
           because every data using table name in db, i want
           used with every title menu & it's capital
           first eg : p_hotel -> Piutang Hotel

           ================================================

           url mean, change $info to spesific view in db
           every url set to nameFolder/nameFile.php
        */
		// ================================================


		// replace all underscore from column, it's for title
		$title = ucfirst(str_replace('_', ' ', $info));

		// null url variable for take folder & file

		$url = $info . '/' . $info;

		// take title for showing in view
		$data = $this->infoData('Manage data ' . $title);

		// ============= SEARCHING LOGIC =================
		// get data from post keyword form in view for searching
		$search = $this->input->post('keyword');
		if ($search)
		{
			$this->session->set_userdata('keyword', $search);
		} else {
			$search = $this->session->userdata('keyword');
		}

		// =============== PAGINATION ===================


		$this->load->library('pagination');

		$config['base_url']  = 'http://localhost/simak_ci/dashboard/show/' . $info;
		$config['total_rows'] = $this->master_model->getCountRows($info, $search);
		$config['per_page'] = 10;
		$config['start'] = $this->uri->segment(4);

		// Initiol
		$this->pagination->initialize($config);

		// is default for showing all data
		$query = $this->master_model->get_data($info, null,null,null,null, $config['per_page'], $config['start']);
		// Logic if Searching not null
		if ($search != null) {
			$query = $this->master_model->get_data($info, null, null, $search, null, $config['per_page'], $config['start']);
		}
		// =========== END OF SEARCING LOGIC =============


		// ============= ORDER BY LOGIC ==================
		// get data from post order_by form in view
		$order_by = $this->input->post('order_by');
		// Logic if order_by not null
		if ($order_by !== null && $order_by !== 'Urutkan Berdasarkan') {
			if ($order_by)
			{
				$this->session->set_userdata('order', $order_by);
			} else {
				$order_by = $this->session->userdata('order');
			}
			$query = $this->master_model->get_data($info, null, $order_by, null, null, $config['per_page'], $config['start']);
		}
		// ========= END OF ORDER BY LOGIC ===============


		// ============== FILTER LOGIC ===================
		// Get all field name
		$columns = $this->master_model->getListField($info);

		// Declarate filter variable null array
		$filterData = [];

		$filterColumn = "";

		// Looping all field name
		foreach ($columns as $column) {
			// Put column to post data
			$filterColumn = $this->input->post($column);

			// If $filterColumn not null, add data!
			if ($filterColumn !== null) {
				$filterData += array($column => $filterColumn);
			}
		}


		if (!empty($filterData)) {
			// query
			$query = $this->master_model->get_data($info, null, null, null, $filterData, $config['per_page'], $config['start']);
		}

		// ========== END OF FILTER LOGIC ================

		// get query
		$data[$info] = $query;
		if ($info === 'mahasiswa') {
			$ch = curl_init('https://api.first.org/data/v1/countries');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			$data['countries'] = json_decode($result, true, 512, JSON_THROW_ON_ERROR)['data'];
		}
		if($this->input->post('reset'))
		{
			$this->session->unset_userdata('keyword');
		}

		// view
		$this->view_template('dashboard/' . $url, $data);
	}

	// EDIT
	public function show_one($id, $info)
	{
		// check user session
		$this->check_user();

		$title = ucfirst(str_replace('_', ' ', $info));

		$url = $info . '/one_' . $info;

		$data = $this->infoData("Data $title");

		$data['item'] = $this->master_model->get_data($info, $id);

		$this->view_template('dashboard/' . $url, $data);
	}


	// CREATE
	public function create($info)
	{
		$this->check_user();

		$data = $this->post_content($info);

		$this->master_model->set_data($data, $info);
		redirect('dashboard/show/' . $info);
	}


	// EDIT
	public function edit($id, $info)
	{
		// check user session
		$this->check_user();

		$title = ucfirst(str_replace('_', ' ', $info));

		$url = $info . '/edit_' . $info;

		$data = $this->infoData("Edit Data $title");

		$data['item'] = $this->master_model->get_data($info, $id);
		if ($info === 'mahasiswa') {
			$ch = curl_init('https://api.first.org/data/v1/countries');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			$data['countries'] = json_decode($result, true, 512, JSON_THROW_ON_ERROR)['data'];
		}

		$this->view_template('dashboard/' . $url, $data);
	}


	// UPDATE
	public function update($info)
	{
		$this->check_user();

		$data = $this->post_content($info);
		$where = array('id' => $this->input->post('id'));
		if ($info === "mahasiswa") {
			$where = array('no_daftar' => $this->input->post('no_daftar'));
		} else if ($info === "prodi") {
			$where = array('id_prodi' => $this->input->post('id_prodi'));
		}

		$this->master_model->update_data($where, $data, $info);

		redirect('dashboard/show/' . $info);
	}


	// DESTROY

	public function destroy($id, $info)
	{
		$this->check_user();

		$this->master_model->destroy_data($id, $info);
		redirect('dashboard/show/' . $info);
	}

	// REPORT
	public function report($info)
	{
		// check user session
		$this->check_user();


		// ================================================
		/*
           because every data using table name in db, i want
           used with every title menu & it's capital
           first eg : p_hotel -> Piutang Hotel
           ================================================
           url mean, change $info to spesific view in db
           every url set to nameFolder/nameFile.php
        */
		// ================================================

		// replace all underscore from column, it's for title
		$title = ucfirst(str_replace('_', ' ', $info));

		// is default for showing all data
		$query = $this->master_model->get_data($info);

		if (strpos($info, 'p_') !== false) {
			$title = str_replace('P', 'Piutang ', $title);
		} elseif (strpos($info, 's_') !== false) {
			$title = str_replace('S', 'Stok ', $title);
		} elseif (strpos($info, 'bb') !== false) {
			$title = str_replace('Bb', 'Begining Balance (BB) ', $title);
		} elseif (strpos($info, 'hpp') !== false) {
			$title = str_replace('Hpp', 'HPP', $title);
		}

		// take title for showing in view
		$data = $this->infoData('Laporan ' . $title);

		// ============== FILTER LOGIC ===================
		// Get all field name
		$columns = $this->master_model->getListField($info);

		// Declarate filter variable null array
		$filterData = [];
		$filterColumn = "";

		// Looping all field name
		foreach ($columns as $column) {
			// Put column to post data
			$filterColumn = $this->input->post($column);

			// If $filterColumn not null, add data!
			if ($filterColumn != null) {
				$filterData += array($column => $filterColumn);
			}
		}

		if (!empty($filterData)) {
			// query
			$query = $this->master_model->get_data($info, null, null, null, $filterData);
		}

		// ========== END OF FILTER LOGIC ================


		// get query
		$data[$info] = $query;

		if ($info == 'laba_rugi' || $info == 'laporan_is' || $info == 'laporan_Rin_RL' || $info ==  'laporan_Rin_Ner') {
			$this->load->view('dashboard/report/' . $info, $data);
		} else {
			// view
			$this->load->view('dashboard/report/header', $data);
			$this->load->view('dashboard/report/' . $info, $data);
			$this->load->view('dashboard/report/footer');
		}
	}

	// ======================================================

	// export excel
	public function export($table)
	{
		ini_set("memory_limit",'6000M');
		$data = $this->master_model->getJustData($table);
		$spreadsheet = new Spreadsheet;
		$tables = $this->master_model->getListField($table);

		$alpa = 'A';

		foreach ($tables as $item)
		{
			$spreadsheet->setActiveSheetIndex(0)->setCellValue($alpa . '1', $item);

			$alpa++;
		}

		$kolom = 2;
		$alpa2 = 'A';
		$i = 0;
		foreach($data as $item)
		{
			foreach ($tables as $col)
			{
				$spreadsheet->setActiveSheetIndex(0)->setCellValue($alpa2 . $kolom, $item[$col]);

				if ($col !== end($tables))
				{
					$alpa2++;
				} else {
					$alpa2 = 'A';
				}
				$i++;
			}
			$kolom++;
		}


		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="REKAP DATA ' .  $table  .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}


}
