<html>
    <body>
        <?php
            $temp=1;
            $file=fopen("tuserinfo.txt",'r');
            while (!feof($file)){
                $line=fgets($file);
                $usr='';
                $array=explode(",",$line);
                if (isset($array[2])) $usr=$array[2];
                if ($usr==$_GET["username"]){
                    $temp=0;
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert("Username already exists")';  
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
                include 'thomepage.php';
            }
        ?>
    </body>
</html>