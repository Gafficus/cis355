<html>
	<?php
		$a = $_POST['valueA'];
		$b = $_POST['valueB'];
		$c = $_POST['valueC'];
		$x1 = -$b + sqrt($b * $b-4 * $a * $c);
		$x1 = $x1 / (2 * $a);
		$x2 = -$b - sqrt($b * $b-4 * $a * $c);
		$x2 = $x2 / (2 * $a);
		echo "x1 = " . $x1 . ", x2= " . $x2;
	?>
</html>