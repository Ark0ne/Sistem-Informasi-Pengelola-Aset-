<?php
$konek = mysqli_connect("localhost","root","","asset");
if ($konek){
    echo mysqli_error($konek);
}
?>