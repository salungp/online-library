<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('AuthModel');
		$this->load->helper(['form', 'url']);
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function login()
	{
		$data['title'] = 'Perpustakaan - Halaman Login';

		$this->load->view('auth/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('auth/auth_footer');
	}

	public function auth_login()
	{	
		$data['title'] = 'Perpustakaan - Halaman Login';

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('auth/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/auth_footer');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($user = $this->db->get_where('users', ['email' => $email])->row_array())
			{
				if (password_verify($password, $user['password']))
				{
					$this->session->set_userdata([
						'name' => $user['name'],
						'email' => $user['email'],
						'token' => $user['remember_token'],
						'logged_in' => TRUE
					]);

					header('location:' . base_url());

				} else {
					$this->session->set_flashdata('message', "<div class='alert alert-danger'>Maaf password yang anda inputkan salah!</div>");
					header('location:' . base_url('login'));
				}
			} else {
				$this->session->set_flashdata('message', "<div class='alert alert-danger'>Maaf email tidak terdaftar!</div>");
					header('location:' . base_url('login'));
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		header('location:' . base_url('login'));
	}

	public function profile()
	{
		$data['user_data'] = $this->db->get_where('users', ['name' => $_SESSION['name']])->row_array();
		$data['buku'] = $this->db->get_where('daftar_peminjam', ['nama' => $_SESSION['name']])->result_array();

		if (count($data['buku']) <=  0)
		{
			$data['jumlah_buku'] = 'Kosong';
		} else {
			$data['jumlah_buku'] = 'Jumlah Buku ' . count($data['buku']);
		}

		$this->load->view('templates/header');
		$this->load->view('profile', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$data['title'] = 'Perpustakaan - Halaman Registrasi';

		$this->load->view('auth/auth_header', $data);
		$this->load->view('auth/register');
		$this->load->view('auth/auth_footer');
	}

	public function auth_register()
	{
		$data['title'] = 'Perpustakaan - Halaman Registrasi';

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$nama = htmlspecialchars($this->input->post('name'));
		$email = htmlspecialchars($this->input->post('email'));
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$remember_token = $password;
		$create_at = date('Y-m-d H:i:s');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('auth/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('auth/auth_footer');
		} else {
			$this->db->insert('users', [
				'name' => $nama,
				'email' => $email,
				'email_verified_at' => '',
				'password' => $password,
				'remember_token' => $remember_token,
				'created_at' => $create_at,
				'updated_at' => '',
				'profile_image' => 'default.jpg'
			]);

			$this->session->set_flashdata('message', "<div class='alert alert-success'>Daftar berhasil silahkan login terlebih dahulu!</div>");
			header('location:' . base_url('login'));
		}
	}

	public function foto()
	{
		$config['upload_path']          = './assets/images/foto_profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 90000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Foto gagal diganti!,pastikan foto berekstensi png/jpg/gif.Atau foto sizenya terlalu besar!</div>");

            header('location:http://localhost/perpustakaan-online/profile');
        } else {
        	$user = $this->db->get_where('users', ['name' => $_SESSION['name']])->row_array();
        	$dir_file = './assets/images/foto_profile/' . $user['profile_image'];
        	
        	if ($user['profile_image'] == 'default.jpg')
        	{
        		$this->db->where('name', $_SESSION['name']);
	        	$this->db->update('users', [
	        		'profile_image' => $this->upload->data('file_name')
	        	]);

	        	$this->session->set_flashdata('message', "<div class='alert alert-success'>Foto berhasil di ganti!</div>");

            	header('location:http://localhost/perpustakaan-online/profile');
        	}
        	elseif ($user['profile_image'] != 'default.jpg' && unlink($dir_file))
        	{    	
	        	$this->db->where('name', $_SESSION['name']);
	        	$this->db->update('users', [
	        		'profile_image' => $this->upload->data('file_name')
	        	]);

	        	$this->session->set_flashdata('message', "<div class='alert alert-success'>Foto berhasil di ganti!</div>");

            	header('location:' . base_url('profile'));
        	}
        }
	}

	public function edit()
	{
		$data['user_data'] = $this->db->get_where('users', ['name' => $_SESSION['name']])->row_array();

		$this->load->view('templates/header');
		$this->load->view('edit_profile', $data);
		$this->load->view('templates/footer');
	}

	public function auth_edit()
	{
		$data['user_data'] = $this->db->get_where('users', ['name' => $_SESSION['name']])->row_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		$name = htmlspecialchars($this->input->post('name'));
		$email = htmlspecialchars($this->input->post('email'));

		if ($this->form_validation->run() == false)
		{
			$this->load->view('templates/header');
			$this->load->view('edit_profile', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->where('name', $_SESSION['name']);
			$this->db->update('users', [
				'name' => $name,
				'email' => $email
			]);

			$this->db->where('nama', $_SESSION['name']);
			$this->db->update('daftar_peminjam', [
				'nama' => $name
			]);

			$this->session->set_userdata([
				'name' => $name,
				'email' => $email,
				'logged_in' => TRUE
			]);

			$this->session->set_flashdata('message', "<div class='alert alert-success'>Data berhasil diubah!</div>");

            header('location:' . base_url('profile'));
		}
	}

	public function auth_donasi()
	{
		$user = $this->db->get_where('users', ['name' => $_SESSION['name']])->row_array();
		
		$judul = $this->input->post('judul');
		$penulis = $this->input->post('penulis');
		$penerbit = $this->input->post('penerbit');
		$deskripsi = $this->input->post('deskripsi');
		$kategori = $this->input->post('kategori');
		$jumlah_halaman = $this->input->post('jumlah_halaman');
		$jumlah_bab = $this->input->post('jumlah_bab');
		$waktu = date('Y-m-d H:i:s');
		$pesan = $this->input->post('pesan');

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
		if ($this->form_validation->run() == false)
		{
			$this->load->view('templates/header');
			$this->load->view('home/donasi');
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('buku', [
				'judul' => $judul,
				'pengarang' => $penulis,
				'penerbit' => $penerbit,
				'kategori' => $kategori,
				'jumlah_halaman' => $jumlah_halaman,
				'jumlah_bab' => $jumlah_bab,
				'tanggal_masuk' => $waktu,
				'status' => 0,
				'jumlah_peminjam' => 0,
				'deskripsi' => $deskripsi,
				'type' => 1
			]);

			$this->db->insert('donasi', [
				'nama' => $user['name'],
				'email' => $user['email'],
				'pesan' => $pesan
			]);

			$this->session->set_flashdata('message', "<div class='alert alert-success'>Donasi buku " . $judul . " berhasil</div>");

            header('location:' . base_url('profile'));
		}
	}
}