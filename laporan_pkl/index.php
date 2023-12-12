<?php

use Master\Siswa;
use Master\Admin;
use Master\Kepala_Sekolah;
use Master\Menu;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$siswa = new Siswa($dataKoneksi);
$admin = new Admin($dataKoneksi);
$kepala_sekolah = new Kepala_Sekolah($dataKoneksi);
// $siswa->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MI IBRAHIMY</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body{
        background-image: url('img/secang.jpg');
        background-size: 100%;
    }
</style>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src=" assets/img/LOGO MI.png" width="6%"> MI IBRAHIMY SECANG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r){
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['Link']; ?>" class="nav-link">
                                <?php echo $r['Text']; ?>
                                </a>
                            </li>
                            <?php
                            
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
            if (!isset($target) or $target == "home"){
                echo "Hai, Selamat datang di beranda";
                // =========== start kontent siswa ======================
            } elseif ($target == "siswa") {
                if ($act == "tambah_siswa") {
                    echo $siswa->tambah();
                } elseif ($act == "simpan_siswa") {
                    if ($siswa->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=siswa';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=siswa';
                        </script>";
                    }
                } elseif ($act == "edit_siswa") {
                    $id = $_GET['id'];
                    echo $siswa->edit($id);
                } elseif ($act == "update_siswa") {
                    if ($siswa->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=siswa';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=siswa';
                            </script>";
                    }
                } elseif ($act == "delete_siswa") {
                    $id = $_GET['id'];
                    if ($siswa->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=siswa';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=siswa';
                            </script>";
                    }
                } else {
                    echo $siswa->index();
                }
                // ========================= end konten siswa =========================
                // admin
            } elseif ($target == "admin") {
                if ($act == "tambah_admin") {
                    echo $admin->tambah();
                } elseif ($act == "simpan_admin") {
                    if ($admin->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=admin';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=admin';
                        </script>";
                    }
                } elseif ($act == "edit_admin") {
                    $id = $_GET['id'];
                    echo $admin->edit($id);
                } elseif ($act == "update_admin") {
                    if ($admin->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=admin';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=admin';
                            </script>";
                    }
                } elseif ($act == "delete_admin") {
                    $id = $_GET['id'];
                    if ($admin->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=admin';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=admin';
                            </script>";
                    }
                } else {
                    echo $admin->index();
                }

                // kepala_sekolah
            } elseif ($target == "kepala_sekolah") {
                if ($act == "tambah_kepala_sekolah") {
                    echo $kepala_sekolah->tambah();
                } elseif ($act == "simpan_kepala_sekolah") {
                    if ($kepala_sekolah->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=kepala_sekolah';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=kepala_sekolah';
                        </script>";
                    }
                } elseif ($act == "edit_kepala_sekolah") {
                    $id = $_GET['id'];
                    echo $kepala_sekolah->edit($id);
                } elseif ($act == "update_kepala_sekolah") {
                    if ($kepala_sekolah->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=kepala_sekolah';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=kepala_sekolah';
                            </script>";
                    }
                } elseif ($act == "delete_kepala_sekolah") {
                    $id = $_GET['id'];
                    if ($kepala_sekolah->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=kepala_sekolah';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=kepala_sekolah';
                            </script>";
                    }
                } else {
                    echo $kepala_sekolah->index();
                }
                // no page
            } else {
                echo "Page 404 Not found";
            }
            ?>

        </div>
    </div>

</body>

</html>