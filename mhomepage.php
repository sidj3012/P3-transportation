<html>
  <head>
    <title>Manufacturer's Home Page</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
  </head>
  <body>
    <?php
      function generateCode(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for ($i = 0; $i <6; $i++) {
          $randomIndex = mt_rand(0, strlen($characters) - 1);
          $code .= $characters[$randomIndex];
        }
        return $code;
      }
    ?>
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
        if (feof($file)) echo '<html><body><h1 class="heading">No Messages Yet</h1></body></html>';
        while(!feof($file)){
            if (isset($array[0])) $orderid=$array[0];
            if (isset($array[1])) $to=$array[1];
            if (isset($array[2])) $from=$array[2];
            if (isset($array[3])) $quantity=$array[3];
            if (isset($array[4])) $address=$array[4];
            if (isset($array[5])) $transporter=$array[5];
            if (isset($array[6])) $price=$array[6];
            
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
      <h1 class="heading">Contact Transporter</h1>
      Order Id:<div class="input"><?php echo generateCode(); ?></div>
      <form action="mhome2.php">
        To:<input class="input" type="text" name="to">
        From:<input class="input" type="text" name="from">
        Quantity:<div class="input"><select name="quantity" class="input">
                      <option value="1">1 ton</option>
                      <option value="2">2 ton</option>
                      <option value="3">3 ton</option>
                    </select>
      </div>
        Address:<div class="input"><?php
                  $file=fopen('currentuser.txt','r');
                    $line=fgets($file);
                    $array=explode(",",$line);
                    echo $array[4];
                  ?></div>
        Transporter:<select name="transporter" class="input">
            <?php
              $file=fopen('tuserinfo.txt','r');
              while(!feof($file)){
                $line=fgets($file);
                $array=explode(",",$line);
                if (isset($array[0])) $name=$array[0];
                echo '<option value="'.$name.'">'.$name.'</option>';
              }
              fclose($file);
            ?>
          </select>
          <input type="submit" class="submit">
      </form>
    </div>

  </body>
</html>
