<?php
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Your message has been sent successfully")';  
    echo '</script>';
    $x=fopen('currentuser.txt','r');
    $line=fgets($x);
    $array=explode(",",$line);
    if (isset($array[0])) $transportername=$array[0];
    fclose($x);
    
    $x=fopen('Users/'.$transportername.'.txt','r');
    while(!feof($x)){
        $line=fgets($x);
        $array=explode(",",$line);
        if (isset($array[0])) $code=$array[0];
        if ($code==$_GET["orderid"]){
            if (isset($array[0])) $code=$array[0];
            if (isset($array[1])) $to=$array[1];
            if (isset($array[2])) $from=$array[2];
            if (isset($array[3])) $quantity=$array[3];
            if (isset($array[4])) $address=$array[4];
            if (isset($array[5])) $transporter=$array[5];
            if (isset($array[6])) $manufacturername=$array[6];
            break;
        }
    }
    fclose($x);

    $file=fopen('Users/'.$manufacturername.'.txt','a+');
    $line=fgets($file);
    $data=$code.','.$to.','.$from.','.$quantity.','.$address.','.$transporter.','.$_GET["price"].','."\n";
    fwrite($file,$data);
    fclose($file);
    include 'thomepage.php';
?>