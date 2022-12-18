<?php
session_start();

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}

if (!isset($_SESSION['logged_in']) && !isset($_SESSION['item'])) {
    header('Location: sign');
}

elseif($_SESSION['item'] < 1){
    header('Location: index');
}
else {
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];

    $email_sess =  filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL);
    $country_sess = $_SESSION['country'];
    $firstname_sess = filter_var($_SESSION['firstname'], FILTER_SANITIZE_STRING);
    $lastname_sess = filter_var($_SESSION['lastname'], FILTER_SANITIZE_STRING);
    $city_sess = filter_var($_SESSION['city'], FILTER_SANITIZE_STRING);
    $address_sess = filter_var($_SESSION['address'], FILTER_SANITIZE_STRING);
}

require 'includes/header.php';
require $nav;?>
<div class="container-fluid product-page">
    <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index" class="breadcrumb">Home</a>
                    <a href="cart" class="breadcrumb">Cart</a>
                    <a href="checkout" class="breadcrumb">Checkout</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container checkout">
    <div class="card pay">
        <form method="post" action="final">
        <input type="hidden" name="token" value="<?php echo isset($_SESSION['token'])? $_SESSION['token'] : '' ?>">
            <div class="row">

                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="email" name="email" value='<?= $email_sess; ?>' class="validate" required>
                    <label for="icon_prefix" data-error="Invalid email" data-success=""></label>
                    <label for="icon_prefix">Email</label>
                </div>

                <div class="input-field col s6">
                    <select class="icons" name="country" value="<?= $country_sess; ?>">
                        <option value=""  disabled selected>Choose your country</option>
                        <option value="India">India</option>
                        <option value="Ireland">Morocco</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Austria">Austria</option>
                    </select>
                    <label>Country</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" name="firstname" value='<?= $firstname_sess; ?>' class="validate" required>
                    <label for="icon_prefix">First Name</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="icon_prefix" type="text" name="lastname" value='<?= $lastname_sess; ?>' class="validate" required>
                    <label for="icon_prefix">Last Name</label>
                </div>


                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input id="icon_prefix" type="text" value='<?= $city_sess; ?>' name="city" class="validate" required>
                    <label for="icon_prefix">City</label>
                </div>

                <div class="input-field col s6 meh">
                    <i class="material-icons prefix">location_on</i>
                    <input id="icon_prefix" type="text" value='<?= $address_sess; ?>' name="address" class="validate" required>
                    <label for="icon_prefix">Address</label>
                </div>

                <div class="center-align">
                    <button type="submit" id="confirmed" name="pay" class="btn meh button-rounded waves-effect waves-light ">Pay</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
