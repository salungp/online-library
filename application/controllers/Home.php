<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('HomeModel');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('session');	
		$this->db->order_by('id', 'DESC');
	}

	public function index()
	{
		$data['buku'] = $this->HomeModel->set_buku();
		
		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function status()
	{
		$data['buku'] = $this->db->get_where('buku', ['status' => 0])->result_array();

		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function kategori($kategori)
	{
		$data['buku'] = $this->db->get_where('buku', ['kategori' => $kategori])->result_array();

		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id = null)
	{
		$buku = $this->db->get_where('buku', [
			'id' => $id
		])->row_array();

		if ($buku['id'] == $id)
		{
			$data['buku'] = $buku;

			$this->db->limit(5);
			$this->db->order_by('id', 'DESC');
			$data['semua_buku'] = $this->db->get('buku')->result_array();

			$this->load->view('templates/header');
			$this->load->view('home/detail', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('home/detail_error');
			$this->load->view('templates/footer');
		}
	}

	public function cari()
	{
		$data['buku'] = $this->HomeModel->set_buku();
		if ($this->input->get('cari'))
		{
			$data['buku'] = $this->HomeModel->cari_buku();
		}
		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function pinjam()
	{
		$user = $this->input->post('user');
		$buku = $this->input->post('buku');
		$waktu = $this->input->post('waktu');
		$id = $this->input->post('id');

		if ($waktu == 'jam')
		{
			$lama_pinjam = $this->input->post('lama_pinjam') + date('G');
		} else if ($waktu == 'hari')
		{
			$lama_pinjam = $this->input->post('lama_pinjam') + date('j');
		}

		if ($waktu == 'hari' && $this->input->post('lama_pinjam') > 10) {
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Buku gagal dipinjam!, karena anda meminjam lebih dari 10 hari.</div>");
			redirect('detail/' . $id);
		} elseif ($waktu == 'jam' && $this->input->post('lama_pinjam') > 24) {
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Buku gagal dipinjam!, karena anda meminjam lebih dari 24 jam.</div>");
			redirect('detail/' . $id);
		} else {

			$user_data = $this->db->get_where('users', ['name' => $user])->row_array();
			$buku_data = $this->db->get_where('buku', ['judul' => $buku])->row_array();
			if ($user)
			{
				$this->db->insert('daftar_peminjam', [
					'nama' => $user,
					'email' => $user_data['email'],
					'buku' => $buku,
					'lama_pinjam' => $lama_pinjam,
					'atribut' => $waktu
				]);
				$this->db->where('judul', $buku);
				$this->db->update('buku', [
					'jumlah_peminjam' => $buku_data['jumlah_peminjam'] + 1,
					'status' => 1
				]);
				$this->session->set_flashdata('message', "<div class='alert alert-success'>Buku berhasil dipinjam!</div>");
				redirect('profile');
			}
		}
	}

	public function kembalikan()
	{
		$user = $this->input->post('user');
		$buku = $this->input->post('buku');

		if ($user)
		{
			$this->db->where([
				'nama' => $user,
				'buku' => $buku
			]);
			$this->db->delete('daftar_peminjam');

			$this->db->where('judul', $buku);
			$this->db->update('buku', [
				'status' => 0
			]);

			$this->session->set_flashdata('message', "<div class='alert alert-success'>Buku berhasil dikembalikan!</div>");
			redirect('profile');
		}

	}

	public function donasi()
	{
		$this->load->view('templates/header');
		$this->load->view('home/donasi');
		$this->load->view('templates/footer');
	}
}