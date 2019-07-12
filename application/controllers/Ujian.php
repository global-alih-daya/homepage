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
		$data['typingtest'] = $this->M_Ujian->typingtest_random('soal_typingtest');
		$this->load->view('_ujian/V_TypingTest', $data);
	}

	public function jawab_typingtest()
	{

		date_default_timezone_set('Asia/Jakarta');

		//Word Per Second Calc number chars / seconds
		$calcWPS = $_POST['characters'] / $_POST['timerHitung'];

		$nama = $_POST['nama'];
		$no_hp = $_POST['no_hp'];
		$refid = $_POST['refid'];
		$jumlah_kata = $_POST['characters'];
		$jumlah_symbol = $_POST['symbolCount'];
		$match = $_POST['match'];
		$WPS = $calcWPS;
		$jam_mulai = $_POST['jam_mulai'];
		$jam_selesai = date('Y-m-d H:i:s');

		$data = array(
			'nama' => $nama,
			'no_hp' => $no_hp,
			'refid' => $refid,
			'jumlah_kata' => $jumlah_kata,
			'jumlah_symbol' => $jumlah_symbol,
			'match' => $match,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai
		);

		print_r($data);die;

		$save = $this->M_Ujian->save('hasil_typingtest', $data);

	}
}
