<head>
	<title>����������������</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="FFFFFF">
<?PHP
$file_dir = '.\\avi';
$http_dir = '/vks/avi/';
$prev_year = '0';
$cur_year = date('Y');
$prev_month = '0';
$prev_date = '0';

if (isset($_GET['year'])) {
	$sel_year = $_GET['year'];
	} else {
	$sel_year = $cur_year;
	}
	
if ($cur_year != $sel_year) {
	echo '<a href="/vks/index.php?year='.$cur_year.'">'.$cur_year.'</a>';
	} else {
	echo $cur_year;
	}

//��������� �� �����
if (is_dir($file_dir)) {
    $files = scandir($file_dir,1);
	foreach($files as $file) {
		$file2 = explode(".", $file);
		if (strlen($file2[0]) >= 10 and $file != '.' and $file != '..' and is_numeric(substr($file,0,4)) and is_numeric(substr($file,5,2)) and is_numeric(substr($file,8,2))) {
			if (substr($file,0,4) != $cur_year and substr($file,0,4) != $prev_year) {
				$prev_year = substr($file,0,4);
				if ($prev_year != $sel_year) {
					echo ' | <a href="/vks/index.php?year='.$prev_year.'">'.substr($file,0,4).'</a>';
					} else {
					echo ' | '.substr($file,0,4);
					}
				}
			}
		}
	}
echo '<br><br><hr>';


$prev_year = '0';
//��������� ���������� �� �������
if (is_dir($file_dir)) {
	//������� ���������� �������� � ������ � �������� �����������
    $files = scandir($file_dir,1);
	foreach($files as $file) {
		//��������� ���� �� ������������ �������
		$file2 = explode(".", $file);
		if (strlen($file2[0]) >= 10 and $file != '.' and $file != '..' and is_numeric(substr($file,0,4)) and is_numeric(substr($file,5,2)) and is_numeric(substr($file,8,2)) and substr($file,0,4) == $sel_year) {
			//������� ���
			//if (substr($file,0,4) != $prev_year) {
				//if ($prev_year != '0') { echo '<hr>'; }
			//	echo '<hr><h3>' . substr($file,0,4) . ' ���</h3>';
			//	}
			//������� �����
			if (substr($file,5,2) != $prev_month) {
				echo '<h4>';
				if (substr($file,5,2) == '01') {
					echo '������';
					$month = '������';
				} elseif (substr($file,5,2) == '02') {
					echo '�������';
					$month = '�������';
				} elseif (substr($file,5,2) == '03') {
					echo '����';
					$month = '�����';
				} elseif (substr($file,5,2) == '04') {
					echo '������';
					$month = '������';
				} elseif (substr($file,5,2) == '05') {
					echo '���';
					$month = '���';
				} elseif (substr($file,5,2) == '06') {
					echo '����';
					$month = '����';
				} elseif (substr($file,5,2) == '07') {
					echo '����';
					$month = '����';
				} elseif (substr($file,5,2) == '08') {
					echo '������';
					$month = '�������';
				} elseif (substr($file,5,2) == '09') {
					echo '��������';
					$month = '��������';
				} elseif (substr($file,5,2) == '10') {
					echo '�������';
					$month = '�������';
				} elseif (substr($file,5,2) == '11') {
					echo '������';
					$month = '������';
				} elseif (substr($file,5,2) == '12') {
					echo '�������';
					$month = '�������';
					}
				echo '</h4>';
				}
				
			if (substr($file,8,2) != $prev_date and substr($file,5,2) == $prev_month) { echo '<br>'; }
			
			if (substr($file,10,1) == 'k') {
				$video_type = '">�������� �� ';
				} else { 
				$video_type = '">���������������� �� '; 
				}
			
			$prev_date = substr($file,8,2);
			$prev_month = substr($file,5,2);
			$prev_year = substr($file,0,4);
			
			//������� ������ �� ����
			echo '<a href="' . $http_dir . $file . $video_type . substr($file,8,2) . ' ' . $month . ' ' . substr($file,0,4) .' ����</a><br>';
						
			}
		}
	}
?>
<br>
</body>
