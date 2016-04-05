<form action="" method="POST">
	<p>
		<?php echo getcwd() ?>
	</p>
	<input type="hidden" value="2016_03_25_12_05_53_HC-CTCV-Compl.docx" name="filename">
	<input type="submit">
</form>
<?php 
if (isset($_POST['filename'])) {
	$path = getcwd()."/";
	$doc = $_POST['filename'];
	$cmd = 'export HOME='.$path.' && libreoffice --headless --convert-to pdf --outdir '.$path.' '.$path.$doc.' 2>&1';
	$result = shell_exec($cmd);
	if (strpos("convert", $result)) {
		echo "<br>Se convirtio el archivo correctamente<br>";
	}else{
		echo "<br>No se convirtio el archivo!<br>";
	}
}
?>