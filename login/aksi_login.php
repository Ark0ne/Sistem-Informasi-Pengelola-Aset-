<?php
    include '../pengaturan/koneksi.php';
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $exe = mysqli_query($konek, "select * from user where username ='$username' and password ='$password'");
    if(mysqli_num_rows($exe)>0){
        $data = mysqli_fetch_array($exe);
       $_SESSION['status'] = $data['status'];
        if($data['status']=='koordinator'){
        $query = "select * from koordinator where id_user = '$data[0]'";   
        }else{
            $query = "select * from pejabat where id_user = '$data[0]'"; 
        }
        $row = mysqli_fetch_array(mysqli_query($konek,$query));
        if($data['status'] == 'koordinator'){
            $_SESSION['id'] = $row[0];
            $_SESSION['nama'] = $row[2];
            header('location: ../index.php');
        }else if($data['status'] == 'admin'){
            $_SESSION['id'] = $row[0];
            $_SESSION['nama'] = "admin";
            header('location: ../index.php');
        }if($data['status'] == 'validator'){
            $_SESSION['id'] = $row[0];
            $_SESSION['nama'] = $row[2];
            header('location: ../index.php');
        }else{
            $_SESSION['id'] = $row[0];
            $_SESSION['nama'] = $row[2];
            header('location: ../index.php');
        }
    }else{
        echo "<script>alert('Username dan Password Tidak Cocok!');";
        echo "window.location.replace('halaman_login.php');</script>";
    }
?>