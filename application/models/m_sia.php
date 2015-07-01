<?php

class M_sia extends CI_Model{



	function __construct(){
		parent::__construct();
		$this->load->model('m_kel');
		$this->load->model('m_kec');
		$this->load->model('m_kbli');
		$this->load->model('m_fo');
	}

    public function hapus_where_no_daftar($no_daftar){
        $this->db->where('no_daftar', $no_daftar);
        $delete = $this->db->delete('t_sia');
        if($delete){
            return true;
        }else{
            return false;
        }

    }

    public function get_no_sk_where_no_daftar($no_daftar){
        
        $this->db->where('no_daftar', $no_daftar);
        $this->db->select('no_sk');
        $query = $this->db->get('t_sia');
        if($query->num_rows() > 0){
            return $query->result()[0]->no_sk;
        }else{
            return FALSE;
        }
    }

	public function apakah_no_sk_sudah_digunakan($no_sk){

		$this->db->select('no_sk');
		$this->db->where('no_sk', $no_sk);
		$query = $this->db->get('t_sia');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function get_where_no_urut($no_urut){
		$this->db->where('no_urut', $no_urut);
		$query = $this->db->get('t_sia');
		if($query->num_rows() > 0){
            return $query->result()[0];
        }else{
            return FALSE;
        }
	}

	public function get_where_no_daftar($no_daftar){
		$this->db->where('no_daftar', $no_daftar);
		$query = $this->db->get('t_sia');
		if($query->num_rows() > 0){
            return $query->result()[0];
        }else{
            return FALSE;
        }
	}

	public function get_like_no_sk($no_sk){
		
		$sql = "select * from t_sia where no_sk like '%$no_sk%'";
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
		$update = $this->db->update('t_sia', array(
			'status_berlaku' => $status_berlaku
		));
		return ($update) ? true :false ;
	}

	public function get_where_no_sk($no_sk){
        
        $sql = "select * from t_sia where no_sk = '$no_sk' and status_berlaku = 1";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            
            return $query->result()[0];
        }else{
            return FALSE;
        }
    }


