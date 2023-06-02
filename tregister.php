<html>
    <body>
        <?php
            $temp=1;
            $file=fopen("tuserinfo.txt",'r');
            while (!feof($file)){
                $line=fgets($file);
                $usr='';
                $array=explode(",",$line);
                if (isset($array[0])) $name=$array[0];
                if (isset($array[1])) $email=$array[1];
                if (isset($array[2])) $usr=$array[2];
                if ($usr==$_GET["username"]){
                    $temp=0;
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert("Username already exists")';  
                    echo '</script>';
                    include 'tregister.html';
                    break;
                }
                if ($name==$_GET["name"]){
                    $temp=0;
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert("Name already exists")';  
                    echo '</script>';
                    include 'tregister.html';
                    break;
                }
                if ($email==$_GET["email"]){
                    $temp=0;
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert("Email already registered")';  
                    echo '</script>';
                    include 'tregister.html';
                    break;
                }
            }
            fclose($file);
            if ($temp==1){
                $file=fopen("tuserinfo.txt","a+");
                $data=$_GET["name"].",".$_GET["email"].",".$_GET["username"].",".$_GET["password"].","."\n";
                fwrite($file,$data);
                fclose($file);
                $x="Users/".$_GET["name"].".txt";
                $file=fopen($x,'w');
                fclose($file);
                $x=fopen("currentuser.txt",'w');
                fwrite($x,$data);
                fclose($x);
                include 'thomepage.php';
            }
        ?>
    </body>
</html>