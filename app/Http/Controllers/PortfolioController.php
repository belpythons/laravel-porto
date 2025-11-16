<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = [
            'nama' => 'Nama Anda',
            'nim' => '123456789',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Alamat Anda'
        ];

        $portfolio = [
            'pengalaman' => [
                'Contoh pengalaman pertama',
                'Contoh pengalaman kedua'
            ],
            'prestasi' => [
                'Contoh prestasi pertama',
                'Contoh prestasi kedua'
            ],
            'pengalaman_kerja' => [
                'Contoh pekerjaan pertama',
                'Contoh pekerjaan kedua'
            ]
        ];

        return view('portfolio', [
            'profile' => $profile,
            'portfolio' => $portfolio
        ]);
    }
}
