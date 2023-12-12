<?php

namespace Master;

use Config\Query_builder;

class siswa 
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('siswa')->get()->resultArray();
        $res = '<a href="?target=siswa&act=tambah_siswa" class="btn btn-info btn-sm">MENDAFTAR</a><br><br>
        <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>NO KK</th>
                    <th>NAMA SISWA</th>
                    <th>NAMA AYAH</th>
                    <th>NAMA IBU</th>
                    <th>ALAMAT</th>
                    <th>JK</th>
                    <th>ACT</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="100">'.$r['nik'].'</td>
                <td width="100">'.$r['no_kk'].'</td>
                <td>'.$r['nama'].'</td>
                <td>'.$r['nama_ayah'].'</td>
                <td>'.$r['nama_ibu'].'</td>
                <td>'.$r['alamat'].'</td>
                <td width="10">'.$r['jk'].'</td>
                <td width="150">
                    <a href="?target=siswa&act=edit_siswa&id='.$r['nik'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=siswa&act=delete_siswa&id='.$r['nik'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
        $res .='</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res ='<a href="?target=siswa" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .='<form method="post" action="?target=siswa&act=simpan_siswa">
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="no_kk" class="form-label">No KK</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
            </div>
            <div class="mb-3">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="JK" class="form-label">JK</label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk" value="L">
                    <label class="form-check-label" for="jk">
                        L
                    </label>
            </div>
            <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk" value="P">
                    <label class="form-check-label" for="jk">
                        P
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">DAFTAR</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $nik = $_POST['nik'];
        $no_kk = $_POST['no_kk'];
        $nama = $_POST['nama'];
        $nama_ayah = $_POST['nama_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];

        $data = array(
            'nik' => $nik,
            'no_kk' => $no_kk,
            'nama' => $nama,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'alamat' => $alamat,
            'jk' => $jk
        );
        return $this->db->table(' siswa ')->insert($data);
    }
    public function edit($id)
    {
        // get data siswa
        $r = $this->db->table('siswa ')->where(" nik='$id'" )->get()->rowArray();
        //cek radio

        $res = '<a href="?target=siswa" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=siswa&act=update_siswa">
            <input type="hidden" class="form-control" name="param" id="param" value="'.$r['nik'].'">

            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="'.$r['nik'].'">
            </div>
            <div class="mb-3">
                <label for="no_kk" class="form-label">No_KK</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" value="'.$r['no_kk'].'">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="'.$r['nama'].'">
            </div>
            <div class="mb-3">
                <label for="nama_ayah" class="form-label">Nama_Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="'.$r['nama_ayah'].'">
            </div>
            <div class="mb-3">
                <label for="nama_ibu" class="form-label">Nama_Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="'.$r['nama_ibu'].'">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="'.$r['alamat'].'">
            </div>
            <div class="mb-3">
                <label for="JK" class="form-label">JK</label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="L" '.$this->cekRadio($r['jk'],1).'>
                    <label class="form-check-label" for="jk1">
                        L
                    </label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="jk0" value="P" '.$this->cekRadio($r['jk'],0).'>
                <label class="form-check-label" for="jk0">
                    P
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;
    }

    public function cekRadio($val, $val2){
        if($val==$val2){
            return "checked";
        }
        return "";
    }

    public function update(){
        $param = $_POST['param'];
        $nik = $_POST['nik'];
        $no_kk = $_POST['no_kk'];
        $nama = $_POST['nama'];
        $nama_ayah = $_POST['nama_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];

        $data = array(
            'nik' => $nik,
            'no_kk' => $no_kk,
            'nama' => $nama,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'alamat' => $alamat,
            'jk' => $jk
        );
        return $this->db->table(' siswa ')->where(" nik='$param'")->update($data);
    }

    public function delete($id){
        return $this->db->table(' siswa ')->where(" nik='$id'")->delete();
    }
}