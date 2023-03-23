<?php



include("../connection.php");

//MSG SESSION



//minutes or more.
$expireAfter = 1;

//Check to see if our "last action" session
//variable has been set.
if (isset($_SESSION['msgfromupload'])) {




  $msg = $_SESSION['msgfromupload'];
  //Figure out how many seconds have passed
  //since the user was last active.
  $secondsInactive = time() - $_SESSION['msgfromupload'];

  //Convert our minutes into seconds.
  $expireAfterSeconds = $expireAfter * 12;

  //Check to see if they have been inactive for too long.
  if ($secondsInactive >= $expireAfterSeconds) {
    //User has been inactive for too long.
    //Kill their session.
    unset($_SESSION['msgfromupload']);
    //session_destroy();
  }
}










if ($thisuserpass == md5("ectc")) {





  $passtype = $thisuserpass;


  $active = "disabled";
} else {

  $passtype = "";

  $active = "";
}









$d = "select * from admin where username='" . $_SESSION['username'] . "'";

$result = mysqli_query($con, $d);

if ($rows = mysqli_fetch_array($result)) {
  $nn = $rows['name'];

  $ee = $rows['email'];
}






if (isset($_POST['imgu'])) {

  // Cover Image file upload
  $imagebox = $_FILES['file'];
  $ifile = rand(1000, 100000) . "-" . $_FILES['file']['name'];
  $ifile_loc = $_FILES['file']['tmp_name'];
  $ifile_size = $_FILES['file']['size'];
  $ifile_type = $_FILES['file']['type'];
  $ifolder = "Admin/M_ADMIN/users_profile_images/";

  if (($ifile_type == 'image/jpeg') || ($ifile_type == 'image/jpg') || ($ifile_type == 'image/gif') || ($ifile_type == 'image/png') || ($ifile_type == 'image/x-png')) {






    // new file size in KB
    $inew_size = $ifile_size / 1024;
    // make file name in lower case
    $inew_file_name = strtolower($ifile);
    // make file name in lower case
    $ifinal_file = str_replace(' ', '-', $inew_file_name);








    if (file_exists("M_ADMIN/users_profile_images/" . $_SESSION['profileimg'])) {


      unlink("M_ADMIN/users_profile_images/" . $_SESSION['profileimg']); //delete old pic


    }



    //move upload to folder

    if (move_uploaded_file($ifile_loc, $ifolder . $ifinal_file)) {
      $sql = "UPDATE admin SET profile='$ifinal_file' WHERE username='" . $_SESSION['username'] . "'";

      if ($con->query($sql) === TRUE) {
        $_SESSION['msgfromupload'] = '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success! Profile image changed.</strong>
</div>';

        echo "<script>window.onload = function () {
    if (! localStorage.justOnce) {
        localStorage.setItem('justOnce', 'true');
        window.location.reload();
    }
}</script>";
      } else {
        $_SESSION['msgfromupload'] = '<div class="alert alert-warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Connection error! "' . $conn->error . '" </strong>.
</div>';
      }



      $con->close();
    }
  }
}














if (isset($_POST['gi'])) {

  $fn = $_POST['fname'];

  $em = $_POST['email'];



  $qus = "UPDATE admin SET name='" . $fn . "' , email='" . $em . "' WHERE username='" . $_SESSION['username'] . "'";



  $ree = mysqli_query($con, $qus);





  if (!($ree)) {
    echo ("Database Error : " . mysqli_error($con));
  } else {

    echo ("Update Successful");
  }
}

if (isset($_POST['pwc'])) {

  if ($thisuserpass != md5("ectc")) {
    $cn = md5($_POST['cp']);
    $np = md5($_POST['np']);
    $p = "select password from admin where username='" . $_SESSION['username'] . "'";

    $result = mysqli_query($con, $p);

    if ($rows = mysqli_fetch_array($result)) {
      $ccpw = $rows['password'];

      if ($ccpw == $cn) {



        $query1 = "UPDATE admin SET password='" . $np . "' WHERE username='" . $_SESSION['username'] . "'";



        $result = mysqli_query($con, $query1);





        if (!($result)) {
          echo ("Database Error : " . mysqli_error($con));
        } else {


          session_destroy();
          echo "<script>
			
				location.reload();
			
			</script>";

          $msg = '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have password changed successfully!
</div>';
        }
      }
    }
  } else {








    $cn = md5("ectc");
    $np = md5($_POST['np']);
    $p = "select password from admin where username='" . $_SESSION['username'] . "'";

    $result = mysqli_query($con, $p);

    if ($rows = mysqli_fetch_array($result)) {
      $ccpw = $rows['password'];

      if ($ccpw == $cn) {



        $query1 = "UPDATE admin SET password='" . $np . "' WHERE username='" . $_SESSION['username'] . "'";
        $result = mysqli_query($con, $query1);

        if (!($result)) {
          echo ("Database Error : " . mysqli_error($con));
        } else {


          session_destroy();
          echo "<script>
										
											location.reload();
										
										</script>";

          echo ("Password updated");

          $msg = '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have password changed successfully!
</div>';
        }
      }
    }
  }
}


