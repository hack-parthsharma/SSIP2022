<?php
include('database.php');
include('session.php');
$Department = $var2;
$user = $var1;

$db = $conn;
$tableName = "ddo";
$columns = ['CaseID','Department','Subject','CreatedBy','CreationDate','Remarks','Documents','Status','CurrentDepartment','DestinationDepartment'];
$fetchData = fetch_data($db, $tableName, $columns,$Department);
$fetchDataRejected = fetch_data_rejected($db, $tableName, $columns,$Department);
$fetchDataApproved = fetch_data_approved($db, $tableName, $columns,$Department);
$fetchDataPending = fetch_data_pending($db, $tableName, $columns,$Department);
function fetch_data($db, $tableName, $columns,$Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);
    if($Department == 'admin'){
      $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY CaseID ASC";
    }else{
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Department = '". $Department ."' ORDER BY CaseID ASC";
    }
    // $query = "SELECT * FROM ddo ORDER BY id DESC";
    $result = $db->query($query);
    if ($result == true) {
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg = $row;
      } else {
        $msg = "No Data Found";
      }
    } else {
      $msg = mysqli_error($db);
    }
  }
  return $msg;
}

function fetch_data_rejected($db, $tableName, $columns,$Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);

    if($Department == 'admin'){
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Status='Rejected'";
    }else{
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Department = '". $Department ."' AND Status='Rejected'";
    }
    // $query = "SELECT * FROM ddo ORDER BY id DESC";
    $result = $db->query($query);
    if ($result == true) {
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg = $row;
      } else {
        $msg = "No Data Found";
      }
    } else {
      $msg = mysqli_error($db);
    }
  }
  return $msg;
}

function fetch_data_approved($db, $tableName, $columns,$Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);

    if($Department == 'admin'){
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Status='Approve'";
    }else{
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Department = '". $Department ."' AND Status='Approve'";
    }
    
    // $query = "SELECT * FROM ddo ORDER BY id DESC";
    $result = $db->query($query);
    if ($result == true) {
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg = $row;
      } else {
        $msg = "No Data Found";
      }
    } else {
      $msg = mysqli_error($db);
    }
  }
  return $msg;
}

function fetch_data_pending($db, $tableName, $columns,$Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);

    if($Department == 'admin'){
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Status='Pending'";
    }else{
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Department = '". $Department ."' AND Status='Pending'";
    }

    
    // $query = "SELECT * FROM ddo ORDER BY id DESC";
    $result = $db->query($query);
    if ($result == true) {
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg = $row;
      } else {
        $msg = "No Data Found";
      }
    } else {
      $msg = mysqli_error($db);
    }
  }
  return $msg;
}

?>