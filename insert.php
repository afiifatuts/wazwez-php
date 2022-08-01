<?php
function insertTask($name)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wazwez";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sqlInsert = "INSERT INTO Tasks (user_id, name, description)
  VALUES ('1', '$name','$desc')";

  if ($conn->query($sqlInsert) === TRUE) {
    return "New record created successfully";
  } else {
    return "Error: " . $sqlInsert . "<br>" . $conn->error;
  }
};



header('Content-Type: application/json');

$aResult = array();

if (!isset($_POST['functionname'])) {
  $aResult['error'] = 'No function name!';
}

if (!isset($_POST['arguments'])) {
  $aResult['error'] = 'No function arguments!';
}

if (!isset($aResult['error'])) {

  switch ($_POST['functionname']) {
    case 'insertTask':
      if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 1)) {
        $aResult['error'] = 'Error in arguments!';
      } else {
        $aResult['result'] = insertTask($_POST['arguments'][0]);
      }
      break;

    default:
      $aResult['error'] = 'Not found function ' . $_POST['functionname'] . '!';
      break;
  }
}

echo json_encode($aResult);
