<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/laporan_pkl/index.php?target=";
        $data = [
            array('Text' => 'Home', 'Link' => $base . 'home'),
            array('Text' => 'Siswa', 'Link' => $base . 'siswa'),
            array('Text' => 'Admin', 'Link' => $base . 'admin'),
            array('Text' => 'Ka.Sekolah', 'Link' => $base . 'kepala_sekolah')
        ];
        return $data;
    }
}