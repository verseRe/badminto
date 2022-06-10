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
    <li><a href="#about us">Contact Us</a></li>
    <li><a href="#contact">Tournaments</a></li>
    <li><a href="#train">Training</a></li>
    <li><a href="#Payments">Payment</a></li>
    <li style="float:right"> <a href="#logout"><i class="bi bi-box-arrow-right" style="font-size: 1.5rem;color: #005254;"></i>
        </a></li>
    <li style="float:right"> <a href="#profile"> <i class="bi bi-person-fill" style="font-size: 1.5rem;color: #00B9BC;"></i>
        </a></li>
  </ul>
</div>


    <div class = "header">
      <br>
@foreach ($clubinfo as $club)
<h2 style = " padding-left: 50px"> {{$club -> title}} </h2>
<br>

<h4 style = " padding-left: 50px"> {{$club -> desc}}</h4>
@endforeach
</div>

<br>


<div>
  <p><span style="padding: 20px;font-weight:bold; font-size:20px"> Notifications </span><i style="font-size:24px" class="fa">&#xf0f3;</i></p>

    <div class = "noti">
    <p> TOURNAMENT Notifications HERE </p>

</div>
</div>

<p><span style ="padding:20px; font-weight:bold; font-size:20px"> INDIVIDUAL STATISTCS</span> </p>
<div class = "indi-stats">
  <div class = "indi"> <!-- bloco-->
      <p style="font-weight:bold; font-size:20px"> </p>
      <canvas id="training"></canvas>
    </div>
    <div class = "indi">
      <p style="font-weight:bold; font-size:20px">  </p>
      <canvas id="tourChart"></canvas>
    </div>
  </div>

  <p><span style ="padding:20px;align:center;font-weight:bold; font-size:20px"> CLUB STATISTIC </span> </p>
  <div class = "indi-stats">
    <div class = "indi"> <!-- bloco-->
        <p style="font-weight:bold; font-size:20px">  </p>
        <canvas id="trainClubChart"></canvas>
      </div>
      <div class = "indi">
        <p style="font-weight:bold; font-size:20px">  </p>
        <canvas id="tourClubChart"></canvas>
      </div>
    </div>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
//INDIVIDUAL TRAIN
      var labels =  {{ Js::from($labelTrain) }};
      var users =  {{ Js::from($dataTrain) }};

      const data = {
        labels: labels,
        datasets: [{
          label:"TOTAL TRAININGS JOINED",
          backgroundColor: "rgba(0, 82, 84, 1)",
          borderColor: "rgba(0, 82, 84, 1)",
          data: users,
        }]
      };

      const config = {
        type: 'bar',
        data: data,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('training'),
        config
      );


//INDIVIDUAL tournament
        var labels2 =  {{ Js::from($labels) }};
        var users2 =  {{ Js::from($data) }};

        const data2 = {
          labels: labels2,
          datasets: [{
            label:"TOTAL TOURNAMENTS JOINED",
            backgroundColor: "rgba(0, 82, 84, 1)",
            borderColor: "rgba(0, 82, 84, 1)",
            data: users2,
          }]
        };

        const config2 = {
          type: 'bar',
          data: data2,
          options: {}
        };

        const myChart2 = new Chart(
          document.getElementById('tourChart'),
          config2
        );

  //CLUB TRAININGS

    var labels3 =  {{ Js::from($labelClubTrain) }};
    var users3 =  {{ Js::from($dataClubTrain) }};

    const data3 = {
      labels: labels3,
      datasets: [{
        label:"TOTAL OVERALL TRAININGS",
        backgroundColor: "rgba(0, 124, 125, 1)",
        borderColor: "rgba(0, 124, 125, 1)",
        data: users3,
      }]
    };

    const config3 = {
      type: 'bar',
      data: data3,
      options: {}
    };

    const myChart3 = new Chart(
      document.getElementById('trainClubChart'),
      config3
    );

//CLUB TOURNAMENTS
        var labels4 =  {{ Js::from($labelClubTour) }};
        var users4 =  {{ Js::from($dataClubTour) }};

        const data4 = {
          labels: labels4,
          datasets: [{
            label:"TOTAL INTERNAL TOURNAMENTS",
            backgroundColor: "rgba(0, 124, 125, 1)",
            borderColor: "rgba(0, 124, 125, 1)",
            data: users4,
          }]
        };

        const config4 = {
          type: 'bar',
          data: data4,
          options: {}
        };

        const myChart4 = new Chart(
          document.getElementById('tourClubChart'),
          config4
        );

  </script>
</div>




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
