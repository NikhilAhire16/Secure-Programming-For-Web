<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="../index" class="breadcrumb">E-Commerce</a>
            <a href="index" class="breadcrumb">Dashboard</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container dashboard">
  <div class="row">
         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/pixel.png" alt="" />
             </div>
             <div class="card-stacked">
              <div class="card-content">
                <p>Products & Commands</p>
              </div>
               <div class="card-action">
                 <a href="infoproduct" class="blue-text">Learn more</a>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/cat.png" alt="" />
             </div>
             <div class="card-stacked">
        <div class="card-content">
          <p>Stock</p>
        </div>
             <div class="card-action">
               <a href="products" class="blue-text">Learn more</a>
             </div>
             </div>

           </div>
         </div>

         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/user.png" alt="" />
             </div>
             <div class="card-stacked">
              <div class="card-content">
                <p>Users</p>
              </div>
               <div class="card-action">
                 <a href="allusers" class="blue-text">Learn more</a>
               </div>
             </div>
           </div>
         </div>
         <?php

            include '../db.php';
            //get total users
            $queryusers = "SELECT count(id) as total FROM users";
            $resultusers = $connection->query($queryusers);

            if($resultusers->num_rows > 0) {
              while ($rowusers = $resultusers->fetch_assoc()) {
                $totalusers = $rowusers['total'];
              }
            }

            //get total ordered commands
            $queryorder = "SELECT count(id) as total, statut FROM command WHERE statut = 'ordered'";
            $resultorder = $connection->query($queryorder);

            if($resultorder->num_rows > 0) {
              while ($roworder = $resultorder->fetch_assoc()) {
                $totalorder = $roworder['total'];
              }
            }

            //get total paid commands
            $querypaid = "SELECT count(id) as total, statut FROM command WHERE statut = 'paid'";
            $resultpaid = $connection->query($querypaid);

            if($resultorder->num_rows > 0) {
              while ($rowpaid = $resultpaid->fetch_assoc()) {
                $totalpaid = $rowpaid['total'];
              }
            }
          ?>
  </div>
    <div class="row">
         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i> Total Users</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalusers; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card blue lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Total Orders</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalorder; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card green lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Total Payments</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalpaid; ?></h5>
               </div>
             </div>
           </div>
         </div>
       </div>
</div>
<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b8239eb638aaff:9ea7a2ac@us-cdbr-east-06.cleardb.net/heroku_3aaeb78f9450d07?reconnect=true"));
$cleardb_server = $cleardb_url["mysql://b8239eb638aaff:9ea7a2ac@us-cdbr-east-06.cleardb.net"];
$cleardb_username = $cleardb_url["b8239eb638aaff"];
$cleardb_password = $cleardb_url["9ea7a2ac"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
 <?php require 'includes/footer.php'; ?>
