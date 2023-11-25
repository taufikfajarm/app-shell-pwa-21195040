<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form input-barang 
$nama=$_POST["nama"];
$alamat=$_POST["alamat"];
$telepon=$_POST["telepon"];

//Query input menginput data kedalam tabel barang
  $sql="insert into data_customer (nama, alamat, telepon) values
		('$nama','$alamat','$telepon')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil insert data";
    header("Location: download.php");
	exit;
  }
else {
	echo "Gagal insert data";
	exit;
}  