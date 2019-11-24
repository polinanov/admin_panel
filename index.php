<html>
    <head>
		<title>Главная страница</title>
    </head>
    <body>
		<h2>Главная страница</h2>
		<?php 
			function read_file_func($file) { 
				if(file_exists($file)) { 
					$f=fopen($file, "r+t") or die("Невозможно открыть файл"); 
					flock($f, LOCK_SH);    
					$cont=explode("\n",fread($f,filesize($file)));    
					fclose($f);      
				} 
				else { 
					$cont="Файл не существует"; 
				}  
				return $cont; 
			} 
			$path = "news/photo/";
			$images = scandir($path);
			$i = 1;
			if ($images !== false) { 
				$images = preg_grep("/\.(?:png|gif|jpe?g)$/i", $images); 
				if (is_array($images)) { 
					foreach($images as $image) { 
						echo "<div>";
						echo "<br>";
						echo "Название: " . $i;
						$fopen=@file("news/name/name1.txt");
						echo $fopen[$i-1]."<br>";
						echo "<img src='".$path.htmlspecialchars(urlencode($image))."' alt='".$image."' />";
						$read_text=read_file_func('news/txt/file'. $i .'.txt');
						echo "<br>";
						foreach ($read_text as $value) echo $value."<br>"; 
						echo "</div>";
						$i++;
					}
				}
			}

		?>
		<br>

    </body>
</html>