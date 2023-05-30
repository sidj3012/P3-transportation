<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="searchbox">
        <form class="example" action="search.php">
            <input required type="text" placeholder="Search by Order ID" name="orderid">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        <form class="example" action="search.php">
            <input required type="text" placeholder="Search by To" name="to">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        <form class="example" action="search.php">
            <input required type="text" placeholder="Search by From" name="from">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <a id="logout" href='index.html'>Log Out</a>
    </div>
<section class="container">
<?php 
    $x=fopen('currentuser.txt','r');
    $line=fgets($x);
    $array=explode(",",$line);
    if (isset($array[0])) $name=$array[0];
    fclose($x);

    $file=fopen('Users/'.$name.'.txt','r');
    $line=fgets($file);
        $array=explode(",",$line);
    while(!feof($file)){
        if (isset($array[0])) $orderid=$array[0];
        if (isset($array[1])) $to=$array[1];
        if (isset($array[2])) $from=$array[2];
        if (isset($array[3])) $quantity=$array[3];
        if (isset($array[4])) $address=$array[4];
        if (isset($array[5])) $transporter=$array[5];
        if (isset($array[6])) $manufacturer=$array[6];
        $price=NULL;
        $x=fopen('Users/'.$manufacturer.'.txt','r');
        while(!feof($x)){
            $line=fgets($x);
            $array=explode(",",$line);
            if (isset($array[0])) $code=$array[0];
            if (isset($array[6])) $price=$array[6];
            if ($code==$orderid){
                break;
            }
        }
        fclose($x);
        echo '<html><body>
        
                <div class="box">
                  <button type="button" class="collapsible">Order ID: '.$orderid.'</button>
                  <div class="content">
                  <p>To: '.$to.'</p>
                  <p>From: '.$from.'</p>
                  <p>Quantity: '.$quantity.' ton</p>
                  <p>Address: '.$address.'</p>
                  <p>Transporter: '.$transporter.'</p>
                  <p>Price: '.$price.'</p>
                  </div>
                </div>
                
          </body></html>';

        $line=fgets($file);
        $array=explode(",",$line);
    }
?>
<script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;
                    for (i = 0; i < coll.length; i++) {
                      coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.display === "block") {
                          content.style.display = "none";
                        } else {
                          content.style.display = "block";
                        }
                      });
                    }
                    </script>
</section>
<div class="form">
      <h1 class="heading">Contact Manufacturer</h1>
    <form action="thome2.php">
        Select Order ID:<select class="listbox" name="orderid" size="3">
            <?php
                $x=fopen('currentuser.txt','r');
                $line=fgets($x);
                $array=explode(",",$line);
                if (isset($array[0])) $name=$array[0];
                fclose($x);
                $file=fopen('Users/'.$name.'.txt','r');
                while(!feof($file)){
                    $line=fgets($file);
                    $array=explode(",",$line);
                    if (isset($array[0])) $orderid=$array[0];
                    echo '<option value="'.$orderid.'">'.$orderid.'</option>';
                }
                fclose($file);
            ?>
        </select>
        Price:<input class="input" name="price" type="float">
        <input type="submit" class="submit">
    </form>
</div>
</body>
</html>