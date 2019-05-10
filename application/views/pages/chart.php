<?php 



?>
<!DOCTYPE html>
<html>
<head>
	<title>Chart Js</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
</head>
<body>

	<!-- <canvas id="myChart" style="height: 300px; width: 100%;"></canvas> -->

    <section class="section-preview">
      <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#frameModalBottom" data-backdrop="false">Bottom</button>
      <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#frameModalTop">Top</button>
    </section>

    <!-- Frame Modal Bottom -->
<div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-frame modal-bottom" role="document">


      <div class="modal-content">
        <div class="modal-body">
          <div class="row d-flex justify-content-center align-items-center">

            <p class="pt-3 pr-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nisi quo provident fugiat reprehenderit nostrum
              quos..
            </p>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Frame Modal Bottom -->
</body>
</html>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
<script type="text/javascript">

 


	var labels = $.getJSON("<?= base_url(); ?>chart/json_population".map(function(e) {
   return e.name;
});
	var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
<style type="text/css">
	#myChart{
		background: #fff;
	}
</style>