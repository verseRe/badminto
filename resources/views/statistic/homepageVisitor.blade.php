<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">


</head>
<body>
<div class = "nav">
  <ul>
    <li><a href = ""><img src='storage\bsp.jpg'></a></li>
    <li><a class="home" href="#home">Home</a></li>
    <li><a href="#news">About Us</a></li>
    <li><a href="#contact">Login</a></li>
    <li><a href="#about">Become A Member</a></li>
  </ul>
</div>


    <div class = "header">
      <br>
@foreach ($club as $club)
<h2 style = " padding-left: 50px"> {{$club -> title}} </h2>
<br>

<h4 style = " padding-left: 50px"> {{$club -> desc}}</h4>
@endforeach
</div>

<br>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</div>
<footer>
  <div class="container">
 <div class="row">
   <div class="footer-col">
     <h3>Contact Us</h3>
     <i class="bi bi-telephone-outbound-fill" style ="color:white;"></i>&nbsp; &nbsp;  06-45567832 <br>
     &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;   06-11223334
   </div>
   <div class="footer-col">
     <h3>Address</h3>
     Bandar Seri Putra,<br>
     Hulu Langat,<br>
     Selangor

   </div>

   <div class="footer-col">
     <h3>Social Media</h3>
     <div class="social-links">
       <a href="#"><i class="bi bi-twitter" style="color:white;"></i></a>
       <a href="#"><i class="bi bi-facebook" style="color:white;"></i></a>
       <a href="#"><i class="bi bi-instagram" style="color:white;"></i></a>
     </div>
   </div>
 </div>
</div>

</footer>

</body>
</html>
