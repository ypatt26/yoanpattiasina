<?php
$koneksi=mysqli_connect("localhost","root","","member_pioneer34")
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body background="gambar.jpg">
    <center>
    <h2>REGISTRASI DATA ALUMNI PIONEER 34</h2>

<?php
    $dataEdit[1]="";
    $dataEdit[2]="";
    $dataEdit[3]="";
    $dataEdit[4]="";
    $tombol="registrasi";
    if(isset($_GET['aksi'])) {
        if($_GET['aksi']=='edit') {
            $edit="SELECT * FROM data_alumni WHERE id='$_GET[id]'";
            $cekEdit= mysqli_query($koneksi,$edit);
            $dataEdit=mysqli_fetch_array($cekEdit);

            $tombol="edit";
        }
    }
?>
<form action="" method="post">
    <table bgcolor="F08080">
        <tr>
            <td>Nama</td>
            <td>:</td> 
            <td><input type="text" name="nama" id="nama" value="<?=$dataEdit[1]?>"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td> 
            <td><input type="text" name="kelas" id="kelas" value="<?=$dataEdit[2]?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td> 
            <td><input type="text" name="alamat" id="alamat" value="<?=$dataEdit[3]?>"></td>
        </tr>
        <tr>
            <td>No_Hp</td>
            <td>:</td> 
            <td><input type="text" name="no_hp" id="no_hp" value="<?=$dataEdit[4]?>"></td>
        </tr>
    </table>
    <tr><input type="submit" value="<?=$tombol?>" name="<?=$tombol?>"></tr>
</form>

<table border="1" bgcolor="#FFE4B5">
<thead>
    <th>Nomor</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Alamat</th>
    <th>No_Hp</th>
    <th>Aksi</th>
</thead>
<tbody>

<?php
    $sqlView = "SELECT * FROM `data_alumni`";
    $cekView = mysqli_query($koneksi, $sqlView);
        
    $nomor = 1;
    while ($data = mysqli_fetch_array($cekView)) {
?>
    <tr>
        <td><?=$nomor?></td>
        <td><?=$data[1]?></td>
        <td><?=$data[2]?></td>
        <td><?=$data[3]?></td>
        <td><?=$data[4]?></td>
        <td>
            <a href="tugasdb.php?id=<?=$data[0]?>&aksi=edit">Edit</a>
        </td>
    </tr>

<?php
    $nomor=$nomor+1;
    }
?>

</tbody>
</table>
</center>
</body>
</html>

<?php
    if(isset($_POST['registrasi'])) 
    {
        $sql = "INSERT INTO `data_alumni` (`Nama`,`Kelas`,`Alamat`,`No_Hp`) VALUES ('$_POST[nama]', '$_POST[kelas]', '$_POST[alamat]', '$_POST[no_hp]')";
        $cekInput = mysqli_query($koneksi, $sql);

        if($cekInput) {
            echo "<script> window.location = 'tugasdb.php'</script>";
        } else {    
            echo "Data belum masuk";
        }
    }
    else if (isset($_POST['edit']))
    {
        $edit = "UPDATE `data_alumni` SET `nama` = '$_POST[nama]', `kelas` = '$_POST[kelas]', `alamat` = '$_POST[alamat]', `no_hp` = '$_POST[no_hp]'  WHERE `data_alumni`.`id` = '$_GET[id]';";
        $cekEdit = mysqli_query($koneksi, $edit);  

        if($cekEdit) {
            echo "<script> window.location = 'tugasdb.php'</script>";
        } else {    
            echo "Data belum masuk";
        }
    }
?>