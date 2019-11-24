<?php
//foreach ($_FILES["userfile"]["error"] as $key => $error) {
	$a0 = "name1.txt";
	$b0 = "news/name";
    $name = dirname(__FILE__) . '/' . $b0 . '/' . $a0;
	$memo=$_POST['memo'];
	clearstatcache(TRUE, $nn);
	if (file_exists($name)){ 
		if (!file_get_contents($name)){
			echo "Заказов нет!";
			$flag = 0;
		}
		else{
			$flag = 1;
			echo "I am here";
		}

	}
	else { 
		$flag = 0;
		echo "I not here";
	}
	$fs=fopen($name, "a+");
	if ($flag == 1) {
		$textname=fputs($fs,"\n");
	} 
	$textname=fputs($fs,$memo);
	fclose($fs);
	$textname='';
	$f=file($name);
	for($i=0;$i<count($f);$i++) {
		$textname="$textname$f[$i]";
	}

	$n = "news/txt"; //opendir("./news/txt");
	$dir = dirname(__FILE__) . '/' . $n;
	$i = 1;
	echo $dir;
	$files = scandir($dir);
	print_r($files);
	for($j=0; $j<count($files); $j++){
		if(($files[$j] != ".") &&  ($files[$j] != "..") && ($files[$j] != "index.php")){
			echo "Файл: ". $files[$j];
			$name_f = "file" . $i . ".txt";
			echo "Имя для сравнения: " . $name_f;
			if($files[$j] == $name_f){
				echo "+++++";
				$i++;
				echo $i;
			}
			else {
				echo "-----";
			}
		}
	}
						  
	$a2 = "file" . $i . ".txt";
	$b2 = "news/txt";
    $name = dirname(__FILE__) . '/' . $b2 . '/' . $a2;
	$memo2=$_POST['memo2'];
	$fs=fopen($name, "w");
	$textfile=fputs($fs,$memo2);
	fclose($fs);
	$textfile='';
	$f=file($name);
	for($i=0;$i<count($f);$i++) {
		$textfile="$textfile$f[$i]";
	}
	
	
	$b1 = "news/photo";
	$dir = dirname(__FILE__) . '/' . $b1;
	$i = 1;
	echo $dir;
	$files = scandir($dir);
	print_r($files);
	for($j=0; $j<count($files); $j++){
		if(($files[$j] != ".") &&  ($files[$j] != "..") && ($files[$j] != "index.php")){
			echo "Файл: ". $files[$j];
			$name_f = "photo" . $i . ".jpg";
			echo "Имя для сравнения: " . $name_f;
			if($files[$j] == $name_f){
				echo "photo+++++";
				$i++;
				echo $i;
			}
			else {
				echo "photo-----";
			}
		}
	}
	
	
	$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
	$detectedType = exif_imagetype($_FILES['userfile']['type']);
	$error = !in_array($detectedType, $allowedTypes);
	
	$a1 = "photo" . $i . ".jpg";
	$name = dirname(__FILE__) . '/' . $b1 . '/' . $a1;
	if ($error) {
		if (!@copy($_FILES['userfile']['tmp_name'], $name))
			echo 'Что-то пошло не так с загрузкой изображеия';
		else
			echo "Загрузка удачна" ;
    }
	echo "<form action='show.php' method='post'>";
	echo "<h3>Вывод и удаление файлов:</h3>";
	echo "<input type='submit' name='fin' value='Показать и Удалить' />";
	echo "</form>";

	echo "<a href='https://molodshev.com/polinochka/ang/index.php'>Результат</a>";

?>




