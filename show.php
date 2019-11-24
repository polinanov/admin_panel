<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
<header>
<script>

</script>

</header>

<body>


<?php		
	if (isset($_POST['finish'])) { 
		echo "<pre>"; 
		$a0 = "name1.txt";
		$b0 = "news/name";
		$name = dirname(__FILE__) . '/' . $b0 . '/' . $a0;
		//print_r($_POST); 
		$m = basename($_POST['delete']);
		$string = preg_replace('/[^0-9]/i', ' ', $m);
		$str = (int)$str;		
		echo "</pre><hr>";
							
		$boo = unlink($_POST['delete']);
		
		if($boo){
			echo "Файл " .basename($_POST['delete']). " удален\n"; 	
	
			$num_stroka = $str;
			$file = file($name);
			 
			for($i = 0; $i < sizeof($file); $i++)
			if($i == $num_stroka) unset($file[$i]);
			 
			$fp = fopen($name, "w");
			fputs($fp, implode("", $file));
			fclose($fp);
			
		}
		else 
			echo "Ошибка\n"; 
	 }
	
	if( isset( $_POST['fin'] )){
		echo "<pre>"; 
		print_r($_POST); 
		echo "</pre><hr>"; 
		echo "<h3>Вывод содержимого:</h3>";
		$dir = opendir("./news/name");
		$a = "news/name";
		while($file0 = readdir($dir)){
			if(($file0 != ".") && ($file0 != "..") && ($file0 != "index.php")){
				echo "<form action='show.php' method='post'>";
				echo "Файл: ". $file0;
				$name = dirname(__FILE__) . '/' . $a . '/' . $file0; 
				echo "<input type='hidden' name='delete'  value='" . $name . "'>";				
				echo "<input type='submit' name='finish' value='Удалить' />";
				echo "</form>";
			}
		}
			
	$dir = opendir("./news/photo");
	$a1 = "news/photo";
	while($file1 = readdir($dir)){
		if(($file1 != ".") && ($file1 != "..") && ($file1 != "index.php")){
			echo "<form action='show.php' method='post'>";
			echo "Файл: ". $file1;
			$name = dirname(__FILE__) . '/' . $a1 . '/' . $file1;
			echo "<input type='hidden' name='delete'  value='" . $name . "'>";				
			echo "<input type='submit' name='finish' value='Удалить' />";
			echo "</form>";				
		}		
	}

	$dir = opendir("./news/txt");
	$a2 = "news/txt";
		while($file2 = readdir($dir)){
			if(($file2 != ".") && ($file2 != "..") && ($file2 != "index.php")){
				echo "<form action='show.php' method='post'>";
				echo "Файл: ". $file2;
				$name = dirname(__FILE__) . '/' . $a2 . '/' . $file2;				
				echo "<input type='hidden' name='delete'  value='" . $name . "'>";				
				echo "<input type='submit' name='finish' value='Удалить' />";
				echo "</form>";
			}
					
		}
	}
	
	echo "<a href='https://molodshev.com/polinochka/ang/index.php'>Результат</a>";
?>

</body>
</html>

