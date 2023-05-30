<html>
    <body>
        <?php
            $temp=0;
            $temp2=0;
            $file=fopen("muserinfo.txt",'r');
            while (!feof($file)){
                $line=fgets($file);
                $array=explode(",",$line);
                if (isset($array[2])) $usr=$array[2];
                if (isset($array[3])) $pass=$array[3];
                if ($usr==$_GET["username"]){
                    $temp2=1;
                }
                if ($usr==$_GET["username"] && $pass==$_GET["password"]){
                    $x=fopen("currentuser.txt",'w');
                    fwrite($x,$line);
                    fclose($x);
                    $temp=1;
                    include 'mhomepage.php';
                    break;
                }
            }
            if ($temp2==0){
                echo '<script type ="text/JavaScript">';  
                echo 'alert("Username does not exist")';  
                echo '</script>';
                include 'mlogin.html';
            }
            if ($temp==0 && $temp2==1){
                echo '<script type ="text/JavaScript">';  
                echo 'alert("Password does not match")';  
                echo '</script>';
                include 'mlogin.html';
            }
        ?>
        </body>
        </html>