    public function get_where_no_sk_2($no_sk){
        
        $sql = "select * from t_sia where no_sk = '$no_sk'";
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
		$sql = "SELECT * FROM t_sia ORDER BY no_urut DESC LIMIT 1"; 
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

		$insert = $this->db->insert('t_sia', array(
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

		$insert = $this->db->insert('t_sia', array(
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
		$update = $this->db->update('t_sia', $array_update);
		return ($update) ? true : false;
	}

	public function cetak_sia_baru($no_daftar){

		$this->load->library('phpword');
        $template = $this->phpword->loadTemplate(APPPATH ."../templates/sia_baru.docx");

        $data  = $this->m_sia->get_where_no_daftar($no_daftar);

        $template->setValue('no_sk', $data->no_sk);
        $template->setValue('nama_pemilik', $data->nama_pemilik);
        $template->setValue('alamat_lengkap_pemilik', ucwords(strtolower($data->alamat_pemilik .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik) .' Kecamatan '. $this->m_kec->get_nm_kec($data->id_kec_pemilik))));
        $template->setValue('no_sipa', $data->no_sipa);
        $template->setValue('nama_apotek', $data->nama_apotek);
        $template->setValue('alamat_lengkap_apotek', ucwords(strtolower($data->alamat_apotek .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_apotek) .' Kecamatan '. $this->m_kec->get_nm_kec($data->id_kec_apotek))));
        $template->setValue('nama_pemilik_sarana', $data->nama_pemilik_sarana);
        $template->setValue('alamat_lengkap_pemilik_sarana', ucwords(strtolower($data->alamat_pemilik_sarana .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik_sarana) .' Kecamatan '. $this->m_kec->get_nm_kec($data->id_kec_pemilik_sarana))));
        $template->setValue('no_akte_perjanjian', $data->no_akte_perjanjian);
        $template->setValue('tanggal_akte_perjanjian', convert_tanggal_jadi_string($data->tanggal_akte_perjanjian));
        $template->setValue('nama_notaris_akte_perjanjian', $data->nama_notaris_akte_perjanjian);
        $template->setValue('tempat_akte_perjanjian', $data->tempat_akte_perjanjian);
        
        
        
        $template->setValue('tanggal_perpanjangan', convert_tanggal_jadi_string($data->tanggal_perpanjangan));
        $template->setValue('tanggal_daftar_ulang', convert_tanggal_jadi_string($data->tanggal_daftar_ulang));
        $template->setValue('tanggal_terbit', convert_tanggal_jadi_string($data->tanggal_terbit));


        $template->save(APPPATH. '../saved/sia_baru.docx');
        $this->m_fo->set_status_proses($no_daftar, 11);


        $template_sk = $this->phpword->loadTemplate(APPPATH ."../templates/sia_baru_sk.docx");
        $fo = $this->m_fo->get_where_no_daftar($no_daftar);
        $data  = $this->m_sia->get_where_no_daftar($no_daftar);

        $template_sk->setValue('no_sk', $data->no_sk);
        $template_sk->setValue('nama_pemohon', $fo->nama_pemohon);
        $template_sk->setValue('nama_pemilik', $data->nama_pemilik);
        $template_sk->setValue('tanggal_permohonan', $fo->tanggal_daftar);
        $template_sk->setValue('alamat_lengkap_pemilik', ucwords(strtolower($data->alamat_pemilik .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik) .' Kecamatan '. $this->m_kec->get_nm_kec($data->id_kec_pemilik))));
        $template_sk->setValue('no_sipa', $data->no_sipa);
        $template_sk->setValue('nama_apotek', $data->nama_apotek);
        $template_sk->setValue('alamat_lengkap_apotek', ucwords(strtolower($data->alamat_apotek .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_apotek) .' Kecamatan '. $this->m_kec->get_nm_kec($data->id_kec_apotek))));
        $template_sk->setValue('nama_pemilik_sarana', $data->nama_pemilik_sarana);
        $template_sk->setValue('alamat_lengkap_pemilik_sarana', ucwords(strtolower($data->alamat_pemilik_sarana .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik_sarana) .' Kecamatan '. $this->m_kec->get_nm_kec($data->id_kec_pemilik_sarana))));
        $template_sk->setValue('no_akte_perjanjian', $data->no_akte_perjanjian);
        $template_sk->setValue('tanggal_akte_perjanjian', convert_tanggal_jadi_string($data->tanggal_akte_perjanjian));
        $template_sk->setValue('nama_notaris_akte_perjanjian', $data->nama_notaris_akte_perjanjian);
        $template_sk->setValue('tempat_akte_perjanjian', $data->tempat_akte_perjanjian);
        
        
        
        $template_sk->setValue('tanggal_perpanjangan', convert_tanggal_jadi_string($data->tanggal_perpanjangan));
        $template_sk->setValue('tanggal_daftar_ulang', convert_tanggal_jadi_string($data->tanggal_daftar_ulang));
        $template_sk->setValue('tanggal_terbit', convert_tanggal_jadi_string($data->tanggal_terbit));


        $template_sk->save(APPPATH. '../saved/sia_baru_sk.docx');
        $this->m_fo->set_status_proses($no_daftar, 11);

        ?>
        <script>
            

            window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/sia_baru.docx';
            setTimeout(function(){
            	window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/sia_baru_sk.docx';
            	setTimeout(function(){
            		window.location = '<?php echo site_url("c_cetak/sudah") ?>';
            	}, 3000);
            }, 3000);

        </script>

        <?php 
	}

	public function cetak_sia_perpanjangan($no_daftar){

		$this->load->library('phpword');
        $template = $this->phpword->loadTemplate(APPPATH ."../templates/sia_perpanjangan.docx");

        $data  = $this->m_sia->get_where_no_daftar($no_daftar);

        $template->setValue('no_sk', $data->no_sk);
        $template->setValue('nama_pemilik', $data->nama_pemilik);
        $template->setValue('alamat_lengkap_pemilik', ucwords(strtolower($data->alamat_pemilik .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik) .' Kec. '. $this->m_kec->get_nm_kec($data->id_kec_pemilik))));
        $template->setValue('no_sipa', $data->no_sipa);
        $template->setValue('nama_apotek', $data->nama_apotek);
        $template->setValue('alamat_lengkap_apotek', ucwords(strtolower($data->alamat_apotek .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_apotek) .' Kec. '. $this->m_kec->get_nm_kec($data->id_kec_apotek))));
        $template->setValue('nama_pemilik_sarana', $data->nama_pemilik_sarana);
        $template->setValue('alamat_lengkap_pemilik_sarana', ucwords(strtolower($data->alamat_pemilik_sarana .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik_sarana) .' Kec. '. $this->m_kec->get_nm_kec($data->id_kec_pemilik_sarana))));
        $template->setValue('no_akte_perjanjian', $data->no_akte_perjanjian);
        $template->setValue('tanggal_akte_perjanjian', convert_tanggal_jadi_string($data->tanggal_akte_perjanjian));
        $template->setValue('nama_notaris_akte_perjanjian', $data->nama_notaris_akte_perjanjian);
        $template->setValue('tempat_akte_perjanjian', $data->tempat_akte_perjanjian);
        
        
        
        $template->setValue('tanggal_perpanjangan', convert_tanggal_jadi_string($data->tanggal_perpanjangan));
        $template->setValue('tanggal_daftar_ulang', convert_tanggal_jadi_string($data->tanggal_daftar_ulang));
        $template->setValue('tanggal_terbit', convert_tanggal_jadi_string($data->tanggal_terbit));


        $template->save(APPPATH. '../saved/sia_perpanjangan.docx');
        $this->m_fo->set_status_proses($no_daftar, 11);




        $template_sk = $this->phpword->loadTemplate(APPPATH ."../templates/sia_perpanjangan_sk.docx");
        $fo = $this->m_fo->get_where_no_daftar($no_daftar);
        $data  = $this->m_sia->get_where_no_daftar($no_daftar);

        $template_sk->setValue('no_sk', $data->no_sk);
        $template_sk->setValue('nama_pemohon', $fo->nama_pemohon);
        $template_sk->setValue('nama_pemilik', $data->nama_pemilik);
        $template_sk->setValue('alamat_lengkap_pemilik', ucwords(strtolower($data->alamat_pemilik .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik) .' Kec. '. $this->m_kec->get_nm_kec($data->id_kec_pemilik))));
        $template_sk->setValue('no_sipa', $data->no_sipa);
        $template_sk->setValue('nama_apotek', $data->nama_apotek);
        $template_sk->setValue('alamat_lengkap_apotek', ucwords(strtolower($data->alamat_apotek .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_apotek) .' Kec. '. $this->m_kec->get_nm_kec($data->id_kec_apotek))));
        $template_sk->setValue('nama_pemilik_sarana', $data->nama_pemilik_sarana);
        $template_sk->setValue('alamat_lengkap_pemilik_sarana', ucwords(strtolower($data->alamat_pemilik_sarana .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik_sarana) .' Kec. '. $this->m_kec->get_nm_kec($data->id_kec_pemilik_sarana))));
        $template_sk->setValue('no_akte_perjanjian', $data->no_akte_perjanjian);
        $template_sk->setValue('tanggal_akte_perjanjian', convert_tanggal_jadi_string($data->tanggal_akte_perjanjian));
        $template_sk->setValue('nama_notaris_akte_perjanjian', $data->nama_notaris_akte_perjanjian);
        $template_sk->setValue('tempat_akte_perjanjian', $data->tempat_akte_perjanjian);
        
        
        
        $template_sk->setValue('tanggal_perpanjangan', convert_tanggal_jadi_string($data->tanggal_perpanjangan));
        $template_sk->setValue('tanggal_daftar_ulang', convert_tanggal_jadi_string($data->tanggal_daftar_ulang));
        $template_sk->setValue('tanggal_terbit', convert_tanggal_jadi_string($data->tanggal_terbit));


        $template_sk->save(APPPATH. '../saved/sia_perpanjangan_sk.docx');
        $this->m_fo->set_status_proses($no_daftar, 11);

        ?>
        <script>
            

            window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/sia_perpanjangan.docx';
            setTimeout(function(){
            	window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/sia_perpanjangan_sk.docx';
            	setTimeout(function(){
            		window.location = '<?php echo site_url("c_cetak/belum") ?>';
            	}, 3000);
            }, 3000);
        </script>
        <?php 
	}

	public function cetak_sia_perubahan($no_daftar){

		$this->load->library('phpword');
        $template = $this->phpword->loadTemplate(APPPATH ."../templates/sia_perubahan.docx");

        $data  = $this->m_sia->get_where_no_daftar($no_daftar);

        $template->setValue('value1', $data->no_sk);
        $template->setValue('value2', $data->nama_pemilik);
        $template->setValue('value3', $data->npwpd_npwrd);
        $template->setValue('value4', ucwords(strtolower($data->alamat_pemilik .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_pemilik) .' Kec. '. $this->m_kec->get_nm_kec($data->id_kec_pemilik))));
        $template->setValue('value5', strtoupper($data->nama_perusahaan));
        $template->setValue('value6', ucwords(strtolower($data->alamat_perusahaan .' Gp. '. $this->m_kel->get_nm_kel($data->id_kel_perusahaan) .' Kecamatan '. $this->m_kec->get_nm_kec($data->id_kec_perusahaan))));
        $template->setValue('value7', strtoupper($data->no_telp));
        $template->setValue('value8', $data->panjang_tempat_usaha .' x '. $data->lebar_tempat_usaha);
        $template->setValue('value8b', $data->panjang_tempat_usaha * $data->lebar_tempat_usaha);
        $template->setValue('value9', ucwords(strtolower($this->m_bidang_sia->get_nama_bidang_sia($data->id_bidang_sia))));
        $template->setValue('value11', convert_tanggal_jadi_string($data->tanggal_perpanjangan));
        $template->setValue('value12', convert_tanggal_jadi_string($data->tanggal_terbit));


        $template->save(APPPATH. '../saved/sia_perubahan.docx');
        $this->m_fo->set_status_proses($no_daftar, 11);

        ?>
        <script>
            window.location = 'http://<?php echo $_SERVER['SERVER_NAME'] ?>/simppadu/saved/sia_perubahan.docx';
            setTimeout(function(){
            	window.location = '<?php echo site_url("c_cetak/belum") ?>';
            }, 3000);
        </script>
        <?php 
	}

	
}