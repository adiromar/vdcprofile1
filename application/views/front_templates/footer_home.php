<!-- footer -->
<div class="container-fluid footer-back">
	<div class="row">
		<div class="col-lg-8 col-md-8">
			<div >
				<form>
					<div class="contact-email">
						<span>Email</span>
						<input type="email" name="your_email" placeholder="Email" >
						<input type="submit" value="Subscribe">
					</div>
				</form>
			</div>
			<div class="visit">
				<span><a href="http://encoderslab.com/">Developed By Encoder Lab Pvt Ltd. , Phone : 9851064219 </a> </span>
				<!-- <a href="http://encoderslab.com/">Visit</a> -->
			</div>
		</div>
		<div class="col-lg-4  col-md-4">
			<div class="contact-back">
				<div class="contact">
					<p>Contact</p>
				</div>
				<div class="contact-list">
					<ul>
						<li><b>Phone</b> : 9851064219</li>
						<li><b>Location</b> : Tinkune, Kathmandu</li>
						<li><b>Link</b> : http://encoderslab.com</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<script defer src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- <script defer src="<?= base_url(); ?>assets_front/js/wow.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  	// new WOW().init();
</script>
<script defer src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
// ============================================================
// canvas chart types: pie, doughnut, spline, bar, area, splineArea, stepLine, scatter,

// ============================================================


// 	$(document).ready(function() {
// var chart = new CanvasJS.Chart("chartContainer", {
// 		animationEnabled: true,
// 	backgroundColor: "#00000000",
// 	colorSet: "myshade",
// 	legend : {
//     fontColor: "red",
//  	},
// 		title:{
// 		text: "Population By Gender",
// 		fontColor: 'white',
// 		fontFamily: "roboto",
// 		fontSize:30,
// 		fontWidth:"bold",
// 		horizontalAlign: "center",
// 		margin: 50,
// 	},
	
// 	data: [
// 		{
// 			type: "doughnut",
// 			startAngle: 120,
// 			innerRadius: 65,
// 			indexLabelFontSize: 15,
// 			indexLabelFontColor: 'white',
// 			indexLabel: "{label} - #percent%",
// 			dataPoints: null
// 		}
// 	]
// });

// $.getJSON("<?= base_url(); ?>chart/json_population", function (result) {
	
// 	chart.options.data[0].dataPoints = result;
// 	chart.render();	
// });

// var updateChart = function() {
            
// 	$.getJSON("<?= base_url(); ?>chart/json_population", function (result) {
	
// 		chart.options.data[0].dataPoints = result;
// 		chart.render();	
	
// 	});   
// }            
// setInterval(function(){updateChart()},1000);

// 	});
window.onload = function () {

$.getJSON("<?= base_url(); ?>chart/json_population", function(result) { 
	CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410"           
                ]);
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	backgroundColor: "#00000000",
	colorSet: "myshades",
	legend : {
    fontColor: "red",
 	},
	title:{
		text: "Population By Gender",
		fontColor: 'white',
		fontFamily: "roboto",
		fontSize:30,
		fontWidth:"bold",
		horizontalAlign: "center",
		margin: 50,
	},
	data: [{
		type: "doughnut",
		startAngle: 120,
		innerRadius: 65,
		indexLabelFontSize: 15,
		indexLabelFontColor: 'white',
		indexLabel: "{label} - #percent%",
		dataPoints: result,
	}]
});
chart.render();
});

$.getJSON("<?= base_url(); ?>chart/json_population", function(result) { 
	CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#2decef",
                "#e83414",
                "black"           
                ]);
var chart = new CanvasJS.Chart("chartContainer11", {
	animationEnabled: true,
	backgroundColor: "#00000000",
	colorSet: "myshades",
	legend : {
    fontColor: "red",
 	},
	title:{
		text: "लिङ्गको आधारमा जनसंख्या",
		fontColor: 'white',
		fontFamily: "roboto",
		fontSize:30,
		fontWidth:"bold",
		horizontalAlign: "center",
		margin: 50,
	},
	data: [{
		type: "doughnut",
		startAngle: 120,
		innerRadius: 65,
		indexLabelFontSize: 15,
		indexLabelFontColor: 'white',
		indexLabel: "{label} - #percent%",
		dataPoints: result,
	}]
});
chart.render();
});

