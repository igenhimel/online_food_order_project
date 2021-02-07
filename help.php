<?php
require_once('database.php');
if(isset($_SESSION['customer_id'])){
    require_once('userpanel.php');

}
else{
    require_once('header.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="food.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
</head>
<body>
  <?php

?>

   <h2 style="margin:0; text-align:center; color:black; text-shadow:1px 1px red; font-size:30px;">Food Engine - Help Center</h2>
   <div class="helps2">
   <div class="help1">
   <ul class="help">
       <li>How to sign up Food Engine Account?</li>
       <p>1.User Must have provide a valid Name.<br>
	    2.User Must provide a username.<br>
	   3.Username must have length more than 5 and No Space. <br>
	   4.User Must provide a valid email address.<br>
	   5.Finally User provide a suitable password for registration a food engine account.</p>
	   <li>How to log in Food Engine Account?</li>
	   <p>1.User provide a username and password in input form that user registration before.<br>
	  2.After Successfully Logged in user automatically enter the Homepage of Food Engine.</p>

	  <li>Forgot password?</li>
	  <p>1.After clicking the forgot password user show a form that required username and email.<br>
     2.The username and email of the forgotten account must be verified first.<br>
          3.After verfied user can change password.</p>
     <li>After Log in How can be a user use Food Engine Application ?</li>
     <p> --After login user show a navigation bar on the top.<br>
            1. Home  2. Catagory  3. Food 4. (Name of the user)-user profile<br>

            1. After clicking on the homepage, the user will explored some featured food and category list. and also see a search bar<br>
            2. In the catagory page, user see all types of food catagories.<br>
            3. In the Food section user find all kinds of foods.</p>
  <li>How can a user search food?</li>
  <p>1.User can search food easily from home page section or food section</p>
  <li>How Can a user order foods?</li>
  <p>
       1.User can order food from food section or user can search food <br>
	   2.After getting the desired food user see a order option below the foods<br>
	   3.After clicking order button user see a order page<br>
	  4.Here the user has to fill in his required information- such as: contact number,address,quantity<br>
	  5.After Fill all the required information user click the order button<br>
	  6.If All Information are correct the order place Successfully.<br>
  </p>
  <li>
      How can a user cancel the order?
  </li>
  <p> 1.In the navigation bar user shows a user profile<br>
      2.After clicking user profile user see the manage order option<br>
      3.Here user can cancel the order if order not 'delivered' or 'On delivery' or Already 'Cancelled'</p>

      <li>
          How can a user Update profile?
      </li>
      <p>
       1.In the navigation bar user shows a user profile
       2.After clicking user profile user see the 'update profile' and 'change password' option
      </p>
   </ul>

   </div>

    </div>
</body>
</html>



<?php
require_once('footers.php');
?>
