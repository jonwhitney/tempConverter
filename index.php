<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Temperature Converter</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>

<?php
$message = "";
if(isset($_POST['submit']))
{
    $temperature = $_POST['temperature'];
    $tempFrom = $_POST['temptype'];

    if (is_numeric($temperature) && ($temperature > 130)) {
        $message = "If it is really this hot, then you are dead.  Give it up.";
    }
    else if (is_numeric ($temperature) && ($temperature < -40)) {
        $message = "Seriously?  Move to Florida already.";
    }
    else if (is_numeric($temperature) && ($tempFrom == "cel")) {
        $img = "c2f.png";
        $convertedTemp = ((($temperature * 9) / 5 ) + 32);
        $message =  "Celsius ". $temperature . " to Fahrenheit is: " . (round($convertedTemp, 1));
    }
    else if (is_numeric($temperature) && ($tempFrom == "far")) {
        $img = "f2c.png";
        $convertedTemp = (($temperature - 32) * 5 ) / 9;
        $message = "Fahreneit ". $temperature . " to Celsius is: " . (round($convertedTemp, 1));
    }
    else {
        $message = "Please enter a numeric temperature value to convert.";
    }

   // echo "User Has submitted the form and entered this name : <b> $temperature </b>";
   // echo "<br>You can use the following form again to enter a new name.";
}
?>
<p class="borderbox">

<fieldset>
    <legend>Converter</legend>
    <table>
        <tr>
            <td>
               <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
               <input type="radio" name="temptype" value="far"> Fahrenheit<br>
               <input type="radio" name="temptype" value="cel"> Celsius<br>
               <input type="text" name="temperature"  size="10"><br>
               <input type="submit" name="submit" value="Convert"><br>
               </form>
            </td>
            <td><?php echo '<img src="images/'.$img.'"/>'; ?></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><?php echo '<h5>'. $message . '</h5>'; ?></td>
        </tr>
    </table>
</fieldset>
</p>
    </body>
</html>
