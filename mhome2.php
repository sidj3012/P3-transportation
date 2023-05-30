<?php
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Your message has been sent successfully")';  
    echo '</script>';
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code = '';
    for ($i = 0; $i <6; $i++) {
    $randomIndex = mt_rand(0, strlen($characters) - 1);
    $code .= $characters[$randomIndex];
    }
    $x=fopen('currentuser.txt','r');
    $line=fgets($x);
    $array=explode(",",$line);
    if (isset($array[0])) $name=$array[0];
    if (isset($array[4])) $address=$array[4];
    fclose($x);
    $file=fopen('Users/'.$_GET["transporter"].'.txt','a+');
    $data=$code.','.$_GET["to"].','.$_GET["from"].','.$_GET["quantity"].','.$address.','.$_GET["transporter"].','.$name.",\n";
    fwrite($file,$data);
    fclose($file);
    include 'mhomepage.php';
?>