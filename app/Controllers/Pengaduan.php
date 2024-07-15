<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pengaduan extends BaseController
{
    protected $complaintModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->complaintModel = new \App\Models\Complaint();
    } 

    public function index()
    {
        return view('pengaduan', [
            'tittle' => 'Daftar Pengaduan',
            'validation' => $this->validation,
            'session' => $this->session
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
            'pelapor' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wajib di isi!!!'
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
                'pelapor' => $this->validation->getError('pelapor'),
                'gambar' => $this->validation->getError('gambar'), 
            ];

            // return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
            $this->session->setFlashdata('failed', 'Data gagal disimpan. Mohon periksa kembali inputan Anda.');
            return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
        } else {
            $gambar = $this->request->getFile('gambar');
            if($gambar->isValid() && !$gambar->hasMoved()){
                $gambarName = $gambar->getRandomName();
                $gambar->move('img/complaint', $gambarName);
            }

            $this->complaintModel->save([
                'judul' => $this->request->getPost('judul'),
                'detail' => $this->request->getPost('detail'),
                'pelapor' => $this->request->getPost('pelapor'),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'gambar' => $gambarName,
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),


            ]);

            $this->session->setFlashdata('success', 'Pengaduan berhasil terikirim');
           
            return $this->response->setJSON(['status' => TRUE, 'redirectUrl' => '/pengaduan' ]);
        }

    }

}