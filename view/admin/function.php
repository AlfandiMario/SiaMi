<?php
require '../../database/connect.php';

if (isset($_POST['hapus'])) {
    if (isset($_POST['kode_mk'])) {
        $datayangdihapus = 'mk';
        $jenispengenal = 'kode_mk';
        $nomerunik = $_POST['kode_mk'];
        hapus($datayangdihapus, $jenispengenal, $nomerunik);
    }
    if (isset($_POST['nip'])) {
        $datayangdihapus = 'dosen';
        $jenispengenal = 'nip';
        $nomerunik = $_POST['nip'];
        hapus($datayangdihapus, $jenispengenal, $nomerunik);
    }
    if (isset($_POST['nim'])) {
        $datayangdihapus = 'mahasiswa';
        $jenispengenal = 'nim';
        $nomerunik = $_POST['nim'];
        hapus($datayangdihapus, $jenispengenal, $nomerunik);
    }
};

if (isset($_POST['tambah'])) {
    if (isset($_POST['nama_mk'])) {
        $nama_mk = $_POST["nama_mk"];
        $kode_mk = $_POST["kode_mk"];
        $semester = $_POST["semester"];
        $NIP_pengampu = $_POST["pengampu"];
        $data = 'mk';
        $hasil_cek = cek($data, $kode_mk, $nama_mk);
        if ($hasil_cek) {
            tambah($data, $kode_mk, $nama_mk, $NIP_pengampu, $semester);
        }
    } else if (isset($_POST['nip'])) {
        $nip = $_POST['nip'];
        $nama_dosen = $_POST['nama_dosen'];
        $data = 'dosen';
        $hasil_cek = cek($data, '', '', $nip);
        if ($hasil_cek) {
            tambah($data, '', '', '', '', $nip, $nama_dosen);
        }
    } else if (isset($_POST['nim'])) {
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $angkatan = $_POST['angkatan'];
        $data = 'mahasiswa';
        $hasil_cek = cek($data, '', '', '', $nim);
        if ($hasil_cek) {
            tambah($data, '', '', '', '', '', '', $nim, $nama_mhs, $angkatan);
        }
    }
};

if (isset($_POST['ubah'])) {
    if (isset($_POST['ubah_mk'])) {
        $kode_mklama = $_POST['kode_mklama'];
        $nama_mk = $_POST["nama_mk"];
        $kode_mk = $_POST["kode_mk"];
        $semester = $_POST["semester"];
        $NIP_pengampu = $_POST["pengampu"];
        $data = 'mk';
        $hasil_cek = true;
        if ($kode_mklama != $kode_mk) {
            $hasil_cek = cek($data, $kode_mk, $nama_mk);
        }
        if ($hasil_cek) {
            update($data, $kode_mk, $nama_mk, $NIP_pengampu, $semester, $kode_mklama);
        }
    }
    if (isset($_POST['ubah_dosen'])) {
        $nip_lama = $_POST['nip_lama'];
        $nama_dosen = $_POST['nama_dosen'];
        $nip = $_POST['nip'];
        $data = 'dosen';
        $hasil_cek = true;
        if ($nip_lama != $nip) {
            $hasil_cek = cek($data, '', '', $nip);
        }
        if ($hasil_cek) {
            update($data, '', '', '', '', '', $nip, $nip_lama, $nama_dosen);
        }
    }
    if (isset($_POST['ubah_mhs'])) {
        $nim_lama = $_POST['nim_lama'];
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $angkatan = $_POST['angkatan'];
        $hasil_cek = true;
        $data = 'mahasiswa';
        if ($nim != $nim_lama) {
            $hasil_cek = cek($data, '', '', '', $nim);
        }
        if ($hasil_cek) {
            update($data, '', '', '', '', '', '', '', '', $nim, $nim_lama, $nama_mhs, $angkatan);
        }
    }
}


