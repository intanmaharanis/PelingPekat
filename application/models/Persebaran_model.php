<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persebaran_model extends CI_Model
{
    public function getDataAwal()
    {

        return $this->db->get('data_awal')->result_array();
    }

    public function getJmlAwal()
    {
        return $this->db->get('data_awal')->num_rows();
    }

    public function setCentroidAwal()
    {
        $this->db->query("delete from centroid");

        $query = "insert into centroid
				select 0,da_2019,da_2020 from data_awal where da_id in (13,276,512) order by da_2019,da_2020 asc ";

        return  $this->db->query($query);
    }

    public function getCentroidAwal()
    {
        return $this->db->get_where('centroid', ['ctd_ke' => 0])->result_array();
    }

    public function getCentroid($no)
    {
        return $this->db->get_where('centroid', ['ctd_ke' => $no])->result_array();
    }

    public function getIterasi($no)
    {
        $this->db->select('distinct it_no,it_da_id,it_data,it_cluster', false)->from('iterasi')->where('it_no', $no);

        return $query = $this->db->get()->result_array();
    }

    public function getAllIterasi()
    {
        return $this->db->get('iterasi')->result_array();
    }
}
