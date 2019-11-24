<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
<header>

</header>

<body>
	<h3>Загрузка файла (формат только text/html)</h3>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<p>Отправить эти файлы:</p>
		<input type="hidden">
		<p>Текст с именем событий</p>
		<textarea cols=40 rows=6 name="memo"><? echo htmlspecialchars($textname); ?></textarea><br>
		<p>Текст с описанием "События"</p>
		<textarea cols=98 rows=20 name="memo2"><? echo htmlspecialchars($textfile); ?></textarea><br>
		<p>Файл с изображением "Событиия" в формате .jepg .png .gif</p><input name="userfile" type="file"><br>
		<input type="submit" value="Отправить файлы ">
	</form>
	<?php
		echo "<form action='show.php' method='post'>";
		echo "<h3>Вывод и удаление файлов:</h3>";
		echo "<input type='submit' name='fin' value='Показать и Удалить' />";
		echo "</form>";
	?>
</body>
</html>