function cek($data, $kode_mk = 0, $nama_mk = 0, $nip = 0, $nim = 0)
{
    global $conn;
    if ($data === 'mk') {
        $result = mysqli_query($conn, "SELECT kode_mk FROM mk WHERE kode_mk = '$kode_mk'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('Mata Kuliah Sudah Ada'); document.location.href = 'javascript:history.back()';</script>";
            return false;
        }
        $result = mysqli_query($conn, "SELECT nama_mk FROM mk WHERE nama_mk = '$nama_mk'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('Mata Kuliah Sudah Ada'); document.location.href = 'javascript:history.back()';</script>";
            return false;
        }
    } else if ($data === 'dosen') {
        $result = mysqli_query($conn, "SELECT nip FROM dosen WHERE nip = '$nip'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('Dosen Sudah Ada'); document.location.href = 'javascript:history.back()';</script>";
            return false;
        }
    } else if ($data === 'mahasiswa') {
        $result = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim = '$nim'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('Mahasiswa Sudah Ada'); document.location.href = 'javascript:history.back()';</script>";
            return false;
        }
    }
    return true;
}



function tambah($tambahapa, $kode_mk = 0, $nama_mk = 0, $NIP_pengampu = 0, $semester = 0, $nip = 0, $nama_dosen = 0, $nim = 0, $nama_mhs = 0, $angkatan = 0)
{
    global $conn;
    if ($tambahapa === 'mk') {

        $inputmk1 = "INSERT INTO mk VALUES ('', '$kode_mk','$nama_mk', '$NIP_pengampu','$semester')";

        mysqli_query($conn, $inputmk1);
    } else if ($tambahapa === 'dosen') {
        $inputdsn = "INSERT INTO dosen VALUES ('','$nip','$nama_dosen',2)";
        mysqli_query($conn, $inputdsn);
    } else if ($tambahapa === 'mahasiswa') {
        $input = "INSERT INTO mahasiswa VALUES ('','$nim','$nama_mhs','$angkatan',3)";
        mysqli_query($conn, $input);
        var_dump($input);
    }
    $cek =  mysqli_affected_rows($conn);

    if ($cek > 0) {
        echo "
         <script>
         alert ('data berhasil ditambahkan!');
         document.location.href = 'javascript:history.back()';
         </script>";
        # code...
    } else {
        echo "
         <script>
         alert ('gagal!');
         document.location.href = 'javascript:history.back()';
         </script>";
    }
}

function update($updateapa, $kode_mk = 0, $nama_mk = 0, $NIP_pengampu = 0, $semester = 0, $kode_mklama = 0, $nip = 0, $nip_lama = 0, $nama_dosen = 0, $nim = 0, $nim_lama = 0, $nama_mhs = 0, $angkatan = 0)
{
    global $conn;
    if ($updateapa === 'mk') {
        $inputmk1 = "UPDATE mk SET 
                    kode_mk = '$kode_mk', nama_mk = '$nama_mk', NIP_pengampu = '$NIP_pengampu', semester = '$semester'
                    WHERE kode_mk = '$kode_mklama' ";

        mysqli_query($conn, $inputmk1);
    }
    if ($updateapa === 'dosen') {
        $input = "UPDATE dosen SET nip = '$nip',nama = '$nama_dosen' WHERE nip='$nip_lama'";
        mysqli_query($conn, $input);
    }
    if ($updateapa === 'mahasiswa') {
        $input = "UPDATE mahasiswa SET nim ='$nim', nama = '$nama_mhs' , angkatan= '$angkatan' Where nim = '$nim_lama' ";
        mysqli_query($conn, $input);
    }

    $cek =  mysqli_affected_rows($conn);

    if ($cek > 0) {
        echo "
          <script>
          alert ('data berhasil diubah!');
          document.location.href = 'javascript:history.back()';
          </script>";
          # code...
    } else {
        echo "
          <script>
          alert ('gagal!');
          document.location.href = 'javascript:history.back()';
          </script>";
    }
}



function hapus($datayangdihapus, $jenispengenal, $pengenal)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM $datayangdihapus WHERE $jenispengenal = '$pengenal'");
    $cek =  mysqli_affected_rows($conn);
    if ($cek > 0) {
        echo "
              <script>
              alert ('data berhasil dihapus!');
              document.location.href = 'javascript:history.back()';
              </script>";
    } else {
        echo "
              <script>
              alert ('gagal!');
              document.location.href = 'javascript:history.back()';
              </script>";
    }
}
