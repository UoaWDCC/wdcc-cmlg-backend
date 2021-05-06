<html>
   <body>
      <?php
         echo Form::open(array('url' => '/api/uploadfile','files'=>'true'));
         echo 'Select the file to upload.';
         echo Form::file('spreadsheet');
         echo Form::submit('Upload File');
         echo Form::close();
      ?>
   </body>
</html>
