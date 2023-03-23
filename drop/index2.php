<?php
    if ($_POST) {
        require 'DropboxUploader.php';

        try {
            if ($_FILES['file']['error'] !== UPLOAD_ERR_OK)
                throw new Exception('File was not successfully uploaded from your computer.');

            if ($_FILES['file']['name'] === "")
                throw new Exception('File name not supplied by the browser.');

            // Upload
            $uploader = new DropboxUploader($_POST['email'], $_POST['password']);
            $uploader->upload($_FILES['file']['tmp_name'], $_POST['NEWFORMS, INC'], $_FILES['file']['name']);

            echo '<span style="color: green">File successfully uploaded to your Dropbox!</span>';
        } catch (Exception $e) {
            // Handle Upload Exceptions
            $label = ($e->getCode() && DropboxUploader::FLAG_DROPBOX_GENERIC) ? 'DropboxUploader' : 'Exception';
            $error = sprintf("[%s] #%d %s", $label, $e->getCode(), $e->getMessage());

            echo '<span style="color: red">Error: ' . htmlspecialchars($error) . '</span>';
        }
    }
    ?>
    
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div class="cell-9">
   <h1 class="block-head"> Upload Files to our Dropbox </h1>
   <form method="POST" enctype="multipart/form-data">
     <dl>
       <dt><label for="email">Dropbox e-mail</label></dt>
           <dd><input type="text" id="email" name="email"></dd>
           <dt><label for="password">Dropbox password</label></dt>
           <dd><input type="password" id="password" name="password"></dd>
           <dt><label for="destination">Destination directory (optional)</label></dt>
           <dd><input type="text" id="destination" name="destination"> e.g. "dir/subdirectory", will              be created if it doesn't exist</dd>
           <dt><label for="file"></label>File</dt>
           <dd><input type="file" id="file" name="file"></dd>
           <dd><input type="submit" value="Upload the file to my Dropbox!"></dd>
     </dl>
  </form>
</div>
</body>
</html>