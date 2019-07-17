<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Ujian');
	}

	//Psikotes Bagian 1 (MBTI)
    public function mbti()
	{
		$data['soal_ujian'] = $this->M_Ujian->tampil_data('soal_mbti')->result();
		$this->load->view('_ujian/V_MBTI', $data);
	}

	public function jawab_mbti()
	{

		date_default_timezone_set('Asia/Jakarta');

		$nama= $_POST['nama'];
		$no_hp = $_POST['no_hp'];
		$refid= $_POST['refid'];
		$jam_mulai = $_POST['jam_mulai'];
		$jam_selesai = date('Y-m-d H:i:s');

		$i=1;
		while(isset($_POST['jawaban'.$i]))
		{
			$array_jawaban[] = $_POST['jawaban'.$i];
			$i++;
		}
		//simpan hasil jawaban kedalam json
		$jawaban_json = json_encode($array_jawaban);

		$data = array(
			'nama' => $nama,
			'no_hp' => $no_hp,
			'id_peserta' => $refid,
			'jawaban' => $jawaban_json,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai,
		);
		
		$save = $this->M_Ujian->save('jawaban_mbti', $data);
	}

	//Psikotes Bagian 2
	public function psikotes()
	{
		$data['psikotes'] = $this->M_Ujian->tampil_data('soal_psikotes')->result();
		$this->load->view('_ujian/V_Psikotes', $data);
	}

	public function jawab_psikotes()
	{

		$nama = $_POST['nama'];
		$no_hp = $_POST['no_hp'];
		$refid = $_POST['refid'];
		$jam_mulai = $_POST['jam_mulai'];
		date_default_timezone_set('Asia/Jakarta');
		$jam_selesai = date('Y-m-d H:i:s');
		$i=1;
		while(isset($_POST['jawaban'.$i]))
		{
			$array_jawaban[] = $_POST['jawaban'.$i];
			$i++;
		}
		$jawaban_json = json_encode($array_jawaban);
		$data = array(
			'nama' => $nama,
			'no_hp' => $no_hp,
			'refid' => $refid,
			'jawaban' => $jawaban_json,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai
		);
		$save = $this->M_Ujian->save('jawaban_psikotes', $data);

	}

	//Typingtest
	public function TypingTestView()
	{
		$data['typingtest'] = $this->M_Ujian->random_query('soal_typingtest');
		$this->load->view('_ujian/V_TypingTest', $data);
	}

	public function jawab_typingtest()
	{

		date_default_timezone_set('Asia/Jakarta');

		$th = $this->input->post('timerHitung');
		$cr = $this->input->post('jumlah_karakter');

		//Word Per Minute : Num of Chars / 5 / Minutes
		$calcWPM = $cr / 5 / ($th/60);

		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$refid = $this->input->post('refid');
		$jumlah_symbol = $this->input->post('symbolCount');
		$WPM = $calcWPM;
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = date('Y-m-d H:i:s');

		$data = array(
			'nama' => $nama,
			'no_hp' => $no_hp,
			'refid' => $refid,
			'jumlah_kata' => $cr,
			'jumlah_symbol' => $jumlah_symbol,
			'WPM' => $WPM,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai
		);

		$save = $this->M_Ujian->save('hasil_typingtest', $data);

	}

	//Validasi ID Peserta
	function get_refid_exist() {
		if (isset($_POST['refid'])) {
			$refid = $_POST['refid'];
			//print_r($refid);die;
			$results = $this->M_Ujian->get_refid($refid);
			if ($results === TRUE) {
				echo '<div class="alert alert-danger" role="alert">ID Peserta salah atau tidak terdaftar</div>';
			} else {
				echo '<div class="alert alert-success" role="alert"><strong>ID Peserta ditemukan!</strong> Silahkan klik tombol selanjutnya.</div>';
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">ID Peserta wajib diisi.</div>';
		}
	}

	public function VoiceRec_View()
	{
		$data['hasil_voicerecord'] = $this->M_Ujian->tampil_data('hasil_voicerecord')->result();
		$this->load->view('_ujian/V_Voice', $data);
	}

	public function VoiceUpload()
	{
		//print_r($_FILES);die;
		$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
		//print_r($input);die;
		$output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea

		$path = FCPATH. "/assets/uploads/voice/";

		//move the file from temp name to local folder using $output name
		move_uploaded_file($input,"$path$output");
	}

	public function VoiceData()
	{
		date_default_timezone_set('Asia/Jakarta');

		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$refid = $this->input->post('refid');
		$ss = $this->input->post('namafile');
		//print_r($ss);die;
		$namafile = base_url()."assets/uploads/voice/".$ss;
		$jam_selesai = date('Y-m-d H:i:s');

		$data = array(
			'nama' => $nama,
			'no_hp' => $no_hp,
			'refid' => $refid,
			'namafile' => $namafile,
			'jam_selesai' => $jam_selesai
		);

		//print_r($data);die;
		$save = $this->M_Ujian->save('hasil_voicerecord', $data);
	}
}
