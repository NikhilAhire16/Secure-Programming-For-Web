<?php
if (isset($_POST['signup'])) {

  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
  $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
  $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
  $country = $_POST['country'];
  $encryptedpass = password_hash($password,PASSWORD_BCRYPT);


  if((preg_match ("/^[a-zA-Z ]*$/", $firstname)) && (preg_match ("/^[a-zA-Z ]*$/", $lastname)) && (preg_match ("/^[a-zA-Z ]*$/", $address)) && (preg_match ("/^[a-zA-Z ]*$/", $city)))
  {
 
  include 'db.php';

  //connecting & inserting data

  $query = "INSERT INTO users(email,
  firstname,
  lastname,
  password,
  address,
  city,
  country,
  role) VALUES ('$email',
  '$firstname',
  '$lastname',
  '$encryptedpass',
  '$address',
  '$city',
  '$country',
  'client')";

  if ($connection->query($query) === TRUE) {


         echo "<div class='center-align'>
         <h5 class='black-text'>Welcome <span class='green-text'>$firstname</span> Please Log In</h5><br><br>
         <a class='button-rounded btn waves-effects waves-light'>Log In</a>
         </div>";

     } else {
         echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
     }

     $connection->close();

}else {
	echo "<h5 class='red-text'>Please Provide Valid Input</h5>";
}


  }



?>