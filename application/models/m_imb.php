<?php

class M_imb extends CI_Model{



	function __construct(){
		parent::__construct();
		$this->load->model('m_kel');
		$this->load->model('m_kec');
		$this->load->model('m_kbli');
		$this->load->model('m_fo');
	}

    public function get_no_sk_where_no_daftar($no_daftar){
        
        $this->db->where('no_daftar', $no_daftar);
        $this->db->select('no_sk');
        $query = $this->db->get('t_imb');
        if($query->num_rows() > 0){
            return $query->result()[0]->no_sk;
        }else{
            return FALSE;
        }
    }

	public function apakah_no_sk_sudah_digunakan($no_sk){

		$this->db->select('no_sk');
		$this->db->where('no_sk', $no_sk);
		$query = $this->db->get('t_imb');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function get_where_no_urut($no_urut){
		$this->db->where('no_urut', $no_urut);
		$query = $this->db->get('t_imb');
		if($query->num_rows() > 0){
            return $query->result()[0];
        }else{
            return FALSE;
        }
	}

	public function get_where_no_daftar($no_daftar){
		$this->db->where('no_daftar', $no_daftar);
		$query = $this->db->get('t_imb');
		if($query->num_rows() > 0){
            return $query->result()[0];
        }else{
            return FALSE;
        }
	}

	public function get_like_no_sk($no_sk){
		
		$sql = "select * from t_imb where no_sk like '%$no_sk%'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
            foreach($query->result() as $row){
            	$rows[] = $row;
            }
            return $rows;
        }else{
            return FALSE;
        }
	}

	public function set_status_berlaku($no_daftar, $status_berlaku){
		$this->db->where('no_daftar', $no_daftar);
		$update = $this->db->update('t_imb', array(
			'status_berlaku' => $status_berlaku
		));
		return ($update) ? true :false ;
	}

