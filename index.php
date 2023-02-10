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
            <option value="select" selected="true" disabled>--select department--</option>
            <option value="farmer">farmer</option>
            <option value="land">land</option>
            <option value="ddo">ddo</option>
        </select>
      </p>
      <p>
        <input type="text" id="userid" name="userid" placeholder="UserID" required><i
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
  $dbname = "test";
  @$userid=$_POST['userid'];
  @$pass=$_POST['pass'];
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT email,pass FROM abc  "; 
  // Create variables of email and pass from the database table abc
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["email"]==$userid && $row["pass"]==$pass)
      {
        header("Location: http://localhost/ssip2022/assets/user_dashboard.php");
      }
      // else
      // {
      //   echo "Login fails";
      // }
    }
  } else {
    echo "0 results";
  }
  ?>
</body>

</html>