<?php
include('fetchdepartment.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style/login.css">

</head>

<body>
  <div id="login-form-wrap">
    <h2>Login</h2>
    <form id="login-form" method="post">
      <p>
        <select name="department" id="department">
          <?php
          if (is_array($fetchDepartment)) {

            foreach ($fetchDepartment as $data) {
              ?>
              <option value="<?php echo $data['id'] ?? ''; ?>"><?php echo $data['name'] ?? ''; ?></option>

              <?php
            }
          } else { ?>
            <tr>
              <td colspan="8">
                <?php echo $fetchDepartment; ?>
              </td>
            <tr>
              <?php
          } ?>
        </select>
      </p>
      <p>
        <input type="text" id="userid" name="user" placeholder="UserName" required><i
          class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="password" id="pass" name="pass" placeholder="Password" required><i
          class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="submit" id="login" value="Login">
      </p>
    </form>
    <div id="create-account-wrap">
      <p>Forget Password ? <a href="#">Contact Admin</a>
      <p>
    </div>
    <!--create-account-wrap-->
  </div>
  <!--login-form-wrap-->
  <!-- partial -->
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ssip";
  @$userid = $_POST['user'];
  @$pass = $_POST['pass'];
  @$dep = $_POST['department'];
  // Create connection
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $data = "";
  if ($dep == 'A001') {
    $sql = "SELECT * FROM departments,users WHERE users.department_id = '" . $dep . "' AND departments.id = users.department_id AND users.password = '" . $pass . "' AND users.username ='" . $userid . "'";

    @$result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $LoginUser = $row["username"];
      $LoginDepartment = $row["name"];
      session_start();
      $LoginData = array(
        'user' => $LoginUser,
        'department' => $LoginDepartment
      );

      $_SESSION['LoginSetup'] = $LoginData;
      header("Location: http://localhost/ssip2022/assets/user_dashboard.php");
    }
  } else {
    $sql = "SELECT * FROM departments,users WHERE users.department_id = '" . $dep . "' AND departments.id = users.department_id AND users.password = '" . $pass . "' AND users.username ='" . $userid . "'";
    // Create variables of email and pass from the database table abc
    @$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $LoginUser = $row["username"];
      $LoginDepartment = $row["name"];
      session_start();
      $LoginData = array(
        'user' => $LoginUser,
        'department' => $LoginDepartment
      );

      $_SESSION['LoginSetup'] = $LoginData;
      header("Location: http://localhost/ssip2022/assets/user_dashboard.php");
    }
  }
  ?>

</body>

</html>