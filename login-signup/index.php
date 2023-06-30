<?php   
        // database details
        $host = "localhost";
        $username = "root";
        $password = "03052002@Nai";
        $dbname = "test_db";
        
        // creating a connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        
        // to ensure that the connection is made
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }

        include 'login.php';

        $showAlert = false; 
        $exists = false;
        // getting all values from the HTML form
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];

        $str="SELECT email from users WHERE email='$email'";
	      $result=mysqli_query($con, $str);
    
	    if((mysqli_num_rows($result))>0)	
	    {
        $exists="Username not available";
      }
	    else
	    {
        $hash = password_hash($pwd, PASSWORD_DEFAULT);
        $str="INSERT INTO users (name, email, pwd) VALUES ('$name', '$email', '$pwd')";
        if (mysqli_query($con, $str)) { $showAlert = true; }
	    }

        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login|Sign Up</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300, 400, 500" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<body>

<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your account is now created and you can login.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> '; 
    }
        
    if($exists) {
        echo '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>Error!</strong> '. $exists.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> ';  
     }

     if($nocred){
      echo '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>Error!</strong> Invalid Username or Password <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> ';
     }
?>

<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <!-- Login Form starts -->
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form" method="POST">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email" name="email" placeholder="Email" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" name="pwd" placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
            <input type="submit" name="login" value="Log In" class="forms_buttons-action">
          </div>
        </form>
      </div>
      
      <!-- Registration Form Starts -->
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" method="POST">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" name="name" placeholder="Full Name" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="email" name="email" placeholder="Email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="password" name="pwd" placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" name="submit" value="Sign up" class="forms_buttons-action">
          </div>
        </form>
      </div>
      <!-- Registration Form Starts -->

    </div>
  </div>
</section>
<!-- partial -->
  <script  src="./script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