	public function get_where_no_sk($no_sk){
        
        $sql = "select * from t_imb where no_sk = '$no_sk' and status_berlaku = 1";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            
            return $query->result()[0];
        }else{
            return FALSE;
        }
    }

    public function get_where_no_sk_2($no_sk){
        
        $sql = "select * from t_imb where no_sk = '$no_sk'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            
            return $query->result()[0];
        }else{
            return FALSE;
        }
    }

	public function get_no_urut_baru(){
		/**
		 * query untuk mendapatkan no_urut terakhir
		 */
		$sql = "SELECT * FROM t_imb ORDER BY no_urut DESC LIMIT 1"; 
		$query = $this->db->query($sql);

		if($query->num_rows() == 0){ 
			$no_urut_baru = 1; 
		}else{ 
			$no_urut_baru = $query->result()[0]->no_urut + 1;
		}

		return $no_urut_baru;

	}

	public function pengagendaan_baru(
		$no_daftar,
		$tanggal_daftar, 
		$no_urut, 
		$no_sk, 
		$tanggal_terbit, 
		$tanggal_perpanjangan, 
		$id_kbli){

		$insert = $this->db->insert('t_imb', array(
			'no_daftar' => $no_daftar,
			'tanggal_daftar' => $tanggal_daftar,
			'no_urut' => $no_urut,
			'no_sk' => $no_sk,
			'tanggal_terbit' => $tanggal_terbit,
			'tanggal_perpanjangan' => $tanggal_perpanjangan,
			'id_kbli' => $id_kbli,
			'alasan_penerbitan' => 'PB',
			'ket' => 'PB',
			'pembaharuan_ke' => 0,
			'status_berlaku' => 1,
			'guna' => 'BARU'
		));

		return ($insert) ? true : false;
	}

	public function pengagendaan_perpanjangan(
		$no_daftar,
		$tanggal_daftar, 
		$no_urut, 
		$no_sk_lalu, 
		$no_sk, 
		$tanggal_terbit, 
		$tanggal_perpanjangan, 
		$id_kbli,
		$alasan_penerbitan){

		$insert = $this->db->insert('t_imb', array(
			'no_daftar'            => $no_daftar,
			'tanggal_daftar'       => $tanggal_daftar,
			'no_urut'              => $no_urut,
			'no_sk_lalu'           => $no_sk_lalu,
			'no_sk'                => $no_sk,
			'tanggal_terbit'       => $tanggal_terbit,
			'tanggal_perpanjangan' => $tanggal_perpanjangan,
			'id_kbli'              => $id_kbli,
			'alasan_penerbitan'    => $alasan_penerbitan,
			// 'ket'               => 'PB',  # pada perpanjangan dengan kasus PS ket akan di pada operator
			'pembaharuan_ke'       => 0,
			'status_berlaku'       => 1,
			'guna'                 => 'PERPANJANGAN'
		));

		return ($insert) ? true : false;
	}

	public function simpan_baru_operator($no_daftar, $array_update){
		$this->db->where('no_daftar', $no_daftar);
		$update = $this->db->update('t_imb', $array_update);
		return ($update) ? true : false;
	}

	public function cetak_imb_baru($no_daftar){

		$this->load->library('phpword');

		$data  = $this->m_imb->get_where_no_daftar($no_daftar);

		/* awal imb_baru.docx */
        $template = $this->phpword->loadTemplate(APPPATH ."../templates/imb_baru_sk.docx");
//        $template = $this->phpword->loadTemplate(APPPATH ."../templates/imb_baru_sk.docx");

        $template->setValue('no_sk', $data->no_sk);        
        
        $template->setValue('nama_pemilik', ucwords($data->nama_pemilik));
        $template->setValue('alamat_pemilik', ucwords($data->alamat_pemilik));
        $template->setValue('nama_kel_pemilik', ucwords(strtolower($this->m_kel->get_nm_kel($data->id_kel_pemilik))));
        $template->setValue('nama_kec_pemilik', ucwords(strtolower($this->m_kec->get_nm_kec($data->id_kec_pemilik))));
        $template->setValue('nama_hak_kepemilikan', ucwords(strtolower($this->m_kepemilikan_tanah->get_nama_hak_kepemilikan($data->id_hak_kepemilikan))));
        $template->setValue('no_sertifikat_tanah', $data->no_sertifikat_tanah);
        $template->setValue('tanggal_peninjauan_lapangan', convert_tanggal_jadi_string($data->tanggal_peninjauan_lapangan));
        $template->setValue('jumlah_bangunan', '1');
        $template->setValue('jumlah_bangunan_terbilang', 'Satu');
        $template->setValue('satuan_bangunan', ucwords($this->m_jenis_bangunan->get_satuan_jenis_bangunan($data->id_jenis_bangunan)));
        $template->setValue('jenis_bangunan', $this->m_jenis_bangunan->get_nama_jenis_bangunan($data->id_jenis_bangunan));
        $template->setValue('kategori', $this->m_jenis_bangunan->get_nama_kategori($data->id_jenis_bangunan));
        $template->setValue('jenis_bangunan_harga_dasar', $this->m_harga_dasar_bangunan->get_jenis_bangunan_harga_dasar($data->id_harga_dasar));
        $template->setValue('tingkat_bangunan', $this->m_koif_tingkat->get_jumlah_tingkat($data->id_koif_tingkat));
        $template->setValue('tingkat_bangunan_terbilang', terbilang($this->m_koif_tingkat->get_jumlah_tingkat($data->id_koif_tingkat)));
        $template->setValue('luas_bangunan', $data->luas_bangunan);
        $template->setValue('luas_bangunan_terbilang', terbilang($data->luas_bangunan));

        $template->setValue('alamat_bangunan', ucwords($data->alamat_bangunan));
        $template->setValue('nama_kel_bangunan', ucwords(strtolower($this->m_kel->get_nm_kel($data->id_kel_bangunan))));
        $template->setValue('nama_kec_bangunan', ucwords(strtolower($this->m_kec->get_nm_kec($data->id_kec_bangunan))));

        $template->setValue('nilai_retribusi', strtoupper(number_format($data->nilai_retribusi, 0 , '' , '.' )));
        $template->setValue('tanggal_terbit', convert_tanggal_jadi_string($data->tanggal_terbit));

        $template->save(APPPATH. '../saved/imb_baru_sk.docx');
        $this->m_fo->set_status_proses($no_daftar, 11);


        ?>
        <script>
            window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/imb_baru_petikan.docx';
            setTimeout(function(){
                window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/imb_baru_sk.docx';
                setTimeout(function(){
                    window.location = '<?php echo site_url("c_cetak/belum") ?>';
                }, 3000);
            }, 3000);
        </script>
        <?php 
    }



     public function cetak_ssrd_baru($no_daftar){

        //load our new PHPExcel library
        $this->load->library('excel_iofactory');

        $data = $this->m_fo->get_where_no_daftar($no_daftar);
        
        $objReader = $this->excel_iofactory;
        $objReader = $objReader::createReader('Excel2007');
        $objPHPExcel = $objReader->load(APPPATH. '../templates/ssrd_imb_baru.xlsx');

        $nama_pemilik = $data->imb_baru_nama_pemilik;
        $objPHPExcel->getActiveSheet()->setCellValue('D10', ": $nama_pemilik");

        $alamat_pemilik = strtoupper($data->imb_baru_alamat_pemilik .' Gp. '. $this->m_kel->get_nm_kel($data->imb_baru_id_kel_pemilik). ' Kec. '. $this->m_kec->get_nm_kec($data->imb_baru_id_kec_pemilik));
        $objPHPExcel->getActiveSheet()->setCellValue('D12', ": $alamat_pemilik");

        $nama_jenis_bangunan        = $this->m_jenis_bangunan->get_nama_jenis_bangunan($data->imb_baru_id_jenis_bangunan);
        $satuan_jenis_bangunan      = $this->m_jenis_bangunan->get_satuan_jenis_bangunan($data->imb_baru_id_jenis_bangunan);
        $jenis_harga_dasar_bangunan = $this->m_index_harga_dasar->get_nama_harga_dasar_bangunan($data->imb_baru_id_harga_dasar);
        $objPHPExcel->getActiveSheet()->setCellValue('D28', "Retribusi IMB Pembangunan 1 (satu) $satuan_jenis_bangunan $nama_jenis_bangunan $jenis_harga_dasar_bangunan ");


        $jumlah_tingkat_bangunan  = $this->m_koif_tingkat->get_jumlah_tingkat($data->imb_baru_id_koif_tingkat);
        $jumlah_tingkat_terbilang = trim(terbilang($jumlah_tingkat_bangunan));
        $alamat_bangunan          = ucwords(strtolower($data->imb_baru_alamat_bangunan));
        $nama_kel_bangunan        = ucwords(strtolower($this->m_kel->get_nm_kel($data->imb_baru_id_kel_bangunan)));
        $objPHPExcel->getActiveSheet()->setCellValue('D29', "Berlantai $jumlah_tingkat_bangunan ($jumlah_tingkat_terbilang) $alamat_bangunan Gampong $nama_kel_bangunan");

        $nama_kec_bangunan        = ucwords(strtolower($this->m_kec->get_nm_kec($data->imb_baru_id_kec_bangunan)));
        $objPHPExcel->getActiveSheet()->setCellValue('D30', "Kecamatan $nama_kec_bangunan Kabupaten Bireuen");
        
        $luas_bangunan = (float) number_format($data->imb_baru_luas_bangunan, 2, '.', ''); // number_format($number, 2, '.', '');
        $objPHPExcel->getActiveSheet()->setCellValue('D31', "Luas Bangunan : $luas_bangunan M2.");


        $nilai_koif_luas    = $this->m_koif_luas->get_nilai_koif_luas($data->imb_baru_id_koif_luas);
        $nilai_koif_tingkat = $this->m_koif_tingkat->get_nilai_koif_tingkat($data->imb_baru_id_koif_tingkat);
        $nilai_koif_guna    = $this->m_koif_guna->get_nilai_koif_guna($data->imb_baru_id_koif_guna);
        $nilai_harga_dasar  = number_format($this->m_harga_dasar_bangunan->get_nilai_harga_dasar($data->imb_baru_id_harga_dasar),2,',','.');
        $nilai_retribusi    = number_format($data->imb_baru_nilai_retribusi,2,',','.');


        
        $objPHPExcel->getActiveSheet()->setCellValue('D32', "$nilai_koif_luas x $nilai_koif_tingkat x $nilai_koif_guna  x Rp. $nilai_harga_dasar,- = Rp.  $nilai_retribusi,-  (Qanun No. 19 Tahun 2010)");

        $objPHPExcel->getActiveSheet()->setCellValue('K28', $nilai_retribusi); 
        $objPHPExcel->getActiveSheet()->setCellValue('K40', $nilai_retribusi);

        $nilai_retribusi_terbilang = ucwords(terbilang($data->imb_baru_nilai_retribusi));
        $objPHPExcel->getActiveSheet()->setCellValue('D42', $nilai_retribusi_terbilang);

        $objPHPExcel->getActiveSheet()->setCellValue('F49', ": ".date('d-m-Y')); 

        $objPHPExcel->getActiveSheet()->setCellValue('J46', 'BIREUEN, '.date('d-m-Y'));  

        $objPHPExcel->getActiveSheet()->setCellValue('J51', "(".$nama_pemilik.")");


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save(APPPATH. '../saved/ssrd_imb_baru.xlsx');

         ?>
        <script>
            window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/ssrd_imb_baru.xlsx';
            setTimeout(function(){
                window.location = '<?php echo site_url("c_penetapan/belum_lunas") ?>';
            }, 3000);
        </script>
        <?php 
    }
}