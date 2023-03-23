<?php
session_start();
$name = $_SESSION['name'];
include 'connection.php';
include 'includes/sidbar_l.php';
include 'includes/nav.php';

$msg = "";

if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * from lecture_reg WHERE username='" . $_SESSION["name"] . "'");
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["password"]) {
        $pwd = md5($_POST["newPassword"]);
        mysqli_query($con, "UPDATE lecture_reg set password='$pwd' WHERE username='" . $_SESSION["name"] . "'");
        $message = "Password Changed";
        echo "<script>	
				//location.reload();	
			</script>";
             $msg = '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> You have successfully updated Password!
                    </div>';

    } else
        $message = "Current password is not correct!";
    // echo "<script>alert('Current password is not correct!');</script>";
}
?>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

?>





<script>
    $(document).ready(function() {

        $('#MyTable').DataTable({

            initComplete: function() {

                this.api().columns().every(function() {

                    var column = this;

                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {

                            var val = $.fn.dataTable.util.escapeRegex(

                                $(this).val()

                            );

                            //to select and search from grid  

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();

                        });

                     column.data().unique().sort().each(function(d, j) {

                        select.append('<option value="' + d + '">' + d + '</option>')

                     });

                });

            }

        });

    });
</script>



<!DOCTYPE html>

<html lang="en">

<head>
    <style>
        .message {
            color: #FF0000;
            /* text-align: center; */
            width: 100%;
        }

        .required {
            color: #FF0000;
            font-size: 11px;
            font-weight: italic;
            padding-left: 10px;
        }

        .txtField {
            padding: 5px;
            border: #000 1px solid;
            border-radius: 4px;
        }

        .tblSaveForm {
            border: 2px #999999 solid;
            background-color: #f8f8f8;
            padding: 10px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ECTC | PDP</title>

    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- iCheck -->

    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->

    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- <script src="../pay/js/jquery-2.1.4.js" type="text/javascript"></script> -->

    <!-- Page level plugin JavaScript-->

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable();

        });
    </script>

    <script>
        function validatePassword() {
            var currentPassword, newPassword, confirmPassword, output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if (!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = " *required!";
                output = false;
            } else if (!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = " *required!";
                output = false;
            } else if (!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = " *required!";
                output = false;
            }
            if (newPassword.value != confirmPassword.value) {
                newPassword.value = "";
                confirmPassword.value = "";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = " *passwords do not match!";
                output = false;
            }
            return output;
        }
    </script>

</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6"style="left:525px">
                    <ol class="breadcrumb">
                        <?php
                         echo "$msg"; ?>
                    </ol>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <!-- /.col -->
                
                <div class="col-sm-6">
                    
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="index_l.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Change Password </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <h3 align="center" style="padding-left: 10%;">Change Password</h3>

    <div class="wrapper" style="padding-left: 20%;">

        <!-- <div class="row" style="padding-left: 30%;"> -->
        <br>
        <form name="frmChange" method="post" action="" onSubmit="return validatePassword()" style="width: 75%;padding-left:25%">
            <div style="width: 500px;">
                <div class="message"><?php if (isset($message)) {
                                            echo $message;
                                        } ?></div>
                <table border="0" cellpadding="10" cellspacing="0" width="100%" align="center" class="tblSaveForm">
                    <tr>
                        <td style="padding-left: 10%;padding-top:10%"><label>Current Password</label></td>
                        <td style="padding-left: 10%;padding-top:10%"><input type="password" name="currentPassword" class="txtField" /><span id="currentPassword" class="required"></span></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10%;"><label>New Password</label></td>
                        <td style="padding-left: 10%;"><input type="password" name="newPassword" class="txtField" /><span id="newPassword" class="required"></span></td>
                    </tr>
                    <td style="padding-left: 10%;"><label>Confirm Password</label></td>
                    <td style="padding-left: 10%;"><input type="password" name="confirmPassword" class="txtField" /><span id="confirmPassword" class="required"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 10%;padding-bottom:10%"><input type="submit" name="submit" value="Change Password" class="btn btn-primary"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    </div>

    <!-- jQuery UI 1.11.4 -->

    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Sparkline -->

    <script src="plugins/sparklines/sparkline.js"></script>

    <!-- jQuery Knob Chart -->

    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>

    <!-- daterangepicker -->

    <script src="plugins/moment/moment.min.js"></script>

    <script src="plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->

    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Summernote -->

    <script src="plugins/summernote/summernote-bs4.min.js"></script>

    <!-- overlayScrollbars -->

    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- AdminLTE App -->

    <script src="dist/js/adminlte.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="dist/js/demo.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="dist/js/pages/dashboard.js"></script>

</body>

</html>