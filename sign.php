<?php
session_start(); error_reporting (E_ALL ^ E_NOTICE);
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}
if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}

elseif($_SESSION['logged_in'] == 'True') {
    header('Location: index');
}

else{
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];
}
error_reporting(0);

require 'includes/header.php';
require $nav; ?>



<div class="container-fluid center-align sign">
    <div class="container">

        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="sign">Log In</a></li>
                    <li class="tab col s3"><a  href="#test2">Sign Up</a></li>
                </ul>
            </div>

            <div class="container forms">
                <div class="row">

                    <div id="test2" class="col s12 left-align">
                        <div class="card">
                            <div class="row">

                                <form class="col s12" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="token" value="<?php echo isset($_SESSION['token'])? $_SESSION['token'] : '' ?>">
                                    <div class="row">

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">email</i>
                                            <input id="icon_prefix" type="email" name="email" class="validate" required>
                                            <label for="icon_prefix" data-error="Invalid email" data-success="">Email</label>
                       
                                            <label for="icon_prefix">Email</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <select class="icons" name="country">
                                                <option value=""  disabled selected>Choose your country</option>
                                                <option value="India">India</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="US">US</option>
                                                <option value="Austria">Austria</option>
                                            </select>
                                            <label>Country</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="icon_prefix" type="text" name="firstname" class="validate" required>
                                            <label for="icon_prefix">First Name</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input id="icon_prefix" type="text" name="lastname" class="validate" required>
                                            <label for="icon_prefix">Last Name</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="icon_prefix" type="password" name="password" class="validate value1" required>
                                            <label for="icon_prefix">Password</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
                                            <label for="icon_prefix">Confirm Password</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">business</i>
                                            <input id="icon_prefix" type="text" name="city" class="validate" required>
                                            <label for="icon_prefix">City</label>
                                        </div>

                                        <div class="input-field col s6 meh">
                                            <i class="material-icons prefix">location_on</i>
                                            <input id="icon_prefix" type="text" name="address" class="validate" required>
                                            <label for="icon_prefix">Address</label>
                                        </div>


                                        <?php require 'includes/signupconfirmation.php'; ?>
                                        <div class="center-align">
                                            <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Sign up</button>
                                        </div>

                                        <p>By Registering, you agree that you've read and accepted our <a href="">User Agreement</a>,
                                            you're at least 18 years old, and you consent to our <a href="">Privacy Notice and receiving</a>
                                            marketing communications from us.</p>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="test1" class="col s12 left-align">

                        <div class="card">
                            <div class="row">
                            <?php

                            if( isset($_COOKIE['user']) )
                            {
                            ?>
                                <meta http-equiv="refresh" content="20"> 
                            <?php
                               // echo "<div style='color:white; padding:20px; font-size:2.5em; background:tomato;'><b>Block User</b> <br>".$_COOKIE['user']."</div>";
                            }else {
                                ?>
                                <form id="login-form" class="col s12" method="POST">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input id="icon_prefix" type="text" name="emaillog" class="validate login-form">
                                        <label for="icon_prefix">Email</label>
                                    </div>
                                    <div class="input-field col s12 meh">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" type="password" name="passworddb" class="validate login-form">
                                        <label for="icon_prefix">Password</label>
                                    </div>
                                    <?php
                            }
                            ?>  

                                    <div class="center-align">
                                        <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Login</button>
                                    </div>
                                    <?php require 'includes/loginconfirmation.php';?>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
