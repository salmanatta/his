<title><?php echo "backup MySQL data - " . $_SERVER['SERVER_NAME'] ; ?></title>
<?php 

// ref. to https://stackoverflow.com/questions/52530833/how-to-take-backup-of-mysql-database-using-php
    $dbhost = 'localhost';
    $dbuser = 'theblues_HIS';
    $dbpass = '26LtWrw1;2g4';
    $dbname = 'theblues_HIS';
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_set_charset($connection,"utf8");
    $backupAlert = '';
    $directory = 'backups';
    $backup_file = $dbname.'-'.date('d-m-Y').'.sql';
    $tables = array();
    $result = mysqli_query($connection, "SHOW TABLES");
    if (!$result) {
        $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
    } else {
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
        mysqli_free_result($result);

        $return = '';
        foreach ($tables as $table) {

            $result = mysqli_query($connection, "SELECT * FROM " . $table);
            if (!$result) {
                $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
            } else {
                $num_fields = mysqli_num_fields($result);
                if (!$num_fields) {
                    $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
                } else {
                    $return .= 'DROP TABLE ' . $table . ';';
                    $row2 = mysqli_fetch_row(mysqli_query($connection, 'SHOW CREATE TABLE ' . $table));
                    if (!$row2) {
                        $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
                    } else {
                        $return .= "\n\n" . $row2[1] . ";\n\n";
                        for ($i = 0; $i < $num_fields; $i++) {
                            while ($row = mysqli_fetch_row($result)) {
                                $return .= 'INSERT INTO ' . $table . ' VALUES(';
                                for ($j = 0; $j < $num_fields; $j++) {
                                    $row[$j] = addslashes($row[$j]);
                                    if (isset($row[$j])) {
                                        $return .= '"' . $row[$j] . '"';
                                    } else {
                                        $return .= '""';
                                    }
                                    if ($j < $num_fields - 1) {
                                        $return .= ',';
                                    }
                                }
                                $return .= ");\n";
                            }
                        }
                        $return .= "\n\n\n";
                    }

                    if (!file_exists($directory)) {
                        mkdir($directory);
                    }
                    $file = @fopen($directory . DIRECTORY_SEPARATOR . $backup_file,"w+");
                    if ($file != false){
                        fwrite($file,$return);
                        fclose($file);
                    }

                    // $backup_file = $dbname . '.sql';
                    // $handle = fopen("{$backup_file}", 'w+');
                    // fwrite($directory.'/'.$handle, $return);
                    // fclose($handle);
                    $backupAlert = 'backup MySQL data completed !';
                }
            }
        }
    }
    // echo $backupAlert;
    //$backup_file
    echo '<p><a href="' .$directory.'/'.$backup_file . '" Download>Download</a></p>';
?>