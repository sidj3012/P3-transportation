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
    <?php
        $x=fopen('currentuser.txt','r');
        $line=fgets($x);
        $array=explode(",",$line);
        if (isset($array[0])) $name=$array[0];
        fclose($x);
        $file=fopen('Users/'.$name.'.txt','r');
        $temp=0;
        $line=fgets($file);
            $array=explode(",",$line);
        while(!feof($file)){
            
            if (isset($array[0])) $code=$array[0];
            if (isset($array[1])) $to=$array[1];
            if (isset($array[2])) $from=$array[2];
            if (isset($array[3])) $quantity=$array[3];
            if (isset($array[4])) $address=$array[4];
            if (isset($array[5])) $transporter=$array[5];
            if (isset($array[6])) $price=$array[6];
            if (isset($_GET["orderid"])){
                if ($code==$_GET["orderid"]){
                    echo '<html><body>
                    <div class="box">
                      <p>Order ID: '.$code.'</p>
                      <p>To: '.$to.'</p>
                      <p>From: '.$from.'</p>
                      <p>Quantity: '.$quantity.' ton</p>
                      <p>Address: '.$address.'</p>
                      <p>Transporter: '.$transporter.'</p>
                    </div>
              </body></html>';
                $temp=1;
                }
            }
            if (isset($_GET["to"])){
                if ($to==$_GET["to"]){
                    echo '<html><body>
                    <div class="box">
                      <p>Order ID: '.$code.'</p>
                      <p>To: '.$to.'</p>
                      <p>From: '.$from.'</p>
                      <p>Quantity: '.$quantity.' ton</p>
                      <p>Address: '.$address.'</p>
                      <p>Transporter: '.$transporter.'</p>
                    </div>
              </body></html>';
                $temp=1;
                }
            }
            if (isset($_GET["from"])){
                if ($from==$_GET["from"]){
                    echo '<html><body>
                    <div class="box">
                      <p>Order ID: '.$code.'</p>
                      <p>To: '.$to.'</p>
                      <p>From: '.$from.'</p>
                      <p>Quantity: '.$quantity.' ton</p>
                      <p>Address: '.$address.'</p>
                      <p>Transporter: '.$transporter.'</p>
                    </div>
              </body></html>';
                $temp=1;
                }
            }
            $line=fgets($file);
            $array=explode(",",$line);
        }
        if ($temp==0){
            echo '<html><body><h1 class="heading">No Results Found</h1></body></html>';
        }
    ?>
    <div class="back">
        <button class="submit" onclick="history.back()">Back</button>
    </div>
</body>
</html>