<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
</head>
<body>
<?php
include('navbar.php');
?>
<header>

  
    <!-- Background image -->
    <div
      class="p-5 text-center bg-image "
      style="background-image: url(img/index-bg.jpg!d);
        height: 80vh; width: 1518px;"
    >
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
        <div class="d-flex justify-content-center align-items-center h-50" style="height: 200px;">
          <div class="text-white">
              <br>
            <h2 class="mb-3" style="color: white;">Welcome to Sparks Foundation Bank</h2>
            <h4 class="mb-3">Security , confidentiality , No-risk Inverstment</h4>
            <a class="btn btn-outline-light btn-lg" href="#services" role="button"
              >View Services</a>
              <br><br>
          </div>
        </div>
      </div>
    </div>

  </header>

  <section id="services" style="margin-top: 20px;">
      <center>
        <h1 style="color: black;">Our Services</h1>
        <hr>
      </center>
    <div class="row activity text-center">
        
       <div class="col-md act">
         <img src="img/transfer.jpg" class="img-fluid">
         <br>
         <a href="transfermoney.php"><button>Make a Transaction</button></a>
       </div>
       <div class="col-md act">
         <img src="img/history.jpg" class="img-fluid">
         <br>
         <a href="transactionhistory.php"><button>Transaction History</button></a>
       </div>
 </div>  

  </section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>