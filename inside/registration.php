<?php
include '../connection.php';
error_reporting(0);
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = md5('ectc');
  $branch = $_POST['branch_id'];
  $rdate = $_POST['rdate'];
  $user = $_POST['user'];

  $check = mysqli_query($con, "select * from lecture_reg where username='$user' or nic='$username'");
 
  if (mysqli_num_rows($check) > 0) {
    $msg = "User already exists!";
  }  else {
    $msg='';
    $query = mysqli_query($con, "insert into  lecture_reg (nic,username,f_name,l_name,email,phone,password,branch,r_date) value('$username','$user','$firstname','$lastname','$email','$phone','$password','$branch','$rdate')");
    if ($query) {


      //echo "<script>alert popup()('Data Successfully Added.');</script>";
      echo "<script>alert('Successfully registered!');</script>";
    } else {
      echo "<script>alert('Error occured!');</script>";
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ECTC | PDP</title>

  <style>
    .field {
      padding: 10px;
      border: #eaedeb 1px solid;
      border-radius: 12px;
      width: 300px;
      font-size: 14px;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->
            <div class="col-sm-6">
              <!-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lecturer Registration</li>
              </ol> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="frmSearch" align="center">
        <h6 style='color:red;'><?php  echo $msg; ?></h6>
        <form class="form-inline" action='' method="POST">

          <h3 class="">Lecturer Registration</h3><br><br>
          <table>
            <tr>
              <td> <label class="control-label" for="username">NIC* &nbsp;&nbsp;&nbsp;</label></td>

              <td> <input type="text" class="field" id="username" name="username" placeholder="Enter NIC" class="input-xlarge" maxlength="12" style="width: 400px; height:40%; margin-left:0" required></td>

            </tr>
            <tr style="height: 10px;"></tr>
            <tr>

              <td> <label class="control-label" for="user">Username*</label></td>

              <td> <input type="text" id="user" class="field" name="user" placeholder="Enter a Username" style="width: 400px; height:40%;" class="input-xlarge" required></td>
            </tr>
            <tr style="height: 10px;"></tr>
            <tr>


              <td> <label class="control-label" for="firstname">First Name*</label></td>

              <td> <input type="text" id="firstname" class="field" name="firstname" placeholder="Enter First Name" style="width: 400px; height:40%;" class="input-xlarge" required></td>

            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
              <td> <label class="control-label" for="lastname">Last Name*</label></td>

              <td> <input type="text" id="lastname" name="lastname" class="field" style="width: 400px; height:40%;" placeholder="Enter Last Name" class="input-xlarge" required></td>

            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
              <td> <label class="control-label" for="email">E-mail*</label></td>

              <td> <input type="email" id="email" name="email" class="field" style="width: 400px; height:40%;" placeholder="Enter Email" class="input-xlarge" required></td>

            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
              <td> <label class="control-label" for="phone">Phone*</label></td>

              <td> <input type="number" id="phone" name="phone" class="field" style="width: 400px; height:40%;" placeholder="Enter Phone Number" class="input-xlarge" min="0" required></td>

            </tr>
            <tr style="height: 10px;"></tr>
            <tr>


              <td> <label class="control-label" for="phone">Branch*</label></td>
              <td> <?php

                    $sql = mysqli_query($con, "SELECT branch_id,name FROM branch");



                    if (mysqli_num_rows($sql)) {
                      $select = '<select id="branch" style="width: 400px; height:40%;" class="field" name="branch_id"  class="field" required><option selected disabled>Please select..</option>';

                      while ($rs = mysqli_fetch_array($sql)) {
                        $select .= '<option value="' . $rs['branch_id'] . '">' . $rs['name'] . '</option>';
                      }
                    }
                    $select .= '</select>';
                    echo $select;
                    ?>
              </td>
            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
              <td> <label class="control-label" for="rdate">Registerd Date*</label></td>

              <td> <input type="date" id="rdate" class="field" name="rdate" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required></td>

            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
              <td> <label class="control-label" for="rdate">Default Password*</label></td>

              <td> <input type="text" id="" class="field" name="" style="width: 400px; height:40%; color:red;" placeholder="" value="ectc" class="input-xlarge" readonly></td>
            </tr>
            <tr style="height: 10px;"></tr>
          </table>
          <div class="control-group">
            <!-- Button -->
            <div class="controls">
              <button class="btn btn-primary" id="submit1" name="submit">Register</button>
              <!-- <button class="btn btn-danger" id="submit2" name="submit">Cancel</button> -->
            </div>
          </div>

        </form>
      </div>

      <div class="container " style="padding-left: 5%;  padding-top:03%;">
        <h4>Lecturer Details</h4><br>
        <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search by name...' title='Type in a name'><br><br><br>
        <table class="table table-bordered" id='myTable' width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>User Name</th>
              <th>NIC</th>

              <th>Email</th>
              <th>Phone</th>
              <th>Branch</th>
              <th>Registerd Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php
          $ret = mysqli_query($con, "select l.*, b.name from lecture_reg l, branch b where b.branch_id=l.branch");

          while ($row = mysqli_fetch_array($ret)) {
          ?>

            <tbody>
              <tr>

                <td><?php echo $row['f_name'] . " " . $row['l_name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['nic']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['r_date']; ?></td>
                <td>
                  <!-- <a href="edit_lec.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">Edit<i class="feather icon-clock m-t-10 f-16 "></i></a> -->
                  <a href="Lecture/delete_lec.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger">Remove<i class="feather icon-clock m-t-10 f-16 "></i></a>
                </td>

              </tr>

            </tbody>
          <?php

          } ?>
        </table>


      </div>

    </div>

    <script>
      function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
    </script>
</body>

</html>