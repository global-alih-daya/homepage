<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Ujian');
    }

    public function mbti()
	{
		$data['soal_ujian'] = $this->M_Ujian->tampil_data()->result();
		$this->load->view('_ujian/V_MBTI', $data);
	}

	public function jawab_mbti()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required|alpha|xss_clean');
		$this->form_validation->set_rules('refid', 'refid', 'required|xss_clean');

		if($this->form_validation->run() != FALSE) {
			echo $this->session->set_flashdata('message','<div role="alert" class="alert alert-danger alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Kesalahan! Mohon periksa kembali jawaban atau data yang anda masukan.</div><br>');
			redirect(base_url('ujian'));
		}

		$nama= $_POST['nama'];
		$refid= $_POST['refid'];
		$jam_mulai = $_POST['jam_mulai'];
		date_default_timezone_set('Asia/Jakarta');
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
			'id_peserta' => $refid,
			'jawaban' => $jawaban_json,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai,
		);

		//print_r($data);die;
		echo $this->session->set_flashdata('message', '<div role="alert" class="alert alert-success alert-dismissible"><button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Jawaban anda berhasil disimpan.</div>');
		$save = $this->M_Ujian->save('jawaban_mbti', $data);

		redirect(base_url('psikotes'));
	}
}
