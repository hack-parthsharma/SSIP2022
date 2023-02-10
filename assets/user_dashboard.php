<?php
include('../allfiledata.php');
?>

<!DOCTYPE html>
<html lang="en" ng-app="dashboard">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- SCRIPTS Angular -->
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
     <!-- SCRIPTS jquery -->
     <script src="https://code.jquery.com/jquery-3.6.1.min.js"
          integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
     <!-- icon -->
     <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     <!-- style -->
     <link rel="stylesheet" href="http://localhost/ssip/SSIP2022/style/dashboard.css">

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap"
          rel="stylesheet">
     <link rel="stylesheet" href="../style/dashboard.css ">
     <link rel="stylesheet" href="../style.tabview.css">
     <title>Dashboard</title>
</head>

<body>
     <section class="dash-wrapper" ng-controller="userController">

          <div class="col1" ng-repeat="u in user">
               <div class="greet-container">
                    <h1 class="greeting"></h1><span> {{u.name}}</span>
               </div>
          </div>

          <div class="col3">
               <div class="left">
                    <button class="tablink" onclick="openCity('All', this)" id="defaultOpen">All Files</button>
                    <button class="tablink" onclick="openCity('Approved', this)">Approved Files</button>
                    <button class="tablink" onclick="openCity('Pending', this)">Pending Files</button>
                    <button class="tablink" onclick="openCity('Rejected', this)">Rejected Files</button>
               </div>

          </div>
          <div id="All" class="tabcontent">
               <div class="col4 active" ng-controller="searchitems">

                    <div class="search-wrapper">
                         <div class="search-container">
                              <form action="#">
                                   <input type="text" ng-model="search" placeholder="Search by : CaseID , Date ... "
                                        name="search">
                                   <button type="submit"><i class="bx bx-search"></i></button>
                              </form>
                         </div>
                         <div class="new-btn">
                              <button class="button" onclick="newFileOpen()">New File</button>
                         </div>
                    </div>


                    <table id="files-table" class="files-table">
                         <thead>
                              <tr>
                                   <th></th>
                                   <th>CaseID</th>
                                   <th>Department</th>
                                   <th>Subject</th>
                                   <th>Created By</th>
                                   <th>Creation Date</th>
                                   <th>Remarks</th>
                                   <th>Documents</th>
                                   <th>Status</th>
                                   <th>Current Dep.</th>
                                   <th>Destination</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              if (is_array($fetchData)) {
                                   $sn = 1;
                                   foreach ($fetchData as $data) {
                                        ?>
                                        <tr>
                                             <td>
                                                  <?php echo $sn; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['CaseID'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['Department'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['Subject'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['CreatedBy'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['CreationDate'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['Remarks'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['Documents'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['Status'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['CurrentDepartment'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['DestinationDepartment'] ?? ''; ?>
                                             </td>
                                        </tr>
                                        <?php
                                        $sn++;
                                   }
                              } else { ?>
                                   <tr>
                                        <td colspan="8">
                                             <?php echo $fetchData; ?>
                                        </td>
                                   <tr>
                                        <?php
                              } ?>

                         </tbody>
                    </table>
               </div>

          </div>

          <div id="Approved" class="tabcontent">
               <h1>Paris</h1>
               <p>Paris is the capital of France.</p>
          </div>

          <div id="Pending" class="tabcontent">
               <h1>Tokyo</h1>
               <p>Tokyo is the capital of Japan.</p>
          </div>

          <div id="Rejected" class="tabcontent">
               <h1>Oslo</h1>
               <p>Oslo is the capital of Norway.</p>
          </div>

     </section>

     <!-- New File VIewer -->
     <section class="newfilemodel">
          <div class="table-wrapper">
               <i class="bx bx-x-circle" onclick="newFileClose()"></i>
               <form action="/scripts/getdata.js">
                    <div>
                         <h4>Department</h4>
                         <input type="text" id="department" name="department" placeholder="department" required>
                    </div>
                    <div>
                         <h4>Subject</h4>
                         <input type="text" id="subject" name="subject" placeholder="subject" required>
                    </div>
                    <div>
                         <h4>Created By</h4>
                         <input type="text" id="Created_by" name="Created_by" placeholder="Created by" required>
                    </div>
                    <div>
                         <h4>Remarks</h4>
                         <textarea name="remarks" rows="5" cols="40"></textarea>
                    </div>
                    <div>
                         <h4>Documents</h4>
                         <input type="file" name="file" id="file" onchange="updateList()" multiple required>
                         <div id="filelist"></div>
                    </div>
                    <div>
                         <h4>Destination</h4>
                         <input type="text" id="Destination" name="Destination" placeholder="Destination" required>
                    </div>
                    <div>
                         <input type="submit" id="new-add" value="ADD FILE" class="new-button">
                    </div>
               </form>
               <!-- </ul> -->
          </div>
     </section>

     <!-- View Files -->
     <section class="viewfilemodel">
          <div class="view-container">
               <div class="c1-header">
                    <i class="bx bx-x-circle" onclick="viewFileModelClose()"></i>
               </div>
               <div class="fileview" style="position: relative;">
                    <table>
                         <tr style="position: sticky;top: 0;background-color: rgb(37, 37, 37);color: white;">
                              <th>File Name</th>
                              <th>From Dep.</th>
                              <th>To Dep.</th>
                              <th>Date</th>
                         </tr>
                         <tr>
                              <td>C003_Farming.pdf</td>
                              <td>Farming</td>
                              <td>DDO</td>
                              <td>20/02/2003</td>
                         </tr>
                         <tr>
                              <td>C010_survey.csv</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2010</td>
                         </tr>
                         <tr>
                              <td>C015_survey.xlsx</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2011</td>
                         </tr>
                         <tr>
                              <td>C003_Farming.pdf</td>
                              <td>Farming</td>
                              <td>DDO</td>
                              <td>20/02/2003</td>
                         </tr>
                         <tr>
                              <td>C010_survey.csv</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2010</td>
                         </tr>
                         <tr>
                              <td>C015_survey.xlsx</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2011</td>
                         </tr>
                         <tr>
                              <td>C003_Farming.pdf</td>
                              <td>Farming</td>
                              <td>DDO</td>
                              <td>20/02/2003</td>
                         </tr>
                         <tr>
                              <td>C010_survey.csv</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2010</td>
                         </tr>
                         <tr>
                              <td>C015_survey.xlsx</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2011</td>
                         </tr>
                         <tr>
                              <td>C003_Farming.pdf</td>
                              <td>Farming</td>
                              <td>DDO</td>
                              <td>20/02/2003</td>
                         </tr>
                         <tr>
                              <td>C010_survey.csv</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2010</td>
                         </tr>
                         <tr>
                              <td>C015_survey.xlsx</td>
                              <td>Landing</td>
                              <td>DDO</td>
                              <td>06/18/2011</td>
                         </tr>
                    </table>
               </div>
               <div class="all-btn">
                    <div class="first">
                         <button class="add-file-btn"><i class="bx bx-plus"></i>ADD FILES</button>
                         <button class="approve-btn"><i class="bx bx-check"></i>APPROVE</button>
                         <button class="reject-btn"><i class="bx bx-x"></i>REJECT</button>
                    </div>
                    <div class="second">
                         <input type="checkbox" name="missingrequest" id="request-check">
                         <h5>Request For Missing File</h5>
                    </div>
                    <div class="third">
                         <textarea name="remarks" rows="5" cols="40"></textarea>
                         <button class="send-req-btn"><i class="bx bx-send"></i>Send Request</button>
                    </div>
               </div>
          </div>
     </section>

     <!-- <script src="http://localhost/ssip2022/scripts/dashboard.js"></script>
     <script src="http://localhost/ssip2022/scripts/angular-app.js"></script> -->
     <script src="../scripts/dashboard.js"></script>
     <script src="../scripts/angular-app.js"></script>

     <script>
          function openCity(tabname, elmnt) {
               var i, tabcontent, tablinks;
               tabcontent = document.getElementsByClassName("tabcontent");
               for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
               }
               tablinks = document.getElementsByClassName("tablink");
               for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
               }
               document.getElementById(tabname).style.display = "block";
               elmnt.style.backgroundColor = color;

          }
          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();
     </script>
</body>

</html>