<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return $value === '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
      $length = strlen($value);
      return $length >= $options[0] && $length <= $options[1];
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
	  return strpos($value, '@') !== false;
	  //return filter_var($value, FILTER_SANITIZE_EMAIL);
  }
  
  function isValidNames($value) 
  {
  	  return preg_match('/\A[A-Za-z\s\-\,\.\']+\Z/', $value);
  }
  
  function isUsernameValid($value)
  {
  	  return preg_match('/\A[0-9A-Za-z\_]+\Z/', $value);
  }
  
  function isEmailValid($value)
  {
  	  return preg_match('/\A[0-9A-Za-z\_\.\@]+\Z/', $value); 
  }
  
  function checkDuplicateUsername($value, $db)
  {
  	  $sql = "SELECT * FROM users where username = '$value'";
  	  $result = db_query($db, $sql);
  	  $get_rows = mysqli_num_rows($result);
  	  
  	  // if true then there is a duplicate value
  	  return $get_rows >= 1;
  	  
  	  //$mysqlGetUsers = mysql_query("SELECT * FROM users where username='$value'");
  	  //$get_rows = mysql_affected_rows($db);
  	  
  	  //return $get_rows >= 1;
  	  
  }
  
?>
