<?php
include 'koneksi.php';
include 'proses.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Aplikasi CRUD</title>
  </head>
  <body>
    <center><h1 style="color: Black; font-size: 60px; font-family: Franklin Gothic Medium;">Aplikasi CRUD</h1></center>
    <center><h5 style="color: Black;">Febri Pujiani (20051214066))</h5></center>

    <div class="container">
    <div class="card-header bg-primary text-white">
      <h5>Form Input Data Mahasiswa</h5>
    </div>

    <form style="background-color:BrownPastel">
      <fieldset>
    <div class="form-group">
        <b><label>NIM</label></b>
        <input type="text" name="tnim" class="form-control" placeholder="Masukan NIM" required="">
      </div>

      <div class="form-group">
        <b><label>Nama Mahasiswa</label></b>
        <input type="text" name="tnama" class="form-control" placeholder="Masukan Nama" required="">
      </div>

      <div><b><label>Jenis Kelamin</label></b></div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          Laki-laki
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          Perempuan
        </label>
      </div>

      <div class="form-group">
        <b><label>Alamat</label></b>
        <textarea type="text" name="talm" class="form-control" placeholder="Masukan Alamat" required=""></textarea> 
      </div>

      <div class="form-group">
        <b><label>Kota</label></b>
        <input type="text" name="tkota" class="form-control" placeholder="Masukan Kota" required="">
      </div>

      <div class="mb-3">
        <b><label for="exampleFormControlInput1" class="form-label">Email</label></b>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>

      <div class="form-group">
        <b><label>Foto</label></b>
        <input type="file" name="tfoto" required="" multiple >
        <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p> 
      </div>

      <div class="d-grid gap-2 d-md-block"><center>
        <button type="submit" class="btn btn-success" name="bsim" >Simpan</button>
        <button type="reset" class="btn btn-danger" name="bres">Hapus</button></center>
      </div>
      </div>
      </fieldset>
    </form>

        <div class="container">
    <div class="card mt-5">
    <div class="card-header bg-primary text-white">
      <h5>Data Mahasiswa</h5>
    </div>
    <form style="background-color:PowderPurple">
    <div class="card-body">
     <table class="table table-bordered table-striped bg-white">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Email</th>
        <th>Foto</th>
      </tr>

      <?php
        $no = 1;
        $tampil = mysqli_query ($koneksi, "SELECT * from tbl_mhs order by ID desc");
      while($data = mysqli_fetch_array ($tampil)) ;
      ?>

      <tr>
        <td><?=$no++?></td>
        <td><?=$data['nim']?></td>
        <td><?=$data['namamhs']?></td>
        <td><?=$data['jk']?></td>
        <td><?=$data['alamat']?></td>
        <td><?=$data['kota']?></td>
        <td><?=$data['email']?></td>
        <td><?=$data['foto']?></td>
        <td>
          <a href="index.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning"> Edit </a>
          <a href="index.php?hal=hapus&id=<?=$data['id']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
        </td>

      </tr>
     <?php?>

     </table>
    </div>
  </div>
  </div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>