// change this
 
 $.getJSON("<?= base_url(); ?>chart/json_religion", function(result) { 
	CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#f7f72e",
                "green"           
                ]);
var chart_rel = new CanvasJS.Chart("chartContainer12", {
	animationEnabled: true,
	backgroundColor: "#00000000",
	colorSet: "myshades",
	legend : {
    fontColor: "red",
 	},
	title:{
		text: "धर्मको आधारमा जनसंख्या",
		fontColor: 'white',
		fontFamily: "roboto",
		fontSize:30,
		fontWidth:"bold",
		horizontalAlign: "center",
		margin: 50,
	},
	data: [{
		type: "pie",
		startAngle: 120,
		innerRadius: 65,
		indexLabelFontSize: 15,
		indexLabelFontColor: 'white',
		indexLabel: "{label} - #percent%",
		dataPoints: result,
	}]
});
chart_rel.render();
});


$.getJSON("<?= base_url(); ?>chart/json_mothertongue", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#0c010c",
                "#e83414",
                "#2decef",
                "#0c010c"           
                ]);
var charts = new CanvasJS.Chart("chartContainer3", {
	// exportEnabled: true,
	backgroundColor: "#00000000",
	animationEnabled: true,
	colorSet: "myshades",
	title:{
		text: "जनसंख्या मातृभाषाको आधारमा",
		fontColor: "white",
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		// showInLegend: true,
		// toolTipContent: "{label}: <strong>{y}%</strong>",
		indexLabelFontColor: 'white',
		indexLabel: "{label} - #percent%",
		dataPoints: results,
	}]
});
charts.render();
});

$.getJSON("<?= base_url(); ?>chart/json_disabillity", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef"      
                ]);
var chart22 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "अपाङ्गताको आधारमा जनसंख्या",
		fontColor: 'white',
		horizontalAlign: "center"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'white',
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: results,
	}]
});
chart22.render();
});

$.getJSON("<?= base_url(); ?>chart/json_rojgari", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef"      
                ]);
var chart_roj = new CanvasJS.Chart("chartContainer13", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "रोजगारीको आधारमा जनसंख्या",
		fontColor: 'white',
		horizontalAlign: "center"
	},
	data: [{
		type: "pie",
		startAngle: 45,
		//innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'white',
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: results,
	}]
});
chart_roj.render();
});

$.getJSON("<?= base_url(); ?>chart/json_education", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef"      
                ]);
var chart_roj = new CanvasJS.Chart("chartContainer14", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "शिक्षाको अवस्था",
		fontColor: 'white',
		horizontalAlign: "center"
	},
	data: [{
		type: "pie",
		startAngle: 45,
		//innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'white',
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: results,
	}]
});
chart_roj.render();
});

// cooking gas

$.getJSON("<?= base_url(); ?>chart/json_cooking_gas", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef"      
                ]);
var chart_roj = new CanvasJS.Chart("cook_gas", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "खान पकाउने इन्धनको विवरण",
		fontColor: 'black',
		horizontalAlign: "center"
	},
	data: [{
		type: "doughnut",
		startAngle: 75,
		// innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'black',
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: results,
	}]
});
chart_roj.render();
});

// energy use
$.getJSON("<?= base_url(); ?>chart/json_energy", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef"      
                ]);
var chart_energy = new CanvasJS.Chart("energy_use", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "बत्ति प्रयोगको विवरण",
		fontColor: 'black',
		horizontalAlign: "center"
	},
	data: [{
		type: "column",
		startAngle: 45,
		//innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'black',
		indexLabel: "{label}",
		toolTipContent: "<b>{label}:</b> {y} ",
		dataPoints: results,
	}]
});
chart_energy.render();
});

// main occupation
$.getJSON("<?= base_url(); ?>chart/main_occupation", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef"      
                ]);
var chart_energy = new CanvasJS.Chart("main_occupation", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "मुख्य पेशा",
		fontColor: 'black',
		horizontalAlign: "center"
	},
	data: [{
		type: "spline",
		startAngle: 45,
		//innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'black',
		indexLabel: "{label}",
		toolTipContent: "<b>{label}:</b> {y} ",
		dataPoints: results,
	}]
});
chart_energy.render();
});

