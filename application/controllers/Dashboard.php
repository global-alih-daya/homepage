<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $m_dashboard;
	private $m_provinces;
	private $m_cities;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Dashboard');
		$this->m_dashboard = $this->M_Dashboard;

		//load model M_Provinces
		$this->load->model('M_Provinces');

		//load model M_Cities
		$this->load->model('M_Cities');

		$this->load->model('M_Registrasi');
		$this->load->library(array('recaptcha','form_validation'));

	}

	public function index() {
		$data = generate_page('Dashboard', 'beranda');//Dahsboard akan menjadi title dalam design,dashbooard akan menjadi uri, nama pegawai berpengaruh untuk huruf besar dan kecil
			//print_r($data);die;
			$data_content['h_project1'] = $this->m_dashboard->practices_area();
		$data['content'] = $this->load->view('partial/beranda',$data_content,true);//akan di lempar ke conten
		//print_r($data['content']);die;
		$this->load->view('V_Dashboard', $data);
	}

	public function registrasi() {
		$data = generate_page('Registrasi', 'registrasi');
		//print_r($data); die;
		$data_content['provinces'] = $this->M_Provinces->view();
		$data_content['recaptcha_html'] = $this->recaptcha->render();
		$data['content'] = $this->load->view('partial/registrasi',$data_content, true);
		//print_r($data['content']);die;
		$this->load->view('V_Dashboard', $data);
	}

	public function ujicoba()
	{
		$data = generate_page('Ujicoba', 'ujicoba');
		//print_r($data); die;
		$data_content['provinces'] = $this->M_Provinces->view();
		$data_content['recaptcha_html'] = $this->recaptcha->render();
		$data['content'] = $this->load->view('partial/uji_coba',$data_content, true);
		//print_r($data['content']);die;
		$this->load->view('V_Dashboard', $data);
	}

	//get cities from province by id
    public function ListKota()
    {
        //ambil data id provinsi yang dikirim via ajax post
        $province_id = $this->input->post('province_id');
        $kota = $this->M_Cities->viewByProvinsi($province_id);
        $lists = "<option value=''>Pilih Kota</option>";

        foreach($kota as $data){
            $lists .= "<option value='".$data->id."'>".$data->name."</option>"; // Tambahkan tag option ke variabel $lists
          }

          $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

    echo json_encode($callback); // konversi variabel $callback menjadi JSON
  	}

  	public function add() {
		$this->load->library('email');
		$this->load->config('email');

		//validasi form input
		$this->form_validation->set_rules('firstname', 'firstname', 'required|alpha',
			array(
				'required' => 'Mohon masukkan Nama Awal anda.' ,
				'alpha' => 'Mohon input menggunakan Alfanumerik saja.' )
		);
		$this->form_validation->set_rules('lastname', 'lastname', 'alpha|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|xss_clean');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required|max_length[13]|min_length[9]|xss_clean');
		$this->form_validation->set_rules('address', 'address', 'required|xss_clean');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required|xss_clean');
		$this->form_validation->set_rules('kota', 'kota', 'required|xss_clean');
		$this->form_validation->set_rules('job_interested', 'job_interested', 'required');
		$this->form_validation->set_rules('syaratcheck', 'syaratcheck', 'callback_accept_terms');
		//$this->form_validation->set_rules('g-recaptcha-response', '<strong>Captcha</strong>', 'callback_getResponseCaptcha');

        //set message form validation
        //$this->form_validation->set_message('required', '{field} is required.');
		//$this->form_validation->set_message('callback_getResponseCaptcha',' {field} {g-recaptcha-response} harus diisi. ');
		
		//terima persyaratan
		if(!$this->input->post('syaratcheck')){
			echo $this->session->set_flashdata('message','<div role="alert" class="alert alert-danger alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Kesalahan! Mohon terima persyaratan kami.</div>');
			redirect(base_url('registrasi'));
			//$this->load->view('recaptcha');
		}

		//cek apakah form sudah tervalidasi dengan benar
		if($this->form_validation->run() != FALSE) {
			echo $this->session->set_flashdata('message','<div role="alert" class="alert alert-danger alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Kesalahan! Mohon periksa kembali data yang anda masukan.</div>');
			redirect(base_url('registrasi'));
			//$this->load->view('recaptcha');
		} else {
			
			// mendapatkan data dari input form
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			$email=$this->input->post('email');
			$no_hp=$this->input->post('no_hp');
			$address=$this->input->post('address');
			$provinsi=$this->input->post('provinsi');
			$kota=$this->input->post('kota');
			$job_interested=$this->input->post('job_interested');
			$refid = 'PTR-' . mt_rand() . '-' . uniqid(5);

			//konfigurasi upload file untuk CV
			$config['upload_path']          = APPPATH. '../assets/uploads/userregistration/';
			$config['allowed_types']        = 'pdf|jpg|docx';
			$config['max_size']             = 0;

			//load library upload
			$this->load->library('upload', $config);

			//cek apakah file berhasil di upload
			if ( ! $this->upload->do_upload('cv_file')){
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);die;
				echo $this->session->set_flashdata('message','<div role="alert" class="alert alert-danger alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Kesalahan! Mohon masukkan CV anda.</div>');
				redirect(base_url('registrasi'));
				//$this->load->view('recaptcha');
			}else{
				//hasil dari input dijadikan array
				$data = array(
					'firstname' => $firstname,
					'lastname' => $lastname,
					'email' => $email,
					'no_hp' => $no_hp,
					'address' => $address,
					'provinsi' => $provinsi,
					'kota' => $kota,
					'job_interested' => $job_interested,
					'refid' => $refid
				);

				//upload file dari hasil input ke folder assets/uploads/userregistration
				$upload_data = $this->upload->data();
				$data['cv_file'] =  $upload_data['file_name'];

				$from = $this->config->item('smtp_user');
				$to = $email;
				$subject = 'GAD Partner Registration';
				$message = 
				/*-----------email body starts-----------*/
'<h3>Terimakasih telah mendaftar menjadi partner kami, '.$firstname.'!</h3>
</br>		  
<p>Anda akan dihubungi oleh tim kami untuk verifikasi data dalam waktu dekat,<br>
Berikut sebagian salinan data anda yang telah kami rekam :</p>
</br>
<table style="width: 769.2px;">
<tbody>
<tr style="height: 21px;">
<td style="width: 187px; height: 21px;">Nama Lengkap</td>
<td style="width: 10px; height: 21px;">:</td>
<td style="width: 741.2px; height: 21px;">' . $firstname . ' ' . $lastname . '</td>
</tr>
<tr style="height: 22px;">
<td style="width: 187px; height: 22px;">Email</td>
<td style="width: 10px; height: 22px;">:</td>
<td style="width: 741.2px; height: 22px;">' . $email . '</td>
</tr>
<tr style="height: 22px;">
<td style="width: 187px; height: 22px;">No HP/Whatsapp</td>
<td style="width: 10px; height: 22px;">:</td>
<td style="width: 741.2px; height: 22px;">' . $no_hp . '</td>
</tr>
<tr style="height: 14.6px;">
<td style="width: 187px; height: 14.6px;">Alamat Tempat tinggal</td>
<td style="width: 10px; height: 14.6px;">:</td>
<td style="width: 741.2px; height: 14.6px;">' . $address . '</td>
</tr>
<tr style="height: 22px;">
<td style="width: 187px; height: 22px;">Pekerjaan dipilih</td>
<td style="width: 10px; height: 22px;">:</td>
<td style="width: 741.2px; height: 22px;">' . $job_interested . '</td>
</tr>
<tr style="height: 22px;">
<td style="width: 187px; height: 22px;">Ref ID</td>
<td style="width: 10px; height: 22px;">:</td>
<td style="width: 741.2px; height: 22px;">' . $refid . '</td>
</tr>
</tbody>
</table>
<p>Silahkan hubungi kami melalui kontak dibawah ini jika ada pertanyaan :</p>
</br>
<p>Telp 	: 021 - xxxxxxx<br>
Email	: info@gad.co.id</p>
</br>
</br>
</br>
<p>Terima kasih,<br>
<b>PT. Global Alih Daya</b></p>';
				/*-----------email body ends-----------*/

				$this->email->from($from, 'GAD Partner');
				$this->email->to($email);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();

				//pesan berhasil
				echo $this->session->set_flashdata('message', '<div role="alert" class="alert alert-success alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Selamat! Anda telah berhasil mendaftar. Anda akan dihubungi dalam waktu dekat (Salinan data telah kami kirimkan melalui email anda).</div>');
				
				//simpan ke model untuk di input ke db
				$save =$this->M_Registrasi->save('registrasi_baru',$data);
				//reload halaman
				redirect(base_url('registrasi'));
			}
		}
	}

	public function add_company()
	{
		$pic_name=$this->input->post('pic_name');
		$company_name=$this->input->post('company_name');
		$email=$this->input->post('email');
		$no_hp=$this->input->post('no_hp');
		$company_address=$this->input->post('company_address');
		$provinsi=$this->input->post('provinsi');
		$kota=$this->input->post('kota');
	
		$data = array(
			'pic_name' => $pic_name,
			'company_name' => $company_name,
			'email' => $email,
			'no_hp' => $no_hp,
			'company_address' => $company_address,
			'provinsi' => $provinsi,
			'kota' => $kota,
		);

		$this->form_validation->set_rules('pic_name', 'pic_name', 'required|alpha',
			array(
				'required' => 'Mohon masukkan Nama anda.' ,
				'alpha' => 'Mohon input menggunakan Alfanumerik saja.' )
		);
		$this->form_validation->set_rules('company_name', 'company_name', 'required|alpha');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required|max_length[13]|min_length[9]');
		$this->form_validation->set_rules('company_address', 'company_address', 'required');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required');
		$this->form_validation->set_rules('kota', 'kota', 'required');
		$this->form_validation->set_rules('syaratcheck', 'syaratcheck', 'callback_accept_terms');

		//$this->form_validation->set_rules('g-recaptcha-response', '<strong>Captcha</strong>', 'callback_getResponseCaptcha');
        //set message form validation
        //$this->form_validation->set_message('required', '{field} is required.');
		//$this->form_validation->set_message('callback_getResponseCaptcha',' {field} {g-recaptcha-response} harus diisi. ');

		//terima persyaratan
		if(!$this->input->post('syaratcheck')){
			echo $this->session->set_flashdata('message','<div role="alert" class="alert alert-danger alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Kesalahan! Mohon terima persyaratan kami.</div>');
			redirect(base_url('ujicoba'));
			//$this->load->view('recaptcha');
		}
		
		if($this->form_validation->run() != FALSE) {
			echo $this->session->set_flashdata('message','<div role="alert" class="alert alert-danger alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Kesalahan! Mohon periksa kembali data yang anda masukan.</div>');
			redirect(base_url('ujicoba'));
			//$this->load->view('recaptcha');
		} else {
			echo $this->session->set_flashdata('message', '<div role="alert" class="alert alert-success alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Selamat! Anda telah berhasil mendaftar program uji coba. Anda akan dihubungi dalam waktu dekat.</div>');
			$save =$this->M_Registrasi->save('registrasi_ujicoba',$data);
			redirect(base_url('ujicoba'));
		}
	}

	public function getResponseCaptcha($str) {
        $this->load->library('recaptcha');
        $response = $this->recaptcha->verifyResponse($str);
        if ($response['success'])
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('getResponseCaptcha', '%s is required.' );
            return false;
        }
    }
	
}

