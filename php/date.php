<?php
/*
	Use this script to print or build timestamps.
	TODO: add timezone support
*/

$timestamp = '';

if (isset($_GET['timestamp']) && $_GET['timestamp']) {
	$timestamp = $_GET['timestamp'];
}
if (isset($_GET['year']) && $_GET['year']) {
	$year = $_GET['year'];
	$month = $_GET['month'];
	$day = $_GET['day'];
	$timestamp = mktime(0, 0, 0, $month, $day, $year);
}

?>

<?php echo $timestamp ? date(DATE_RFC822, $timestamp) : ''; ?>

<br><br>
<form>
	<input type="text" placeholder="timestamp" name="timestamp" autofocus value="<?php echo $timestamp ?>">
	<input type="submit">
</form>


<?php
function option($value, $label, $selected_value) {
	$selected = $value == $selected_value ? ' selected' : '';
	return '<option value="'.$value.'"'.$selected.'>'.$label.'</option>';
}
?>

<?php $selected = $timestamp ?: time(); ?>
<form>
	<select name="year">
		<?php
		echo $from = date('Y') + 10;
		$to = date('Y') - 10;
		for($i = $from; $i > $to; $i--) {
			echo option($i, $i, date('Y', $selected));
		}
		?>
	</select>
	<select name="month">
		<?php
		$months = array(1=>'January','February','March','April','May','June','July ','August','September','October','November','December');
		foreach ($months as $i => $name) {
			echo option($i, $name, date('m', $selected));
		}
		?>
	</select>
	<select name="day">
		<?php
		for($i = 1; $i <= 31; $i++) {
			echo option($i, $i, date('d', $selected));
		}
		?>
	</select>
	<input type="submit">
</form>

<br><br>
<pre style="font-size:120%; margin-left:100px;">
<?php
	require_once('PasswordGenerator.php');
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
	echo PasswordGenerator::getAlphaNumericPassword(15) . "<br><br>";
?>
</pre>
