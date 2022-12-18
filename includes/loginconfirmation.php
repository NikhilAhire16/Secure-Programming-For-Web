<?php

if (isset($_POST['login'])) {


  $email = $_POST['emaillog'];
  $password=md5($_POST['passworddb']);
   //$encryptedpass = password_hash($_POST['passworddb'],PASSWORD_BCRYPT);
 

  include 'db.php';
  $email=mysqli_real_escape_string($connection, $email);
  $query = "SELECT * FROM users WHERE email='{$email}' and password = '{$password}'";
  $select_user_query = mysqli_query($connection, $query);


  if (!$select_user_query) {
    DIE("QUERY FAILED". mysqli_error($connection));
  }
  $row = mysqli_fetch_array($select_user_query);

  $user_id = $row['id'];
  $user_email = $row['email'];
  $user_password = $row['password'];
  $user_firstname= $row['firstname'];
  $user_lastname= $row['lastname'];
  $user_address= $row['address'];
  $user_city= $row['city'];
  $user_country= $row['country'];
  $user_role = $row['role'];


  if ($email !== $user_email && $password !== $user_password) {
    echo "<div class='center-align meh'>
        <h5 class='red-text'>Wrong Info</h5>
    </div>";

    $_SESSION['u']+=1;

    echo "You Enter ".$_SESSION['u']."Time Wrong  UID and Password";
    echo "<br><a href='sign.php'>Try Again</a>";

    echo $_SESSION['u'];

    if($_SESSION['u']>2)
    {
        $_SESSION['u'] = 0;
        ?>
        <div style='color:white; padding:20px; font-size:2.5em; background:tomato;'><b>Block User</b> <br>
            <?php echo $_COOKIE['user'] ?>
        </div>
        <script>
             var form = document.getElementById("login-form");
             var elements = form.elements;
             for (var i = 0, len = elements.length; i < len; ++i) {
                 elements[i].readOnly = true;
             }
        </script>
        <?php

    }
  }



  else{
    if($user_role == 'admin'){

      $_SESSION['id'] = $user_id;
      $_SESSION['firstname'] = $user_firstname;
      $_SESSION['lastname'] = $user_lastname;
      $_SESSION['address'] = $user_address;
      $_SESSION['city'] = $user_city;
      $_SESSION['country'] = $user_country;
      $_SESSION['email'] = $user_email;
      $_SESSION['role'] = 'admin';
      $_SESSION['logged_in']= 'True';
      echo "<meta http-equiv='refresh' content='0;url=./admin/index' />";
    }

    else {
      $_SESSION['id'] = $user_id;
      $_SESSION['firstname'] = $user_firstname;
      $_SESSION['lastname'] = $user_lastname;
      $_SESSION['address'] = $user_address;
      $_SESSION['city'] = $user_city;
      $_SESSION['country'] = $user_country;
      $_SESSION['email'] = $user_email;
      $_SESSION['logged_in']= 'True';
      $back = $_SERVER['HTTP_REFERER'];
      echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
    }
  }
}

?>
