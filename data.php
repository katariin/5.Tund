<?php
   //laeme funktsiooni failis
   require_once("function.php");
   
   // kas kasutaja on sisse loginud
   if(isset($_SESSION["id_from_db"])) {
	   //suudan data lehel
	   header("Location: login.php");
   }
   //login v�lja
   if(isset($_GET["logout"])){
	   // kustutab k�ik sessiooni muutujad
	   session_destroy();
	   header("Location: login.php");
	   
   }
   
   $car_plate = $color = $car_plate_error = $color_error ="";
   
   //ei ole t�hjad
   
  if(isset($_POST["create"])){
		
		echo "vajutas create nuppu!";
		
		if ( empty($_POST["car_plate"]) ) {
			$car_plate_error = "See vali on kohustuslik";
		}else{
			$car_plate= cleanInput($_POST["car_platee"]);
		}
		
		if ( empty($_POST["color"]) ) {
			$color_error = "See vali on kohustuslik";
		}else{
			$color = cleanInput($_POST["color"]);
		}
		
		if(	$car_plate_error == "" && $car_plate == ""){
			
			
		}
 }  // create if end

   
   
  

?>

<p>
  Tere, <?php echo $_SESSION["user_email"];?>
  <a href= "?logout=1" >Logi v�lja</a>
</p>

<h2>Log in</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  <label for="car_plate" >auto nr</label><br>
  <input id="car_plate" name="car_plate" type="text" value="<?=$car_plate; ?>"> <?=$car_plate_error; ?><br><br>
  <label>v�rv</label><br>
  <input name="color" type="text" value="<?=$color; ?>"> <?=$color_error; ?><br><br>
  <input type="submit" name="login" value="Log in">
  </form>