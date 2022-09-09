<?PHP
function verify_query($result_set){
    global $connection;
    if(!$result_set){
        die("Database qury failed:".mysqli_error($connection));
    }
}
function check_req_filds($req_fields){
    //check required fields
  $errors=array();
    
    foreach ($req_fields as $field) {

        if (empty(trim($_POST[$field]))) {
            $errors[] = $field . ' is required';
        }
    }
    return $errors;
}



function check_max_len($max_len_fields){
    //check max lenth
    $errors=array();
      
    foreach ($max_len_fields as $field => $max_len) {

        if (strlen(trim($_POST[$field])) > $max_len) {
            $errors[] = $field . ' must be less then <b>' . $max_len . '</b> characters';
        }
    }
      
      return $errors;
  }

  function dispaly_errors($errors){
      //format & display errors
    echo '<div class="errmsg">';
    echo '<b>There were error(s) on your from</b><br>';
    foreach ($errors as $error) {
        $error = ucfirst(str_replace("_"," ",$error));
        echo $error . '<br>';
    }
    echo '</div>';
  }




?>