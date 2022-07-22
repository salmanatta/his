<?php
 // $dbhost = 'localhost';
 //    $dbuser = 'root';
 //    $dbpass = '';
 //    $dbname = 'skote_laravel';
 //    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$connection = mysqli_connect('localhost','root','','test');

// $filename = 'backup.sql';
 // $filename = 'skote_laravel'.'-'.date('d-m-Y').'.sql';
 $filename = request()->has('file') ? request('file') : 'skote_laravel'.'-'.date('d-m-Y').'.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));

$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  if($result){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';
  }
}
fclose($handle);
echo 'Successfully imported';
echo '<p><a href="#">Go back</a></p>';

?>