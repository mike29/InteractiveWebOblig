<h1>lrh</h1>
<?php
$dude = 2; 
echo "<h3>hello</h3>";
echo "<p>\$dude er " . $dude . "</p>";
echo '<img src="/bilde.jpg" alt ="bilde tekst"/>';
echo "<img src='/bilde.jpg' alt ='bilde tekst'/><br/>";

?>

<!--for løkker-->
<!--
<select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>
-->
<br/>
<hr/>
<!-- form-->
<form action ="form.php" method="post">
<select name="birthdate">
    <option value="-"> velg dato </option>
    <?php
        for ($dag = 0; $dag < 32; $dag++) {
            echo "<option value='" . $dag . "'>". $dag . "</option>";
        }
    
    ?>
</select>
<button type ="submit"> send </button>

</form>


<!--
<br/>
<select>
    <option value ="-">valg bil</option>
<?php
$cars = array("Volvo", "BMW", "Toyota");
    for ($b=0; $cars < 2;$b++){
        echo "<option value='" . $b . "'>". $b . "</option>";
    }
    
//echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
?>

</select>
-->
