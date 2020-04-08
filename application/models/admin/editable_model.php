<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class editable_model extends CI_Model {

    public function getSponsor($id)
    {
        $this->db->select('*');
        $this->db->from('sponsor');
        $this->db->where('id_sponsor', $id);
        return $this->db->get();
    }
    
    public function getDetailJadwal($id)
    {
        $this->db->select('*');
        $this->db->from('detail_jadwal');
        $this->db->where('id_detail_jadwal', $id);
        return $this->db->get();
        
    }

    public function tambahSponsor($gambar)
    {
        $data = array(
            'nama_sponsor'        => $this->input->post('nama_sponsor'),
            'logo_sponsor'        => $gambar['file_name']
        );
        $this->db->insert('sponsor', $data);
    }

    public function editSponsor($gambar, $id)
    {
        $data = array(
            'nama_sponsor'        => $this->input->post('nama_sponsor'),
            'logo_sponsor'        => $gambar['file_name']
        );
        $this->db->where('id_sponsor', $id);
        $this->db->update('sponsor', $data);
    }

    public function ubahEvent($id)
    {
        $data = array(
            'nama_event' => $this->input->post('nama_event'),
            'about_event' => $this->input->post('about_event'),
            'venue' => $this->input->post('venue'),
            'location_venue' => $this->input->post('location_venue'),
            'tanggal' => $this->input->post('tanggal'),
            'status_event' => 1
        );
        $this->db->where('id_event', $id);
        $this->db->update('event', $data);
        
    }

    public function tambahEvent()
    {
        $data = array(
            'nama_event' => $this->input->post('nama_event'),
            'about_event' => $this->input->post('about_event'),
            'venue' => $this->input->post('venue'),
            'location_venue' => $this->input->post('location_venue'),
            'tanggal' => $this->input->post('tanggal'),
            'status_event' => 'aktif'
        );
        $this->db->insert('event', $data);

        $event = $this->db->query('SELECT MAX(id_event) - 1 as event_ubah FROM event')->result_array();
        foreach ($event as $e ) {
            $id = $e['event_ubah'];
        }

        $data = array(
            'status_event' => 'selesai'
        );
        $this->db->where('id_event', $id);
        $this->db->update('event', $data);
        
        
    }

    public function addFaq()
    {
        $data = array(
            'pertanyaan' => $this->input->post('pertanyaan'),
            'jawaban' => $this->input->post('jawaban')
        );
        $this->db->insert('faq', $data);
    }

    public function updateFaq($id)
    {
        $data = array(
            'pertanyaan' => $this->input->post('pertanyaan'),
            'jawaban' => $this->input->post('jawaban')
        );
        $this->db->where('id_faq', $id);
        $this->db->update('faq', $data);
    }

    public function addJadwal()
    {
        $hari = $this->db->query('SELECT MAX(hari) + 1 as new FROM jadwal')->result_array();

        foreach ($hari as $h) {
            $day = $h['new'];
        }

        $data = array(
            'hari' => $day
        );
        $this->db->insert('jadwal', $data);
        
    }

    public function tambah_detail_jadwal($gambar, $id)
    {
        $data = array(
            'waktu' => $this->input->post('waktu'),
            'kegiatan' => $this->input->post('kegiatan'),
            'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
            'gambar' => $gambar['file_name'],
            'id_jadwal' => $id
        );
        $this->db->insert('detail_jadwal', $data);
    }

    public function tambah_jadwal_noImage($id)
    {
        $data = array(
            'waktu' => $this->input->post('waktu'),
            'kegiatan' => $this->input->post('kegiatan'),
            'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
            'id_jadwal' => $id
        );
        $this->db->insert('detail_jadwal', $data);
    }

    public function edit_detail_jadwal($gambar, $id)
    {
        $data = array(
            'waktu' => $this->input->post('waktu'),
            'kegiatan' => $this->input->post('kegiatan'),
            'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
            'gambar' => $gambar['file_name'],
        );
        $this->db->where('id_detail_jadwal', $id);
        $this->db->update('detail_jadwal', $data);
    }

    public function hapus_detail_jadwal($id)
    {
        $this->db->where('id_detail_jadwal', $id);
        $this->db->delete('detail_jadwal');
    }

}

/* End of file editable_model.php */
