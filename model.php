<?php

 //class utama
 class wa{

   //bikin Property
    private $server = 'localhost',
            $username = 'yuyun',
            $pass    = '1234567890',
            $data = 'walink',
            $page1 = 1,
            $conn;


    //method connect
    public function __construct(){

    $this->conn = mysqli_connect($this->server, $this->username, $this->pass, $this->data) or die ($this->conn);

          }

    //method INSERT
    public function insert(){

   if(isset($_POST['send'])){


    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $number = htmlspecialchars($_POST['number']);

  //ambil data dari DB untuk di cocokan
    $retrieve_data = mysqli_query($this->conn, "select * from friend where name='$name' and address='$address' and number='$number'");

  //pengecekan banyak data
    $check_number = mysqli_num_rows($retrieve_data);

    //kondisi dimana baranga harus lebih besar > 0
    if($check_number > 0){

    $fetch_dat = mysqli_fetch_array($retrieve_data);

    $name === $fetch_dat['name'];
    $address === $fetch_dat['address'];
    $number === $fetch_dat['number'];

    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
       echo "<div class='alert alert-warning mt-4 ml-5' role='alert'>";
      echo "<p><center>Already Registered As Friends</center></p>";
       echo   "</div>";
       echo "</div>";


    }else{

  //untuk menginsert ke database
   $insertt =  "INSERT INTO friend VALUES (NULL,'$name','$address','$number')";

  //kondisi insert
   if($sql = $this->conn->query($insertt)){


                                   echo "<div class='col-xl-12 col-lg-8 ml-4'>";
                                   echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                                   echo "<p><center>Adding Success Data</center></p>";
                                   echo   "</div>";
                                   echo "</div>";


   }else{

                                   echo "<div class='col-xl-12 col-lg-8  ml-4'>";
                                   echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                                   echo "<p><center>Adding Failed Data</center></p>";
                                   echo   "</div>";
                                   echo "</div>";

   }

  }

   }

    }


      public function page1(){
        return $this->page1;
      }

      public function max_friend(){
        $capacity = $this->page1 * $this->page1;
        echo "<b>Table Capacity: ".$capacity."</b>";
      }


    //method untuk menampilkan data atau read
      public function show(){

    //property untuk membatasi
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $this->page1;


        $data = null;

        $query = "SELECT * FROM friend limit $start, $this->page1 ";
        if ($sql = $this->conn->query($query)) {
          while ($row = mysqli_fetch_assoc($sql)) {
            $data[] = $row;
          }
        }
        return $data;
      }



      //method untuk menghapus data
        public function delete($id){

          $query = "DELETE FROM friend where id = '$id'";
          if ($sql = $this->conn->query($query)) {
            return true;
          }else{
            return false;
          }
        }



        //method untuk menampilkan isi di edit
        public function edit($id){

          $data = null;

          $query = "SELECT * FROM friend WHERE id = '$id'";
          if ($sql = $this->conn->query($query)) {
            while($row = $sql->fetch_assoc()){
              $data = $row;
            }
          }
          return $data;
        }

        //method mengupdate isi database
        public function update($data){

          $query = "UPDATE friend SET name='$data[name]', address='$data[address]', number='$data[number]' WHERE id='$data[id] '";

          if ($sql = $this->conn->query($query)) {
            return true;
          }else{
            return false;
          }
        }


        //method mengupdate isi database
        public function chat($data){

       $number_c = $data['number'];
       $message_c = $data['message'];


       echo "<div class='row ml-5 mb-4'>";
       echo "<div class='col-md-5 col-sm-12 col-xs-12'>";
       echo  "<center><input class='form-control mt4' type='text' value='https://api.whatsapp.com/send?phone=$number_c&text=$message_c'aria-label='readonly input example' readonly><center>";
       echo '</div>';
       echo "<div class='col-md-6 col-sm-12 col-xs-12'>";
       echo "<a href='https://api.whatsapp.com/send?phone=$number_c&text=$message_c'><button type='button' class='btn btn-primary'>Chat</button></a>";
       echo '</div>';
       echo '</div>';


        }



 }



//ini adalah objek
$objek_wa = new wa;



 ?>
