<?php
include 'koneksi.php';
?>

<?php

//jika tombol simpan diklik
if(isset($_POST['bsim']))
{
  //pengujian simpan setelah edit
  if($_GET['hal'] == "edit") 
  {
    //data diedit
    $edit =  mysqli_query($koneksi,"UPDATE tbl_mhs set 
                      nim ='$_POST[tnim]',
                      namamhs ='$_POST[tnama]',
                      jk ='$_POST[tjk]',
                      alamat ='$_POST[talm]',
                      kota ='$_POST[tkota]',
                      email ='$_POST[tkeml]',
                      foto ='$_POST[tfoto]'
                      WHERE ID = '$_GET[ID]'
                      ");
    if($edit) 
    {
          echo "<script>
      alert('Edit data sukses!');
      document.location='index.php';
            </script>";
    }
    else 
    {
          echo "<script>
      alert('Edit data gagal!');
      document.location='index.php';
            </script>";
    } 
  }
  else
  {
    $simpan =  mysqli_query($koneksi, "INSERT INTO tbl_mhs(NIM,Nama Mahasiswa,Jenis Kelamin,Alamat,Kota,Email,Foto)
              VALUES ('$_POST[tnim]',
                   '$_POST[tnama]',
                   '$_POST[tjk]',
                   '$_POST[talm]',
                   '$_POST[tkota]',
                   '$_POST[tkeml]',
                   '$_POST[tfoto]')
              ");
      if($simpan) 
      {
        echo "<script>
    alert('Simpan data sukses!');
    document.location='index.php';
          </script>";
      }
      else 
      {
        echo "<script>
    alert('Simpan data gagal!');
    document.location='index.php';
          </script>";
      }
  }

}

  //pengujian edit
  if(isset($_GET['hal']))
  {
    //pengujian
    if($_GET['hal'] == "edit")
    {
      //tampil data
      $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_mhs WHERE ID = '$_GET[ID]' ");
      $data = mysqli_fetch_assoc($tampil);
      if ($data) 
      {
        //penampungan data
        $vnim = $data['NIM'];
        $vnama = $data['Nama Mahasiswa'];
        $vjk = $data['Jenis Kelamin'];
        $valm = $data['Alamat'];
        $vkot = $data['Kota'];
        $veml = $data['Email'];
        $vfoto = $data['Foto'];
      }
    }
    else if ($_GET['hal'] == "hapus")
    {
//persiapan hapus data
      $hapus = mysqli_query($koneksi, "DELETE FROM tbl_mhs WHERE ID = '$_GET[ID]' ");
      if($hapus) {
        echo "<script>
    alert('Hapus data sukses!');
    document.location='index.php';
          </script>";
      }
    }
  }
?>