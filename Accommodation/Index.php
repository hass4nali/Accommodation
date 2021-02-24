<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">

<style>


.searchresponsive {
  padding: 0 6px;
  float: left;
  width: 20%;
}

@media only screen and (max-width: 1200px) {
  .searchresponsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 670px) {
  .searchresponsive {
    width: 100%;
  }
}

* {box-sizing: border-box}

.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}



</style>
</head>

<body>
<?php
	include ("Properties.php");
	include ("Login.php");
?>

<div class="header">
  <a href="Index.php" class="logo">Student Accommodation</a>
  <div class="header-right">
<?php
			$Link = new User();
			
			$Link->PaymentsLink();
			$Link->BookingsLink();
			$Link->MaintenanceLink();
		?>
		<a href="Property.php">Properties</a>
		<a href="AboutUs.php">About Us</a>
		<a href="Contact.php">Contact</a>
		<?php
			$Link->SettingsLink();
		?>
		<a href="LoginForm.php">Login</a>
  </div>
</div>


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="Images/Image1.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="Images/Image2.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="Images/Image3.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="Images/Image4.png" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>










<div id ="textbox">
	<div class="container">
	
  <form action="Property.php" method="POST">   
<div class="searchresponsive">
  <label for="City">City</label>
    <select id="City" name="City">
      <option value="Leeds">Leeds</option>
      <option value="Bradford">Bradford</option>
      <option value="Huddersfield">Huddersfield</option>
    </select>
</div>
<div class="searchresponsive">
	<label for="Price">Max Price</label>
    <select id="Price" name="Price">
		<option value="999999">No Max</option>
		<option value="50">50</option>
		<option value="100">100</option>
		<option value="200">200</option>
		<option value="300">300</option>
		<option value="400">400</option>
		<option value="500">500</option>
	</select>
</div>
<div class="searchresponsive">	
<label for="Bedrooms">Min Bedrooms</label>
    <select id="Bedrooms" name="Bedrooms">
		<option value="0">No Min Bedrooms</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6+</option>
	</select>
</div>

<div class="searchresponsive">
<label for="Bathrooms">Min Bathrooms</label>
    <select id="Bathrooms" name="Bathrooms">
		<option value="0">No Min Bathrooms</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4+</option>
	</select>
</div>
<div class="searchresponsive">
	<label for="Lounge">Min Lounges</label>
    <select id="Lounge" name="Lounge">
		<option value="0">No Min Lounges</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3+</option>
	</select>
	</div>
    <input type="submit" name="submit" value="Submit">

  
  </form>
  
</div>

</div>


<br>


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }

  slides[slideIndex-1].style.display = "block";  

}
</script>



</body>
</html>