// marriage status
$.getJSON("<?= base_url(); ?>chart/married_status", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#1e7bed",
                "#e83414",
                "#2decef",
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef"      
                ]);
var chart_marr = new CanvasJS.Chart("marriage", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "वैवाहिक स्थिति",
		fontColor: 'black',
		horizontalAlign: "center"
	},
	data: [{
		type: "area",
		startAngle: 45,
		//innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'black',
		indexLabel: "{label}",
		toolTipContent: "<b>{label}:</b> {y} ",
		dataPoints: results,
	}]
});
chart_marr.render();
});

// any disease info
$.getJSON("<?= base_url(); ?>chart/long_term_disease", function(results) { 
var dataPoints = [];
CanvasJS.addColorSet("myshades",
                [//colorSet Array
                "#f40410",
                "#eaf204",
                "#5df936",
                "#f92aef",
                "#1e7bed",
                "#e83414",
                "#2decef",
                ]);
var chart_energy = new CanvasJS.Chart("disease", {
	animationEnabled: true,
	// exportEnabled: true,
	colorSet: "myshades",
	backgroundColor: "#00000000",
	title:{
		text: "कुनै किसिमको दीर्घकालिन रोग",
		fontColor: 'black',
		horizontalAlign: "center"
	},
	data: [{
		type: "spline",
		startAngle: 45,
		//innerRadius: 60,
		indexLabelFontSize: 14,
		indexLabelFontColor: 'black',
		indexLabel: "{label}",
		toolTipContent: "<b>{label}:</b> {y} ",
		dataPoints: results,
	}]
});
chart_energy.render();
});

// ward wise household

CanvasJS.addColorSet("greenShades",
                [//colorSet Array
                "green",
                "orange",
                "green"             
                ]);
var chart = new CanvasJS.Chart("ward_household", {
	animationEnabled: true,
	backgroundColor: "#00000000",
	colorSet: "greenShades",
	title:{
		text: "वडा अनुसार घरधुरी संख्या",
		fontColor: "white",
	},	
	axisY: {
		title: "पुरुष घरधुरी",
		titleFontColor: "#fff",
		lineColor: "#fff",
		labelFontColor: "#fff",
		tickColor: "#fff"
	},
	axisY2: {
		title: "महिला घरधुरी",
		titleFontColor: "#fff",
		lineColor: "#fff",
		labelFontColor: "#fff",
		tickColor: "#fff"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		<?php  
$t = $this->chart_model->get_household_pop_by_ward();
foreach ($t as $val) {
  $mal1 = $val['mal1'];
  $fem1 = $val['fem1'];
  $mal2 = $val['mal2'];
  $fem2 = $val['fem2'];
  $mal3 = $val['mal3'];
  $fem3 = $val['fem3'];
  $mal4 = $val['mal4'];
  $fem4 = $val['fem4'];
  $mal5 = $val['mal5'];
  $fem5 = $val['fem5'];
  $mal6 = $val['mal6'];
  $fem6 = $val['fem6'];
  $mal7 = $val['mal7'];
  $fem7 = $val['fem7'];
  $mal8 = $val['mal8'];
  $fem8 = $val['fem8'];
  $mal9 = $val['mal9'];
  $fem9 = $val['fem9'];
  }
      ?>
		type: "column",
		name: "पुरुष घरधुरी",
		legendText: "पुरुष घरधुरी",
		showInLegend: true,
		// toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints:[
			{ label: "वडा १",  y: <?= $mal1; ?>  },
        { label: "वडा २", y: <?= $mal2; ?> },
        { label: "वडा ३",  y: <?= $mal3; ?> },
        { label: "वडा ४",  y: <?= $mal4; ?>  },
        { label: "वडा ५", y: <?= $mal5; ?>  },
        { label: "वडा ६",  y: <?= $mal6; ?> },
        { label: "वडा ७",  y: <?= $mal7; ?>  },
        { label: "वडा ८", y: <?= $mal8; ?>  },
        { label: "वडा ९",  y: <?= $mal9; ?> }
		]
	},
	{
		type: "column",	
		name: "महिला घरधुरी",
		legendText: "महिला घरधुरी",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "वडा १",  y: <?= $fem1; ?>  },
        { label: "वडा २", y: <?= $fem2; ?>  },
        { label: "वडा ३",  y: <?= $fem3; ?> },
        { label: "वडा ४",  y: <?= $fem4; ?>  },
        { label: "वडा ५", y: <?= $fem5; ?>  },
        { label: "वडा ६",  y: <?= $fem6; ?> },
        { label: "वडा ७",  y: <?= $fem7; ?>  },
        { label: "वडा ८", y: <?= $fem8; ?>  },
        { label: "वडा ९",  y: <?= $fem9; ?> }
		]
	}]
});
chart.render();

