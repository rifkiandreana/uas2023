<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Complaint as ModelsComplaint;

class Complaint extends BaseController
{

    protected $complaintModel;
    
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->complaintModel = new \App\Models\Complaint();
    } 

    public function index()
    {
        return view('complaint/index', [
            'tittle' => 'Daftar Pengaduan',
            'data' => $this->complaintModel->findAll(),
            'session' => $this->session,
        ]);
    }
    
    public function buktifoto()
    {
        return view('complaint/kumpulanfoto', [
            'tittle' => 'Gambar pesisir kotor',
            'data' => $this->complaintModel->findAll(),
            'session' => $this->session,
        ]);
        
    }

    public function grafik()
    {
        $complaintsByMonthYear = $this->complaintModel
        ->select('DATE_FORMAT(created_at, "%Y-%m") as month_year, COUNT(*) as total')
        ->groupBy('month_year')
        ->orderBy('month_year')
        ->findAll();

        $laporanIds = [];
        $dataChart = [];

        foreach ($complaintsByMonthYear as $complaint) {
            $laporanIds[] = date('F Y', strtotime($complaint['month_year']));
            $dataChart[] = $complaint['total'];
        }

        return view('complaint/grafik', [
            'laporanIds' => $laporanIds,
            'dataChart' => $dataChart,
            'session' => $this->session,
        ]);
    }

    public function store()
    {
        $rules = [
            'judul' => [
                'label' => 'Perihal',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal Wajib diisi.'
                ]
            ],
            'detail' => [
                'label' => 'Detail',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Detail wajib diisi',
                    'min_length' => 'Jelaskan detail minimal harus 8 karakter'
                ]
            ],
            'no_telpon' => [
                'label' => 'No. Telpon/WhatsApp',
                'rules' => 'required|numeric|min_length[10]|max_length[13]',
                'errors' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus angka',
                    'min_length' => 'Minimal 10 angka',
                    'max_length' => 'Maksimal 13 angka'
                ]
            ],
            'gambar' => [
                'label' => 'Upload Gambar',
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Gambar wajib diisi.',
                    'mime_in' => 'Format gambar harus jpg, jpeg, atau png.',
                    'max_size' => 'Ukuran gambar maksimal 2 MB.'
                ]
            ],

            
        ];

        if (!$this->validate($rules)) {
            $errors = [
                'judul' => $this->validation->getError('judul'),
                'detail' => $this->validation->getError('detail'),
                'no_telpon' => $this->validation->getError('no_telpon'),
                'gambar' => $this->validation->getError('gambar'), 
            ];

            return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
        } else {
            $gambar = $this->request->getFile('gambar');
            if($gambar->isValid() && !$gambar->hasMoved()){
                $gambarName = $gambar->getRandomName();
                $gambar->move('img/complaint', $gambarName);
            }
            $pelapor = $this->request->getPost('pelapor');
            $userNama = $this->session->get('user')['nama'];
            if ($pelapor !== $userNama) {
                if($pelapor !== 'anonym'){
                    $pelapor = $userNama;
                }
            }

            $this->complaintModel->save([
                'judul' => $this->request->getPost('judul'),
                'detail' => $this->request->getPost('detail'),
                'pelapor' => $pelapor,
                'no_telpon' => $this->request->getPost('no_telpon'),
                'gambar' => $gambarName,
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
            ]);

            return $this->response->setJSON(['status' => TRUE, 'redirectUrl' => '/complaint']); 
        }

    }

    public function delete($pengaduan_id)
    {
    $complaint = $this->complaintModel->find($pengaduan_id);

    if (empty($complaint)) {
        // Complaint not found
        session()->setFlashdata('notif', 'Data tidak ditemukan');
    } else {
        // Delete the complaint's image
        $gambarPath = 'img/complaint/' . $complaint['gambar'];
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }

        // Delete the complaint record
        $this->complaintModel->deleteComplaint($pengaduan_id);

        session()->setFlashdata('notif', 'Data berhasil dihapus');
    }

    return redirect()->to('/dashboard');
}

   

// public function delete ($pengaduan_id){

//     $pengaduan = new Complaint();
//     $pengaduan->where('pengaduan_id', $pengaduan_id);
//     $pengaduan->delete();
//     session()->setFlashdata('notif', 'Data Berhasil di hapus');
//      return redirect('/dashboard');

// }


  









}
