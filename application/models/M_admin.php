<?php
class M_admin extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
//=============================== MAHASISWA ===============================
    public function dt_mahasiswa()
    {   

        $this->db->select('m.id_mhs, m.nim, m.nama, m.tanggal_lahir,m.alamat');
        $this->db->from('mhs_nurhaliza m');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_mahasiswa_detil($id)
    {
        $this->db->select('m.id_mhs, m.nim, m.nama, m.tanggal_lahir,m.alamat');
        $this->db->from('mhs_nurhaliza m');
        $query = $this->db->get();
        return $query->row_array();           
    }

    public function dt_mahasiswa_tambah()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat')
        );
        return $this->db->insert('mhs_nurhaliza', $data);
    }

    public function dt_mahasiswa_edit($id)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->where('nim', $id);
        return $this->db->update('mhs_nurhaliza', $data);
    }



//=============================== UKM ===============================
    

    public function dt_ukm($id = FALSE)
    {
        $this->db->select('u.id_ukm, u.nama_ukm,u.deskripsi');
        $this->db->from('ukm_nurhaliza u');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ukm_tambah()
    {
        $data = array(
            'nama_ukm' => $this->input->post('nama_ukm'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        return $this->db->insert('ukm_nurhaliza', $data);
    }  

    public function dt_ukm_edit($id)
    {
        $data = array(

            'nama_ukm' => $this->input->post('nama_ukm'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->db->where('nama_ukm', $id);
        return $this->db->update('ukm_nurhaliza', $data);        
    }




    //=============================== Pendaftaran anggota ===============================
     public function dropdown_mhs()
    {
        $query = $this->db->get('mhs_nurhaliza');
        $result = $query->result();

        $id_mhs = array('-Pilih-');
        $nim = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_mhs, $result[$i]->id_mhs);
            array_push($nim, $result[$i]->nim);
        }
        return array_combine($id_mhs, $nim);
    }

    public function dropdown_ukm()
    {
        $query = $this->db->get('ukm_nurhaliza');
        $result = $query->result();

        $id_ukm = array('-Pilih-');
        $nama_ukm = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_ukm, $result[$i]->id_ukm);
            array_push($nama_ukm, $result[$i]->nama_ukm);
        }
        return array_combine($id_ukm, $nama_ukm);
    }


     public function dt_daftar()
    {
        $this->db->select('d.id_daftar,m.nim, m.nama, u.nama_ukm');
        $this->db->from('daftar_nurhaliza d');
        $this->db->join('mhs_nurhaliza m', 'd.id_mhs = m.id_mhs','left');
        $this->db->join('ukm_nurhaliza u', 'd.id_ukm = u.id_ukm','left');
        $query = $this->db->get();
        return $query->result_array();        
    }

    public function dt_daftar_tambah()
    {
        $data = array(

             'id_mhs' => $this->input->post('id_mhs'),
        
            'id_ukm' => $this->input->post('id_ukm'),
            
        );

        return $this->db->insert('daftar_nurhaliza', $data);
    }

    public function dt_daftar_edit($id)
    {
        $data = array(
           
             'id_mhs' => $this->input->post('id_mhs'),
           
            'id_ukm' => $this->input->post('id_ukm'),
           
        );
        $this->db->where('id_daftar', $id);
        return $this->db->update('daftar_nurhaliza', $data);
    }


}