<?php

class Pesebaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Persebaran_model', 'kmeans');
    }

    public function hitungKmeans()
    {
        $data['dAwal'] = $this->kmeans->getDataAwal();

        $jmlDA = $this->kmeans->getJmlAwal();

        $this->kmeans->setCentroidAwal();
        $data['ctdAwal'] = $this->kmeans->getCentroidAwal();

        // Maksimal Iterasi
        $data['jmlIterasi'] = 10;

        // Hitung Iterasi Awal
        $i = 0;
        foreach ($data['ctdAwal'] as $ca) {

            foreach ($data['dAwal'] as $da) {
                $data['wilayah'][$i] = $da['da_id'];
                $data['iterasi'][$i] = sqrt(pow($da['da_2019'] - $ca['ctd_2019'], 2)) + sqrt(pow($da['da_2020'] - $ca['ctd_2020'], 2));
                $i = $i + 1;
            }
        }

        $this->db->query("delete from iterasi");
        $x = 0;

        for ($j = 0; $j < 513; $j++) {

            $x = $j;
            $dataI = [];
            $dataIT = '';
            $id = $data['wilayah'][$x];
            for ($k = 0; $k < 3; $k++) {
                $dataI[$k] = $data['iterasi'][$x];
                $dataIT = $dataIT . ',' . $data['iterasi'][$x];
                $x = $x + 513;
            }
            $dataMin = min($dataI);
            for ($y = 0; $y < 3; $y++) {
                if ($dataI[$y] == $dataMin) {
                    $cl = $y + 1;
                }
            }
            $insertI = [
                "it_no" => '0',
                "it_da_id" => $id,
                "it_data" => $dataIT,
                "it_cluster" => $cl
            ];

            $this->db->insert('iterasi', $insertI);
        }


        for ($i = 1; $i <= $data['jmlIterasi']; $i++) {
            $data['ctd'] = $this->kmeans->getCentroid($i);

            $l = 0;
            foreach ($data['ctd'] as $ctd) {
                foreach ($data['dAwal'] as $da) {

                    $l = $l + 1;
                }
            }

            // Hitung Cluster
            $cl_2019 = 0;
            $cl_2020 = 0;

            for ($z = 1; $z <= 3; $z++) {


                // hitung centroid
                $cluster[$z] = $this->db->get_where('iterasi', ['it_cluster' => $z])->result_array();
                $count = $this->db->get_where('iterasi', ['it_cluster' => $z])->num_rows();

                $cl_2019 = 0;
                $cl_2020 = 0;

                foreach ($cluster[$z] as $c1) {

                    $id = $this->db->get_where('data_awal', ['da_id' => $c1['it_da_id']])->row_array();

                    $cl_2019 = $cl_2019 + $id['da_2019'];
                    $cl_2020 = $cl_2020 + $id['da_2020'];
                }

                $insertC = [
                    "ctd_ke" => $i,
                    "ctd_2019" => $cl_2019 / $count,
                    "ctd_2020" => $cl_2020 / $count
                ];

                $this->db->insert('centroid', $insertC);

                // end of centroid

            }

            // data iterasi 1 - end

            $data['ctd'] = $this->kmeans->getCentroid($i);

            $l = 0;
            foreach ($data['ctd'] as $ctd) {
                foreach ($data['dAwal'] as $da) {
                    $dataI1[$l] =  sqrt(pow($da['da_2019'] - $ctd['ctd_2019'], 2)) + sqrt(pow($da['da_2020'] - $ctd['ctd_2020'], 2));
                    $l = $l + 1;
                }
            }


            $x = 1;

            for ($j = 0; $j < 513; $j++) {

                $x = $j;
                $dataI = [];
                $dataIT = '';
                $id = $data['wilayah'][$x];
                for ($k = 0; $k < 3; $k++) {

                    $dataI[$k] = $dataI1[$x];

                    $dataIT = $dataIT . ',' . $data['iterasi'][$x];
                    $x = $x + 513;
                }

                $dataMin = min($dataI);
                // echo $dataMin . '||';
                for ($y = 0; $y < 3; $y++) {

                    if ($dataI[$y] == $dataMin) {
                        // echo $y+1;
                        $cl = $y + 1;
                    }
                }

                $insertI = [
                    "it_no" => $i,
                    "it_da_id" => $id,
                    "it_data" => $dataIT,
                    "it_cluster" => $cl
                ];

                $this->db->insert('iterasi', $insertI);
            }


            $data['itLast'] = $this->db->get_where('iterasi', ['it_no' => $i])->result_array();
            $data['itBefore'] = $this->db->get_where('iterasi', ['it_no' => $i - 1])->result_array();

            $x = 0;
            foreach ($data['itLast'] as $last) {
                $ilast[$x] = $last['it_cluster'];
                // echo $last['it_cluster'];
                $x = $x + 1;
            }
            // echo '<br>';
            $y = 0;
            foreach ($data['itBefore'] as $before) {
                // echo $before['it_cluster'];
                $iBefore[$y] = $before['it_cluster'];
                // echo '<br>';
                $y = $y + 1;
            }

            // var_dump($iBefore);
            if ($ilast == $iBefore) {
                echo 'Data sama';
                $i = $i + $data['jmlIterasi'];
            } else {
                echo 'Data Tidak sama';
            }
        }

        redirect('pesebaran/maps');
    }

    public function index()
    {

        $data['title'] = 'Persebaran Wilayah';


        $data['dAwal'] = $this->kmeans->getDataAwal();

        $jmlDA = $this->kmeans->getJmlAwal();

        $data['ctdAwal'] = $this->kmeans->getCentroidAwal();

        if ($this->input->post('jmlIterasi')) {
            $data['jmlIterasi'] = $this->input->post('jmlIterasi');

            $i = 0;
            foreach ($data['ctdAwal'] as $ca) {

                foreach ($data['dAwal'] as $da) {


                    $data['wilayah'][$i] = $da['da_id'];
                    $data['iterasi'][$i] = sqrt(pow($da['da_2019'] - $ca['ctd_2019'], 2)) + sqrt(pow($da['da_2020'] - $ca['ctd_2020'], 2));

                    $i = $i + 1;
                }
                // echo $i;
            }

            // 19 = total data awal
            // hitung iterasi awal
            $this->db->query("delete from iterasi");
            $x = 0;

            for ($j = 0; $j < 513; $j++) {

                $x = $j;
                $dataI = [];
                // $dataP = '';
                $dataIT = '';
                $id = $data['wilayah'][$x];
                // echo $id;
                for ($k = 0; $k < 3; $k++) {
                    // echo $x
                    // echo $data['wilayah'][$x];
                    // echo $data['iterasi'][$x] . '<br>';

                    $dataI[$k] = $data['iterasi'][$x];
                    // $dataP = $data['iterasi'][$x];
                    // echo $dataI[$k] . '<br>';
                    // echo $dataP . '<br>';

                    $dataIT = $dataIT . ',' . $data['iterasi'][$x];
                    $x = $x + 513;
                }
                // echo $id;




                $dataMin = min($dataI);
                // echo $dataMin . '||';
                for ($y = 0; $y < 3; $y++) {
                    // echo $dataMin;
                    // echo $dataI[$y] . ' || ';
                    if ($dataI[$y] == $dataMin) {
                        // echo $y+1;
                        $cl = $y + 1;
                    }

                    // echo "<br>";
                }
                // echo $dataIT;
                // echo "<br>";

                $insertI = [
                    "it_no" => '0',
                    "it_da_id" => $id,
                    "it_data" => $dataIT,
                    "it_cluster" => $cl
                ];

                $this->db->insert('iterasi', $insertI);

                // echo '<br>';

            }



            // Jml Iterasi
            for ($i = 1; $i <= $this->input->post('jmlIterasi'); $i++) {
                // Hitung Cluster
                $cl_2019 = 0;
                $cl_2020 = 0;
                for ($z = 1; $z <= 3; $z++) {
                    // $dataI[0];

                    $cluster[$z] = $this->db->get_where('iterasi', ['it_cluster' => $z])->result_array();
                    // if $
                    $count = $this->db->get_where('iterasi', ['it_cluster' => $z])->num_rows();
                    foreach ($cluster[$z] as $c1) {
                        // echo $c1['it_da_id'];
                        // echo '<br>';
                        $id = $this->db->get_where('data_awal', ['da_id' => $c1['it_da_id']])->row_array();
                        // echo $id['da_2019'];
                        $cl_2019 = $cl_2019 + $id['da_2019'];
                        $cl_2020 = $cl_2020 + $id['da_2020'];
                    }


                    $insertC = [
                        "ctd_ke" => $i,
                        "ctd_2019" => $cl_2019 / $count,
                        "ctd_2020" => $cl_2020 / $count
                    ];

                    $this->db->insert('centroid', $insertC);

                    // data iterasi
                    $x = 0;

                    for ($j = 0; $j < 513; $j++) {

                        $x = $j;
                        $dataI = [];
                        $dataIT = '';
                        $id = $data['wilayah'][$x];
                        for ($k = 0; $k < 3; $k++) {


                            $dataI[$k] = $data['iterasi'][$x];

                            $dataIT = $dataIT . ',' . $data['iterasi'][$x];
                            $x = $x + 513;
                        }
                        // echo $id;
                        // var_dump($dataI);
                        // var_dump(min($dataI));
                        // echo $data['wilayah'][$x];

                        $dataMin = min($dataI);
                        // echo $dataMin . '||';
                        for ($y = 0; $y < 3; $y++) {
                            // echo $dataMin;
                            // echo $dataI[$y] . ' || ';
                            if ($dataI[$y] == $dataMin) {
                                // echo $y+1;
                                $cl = $y + 1;
                            }

                            // echo "<br>";
                        }

                        // echo $dataIT;
                        // echo '<br>';

                        $insertI = [
                            "it_no" => $i,
                            "it_da_id" => $id,
                            "it_data" => $dataIT,
                            "it_cluster" => $cl
                        ];

                        $this->db->insert('iterasi', $insertI);

                        // echo '<br>';

                    }
                }
            }

            // var_dump($cluster[1]);
            for ($i = 0; $i <= $this->input->post('jmlIterasi'); $i++) {
                $data['hslCentroid'][$i] = $this->kmeans->getCentroid($i);
                $data['hslIterasi'][$i] = $this->kmeans->getIterasi($i);
            }

            // var_dump($data['hslCentroid'][0]);


        }

        redirect('pesebaran/maps');
    }

    public function maps()
    {
        $data['title'] = 'Peta Pemetaan Cluster';


        $jmlIterasi = $this->db->query('select max(it_no) as it_no from iterasi')->row_array();


        if ($this->input->post('cl')) {

            if ($this->input->post('cl') == 'Rendah') {
                $cl = 1;
            } else if ($this->input->post('cl') == 'Sedang') {
                $cl = 2;
            } else if ($this->input->post('cl') == 'Tinggi') {
                $cl = 3;
            }

            $data['C1'] = $this->db->query('select distinct da_wilayah, da_lat, da_long, da_2019 , da_2020 from iterasi inner join data_awal on (it_da_id = da_id) where it_no = ' . $jmlIterasi['it_no'] . ' and it_cluster = ' . $cl)->result_array();

            $data['jmlCL'] = $this->db->query('select distinct da_wilayah,da_lat,da_long,da_2019 , da_2020 from iterasi inner join data_awal on (it_da_id = da_id) where it_no = ' . $jmlIterasi['it_no'] . ' and it_cluster = ' . $cl)->num_rows();
        } else {

            if (isset($jmlIterasi)) {
                $data['C1'] = $this->db->query('select distinct da_wilayah,da_lat,da_long, da_2019 , da_2020 from iterasi inner join data_awal on (it_da_id = da_id) where it_no = ' . $jmlIterasi['it_no'] . ' and it_cluster = ' . 3)->result_array();

                $data['jmlCL'] = $this->db->query('select distinct da_wilayah,da_lat,da_long, da_2019, da_2020 from iterasi inner join data_awal on (it_da_id = da_id) where it_no = ' . $jmlIterasi['it_no'] . ' and it_cluster = ' . 3)->num_rows();
            }
        }

        $data["data_iterasi"] = $this->kmeans->getAllIterasi();

        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Persebaran/maps', ($data));
        $this->load->view('Templates/Footer');
    }
}
