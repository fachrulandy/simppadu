<?php

class M_kepemilikan_tanah extends CI_Model{

	public function get_all(){
		$query = $this->db->get('t_kepemilikan_tanah');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$rows[] = $row;
			}
			return $rows;
		}else{
			return false;
		}
	}

	public function get_nama_hak_kepemilikan($id_hak_kepemilikan){
		$this->db->where('id_hak_kepemilikan', $id_hak_kepemilikan);
		$this->db->select('nama_hak_kepemilikan');
		$query = $this->db->get('t_kepemilikan_tanah');
		if($query->num_rows() > 0){
			return $query->result()[0]->nama_hak_kepemilikan;
		}else{
			return false;
		}

	}

	
}