?>





<!DOCTYPE html>
<html lang="en">







<body class="nav-md">
  <div class="container body">
    <!-- top navigation -->
    <div class="top_nav"></div>
    <!-- /top navigation -->


















    <!-- page content -->

    <div class="clearfix"></div>
    <div class="row">
      <?php echo $msg; ?>


      <div class="x_content">
        <h2 style="font-size: 25px;" align="center">Edit Profile</h2>


        <br>






        <div class="grid_3 grid_4">



          <form id="upload_form" enctype="multipart/form-data" method="post" class="form-horizontal" style="width: 75%; padding-left:25%;">



            <br>


            <h3>
              <style>
                progress {
                  display: block;
                  /* default: inline-block */
                  width: 300px;
                  margin: 1em auto;
                  padding: 4px;
                  border: 0 none;
                  background: #004;

                  border-radius: 4px;

                }

                progress::-moz-progress-bar {
                  border-radius: 4px;

                  background: #003;
                  box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.4), 0 2px 5px 0px rgba(0, 0, 0, 0.3);

                }

                /* webkit */
                @media screen and (-webkit-min-device-pixel-ratio:0) {
                  progress {
                    height: 10px;
                  }
                }

                progress::-webkit-progress-bar {
                  background: transparent;
                  background-color: #FA5A32;
                }

                progress::-webkit-progress-value {
                  border-radius: 4px;
                  background: #14BD57;
                  box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.2), 0 2px 1px 0px rgba(0, 0, 0, 0.3);
                }

                /* environnement styles */


                button {
                  border: 0;
                  background: #FFF;
                  width: 25px;
                  margin: 0 10px;
                  line-height: 23px;
                  font-weight: bold;
                  color: #555;
                  border-radius: 4px;
                  box-shadow: inset 0 -2px 3px rgba(0, 0, 0, .4), 0 2px 5px rgba(0, 0, 0, 0.5);
                }
              </style>
              <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="sessionuser" />
            </h3>
            <div class="tab-content">


              <div class="tab-pane active" id="horizontal-form">

       

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="First Name" required name="fname" value="<?php echo $nn; ?>">
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Email" required name="email" value="<?php echo $ee; ?>">
                    <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <input type="text" class="form-control" value=" <?php echo $le; ?>" disabled>
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <input type="submit" value="Update" name="gi" class="btn btn-primary">
                  </div>
                </div>


                <div class="modal fade" id="myModalUP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel" style="color: #F30;">Upload Confirmation</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h3 style="color:#36C;">Are you sure you want to upload? </h3>
                      </div>
                      <div class="modal-footer">

                        <button onclick="uploadFile()">Update</button>
                        <button onclick="upcanl()">Cancel</button>

                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  function upcanl() {
                    //alert("dsdsadsa");
                    var logo = document.getElementById('blah');

                    logo.onload = function() {
                      alert("The image has loaded!");
                    };

                    setTimeout(function() {
                      logo.src = 'http://stackoverflow.com/Content/Img/stackoverflow-logo-250.png';
                    }, 5000);
                  }

                  function readURLl(input) {
                    if (input.files && input.files[0]) {
                      var reader = new FileReader();

                      reader.onload = function(e) {
                        $('#blah')
                          .attr('src', e.target.result)
                          .width(150)
                          .height(200);
                      };

                      reader.readAsDataURL(input.files[0]);
                    }
                  }



                  jQuery("input#file1").change(function() {
                    //alert(jQuery(this).val())
                    readURLl(this);
                    $('#myModalUP').modal('show');
                    //uploadFile();
                  });
                </script>

              </div>
            </div>
          </form>


          <!--              
<script type="text/javascript">
					  
					  function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
	 $('#myModalUP').modal('hide');
  var file = _("file1").files[0];
  // var fileimg = _("profile-img").files[0];
  //var desv = document.getElementById("des").value;

  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
//    formdata.append("profile-img", fileimg);
//formdata.append("tit","222");
//formdata.append("des",desv);
//formdata.append("tit","222");


  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "Admin/upload.php");
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0;
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}
					  </script>
                      
                   -->
          <br />
          <br /><br />
          <br />


        </div>





        <br>

        <h2 style="font-size: 25px;" align="center">Change password</h2>

        <br><br>


        <form class="form-horizontal form-label-left input_mask" method="post" action="" form="form1" style="width: 75%; padding-left:25%;">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="hidden" name="cpp" value="<?php echo $_SESSION['username']; ?>">
              <input type="text" class="form-control" value=" <?php echo $_SESSION['username']; ?>" disabled>
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Password</label>
            :
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" required name="cp" placeholder="Currunt Password" value="<?php echo $passtype; ?>" <?php echo $active; ?>>
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
            :
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="password" class="form-control" placeholder="New Password" required name="np">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

              <input type="submit" value="Change" name="pwc" class="btn btn-warning">
            </div>
          </div>

        </form>




      </div>


























      <script>
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
            };


            reader.onload = function(e) {
              $('#blah2')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
            };

            reader.readAsDataURL(input.files[0]);
          }
        }
      </script>













      <br>
</body>

</html>