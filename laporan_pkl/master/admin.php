<?php

namespace Master;

use Config\Query_builder;

class Admin 
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('admin')->get()->resultArray();
        $res = '<a href="?target=admin&act=tambah_admin" class="btn btn-info btn-sm">TAMBAH SISWA</a><br><br>
        <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NO REG</th>
                    <th>NAMA SISWA</th>
                    <th>TANGGAL DAFTAR</th>
                    <th>ALAMAT</th>
                    <th>KETERANGAN</th>
                    <th>JK</th>
                    <th>ACT</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="100">'.$r['no_reg'].'</td>
                <td>'.$r['nama_siswa'].'</td>
                <td>'.$r['tanggal_daftar'].'</td>
                <td>'.$r['alamat'].'</td>
                <td>'.$r['keterangan'].'</td>
                <td width="10">'.$r['jk'].'</td>
                <td width="150">
                    <a href="?target=admin&act=edit_admin&id='.$r['no_reg'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=admin&act=delete_admin&id='.$r['no_reg'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
        $res .='</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res ='<a href="?target=admin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .='<form method="post" action="?target=admin&act=simpan_admin">
            <div class="mb-3">
                <label for="no_reg" class="form-label">No Reg</label>
                <input type="text" class="form-control" id="no_reg" name="no_reg">
            </div>
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa">
            </div>
            <div class="mb-3">
                <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                <input type="date" class="form-control" id="tanggal_daftar" name="tanggal_daftar">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
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
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $no_reg = $_POST['no_reg'];
        $nama_siswa = $_POST['nama_siswa'];
        $tanggal_daftar = $_POST['tanggal_daftar'];
        $alamat = $_POST['alamat'];
        $keterangan = $_POST['keterangan'];
        $jk = $_POST['jk'];

        $data = array(
            'no_reg' => $no_reg,
            'nama_siswa' => $nama_siswa,
            'tanggal_daftar' => $tanggal_daftar,
            'alamat' => $alamat,
            'keterangan' => $keterangan,
            'jk' => $jk
        );
        return $this->db->table(' admin ')->insert($data);
    }
    public function edit($id)
    {
        // get data admin
        $r = $this->db->table('admin ')->where(" no_reg='$id'" )->get()->rowArray();
        //cek radio

        $res = '<a href="?target=admin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=admin&act=update_admin">
            <input type="hidden" class="form-control" name="param" id="param" value="'.$r['no_reg'].'">

            <div class="mb-3">
                <label for="no_reg" class="form-label">No Reg</label>
                <input type="text" class="form-control" id="nik" name="no_reg" value="'.$r['no_reg'].'">
            </div>
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="'.$r['nama_siswa'].'">
            </div>
            <div class="mb-3">
                <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                <input type="text" class="form-control" id="tanggal_daftar" name="tanggal_daftar" value="'.$r['tanggal_daftar'].'">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="'.$r['alamat'].'">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="'.$r['keterangan'].'">
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
        $no_reg = $_POST['no_reg'];
        $nama_siswa = $_POST['nama_siswa'];
        $tanggal_daftar = $_POST['tanggal_daftar'];
        $alamat = $_POST['alamat'];
        $keterangan = $_POST['keterangan'];
        $jk = $_POST['jk'];

        $data = array(
            'no_reg' => $no_reg,
            'nama_siswa' => $nama_siswa,
            'tanggal_daftar' => $tanggal_daftar,
            'alamat' => $alamat,
            'keterangan' => $keterangan,
            'jk' => $jk
        );
        return $this->db->table(' admin ')->where(" no_reg='$param'")->update($data);
    }

    public function delete($id){
        return $this->db->table(' admin ')->where(" no_reg='$id'")->delete();
    }
}