CanvasJS.addColorSet("greenShades",
                [//colorSet Array
                "#2fd6c8",
                "#f91de0"               
                ]);
var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	backgroundColor: "#00000000",
	colorSet: "greenShades",
	title:{
		text: "वडा अनुसार पुरुष - महिला जनसंख्या",
		fontColor: "white",
	},	
	axisY: {
		title: "पुरुष जनसंख्या",
		titleFontColor: "#fff",
		lineColor: "#fff",
		labelFontColor: "#fff",
		tickColor: "#fff"
	},
	axisY2: {
		title: "महिला जनसंख्या",
		titleFontColor: "#fff",
		lineColor: "#fff",
		labelFontColor: "#fff",
		tickColor: "#fff"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		<?php  
$t = $this->chart_model->get_male_pop_by_ward();
foreach ($t as $val) {
  $mal1 = $val['mal1'];
  $fem1 = $val['fem1'];
  $mal2 = $val['mal2'];
  $fem2 = $val['fem2'];
  $mal3 = $val['mal3'];
  $fem3 = $val['fem3'];
  $mal4 = $val['mal4'];
  $fem4 = $val['fem4'];
  $mal5 = $val['mal5'];
  $fem5 = $val['fem5'];
  $mal6 = $val['mal6'];
  $fem6 = $val['fem6'];
  $mal7 = $val['mal7'];
  $fem7 = $val['fem7'];
  $mal8 = $val['mal8'];
  $fem8 = $val['fem8'];
  $mal9 = $val['mal9'];
  $fem9 = $val['fem9'];
  }
      ?>
		type: "column",
		name: "पुरुष जनसंख्या",
		legendText: "पुरुष जनसंख्या",
		showInLegend: true,
		// toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints:[
			{ label: "वडा १",  y: <?= $mal1; ?>  },
        { label: "वडा २", y: <?= $mal2; ?> },
        { label: "वडा ३",  y: <?= $mal3; ?> },
        { label: "वडा ४",  y: <?= $mal4; ?>  },
        { label: "वडा ५", y: <?= $mal5; ?>  },
        { label: "वडा ६",  y: <?= $mal6; ?> },
        { label: "वडा ७",  y: <?= $mal7; ?>  },
        { label: "वडा ८", y: <?= $mal8; ?>  },
        { label: "वडा ९",  y: <?= $mal9; ?> }
		]
	},
	{
		type: "column",	
		name: "महिला जनसंख्या",
		legendText: "महिला जनसंख्या",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "वडा १",  y: <?= $fem1; ?>  },
        { label: "वडा २", y: <?= $fem2; ?>  },
        { label: "वडा ३",  y: <?= $fem3; ?> },
        { label: "वडा ४",  y: <?= $fem4; ?>  },
        { label: "वडा ५", y: <?= $fem5; ?>  },
        { label: "वडा ६",  y: <?= $fem6; ?> },
        { label: "वडा ७",  y: <?= $fem7; ?>  },
        { label: "वडा ८", y: <?= $fem8; ?>  },
        { label: "वडा ९",  y: <?= $fem9; ?> }
		]
	}]
});
chart.render();



}
function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = true;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

</script>
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets_front/bootstrap/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets_front/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets_front/bootstrap/js/jquery.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets_front/js/numberscroll.js" defer></script> -->
<script type="text/javascript" src="<?= base_url(); ?>assets_front/js/main.js" defer></script>
</body>
</html>