<?php
namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use DB;
class BackupController extends Controller
  

  {


 public function backupImport(Request $request)
    {

    	// $connection=DB::connection();
    	 // dd($request->all());

	        $host=env('DB_HOST', '127.0.0.1');
            $database = env('DB_DATABASE', 'skote_laravel');
            $username = env('DB_USERNAME', 'root');
            $password = env('DB_PASSWORD', '');
$connection = mysqli_connect($host,$username,$password,$database);

// $filename = 'backup.sql';
 // $filename = 'skote_laravel'.'-'.date('d-m-Y').'.sql';
 $filename = request()->has('file') ? request('file') : 'skote_laravel'.'-'.date('d-m-Y').'.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));

$sql = explode(';',$contents);
foreach($sql as $query){
  $result = $query;
  $result = mysqli_query($connection,$query);
  // if($result){
  //     echo '<tr><td><br></td></tr>';
  //     echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
  //     echo '<tr><td><br></td></tr>';
  // }
}
fclose($handle);
// return redirect(route('register'));

return redirect(route('list-backups'));
// echo 'Successfully imported';
// echo '<p><a href="">Go back</a></p>';





    }
}







 