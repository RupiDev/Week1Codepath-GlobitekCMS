<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.

  // if this is a POST request, process the form
  // Hint: private/functions.php can help

    // Confirm that POST values are present before accessing them.

    $firstname = '';
    $lastname = '';
    $email = '';
    $username = '';
    $errors = array();

    if(is_post_request())
    {
        $firstname = $_POST['firstname'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $email = $_POST['email'] ?? '';
        $username = $_POST['username'] ?? '';
        $wasError = false;


        // Perform Validations
        // Hint: Write these in private/validation_functions.php
        // Validations

        // array[0] is the min, array[1] is the max
        if(is_blank($firstname))
        {
            $errors[] = 'First name can not be blank';
            $wasError = true;
        }
        elseif(!has_length($firstname, array(2, 255))) 
        {
            $errors[] = 'The first name has to be between 2 and 255 characters';
            $wasError = true;
        }
        elseif(!isValidNames($firstname))
        {
            $errors[] = 'Should only contain letters, spaces, \', ., - and ,';
            $wasError = true;
        }


        if(is_blank($lastname))
        {
            $errors[] = 'Last name can not be blank'; 
            $wasError = true;
        }
        elseif(!has_length($lastname, array(2, 255)))
        {
            $errors[] = 'The last name has to be between 2 and 255 characters';
            $wasError = true;
        }
        elseif(!isValidNames($lastname))
        {
            $errors[] = 'Should only contain letters, spaces, \', ., - and ,';
            $wasError = true;
        }


        if(is_blank($email))
        {
            $errors[] = 'Email can not be blank';
            $wasError = true;
        }
        elseif(!has_valid_email_format($email))
        {
            $errors[] = "Email has to have valid format";
            $wasError = true;
        }
        elseif(!isEmailValid($email))
        {
            $errors[] = "Email should only contain letters, numbers, @, _, and .";
            $wasError = true;
        }


        if(is_blank($username))
        {
            $errors[] = 'Username can not be blank';
            $wasError = true;
        }
        elseif(!has_length($username, array(8, 255)))
        {
            $errors[] = 'The username has to be between 8 and 255 characters';
            $wasError = true;
        }
        elseif(!isUsernameValid($username))
        {
            $errors[] = 'The username should only contain letters, numbers, and _';
            $wasError = true;
        }
        elseif(checkDuplicateUsername($username, $db))
        {
            $errors[] = 'The username already exists';
            $wasError = true;
        }


        // submit it to the databse 
        if(!$wasError)
        {
            $date = date("Y-m-d H:i:s");
            $sql = 
            "INSERT INTO users (first_name, last_name, email, username, created_at)
             VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $username . "','" . $date  . "')";

            $result = db_query($db, $sql);
            if($result)
            {
                db_free_result($result);
                db_close($db);
                redirect_to('registration_success.php');
            }
            else
            {
                echo db_error($db);
                db_free_result($result);
                db_close($db);
                exit;

            }
        }
        else
        {

        }
      

    }

    // if there were no errors, submit data to database

      // Write SQL INSERT statement
      // $sql = "";

      // For INSERT statments, $result is just true/false
      // $result = db_query($db, $sql);
      // if($result) {
      //   db_close($db);

      //   TODO redirect user to success page

      // } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
      //   echo db_error($db);
      //   db_close($db);
      //   exit;
      // }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
    echo display_errors($errors);
    
  ?>

  <!-- TODO: HTML form goes here -->

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
    First Name:<br>
    <input type="text" name="firstname" value = "<?php echo htmlspecialchars(isset($_POST["firstname"]) ? $_POST["firstname"] : ''); ?>"><br>

    Last Name:<br>
    <input type="text" name="lastname" value = "<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>"><br>

    Email:<br>
    <input type="text" name="email" value = "<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"><br>

    Username:<br>
    <input type="text" name="username" value = "<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>"><br>

    <input type="submit" name="submit" value="submit"><br>

  </form>



</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
