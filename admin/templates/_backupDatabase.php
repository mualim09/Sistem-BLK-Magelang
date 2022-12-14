<div class="row">
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      
      <h2><i class="glyphicon glyphicon-cloud-download"></i> Susunan Backup </h2>
      <hr>

      <div class="row">
        <div class="col-md-6">
          <h4>Backup Tabel Paserta</h4>
          <a href="?backup=peserta" class="btn btn-info"><i class="glyphicon glyphicon-download-alt"></i> Backup Tabel Peserta</a>
          <?php 

          require './config/backupFunction.php';

          if (isset($_GET['backup'])) {

            $backup_file = 'database/db-backup-tabel_'.$_GET['backup'].'-'.date('Y-m-d').'.sql';

            $mybackup = backup_tables("localhost","root","","project_blk","peserta");

            $handle = fopen($backup_file,'w+');
            fwrite($handle,$mybackup);
            fclose($handle);
            chmod($backup_file, 0777);

            echo "<meta http-equiv='refresh' content='0; url=http://localhost/project_blk/v.1.0.3/admin/backups' />";

          }

          ?>
        </div>
        <div class="col-md-6">
          <h4>Restore Tabel Peserta</h4>

          <?php

          if (isset($_FILES['dataRestore']['name'])) {

              $fileUpload = './database/tmp/'.$_FILES['dataRestore']['name'];
              $fileTmp    = $_FILES['dataRestore']['tmp_name'];

              move_uploaded_file($fileTmp, $fileUpload);

              
              $mysql_host = 'localhost';
      
              $mysql_username = 'root';
      
              $mysql_password = '';
      
              $mysql_database = 'project_blk';
      
              mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
      
              mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
      
              $templine = '';
      
              $lines = file($fileUpload);
      
              foreach ($lines as $line)
              {
      
              if (substr($line, 0, 2) == '/*--' || $line == '' || substr($line, 0, 2) == '--*/')
                  continue;
      
              $templine .= $line;
      
              if (substr(trim($line), -1, 1) == ';')
              {
          
                  mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
          
                  $templine = '';
              }
              }

              unlink($fileUpload);
               echo "<strong>Tables imported successfully</strong>";
           }

          ?>

          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="form-inline">
            <input type="file" name="dataRestore" class="form-control">
            <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-upload"></i> Restore Tabel</button>
          </form>

        </div>
      </div>
      <br><br>

      <?php
      if (isset($_GET['restore']) && isset($_GET['delete'])) {

        $file = $_GET['delete'];
        unlink("./database/".$file);
        echo "<script>window.location.href='http://localhost/project_blk/v.1.0.3/admin/backups'</script>";

      }

      ?>

      <table class="table table-condensed table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama File</th>
                <th>Permission</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
            <?php

            if ($handle = opendir('database')) {

              $no=1;

                while (false !== ($filename = readdir($handle))) {

                    if ($filename != "." && $filename != ".." && $filename != "tmp") {
            ?>

            
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $filename ?></td>
                <td><?= Permission($filename) ?></td>
                <td>
                  <a href="http://localhost/project_blk/v.1.0.3/admin/backups?restore=true&delete=<?= $filename ?>" class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
                  <a href="http://localhost/project_blk/v.1.0.3/admin/download.php?filename=<?= $filename ?>" class="btn btn-info btn-xs">
                    <i class="glyphicon glyphicon-download-alt"></i>
                  </a>
                </td>
              </tr>
              

            <?php
                    }
                }

                closedir($handle);
            }

            ?>
            </tbody>
          </table>
      
  </div>
</div>