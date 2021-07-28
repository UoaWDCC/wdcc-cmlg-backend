<html>
   <body>
      <?php
      // this file is for testing purpose
      // @todo Need to be deleted after the frontend finished
         echo Form::open(array('url' => '/api/uploadfile','files'=>'true'));
         echo 'Select the file to upload.';
         echo Form::file('spreadsheet');
         echo Form::submit('Upload File');
         echo Form::close();
      ?>
   </body>
</html>
