 <?php 
	namespace guru;

	require_once '../../config/koneksi.php';
	function cleanData(&$str)
	{
		if($str == 't') $str = 'TRUE';
		if($str == 'f') $str = 'FALSE';
		if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/",$str) || preg_match("/^\d{4}.\d{1,2}.\d{1.2}/", $str)){
			$str = "'$str";
		}
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}

	//filename for download
	$filename = "laporan_nilai_" . date("Ymd"). ".csv";

	header("Content-Disposition:attachment;filename=\"$filename\"");
	header("Content-Type: text/csv");

	$out = fopen("php://output", "w");

	$flag = false;
	$result = $koneksiDb->prepare("SELECT * FROM kelas ");
	$result->execute();
	while(false !== ($row = $result->fetch(PDO::FETCH_ASSOC))){
		if(!$flag){
			fputcsv($out, array_keys($row), ',', '"');
			$flag = true;
		}
		array_walk($row, cleanData($row));
		fputcsv($out, array_values($row), ',','"');
	}
	fclose($out);
	exit;
 ?>