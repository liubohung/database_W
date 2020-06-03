<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<title>Admin</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
		pre
		{
		    overflow-x: auto;
			max-width: 60vw;
		}

		pre code
		{
		    word-wrap: normal;
		    white-space: pre;
		}
	</style>
	</head>
	<body>
		<h1>管理者介面</h1>

<?php
	include "admin_nav.php";
	nav_in();
	print "<div class=\"container\">";
	$data = "";
	$data .= '
	<div class="card my-2">
	  <h4 class="card-header text-center">
	    Service status
	  </h4>
	<div class="card-body pb-0">
	';

	$timeout = "1";

	$services = array();


	$services[] = array("port" => "80",       "service" => "Web server",              "ip" => "") ;
	$services[] = array("port" => "21",       "service" => "FTP",                     "ip" => "") ;
	$services[] = array("port" => "3306",     "service" => "MYSQL",                   "ip" => "") ;
	// $services[] = array("port" => "3000",     "service" => "Mastodon web",                   "ip" => "") ;
	// $services[] = array("port" => "4000",     "service" => "Mastodon streaming",                   "ip" => "") ;
	$services[] = array("port" => "22",       "service" => "Open SSH",				"ip" => "") ;
	$services[] = array("port" => "58846",     "service" => "Deluge",             	"ip" => "") ;
	$services[] = array("port" => "8112",     "service" => "Deluge Web",             	"ip" => "") ;
	$services[] = array("port" => "80",       "service" => "Internet Connection",     "ip" => "google.com") ;
	$services[] = array("port" => "8083",     "service" => "Vesta panel",             	"ip" => "") ;


	//begin table for status
	$data .= "<small><table  class='table table-striped table-sm '><thead><tr><th>Service</th><th>Port</th><th>Status</th></tr></thead>";
	foreach ($services  as $service) {
		if($service['ip']==""){
		   $service['ip'] = "localhost";
		}
		$data .= "<tr><td>" . $service['service'] . "</td><td>". $service['port'];

		$fp = @fsockopen($service['ip'], $service['port'], $errno, $errstr, $timeout);
		if (!$fp) {
			$data .= "</td><td class='table-danger'>Offline </td></tr>";
		  //fclose($fp);
		} else {
			$data .= "</td><td class='table-success'>Online</td></tr>";
			fclose($fp);
		}

	}
	//close table
	$data .= "</table></small>";
	$data .= '
	  </div>
	</div>
	';
	echo $data;


	/* =====================================================================
	//
	// ////////////////// SERVER INFORMATION  /////////////////////////////////
	//
	//
	* =======================================================================/*/

	$data1 = "";
	$data1 .= '
	<div class="card mb-2">
	  <h4 class="card-header text-center">
	    Server information
	  </h4>
	  <div class="card-body">
	';

	$data1 .= "<table  class='table table-sm mb-0'>";
	// $data1 .= "<div class='table-responsive'><table  class='table table-sm mb-0'>";

	//GET SERVER LOADS
	$loadresult = @exec('uptime');
	preg_match("/averages?: ([0-9\.]+),[\s]+([0-9\.]+),[\s]+([0-9\.]+)/",$loadresult,$avgs);

	//GET SERVER UPTIME
	$uptime = explode(' up ', $loadresult);

	isset($uptime[1])?$uptime = explode(',', $uptime[1]):$uptime=null;
	//$uptime = explode(',', $uptime[1]);

	isset($uptime[1])?$uptime = $uptime[0].', '.$uptime[1]:$uptime=null;
	//$uptime = $uptime[0].', '.$uptime[1];

	//Get the disk space
	function getSymbolByQuantity($bytes) {
		$symbol = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB');
		$exp = floor(log($bytes)/log(1024));
		if($exp == 0 or $exp=-INF)
		{
			$exp= 1;
		}
		return sprintf('%.2f<small>'.$symbol[$exp].'</small>', ($bytes/pow(1024, floor($exp))));
	}
	function percent_to_color($p){
		if($p < 30) return 'success';
		if($p < 45) return 'info';
		if($p < 60) return 'primary';
		if($p < 75) return 'warning';
		return 'danger';
	}
	function format_storage_info($disk_space, $disk_free, $disk_name){
		$str = "";
		if($disk_space== 0)
		{
			$disk_space= 1;
		}
		$disk_free_precent = 100 - round($disk_free*1.0 / $disk_space*100, 2);
			$str .= '<div class="col p-0 d-inline-flex">';
			$str .= "<span class='mr-2'>" . badge($disk_name,'secondary') .' '. getSymbolByQuantity($disk_free) . '/'. getSymbolByQuantity($disk_space) ."</span>";
			$str .= '
	<div class="progress flex-grow-1 align-self-center">
	  <div class="progress-bar progress-bar-striped progress-bar-animated ';
			$str .= 'bg-' . percent_to_color($disk_free_precent) .'
	  " role="progressbar" style="width: '.$disk_free_precent.'%;" aria-valuenow="'.$disk_free_precent.'" aria-valuemin="0" aria-valuemax="100">'.$disk_free_precent.'%</div>
	</div>
	</div>		';

		return $str;

	}

	function get_disk_free_status($disks){
		$str="";
		$max = 5;
		foreach($disks as $disk){
			if(strlen($disk["name"]) > $max) 
				$max = strlen($disk["name"]);
		}

		foreach($disks as $disk){
			$disk_space = disk_total_space($disk["path"]);
			$disk_free = disk_free_space($disk["path"]);

			$str .= format_storage_info($disk_space, $disk_free, $disk['name']);

		}
		return $str;
	}
	function badge($str, $type){
		return "<span class='badge badge-" . $type . " ' >$str</span>";
	}

	//Get ram usage
	$total_mem = preg_split('/ +/', @exec('grep MemTotal /proc/meminfo'));

	isset($total_mem[1])?$total_mem=$total_mem[1]:$total_mem=null;

	//$total_mem = $total_mem[1];
	$free_mem = preg_split('/ +/', @exec('grep MemFree /proc/meminfo'));
	$cache_mem = preg_split('/ +/', @exec('grep ^Cached /proc/meminfo'));

	isset($free_mem[1])?$free_mem=$free_mem[1] + $cache_mem[1]:$free_mem=null;

	//$free_mem = $free_mem[1] + $cache_mem[1];


	//Get top mem usage
	$tom_mem_arr = array();
	$top_cpu_use = array();

	//-- The number of processes to display in Top RAM user
	$i = 5;


	/* ps command:
	-e to display process from all user
	-k to specify sorting order: - is desc order follow by column name
	-o to specify output format, it's a list of column name. = suppress the display of column name
	head to get only the first few lines 
	*/
	exec("ps -e k-rss -o rss,args | head -n $i", $tom_mem_arr, $status);
	exec("ps -e k-pcpu -o pcpu,args | head -n $i", $top_cpu_use, $status);


	$top_mem = implode('<br/>', $tom_mem_arr );
	$top_mem = "<pre class='mb-0 '><code>" . $top_mem . "</code></pre>";

	$top_cpu = implode('<br/>', $top_cpu_use );
	$top_cpu = "<pre class='mb-0 '><code>" . $top_cpu. "</code></pre>";

	isset($avgs[1],$avgs[2],$avgs[3])?$data1.= "<tr><td>Average load</td><td><h5>". badge($avgs[1],'secondary'). ' ' .badge($avgs[2], 'secondary') . ' ' . badge( $avgs[3], 'secondary') . " </h5></td>\n":$data1.=null;

	//$data1 .= "<tr><td>Average load</td><td><h5>". badge($avgs[1],'secondary'). ' ' .badge($avgs[2], 'secondary') . ' ' . badge( $avgs[3], 'secondary') . " </h5></td>\n";
	$data1 .= "<tr><td>Uptime</td><td>$uptime                     </td></tr>";


	$disks = array();

	/*
	* The disks array list all mountpoint you wan to check freespace
	* Display name and path to the moutpoint have to be provide, you can
	*/
	$disks[] = array("name" => "local" , "path" => getcwd()) ;
	// $disks[] = array("name" => "Your disk name" , "path" => '/mount/point/to/that/disk') ;


	$data1 .= "<tr><td>Disk free        </td><td>" . get_disk_free_status($disks) . "</td></tr>";

	$data1 .= "<tr><td>RAM free        </td><td>". format_storage_info($total_mem *1024, $free_mem *1024, '') ."</td></tr>";
	$data1 .= "<tr><td>Top RAM user    </td><td><small>$top_mem</small></td></tr>";
	$data1 .= "<tr><td>Top CPU user    </td><td><small>$top_cpu</small></td></tr>";

	$data1 .= "</table>";
	// $data1 .= '  </div></div>';
	$data1 .= '  </div>';
	echo $data1;
?>
</body>
</html>
