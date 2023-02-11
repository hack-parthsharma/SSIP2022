<?php
include('database.php');
include('session.php');
$Department = $var2;
$user = $var1;

$db = $conn;
$tableName = "ddo";
$columns = ['case_id', 'department', 'subject_name', 'created_by', 'creation_date', 'remarks', 'documents', 'status', 'current_department', 'next_department'];
$fetchData = fetch_data($db, $tableName, $columns, $Department);
$fetchDataRejected = fetch_data_rejected($db, $tableName, $columns, $Department);
$fetchDataApproved = fetch_data_approved($db, $tableName, $columns, $Department);
$fetchDataPending = fetch_data_pending($db, $tableName, $columns, $Department);
$fetchtrack=fetch_track($db,'filetrack',['id','case_id','username','user_departname','timestamp']);

function fetch_track($db, $tableName, $columns)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);
    $query = "SELECT * FROM $tableName ORDER BY case_id ASC";

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
function fetch_data($db, $tableName, $columns, $Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);
    if ($Department == 'admin') {
      $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY case_id ASC";
    } else {
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE department = '" . $Department . "' ORDER BY case_id ASC";
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

function fetch_data_rejected($db, $tableName, $columns, $Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);

    if ($Department == 'admin') {
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Status='Rejected'";
    } else {
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE department = '" . $Department . "' AND Status='Rejected'";
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

function fetch_data_approved($db, $tableName, $columns, $Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);

    if ($Department == 'admin') {
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Status='Approve'";
    } else {
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE department = '" . $Department . "' AND Status='Approve'";
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

function fetch_data_pending($db, $tableName, $columns, $Department)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);

    if ($Department == 'admin') {
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE Status='Pending'";
    } else {
      $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE next_department = '" . $Department . "' AND Status='Pending'";
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

function fetch_data_department($db, $tableName, $columns)
{
  if (empty($db)) {
    $msg = "Database connection error";
  } elseif (empty($columns) || !is_array($columns)) {
    $msg = "columns Name must be defined in an indexed array";
  } elseif (empty($tableName)) {
    $msg = "Table Name is empty";
  } else {
    $columnName = implode(",", $columns);
    $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY id ASC";
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

// function del_dep($db, $tableName, $columns)
// {
//   if (empty($db)) {
//     $msg = "Database connection error";
//   } elseif (empty($columns) || !is_array($columns)) {
//     $msg = "columns Name must be defined in an indexed array";
//   } elseif (empty($tableName)) {
//     $msg = "Table Name is empty";
//   } else {
//     $columnName = implode(",", $columns);
//     $query = "DELETE FROM departments WHERE 0";
//     $result = $db->query($query);
//     if ($result == true) {
//       if ($result->num_rows > 0) {
//         $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
//         $msg = $row;
//       } else {
//         $msg = "No Data Found";
//       }
//     } else {
//       $msg = mysqli_error($db);
//     }
//   }
//   return $msg;
// }
?>