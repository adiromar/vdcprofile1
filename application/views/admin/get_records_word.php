<?php
// print_r($_POST);
// $rm = $_POST['sec_tbl'];
date_default_timezone_set('Asia/Kathmandu');
$now = date('Y-m-d H:i:s');
$title = 'report_' . $now;

header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=\"$title.doc\"");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	td {
		text-align: center;
	}
</style>

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
      data.addRows([
        ['Nitrogen', 0.78],
        ['Oxygen', 0.21],
        ['Other', 0.01]
      ]);


    var options = {
        title: 'Most Popular Programming Languages',	
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    google.visualization.events.addListener(chart, 'ready', function () {
        chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(chart_div.innerHTML);
      });
    chart.draw(data, options);
}
</script> -->

<!-- <div class="row" style="margin-left: 100px; margin-top: 20px;"> -->
	<div class="row">
	<p> <h3><u>दुप्चेस्वर </u></h3>गाउँपालिका/नगरपालिकाको बस्तुगत विवरण </p>


<!-- <div id="piechart"></div> -->

	<p>
		गाउँ/नगर कार्यपालिकाको कार्यालय

			.............................

		............नं प्रदेश, नेपाल</p>

<h3>१. गाउँपालिका / नगरपालिकाको परिचय</h3>
	<li>ऐतिहासिक पृष्ठभूमि : </li>
	<li>नामकरण : </li>
	<li>अवस्थिति : (सीमाना)</li>
	<li>क्षेत्रफल:</li>

<h3>२. भौगोलिक स्वरूप: (भूबनावट, भिरलोपन, मैदान, आदि)</h3>

<h3>३. स्थानीय चार्डपर्व तथा जात्रा र मेलाहरुको विवरण:</h3>
<table border="1" class="table">
	<thead>
	<tr>
		<th>क्रस</th>
		<th>चार्डपर्व</th>
		<th>जात्रा</th>
		<th>मेलाहरुको नाम</th>
		<th>मनाइने चार्ड</th>
		<th>मनाइने महिना</th>
		<th>तिथि</th>
		<th>मनाइने जातजाति</th>
	</tr>
	</thead>
	<tbody>
		<?php $t=1;
		foreach ($festivals as $fest) { ?>
		<tr>
			<td><?= $t ?></td>
			<td><?= $fest['festival_name'] ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td><? $fest['months'] ?></td>
			<td></td>
			<td></td>
		<?php $t++; } ?>
		</tr>
	</tbody>
</table>


<h3>४. पर्यटकीय स्थलहरुको विवरण (धार्मिक, ऐतिहासिक, पुरातात्विक):</h3>
<table border="1" class="table">
	<thead>
	<tr>
		<th width="50">क्रस</th>
		<th width="150">पर्यटकीय स्थलहरुको नाम</th>
		<th width="50">वडा नं</th>
		<th width="50">स्थलको महत्व</th>
		<th width="250">दैनिक औसतमा आउने पर्यताखारुको संख्या</th>
		<th width="50">कैफियत</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

<h3>५. वर्तमान भू-उपयोग सम्बन्धि विवरण:</h3>
<table border="1" class="table">
	<thead>
	<tr>
		<th width="50" rowspan="2">क्रस</th>
		<th width="150" rowspan="2">विवरण</th>
		<th width="400" colspan="2">गाउँपालिका/ नगरपालिका</th>
	</tr>
	<tr>
		<th>क्षेत्रफल (वर्ग कि.मि.)</th>
		<th>प्रतिशत</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>



<h3>९. जनसंख्या वितरणको अवस्था:</h3>
<table border="1" class="table">
	<thead>
	<tr>
		<th width="300" rowspan="2"></th>
		<th width="350" rowspan="2">विवरण</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($tot_pop as $pop) { 
			$g_pop = $pop['gross_pop']; ?>
		<tr>
			<td>जनसंख्या</td>
			<td><?= $g_pop ?></td>
		</tr>
	<?php } foreach ($household as $jana) { 
		?>
		<tr>
			<td>परिवार संख्या</td>
			<td><?= $jana['count(household_name)'] ?></td>
		</tr>
	<?php } ?>
		<tr>
			<td>जनसंख्याको अनुपातिक विवरण</td>
			<td></td>
		</tr>
		<tr>
			<td>जनघनत्व</td>
			<td>
				<?php 
				$area = 132;
				$density = ($g_pop / $area);
				echo round($density, 2) . ' people per sq km' ;
				?>
			</td>
		</tr>
		<tr>
			<td>औषत वृद्धिदर</td>
			<td></td>
		</tr>
		<?php foreach ($household as $jana) { ?>
		<tr>
			<td>परिवारको औषत आकार</td>
			<td><?//= number_format($jana['avg_fam_size'] / $jana['hou'], 2,'.',''); ?></td>
		</tr>
		<?php } foreach ($tot_pop as $val) { 
			$female = $val['fem_pop'];
			$male = $val['mal_pop'];
			$tot = $female + $male;
			$fem_ratio = number_format($male / $female*100, 2,'.','');
			?>
		<tr>
			<td>महिला पुरुष अनुपात (प्रति १०० जना महिलामा पुरुषको संख्या)</td>
			<td><?= $fem_ratio ?>%</td>
		<?php } ?>
		</tr>
	</tbody>
</table>

<h3>१०. वडा अनुसार घरधुरी तथा जनसंख्या विवरण:</h3>
<table border="1" class="table">
	<thead>
	<tr>
		<th width="50">क्रस</th>
		<th width="80">वडा नं</th>
		<th width="80">पुरुष</th>
		<th width="80">महिला</th>
		<th width="80">जम्मा घर परिवार संख्या</th>
		<th width="80">क्षेत्रफ़ल् वर्ग कि.मि.</th>
		<th width="80">जनघनत्व</th>
		<th width="80">मुख्य बस्तीहरु</th>
	</tr>
	</thead>
	<tbody>
		
<?php 
$i = 1;
for ($w=1; $w < 10; $w++) { 
 $pop = $this->rm_model->get_population_by_ward($w);
 // echo'<pre>';
 // print_r($pop);die;
			foreach ($pop as $dat) { ?>
				<tr>
			<td><?= $i;?></td>
			<td><?= $dat['ward_no'] ?></td>
			<td><?= $dat['sum(male_family_count)'] ?></td>
			<td><?= $dat['sum(female_family_count)'] ?></td>
			<td><?= $dat['sum(total_family_members)'] ?></td>
			<td></td>
			<td></td>
			<td></td></tr>
		<?php $i++; } } ?>
		
	</tbody>
</table>

<h3>११. उमेर तथा लिङ्गका आधारमा घरमुलीको विवरण:</h3>
<table border="1" class="table table-bordered">
	<thead>
<?php 
 // $pop5 = $this->rm_model->get_population_by_agegroup_under5_gender();
?>
	<tr>
		<th width="300">उमेर समूह</th>
		<th width="150">महिला</th>
		<th width="150">पुरुष</th>
		<th width="150">तेश्रो लिंगी</th>
		<th width="150">जम्मा</th>
	</tr>
	</thead>
	<tbody>
<?php foreach ($pop5 as $dat) { 
	$tot_pop_less_five = $dat['female_5'] + $dat['male_5'] +$dat['others_5'];
	$five_nine = $dat['female_5_9'] + $dat['male_5_9'] +$dat['others_5_9'];
	$ten_14 = $dat['male_10_14'] + $dat['female_10_14'] +$dat['others_10_14'];
	$eighteen = $dat['male_18'] + $dat['female_18'] +$dat['others_18'];
	$tw4 = $dat['male_24'] + $dat['female_24'] +$dat['others_24'];
	$fortyfive = $dat['male_45'] + $dat['female_45'] +$dat['others_45'];
	$fifty_nine = $dat['male_59'] + $dat['female_59'] +$dat['others_59'];
	$sixty_nine = $dat['male_69'] + $dat['female_69'] +$dat['others_69'];
	$last = $dat['male_plus'] + $dat['female_plus'] +$dat['others_plus'];

	$tot_male = $dat['male_5'] + $dat['male_5_9'] + $dat['male_10_14'] +$dat['male_18'] +$dat['male_24'] +$dat['male_45'] +$dat['male_59'] + $dat['male_69'] + $dat['male_plus'];
	$tot_female = $dat['female_5'] + $dat['female_5_9'] + $dat['female_10_14'] +$dat['female_18'] +$dat['female_24'] +$dat['female_45'] +$dat['female_59'] + $dat['female_69'] + $dat['female_plus'];
	$tot_oth = $dat['others_5'] + $dat['others_5_9'] + $dat['others_10_14'] +$dat['others_18'] +$dat['others_24'] +$dat['others_45'] +$dat['others_59'] + $dat['others_69'] + $dat['others_plus'];
	$total = $tot_male + $tot_female + $tot_oth;
?>
		<tr>
			<td>५ बर्ष भन्दा मुनि</td>
			<td><?= $dat['female_5'] ?></td>
			<td><?= $dat['male_5'] ?></td>
			<td><?= $dat['others_5'] ?></td>
			<td><?= $tot_pop_less_five ?></td>
		</tr>
		<tr>
			<td>५ देखि ९ बर्ष सम्म</td>
			<td><?= $dat['female_5_9'] ?></td>
			<td><?= $dat['male_5_9'] ?></td>
			<td><?= $dat['others_5_9'] ?></td>
			<td><?= $five_nine ?></td>
		</tr>
		<tr>
			<td>१० देखि १४ बर्ष सम्म</td>
			<td><?= $dat['female_10_14'] ?></td>
			<td><?= $dat['male_10_14'] ?></td>
			<td><?= $dat['others_10_14'] ?></td>
			<td><?= $ten_14 ?></td>
		</tr>
		<tr>
			<td>१५ देखि १८ बर्ष सम्म</td>
			<td><?= $dat['female_18'] ?></td>
			<td><?= $dat['male_18'] ?></td>
			<td><?= $dat['others_18'] ?></td>
			<td><?= $eighteen ?></td>
		</tr>
		<tr>
			<td>१९ देखि २४ बर्ष सम्म</td>
			<td><?= $dat['female_24'] ?></td>
			<td><?= $dat['male_24'] ?></td>
			<td><?= $dat['others_24'] ?></td>
			<td><?= $tw4 ?></td>
		</tr>
		<tr>
			<td>२५ देखि ४५ बर्ष सम्म</td>
			<td><?= $dat['female_45'] ?></td>
			<td><?= $dat['male_45'] ?></td>
			<td><?= $dat['others_45'] ?></td>
			<td><?= $fortyfive ?></td>
		</tr>
		<tr>
			<td>४६ देखि ५९ बर्ष सम्म</td>
			<td><?= $dat['female_59'] ?></td>
			<td><?= $dat['male_59'] ?></td>
			<td><?= $dat['others_59'] ?></td>
			<td><?= $fifty_nine ?></td>
		</tr>
		<tr>
			<td>६० देखि ६९ बर्ष सम्म</td>
			<td><?= $dat['female_69'] ?></td>
			<td><?= $dat['male_69'] ?></td>
			<td><?= $dat['others_69'] ?></td>
			<td><?= $sixty_nine ?></td>
		</tr>
		<tr>
			<td>७० बर्ष भन्दा माथि</td>
			<td><?= $dat['female_plus'] ?></td>
			<td><?= $dat['male_plus'] ?></td>
			<td><?= $dat['others_plus'] ?></td>
			<td><?= $last ?></td>
		</tr>
		<tr>
			<td>जम्मा</td>
			<td><?= $tot_female ?></td>
			<td><?= $tot_male ?></td>
			<td><?= $tot_oth ?></td>
			<td><?= $total ?></td>
		</tr>
		<?php } ?>		
	</tbody>
</table>


<?php //$male5 = array();
// foreach ($indivi as $ind) {
// 	$current = date('Y');
// 	$dob = $ind['dob'];
// 	$new_dob = substr($dob, -4);
// 	$age = $current - $new_dob;
// 	$gender = $ind['member_gender'];

// 	if ($gender == 'पुरुष' && $age <= 14){
// 		$male5 = $age;
// 	}

// }

// echo $male5;

?>

<h3>१२. आर्थिक रुपले सक्रिय जनसंख्याको अवस्था: </h3>
<table border="1" class="table">
	<thead>
<?php 
 // $pop5 = $this->rm_model->get_population_by_agegroup_under5_gender();
?>
	<tr>
		<th width="100">उमेर समूह</th>
		<th width="100">पुरुष</th>
		<th width="100">महिला</th>
		<th width="100">जम्मा</th>
		<th width="100">प्रतिशत</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td>० देखि १४</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>१५ देखि ५९</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>६० भन्दा माथि</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>जम्मा</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

<h3>१३. मातृभाषाको आधारमा जनसंख्याको विवरण: </h3>
<table border="1" class="table">
	<thead>
<?php 
 // $pop5 = $this->rm_model->get_population_by_agegroup_under5_gender();
?>
	<tr>
		<th width="50">क्र.स.</th>
		<th width="200">मातृभाषा</th>
		<th width="150">प्रतिशत</th>
	</tr>
	</thead>
	<tbody>
		<?php
		foreach ($rel as $dat) { 
		$total_rel = $dat['tot'];
			?>
			<tr>
				<td>१</td>
				<td>नेपाली</td>
				<td><?= number_format($dat['nepali'] / $total_rel * 100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>१</td>
				<td>तामांग</td>
				<td><?= number_format($dat['tamang'] / $total_rel * 100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>२</td>
				<td>डोटेली/बझाँगी</td>
				<td><?= number_format($dat['doteli'] / $total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>३</td>
				<td>थारु</td>
				<td><?= number_format($dat['tharu']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>४</td>
				<td>मगर</td>
				<td><?= number_format($dat['magar']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>५</td>
				<td>किराँत</td>
				<td><?= number_format($dat['lama']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>६</td>
				<td>गुरुङ</td>
				<td><?= number_format($dat['gurung']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>७</td>
				<td>अन्य</td>
				<td><?= number_format($dat['others']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<?php } ?>
	</tbody>
</table>

<h3>१४. धर्मको आधारमा जनसंख्याको विवरण: </h3>
<table border="1" class="table">
	<thead>
<?php 
 // $pop5 = $this->rm_model->get_population_by_agegroup_under5_gender();
?>
	<tr>
		<th width="50">क्र.स.</th>
		<th width="200">धर्म</th>
		<th width="150">प्रतिशत</th>
	</tr>
	</thead>
	<tbody>
		<?php
		foreach ($reli as $dat) { 
		$total_rel = $dat['tot'];
			?>
			<tr>
				<td>१</td>
				<td>हिन्दू</td>
				<td><?= number_format($dat['hindu'] / $total_rel * 100, 2, '.', '' ) ?>%</td>
			</tr>
			<tr>
				<td>२</td>
				<td>बौद्द</td>
				<td><?= number_format($dat['buddha'] / $total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>३</td>
				<td>इस्लाम</td>
				<td><?= number_format($dat['islam']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>४</td>
				<td>क्रिश्चियन</td>
				<td><?= number_format($dat['christian']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>५</td>
				<td>किराँत</td>
				<td><?= number_format($dat['kirat']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>६</td>
				<td>शिख</td>
				<td><?= number_format($dat['shikh']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>७</td>
				<td>अन्य</td>
				<td><?= number_format($dat['others']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<?php } ?>
	</tbody>
</table>


<h3>१५. जातीय आधारमा जनसंख्याको विवरण: </h3>
<table border="1" class="table">
	<thead>
<?php 
 // $pop5 = $this->rm_model->get_population_by_agegroup_under5_gender();
?>
	<tr>
		<th width="50">क्र.स.</th>
		<th width="200">जातियता</th>
		<th width="150">प्रतिशत</th>
	</tr>
	</thead>
	<tbody>
		<?php
		foreach ($caste as $dat) { 
		$total_rel = $dat['tot'];
			?>
			<tr>
				<td>१</td>
				<td>व्राम्हण</td>
				<td><?= number_format($dat['brahmin'] / $total_rel * 100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>२</td>
				<td>क्षेत्री</td>
				<td><?= number_format($dat['chhetri'] / $total_rel*100 , 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>३</td>
				<td>नेवार</td>
				<td><?= number_format($dat['newar'] / $total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>४</td>
				<td>ठकुरी</td>
				<td><?= number_format($dat['thakuri']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>५</td>
				<td>अादिवासी/जनजाती</td>
				<td><?= number_format($dat['janajati']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>६</td>
				<td>सार्की/कामी</td>
				<td><?= number_format($dat['kami']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>७</td>
				<td>गुरुङ</td>
				<td><?= number_format($dat['gurung']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>८</td>
				<td>मगर</td>
				<td><?= number_format($dat['magar']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>९</td>
				<td>राई/लिम्बु</td>
				<td><?= number_format($dat['rai']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>१०</td>
				<td>थारु</td>
				<td><?= number_format($dat['tharu']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>११</td>
				<td>यादव</td>
				<td><?= number_format($dat['yadav']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>१२</td>
				<td>घर्ति</td>
				<td><?= number_format($dat['gharti']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>१३</td>
				<td>दलित</td>
				<td><?= number_format($dat['dalit']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>१४</td>
				<td>दमाई</td>
				<td><?= number_format($dat['damai']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>१५</td>
				<td>कुमाल</td>
				<td><?= number_format($dat['kumal']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<tr>
				<td>१६</td>
				<td>अन्य</td>
				<td><?= number_format($dat['others']/$total_rel*100, 2, '.', '') ?>%</td>
			</tr>
			<?php } ?>
	</tbody>
</table>

<h3>१६. लिङ्ग र उमेरको आधारमा घरमुलीको विवरण</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="110" rowspan="2">लिङ्ग</th>
		<th width="200" rowspan="2">जम्मा</th>
		<th width="600" colspan="7">घरमुलीको संख्या</th>
	</tr>
		<th>१४ बर्ष सम्म</th>
		<th>१५ देखि २५</th>
		<th>२६ देखि ३६</th>
		<th>३७ देखि ४७</th>
		<th>४८ देखि ५८</th>
		<th>५९ देखि ६९</th>
		<th>७० देखि माथि</th>
	</thead>
	<tbody>
		<?php foreach ($gender_group as $key) { ?>
		<tr>
			<td>पुरुष</td>
			<td><?= $key['tot_male'] ?></td>
			<td><?= $key['less14_male'] ?></td>
			<td><?= $key['15_25_male'] ?></td>
			<td><?= $key['26_36_male'] ?></td>
			<td><?= $key['37_47_male'] ?></td>
			<td><?= $key['48_58_male'] ?></td>
			<td><?= $key['59_69_male'] ?></td>
			<td><?= $key['70_male'] ?></td>
		</tr>
		<tr>
			<td>महिला</td>
			<td><?= $key['tot_female'] ?></td>
			<td><?= $key['less14_female'] ?></td>
			<td><?= $key['15_25_female'] ?></td>
			<td><?= $key['26_36_female'] ?></td>
			<td><?= $key['37_47_female'] ?></td>
			<td><?= $key['48_58_female'] ?></td>
			<td><?= $key['59_69_female'] ?></td>
			<td><?= $key['70_female'] ?></td>
		</tr>
		<tr>
			<td>जम्मा</td>
			<td><?= $key['tot_female'] + $key['tot_male']?></td>
			<td><?= $key['less14_female'] + $key['less14_male']?></td>
			<td><?= $key['15_25_female'] + $key['15_25_male']?></td>
			<td><?= $key['26_36_female'] + $key['26_36_male']?></td>
			<td><?= $key['37_47_female'] + $key['37_47_male']?></td>
			<td><?= $key['48_58_female'] + $key['48_58_male']?></td>
			<td><?= $key['59_69_female'] + $key['59_69_male']?></td>
			<td><?= $key['70_female'] + $key['70_male']?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<h3>१८. अपांगताको आधारमा जनसंख्या (Population by Disability)</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="110" rowspan="2">लिङ्ग</th>
		<th width="200" rowspan="2">जम्मा अपांगता संख्या</th>
		<th width="600" colspan="4">अपांगताको आधारमा जनसंख्या</th>
	</tr>
		<th>पूर्ण अशक्त अपांगता (रातो रंगको)</th>
		<th>अति अशक्त अपांगता परिचय पत्र (निलो रंगको)</th>
		<th>मध्यम अपांगता (पहेंलो रंगको)</th>
		<th>सामान्य अपांगता (सेतो रंगको)</th>
		<?php foreach ($dis as $see) { ?>
	<tr>
		<td>पुरुष</td>
		<td><?= $see['tot_dis_male'] ?></td>
		<td><?= $see['red_dis_male'] ?></td>
		<td><?= $see['blue_dis_male'] ?></td>
		<td><?= $see['yell_dis_male'] ?></td>
		<td><?= $see['white_dis_male'] ?></td>
	</tr>
	<tr>
		<td>महिला</td>
		<td><?= $see['tot_dis_female'] ?></td>
		<td><?= $see['red_dis_female'] ?></td>
		<td><?= $see['blue_dis_female'] ?></td>
		<td><?= $see['yell_dis_female'] ?></td>
		<td><?= $see['white_dis_female'] ?></td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td><?= $see['tot_dis_male'] + $see['tot_dis_female']?></td>
		<td><?= $see['red_dis_male'] + $see['red_dis_female']?></td>
		<td><?= $see['blue_dis_male'] + $see['blue_dis_female']?></td>
		<td><?= $see['yell_dis_male'] + $see['yell_dis_female']?></td>
		<td><?= $see['white_dis_male'] + $see['white_dis_female']?></td>
	</tr>
<?php } ?>
	</thead>
</table>

<h3>१९. अपांगता परिचयपत्र लिएका विवरण</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="500" rowspan="2">अपांगता परिचय पत्रको किसिम</th>
		<th width="600" colspan="3">परिचयपत्र लिएका संख्या</th>
	</tr>
		<th>महिला</th>
		<th>पुरुष</th>
		<th>जम्मा</th>
<?php foreach ($disable as $dis) { ?>
		<tr>
			<td>पूर्ण अशक्त अपांगता (रातो रंगको)</td>
			<td><?= $dis['red_dis_female'] ?></td>
			<td><?= $dis['red_dis_male'] ?></td>
			<td><?= $dis['red_dis_male'] + $dis['red_dis_female'] ?></td>
		</tr>
		<tr>
			<td>अति अशक्त अपांगता परिचय पत्र (निलो रंगको)</td>
			<td><?= $dis['blue_dis_female'] ?></td>
			<td><?= $dis['blue_dis_male'] ?></td>
			<td><?= $dis['blue_dis_male'] + $dis['blue_dis_female'] ?></td>
		</tr>
		<tr>
			<td>मध्यम अपांगता (पहेंलो रंगको)</td>
			<td><?= $dis['yell_dis_female'] ?></td>
			<td><?= $dis['yell_dis_male'] ?></td>
			<td><?= $dis['yell_dis_male'] + $dis['yell_dis_female'] ?></td>
		</tr>
		<tr>
			<td>सामान्य अपांगता (सेतो रंगको)</td>
			<td><?= $dis['whi_dis_female'] ?></td>
			<td><?= $dis['whi_dis_male'] ?></td>
			<td><?= $dis['whi_dis_male'] + $dis['whi_dis_female']?></td>
		</tr>
	<?php } ?>
</thead>
</table>

<h3>२०. छानाको प्रकारको आधारमा घरधुरी संख्या</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">सि.नं.</th>
		<th width="300" >घरको प्रकार</th>
		<th width="300" >संख्या</th>
		<th width="300" >प्रतिशत</th>
	</tr>
<?php 
 foreach ($roof as $rf) {
 	$tot =($rf['paral'] + $rf['jasta'] + $rf['tile'] + $rf['rcc'] + $rf['wood'] + $rf['mud'] + $rf['others']);
?>
	<tr>
		<td>१</td>
		<td>फुस तथा खरले छाएको</td>
		<td><?= $rf['paral'] ?></td>
		<td><?= number_format($rf['paral'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>जस्ता / चयादरले छाएको</td>
		<td><?= $rf['jasta'] ?></td>
		<td><?= number_format($rf['jasta'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>टायल तथा ढुंगाले (slate) छाएको</td>
		<td><?= $rf['tile'] ?></td>
		<td><?= number_format($rf['tile'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>आर. सी.सी</td>
		<td><?= $rf['rcc'] ?></td>
		<td><?= number_format($rf['rcc'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>काठले छाएको</td>
		<td><?= $rf['wood'] ?></td>
		<td><?= number_format($rf['wood'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>माटोले छाएको</td>
		<td><?= $rf['mud'] ?></td>
		<td><?= number_format($rf['mud'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>७</td>
		<td>अन्य</td>
		<td><?= $rf['others'] ?></td>
		<td><?= number_format($rf['others'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>८</td>
		<td>उल्लेख नभएको</td>
		<td><?= $rf['empty'] ?></td>
		<td><?= number_format($rf['empty'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>
<?php } ?>
		</thead>
	</table>

<h3>२१. स्वामित्वको आधारमा घरपरिवारको बसोबासको अवस्था</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">सि.नं.</th>
		<th width="300" >स्वामित्वको बिबरण</th>
		<th width="300" >परिवार संख्या</th>
		<th width="300" >प्रतिशत</th>
	</tr>
<?php
foreach ($ownership as $own) { 
	$tot = $own['private'] + $own['rent'] + $own['org'] +$own['oth'];
	?>
	<tr>
		<td>१</td>
		<td>निजी</td>
		<td><?= $own['private'] ?></td>
		<td><?= number_format($own['private'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>भाडामा</td>
		<td><?= $own['rent'] ?></td>
		<td><?= number_format($own['rent'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>सस्थागत</td>
		<td><?= $own['org'] ?></td>
		<td><?= number_format($own['org'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>अन्य</td>
		<td><?= $own['oth'] ?></td>
		<td><?= number_format($own['oth'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>२२. खानेपानीको श्रोतको आधारमा घरपरिवार सम्बन्धि विवरण</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">सि.नं.</th>
		<th width="300" >खानेपानीको श्रोतहरु</th>
		<th width="300" >घरपरिवार संख्या</th>
		<th width="300" >प्रतिशत</th>
	</tr>
<?php foreach ($water as $wat) { 
	$tot = $wat['tot'];
	?>
	<tr>
		<td>१</td>
		<td>सार्वजनिक धारा (पाइप प्रणाली)</td>
		<td><?= $wat['public'] ?></td>
		<td><?= number_format($wat['public'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>निजिधारा (पाइप प्रणाली)</td>
		<td><?= $wat['private'] ?></td>
		<td><?= number_format($wat['private'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>ट्युवेल हेण्डपाइप</td>
		<td><?= $wat['tubewell'] ?></td>
		<td><?= number_format($wat['tubewell'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>मुलको पानी</td>
		<td><?= $wat['mul'] ?></td>
		<td><?= number_format($wat['mul'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>संरक्षित मुलको पानी वा ढाकिएको इनार कुवा</td>
		<td><?= $wat['covered'] ?></td>
		<td><?= number_format($wat['covered'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>नढाकिएको इनार कुवा असंरक्षित मूल</td>
		<td><?= $wat['uncovered'] ?></td>
		<td><?= number_format($wat['uncovered'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>७</td>
		<td>खोला वा नदीको पानी</td>
		<td><?= $wat['river'] ?></td>
		<td><?= number_format($wat['river'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>८</td>
		<td>अन्य</td>
		<td><?= $wat['others'] ?></td>
		<td><?= number_format($wat['others'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td><?= $wat['tot'] ?></td>
		<td>100%</td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>२३. इन्धनको प्रयोगको आधारमा घरपरिवार विवरण</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="80">सि.नं.</th>
		<th width="300" >इन्धनको प्रकार</th>
		<th width="300" >परिवार संख्या</th>
		<th width="300" >प्रतिशत</th>
	</tr>
	<?php
foreach ($energy as $wat) { 
	$tot = $wat['timber'] + $wat['kero'] + $wat['lp_gas'] + $wat['guitha'] + $wat['g_gas'] + $wat['elec'] +$wat['others'];
	?>
	<tr>
		<td>१</td>
		<td>दाउरा</td>
		<td><?= $wat['timber'] ?></td>
		<td><?= number_format($wat['timber'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>मट्टीतेल</td>
		<td><?= $wat['kero'] ?></td>
		<td><?= number_format($wat['kero'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>एल पि ग्यास</td>
		<td><?= $wat['lp_gas'] ?></td>
		<td><?= number_format($wat['lp_gas'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>गुइठा</td>
		<td><?= $wat['guitha'] ?></td>
		<td><?= number_format($wat['guitha'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>गोबर ग्यास</td>
		<td><?= $wat['g_gas'] ?></td>
		<td><?= number_format($wat['g_gas'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>बिजुली</td>
		<td><?= $wat['elec'] ?></td>
		<td><?= number_format($wat['elec'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>७</td>
		<td>अन्य</td>
		<td><?= $wat['others'] ?></td>
		<td><?= number_format($wat['others'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>२४. बत्तिको प्रयोगको आधारमा घरपरिवार विवरण</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="80">सि.नं.</th>
		<th width="300" >बत्तिको प्रकार</th>
		<th width="300" >परिवार संख्या</th>
		<th width="300" >प्रतिशत</th>
	</tr>
<?php
foreach ($lights as $wat) { 
	$tot = $wat['solar'] + $wat['kero'] + $wat['g_gas'] + $wat['elec'] +$wat['others'];
?>
	<tr>
		<td>१</td>
		<td>बिजुली</td>
		<td><?= $wat['elec'] ?></td>
		<td><?= number_format($wat['elec'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>मट्टीतेल</td>
		<td><?= $wat['kero'] ?></td>
		<td><?= number_format($wat['kero'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>बायोग्यास</td>
		<td><?= $wat['g_gas'] ?></td>
		<td><?= number_format($wat['g_gas'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>सोलार</td>
		<td><?= $wat['solar'] ?></td>
		<td><?= number_format($wat['solar'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>अन्य</td>
		<td><?= $wat['others'] ?></td>
		<td><?= number_format($wat['others'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>उल्लेख नभएको</td>
		<td><?= $wat['empty'] ?></td>
		<td><?= number_format($wat['empty'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>२५. उपलब्ध सेवा सुबिधाको आधारमा घरपरिवार विवरण</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="80">सि.नं.</th>
		<th width="300" >सेवा सुबिधाको विवरण</th>
		<th width="300" >परिवार संख्या</th>
		<th width="300" >प्रतिशत</th>
	</tr>
<?php
foreach ($subidha as $wat) { 
	$least = $wat['least'] - $wat['nothing'];
	$tot = $wat['nothing'] + $wat['radio'] + $wat['tv'] +$wat['cable'] +$wat['cable'] +$wat['cable'] +$wat['computer'] +$wat['internet'] +$wat['phone'] +$wat['mobile'] +$wat['vehicle'] +$wat['oth_veh'] +$wat['fridge'];
?>
	<tr>
		<td>१</td>
		<td>कुनै सेवा सुबिधा नभएको</td>
		<td><?= $wat['nothing'] ?></td>
		<td><?= number_format($wat['nothing'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>कम्तिमा एउटा सेवा सुबिधा भएको</td>
		<td><?= $least ?></td>
		<td><?= number_format($least / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>रेडियो भएको</td>
		<td><?= $wat['radio'] ?></td>
		<td><?= number_format($wat['radio'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>टि.भि. भएको</td>
		<td><?= $wat['tv'] ?></td>
		<td><?= number_format($wat['tv'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>केबल लाइन जोडेको</td>
		<td><?= $wat['cable'] ?></td>
		<td><?= number_format($wat['cable'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>कम्प्युटर भएको</td>
		<td><?= $wat['computer'] ?></td>
		<td><?= number_format($wat['computer'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>७</td>
		<td>इन्टरनेट सुबिधा भएको</td>
		<td><?= $wat['internet'] ?></td>
		<td><?= number_format($wat['internet'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>८</td>
		<td>टेलीफोन भएको</td>
		<td><?= $wat['phone'] ?></td>
		<td><?= number_format($wat['phone'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>९</td>
		<td>मोबाइल</td>
		<td><?= $wat['mobile'] ?></td>
		<td><?= number_format($wat['mobile'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>१०</td>
		<td>गाडी भएको</td>
		<td><?= $wat['vehicle'] ?></td>
		<td><?= number_format($wat['vehicle'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>११</td>
		<td>मोटर साइकल</td>
		<td><?= $wat['bike'] ?></td>
		<td><?= number_format($wat['bike'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>१२</td>
		<td>साइकल</td>
		<td><?= $wat['cycle'] ?></td>
		<td><?= number_format($wat['cycle'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>१३</td>
		<td>अन्य साधन</td>
		<td><?= $wat['oth_veh'] ?></td>
		<td><?= number_format($wat['oth_veh'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>१४</td>
		<td>फ्रीज</td>
		<td><?= $wat['fridge'] ?></td>
		<td><?= number_format($wat['fridge'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><?//= $tot ?></td>
		<td>100%</td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>२६. शौचालय प्रयोगको आधारमा घरपरिवार विवरण</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="80">सि.नं.</th>
		<th width="300" >चर्पीको प्रयोग</th>
		<th width="300" >परिवार संख्या</th>
		<th width="300" >प्रतिशत</th>
	</tr>
<?php
foreach ($toilet_type as $wat) { 
	$tot = $wat['no_toilet'] + $wat['pitt'] +$wat['g_gas'] +$wat['maintained'] +$wat['empty'];
?>
	<tr>
		<td>१</td>
		<td>चर्पी नभएको</td>
		<td><?= $wat['no_toilet'] ?></td>
		<td><?= number_format($wat['no_toilet'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>सुधारिएको खाल्डे</td>
		<td><?= $wat['pitt'] ?></td>
		<td><?= number_format($wat['pitt'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>गोवरग्याँस जडीत</td>
		<td><?= $wat['g_gas'] ?></td>
		<td><?= number_format($wat['g_gas'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>सुधारिएको </td>
		<td><?= $wat['maintained'] ?></td>
		<td><?= number_format($wat['maintained'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>उल्लेख नभएको </td>
		<td><?= $wat['empty'] ?></td>
		<td><?= number_format($wat['empty'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा </td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>

</thead>
</table>
<?php } ?>

<!-- <h3>२७. बसाई सराई सम्बन्धि विवरण</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="300">बसाई सराई विवरण</th>
		<th width="150" >महिला</th>
		<th width="150" >पुरुष</th>
		<th width="150" >जम्मा</th>
		<th width="300" >मुख्य जिल्लाहरु</th>
	</tr>
<?php
foreach ($migration as $wat) { 
	$in_both = $wat['in_male'] + $wat['in_female'];
	$out_both = $wat['out_male'] + $wat['out_female'];
	$tot = $in_both + $out_both;
?>
	<tr>
		<td>न.पा. भित्र आएका</td>
		<td><?= $wat['in_female'] ?></td>
		<td><?= $wat['in_male'] ?></td>
		<td><?= $in_both ?></td>
		<td></td>
	</tr>
	<tr>
		<td>न.पा. बाट बाहिर गएका</td>
		<td><?= $wat['out_female'] ?></td>
		<td><?= $wat['out_male'] ?></td>
		<td><?= $out_both ?></td>
		<td></td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td><?= $wat['out_female'] + $wat['in_female'] ?></td>
		<td><?= $wat['out_male'] + $wat['in_male'] ?></td>
		<td><?= $tot ?></td>
		<td><?= $wat['ccc'] ?></td>
	</tr>
</thead>
</table>
<?php } ?> -->

<h3>२८. खाधान्न निर्भरताको अवस्था :</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="70">क्र.सं.</th>
		<th width="600" >खाधान्न उपलब्धताको आधारमा परिवार संख्याको विवरण</th>
		<th width="120" >संख्या/प्रतिशत</th>
		<th width="150" >कैफियत</th>
		
	</tr>
<?php
foreach ($food as $wat) { 
	
?>
	<tr>
		<td>१</td>
		<td>३ महिना भन्दा कम खान पुग्ने परिवार</td>
		<td><?= $wat['three'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>२</td>
		<td>४-६ महिना खान पुग्ने परिवार</td>
		<td><?= $wat['six'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>३</td>
		<td>७-९ महिना खान पुग्ने परिवार</td>
		<td><?= $wat['nine'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>४</td>
		<td>१०-१२ महिना खान पुग्ने परिवार</td>
		<td><?= $wat['twel'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>५</td>
		<td>१आफ्नै खेतबारीको उत्पादनबाट खान पुगेर बेच बिखन गर्ने परिवार</td>
		<td><?= $wat['con_sell'] ?></td>
		<td></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>२९. स्वामित्वको प्रकारको आधारमा "महिला "घरमुली सम्बन्धि विवरण :</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="70">क्र.सं.</th>
		<th width="400" >स्वामित्वको विवरण</th>
		<th width="120" >घरपरिवार</th>
		<th width="150" >प्रतिशत</th>
		
	</tr>
<?php
foreach ($fem_hou as $wat) { 
	$tot = $wat['both_own'] + $wat['land_only'] + $wat['none'] + $wat['empty'];
?>
	<tr>
		<td>१</td>
		<td>घरजग्गा दुबैमा स्वामित्व भएको</td>
		<td><?= $wat['both_own'] ?></td>
		<td><?= number_format($wat['both_own'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>जग्गामा मात्र स्वामित्व भएको</td>
		<td><?= $wat['land_only'] ?></td>
		<td><?= number_format($wat['land_only'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>घरजग्गा दुबैमा स्वामित्व नभएको</td>
		<td><?= $wat['none'] ?></td>
		<td><?= number_format($wat['none'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>उल्लेख नभएको</td>
		<td><?= $wat['empty'] ?></td>
		<td><?= number_format($wat['empty'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>

<?php } ?>
	</thead>
</table>

<h3>३०. भूस्वामित्व सम्बन्धि विवरण :</h3>
	<table border="1" class="table">
	<thead>
		<tr>
		<th width="70">सि.नं.</th>
		<th width="400" >स्वामित्वको विवरण</th>
		<th width="120" >घरधुरी</th>
		<th width="150" >प्रतिशत</th>
		
	</tr>
<?php
foreach ($land as $wat) { 
	$tot = $wat['own'] + $wat['no_own'] + $wat['given'] + $wat['taken'] + $wat['no_land'];
?>
	<tr>
		<td>१</td>
		<td>स्वामित्व भएको</td>
		<td><?= $wat['own'] ?></td>
		<td><?= number_format($wat['own'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>स्वामित्व नभएको</td>
		<td><?= $wat['no_own'] ?></td>
		<td><?= number_format($wat['no_own'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>आफ्नो जग्गा अरुलाई कमाउन दिएको</td>
		<td><?= $wat['given'] ?></td>
		<td><?= number_format($wat['given'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>अरुको जग्गा कमाउने</td>
		<td><?= $wat['taken'] ?></td>
		<td><?= number_format($wat['taken'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>भूमिहीन</td>
		<td><?= $wat['no_land'] ?></td>
		<td><?= number_format($wat['no_land'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>

</thead>
</table>
<?php } ?>

<h3>३१. परिवारको स्वामित्वमा रहेको जग्गा जमिन सम्बन्धि विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="70" rowspan="2">सि.नं.</th>
		<th width="400" colspan="2" >स्वामित्वको विवरण</th>
		<th width="120" rowspan="2">जम्मा घरधुरी</th>
		<th width="150" rowspan="2">प्रतिशत</th>
	</tr>
	<tr>
		<th>पहाड (रोपनी)</th>
		<th>तराई (कठ्ठा )</th>
	</tr>
<?php
foreach ($ropani as $wat) { 
	$tot = $wat['ropani2'] + $wat['twotofive'] + $wat['ten'] + $wat['ropani20'] + $wat['ropani20'] + $wat['no_land'] + $wat['empty'];
?>
	<tr>
		<td>१</td>
		<td>२ रोपनी भन्दा कम</td>
		<td>५ कठ्ठा भन्दा कम</td>
		<td><?= $wat['ropani2'] ?></td>
		<td><?= number_format($wat['ropani2'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>२ देखि ५ रोपनी सम्म</td>
		<td>६ देखि १० कठ्ठा सम्म</td>
		<td><?= $wat['twotofive'] ?></td>
		<td><?= number_format($wat['twotofive'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>६ देखि १० रोपनी सम्म</td>
		<td>११ देखि २० कठ्ठा सम्म</td>
		<td><?= $wat['ten'] ?></td>
		<td><?= number_format($wat['ten'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>११ देखि २० रोपनी सम्म</td>
		<td>२१ देखि ३० कठ्ठा सम्म</td>
		<td><?= $wat['ropani20'] ?></td>
		<td><?= number_format($wat['ropani20'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>२० रोपनी भन्दा माथि</td>
		<td>२१ देखि ३० कठ्ठा सम्म</td>
		<td><?= $wat['morethan20'] ?></td>
		<td><?= number_format($wat['morethan20'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>जग्गा नै नभएको</td>
		<td>जग्गा नै नभएको</td>
		<td><?= $wat['no_land'] ?></td>
		<td><?= number_format($wat['no_land'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td>७</td>
		<td>थाहा नभएको</td>
		<td>थाहा नभएको</td>
		<td><?= $wat['empty'] ?></td>
		<td><?= number_format($wat['empty'] / $tot*100, 2, '.', '') ?>%</td>
	</tr>
	<tr>
		<td></td>
		<td>जम्मा</td>
		<td></td>
		<td><?= $tot ?></td>
		<td>100%</td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>३२. आर्थिक बर्षको पंजीकरण विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="70">क्र.स.</th>
		<th width="300">विवरण</th>
		<th width="120">हालको जनसंख्या</th>
		<th width="150">दर्ता संख्या</th>
		<th width="150">महिला</th>
		<th width="150">पुरुष</th>
	</tr>
	<?php
foreach ($birth_all as $all) {
	?>
	<tr>
		<td>१</td>
		<td><b>जन्म दर्ता</b></td>
		<td></td>
		<td><?= $all['tot_all'] ?></td>
		<td><?= $all['female_pop'] ?></td>
		<td><?= $all['male_pop'] ?></td>
	</tr>
	<tr>
		<td>१.१</td>
		<td>५ बर्ष सम्मका</td>
		<td></td>
		<td><?= $all['five_all'] ?></td>
		<td><?= $all['five_female'] ?></td>
		<td><?= $all['five_male'] ?></td>
	</tr>
	<tr>
		<td>१.२</td>
		<td>५ बर्ष देखि १८ बर्षसम्मका बालबालिका</td>
		<td></td>
		<td><?= $all['all_18'] ?></td>
		<td><?= $all['female_18'] ?></td>
		<td><?= $all['male_18'] ?></td>
	</tr>
	<tr>
		<td>१.३</td>
		<td>१८ बर्ष माथिका मानिस</td>
		<td></td>
		<td><?= $all['all_18_plus'] ?></td>
		<td><?= $all['female_18_plus'] ?></td>
		<td><?= $all['male_18_plus'] ?></td>
	</tr>
<?php } foreach ($death as $val) { ?>
	<tr>
		<td>२</td>
		<td><b>मृत्यु दर्ता</b></td>
		<td></td>
		<td><?= $val['female_dec'] + $val['male_dec'] ?></td>
		<td><?= $val['female_dec'] ?></td>
		<td><?= $val['male_dec'] ?></td>
	</tr>
<?php } ?>
	<tr>
		<td>३</td>
		<td><b>सम्बन्ध बिच्छेद सराई</b></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>४</td>
		<td><b>बसाई सराई</b></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php foreach ($marr as $val) { ?>
	<tr>
		<td>५</td>
		<td><b>बिबाह दर्ता</b></td>
		<td></td>
		<td><?= $val['male_dec'] ?></td>
		<td><?= $val['fem_less_18'] + $val['fem_plus'] ?></td>
		<td><?= $val['mal_less_18'] + $val['mal_plus'] ?></td>
	</tr>
	<tr>
		<td>५.१</td>
		<td>१८ बर्ष भन्दा कम उमेर</td>
		<td></td>
		<td><?= $val['fem_less_18'] + $val['mal_less_18']?></td>
		<td><?= $val['fem_less_18'] ?></td>
		<td><?= $val['mal_less_18'] ?></td>
	</tr>
	<tr>
		<td>५.२</td>
		<td>१८ बर्ष भन्दा माथि</td>
		<td></td>
		<td><?= $val['fem_plus'] + $val['mal_plus']?></td>
		<td><?= $val['fem_plus'] ?></td>
		<td><?= $val['mal_plus'] ?></td>
	</tr>
<?php } ?>
</thead>
</table>


<h3>३४. जेष्ठ नागरिक तथा एकल महिलाहरुको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="70">क्र.स.</th>
		<th width="400">विवरण</th>
		<th width="120">संख्या</th>
		<th width="150">कैफियत</th>
	</tr>
<?php
foreach ($elderly as $wat) { 
	$tot = $wat['female_70_plus'] + $wat['male_70_plus'];
	$tot_dalit = $wat['female_70_plus_dalit'] + $wat['male_70_plus_dalit']
?>
	<tr>
		<td>१</td>
		<td><b>जेष्ठ नागरिक (७० भन्दा माथि)<b></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>१.१</td>
		<td>महिला</td>
		<td><?//= $wat['female_70_plus'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>१.२</td>
		<td>पुरुष</td>
		<td><?//= $wat['male_70_plus'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td><b>जम्मा</b></td>
		<td><b><?//= $tot ?></b></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td><b>जेष्ठ दलित (७० भन्दा माथि)<b></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>महिला</td>
		<td><?//= $wat['female_70_plus_dalit'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>पुरुष</td>
		<td><?//= $wat['female_70_plus_dalit'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td><b>जम्मा</b></td>
		<td><b><?//= $tot_dalit ?></b></td>
		<td></td>
	</tr>
	<tr>
		<td>२</td>
		<td>कुल एकल महिला</td>
		<td><?//= $wat['single_female'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>३</td>
		<td>लोपुन्मुख जाति (कुसुण्डा, राउटे..)</td>
		<td><?//= $wat['single_female'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>४</td>
		<td>जम्मा पूर्ण अपाङ्ग<br>
		महिला<br>
		पुरुष
	</td>
		<td><?//= $wat['tot_dis'] ?><br>
		<?//= $wat['tot_dis_female'] ?><br>
		<?//= $wat['tot_dis_male'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>५</td>
		<td>जम्मा आमंसिक अपाङ्ग<br>
		महिला<br>
		पुरुष
	</td>
		<td><?//= $wat['partial_dis'] ?><br>
		<?//= $wat['partial_dis_female'] ?><br>
		<?//= $wat['partial_dis_male'] ?></td>
		<td></td>
	</tr>
<?php  } ?>
</thead>
</table>

<!-- <h3>३५. वडा अनुसार सामाजिक सुरक्षा भत्ता पाउने व्यक्तिहरुको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th rowspan="2" width="100">वडा नं</th>
		<th colspan="3" width="200">जेष्ठ नागरिक</th>
		<th colspan="3" width="200">दलित जेष्ठ नागरिक</th>
		<th rowspan="2">एकल महिला</th>
		<th colspan="3" width="200">पूर्ण अपाङ्ग</th>
		<th colspan="3" width="200">आमंसिक अपाङ्ग</th>
		<th rowspan="2" width="100">जम्मा</th>
	</tr>
	<tr>
		<th>महिला</th>
		<th>पुरुष</th>
		<th>जम्मा</th>
		<th>महिला</th>
		<th>पुरुष</th>
		<th>जम्मा</th>
		<th>महिला</th>
		<th>पुरुष</th>
		<th>जम्मा</th>
		<th>महिला</th>
		<th>पुरुष</th>
		<th>जम्मा</th>		
	</tr>
<?php 
$ward = 1;
for ($wr=1; $wr < 10; $wr++) { 
$wage = $this->rm_model->ward_wise_wage_distribution_for_disability_elder_prople($ward);
foreach ($wage as $wag) {
	$tot_eld = $wag['male_70_plus'] + $wag['female_70_plus'];
	$tot_dalit = $wag['male_70_plus_dalit'] + $wag['female_70_plus_dalit'];
	$tot_dis = $wag['tot_dis_female'] + $wag['tot_dis_male'];
	$partial = $wag['partial_dis_female'] + $wag['partial_dis_male'];
	$grand_tot = $tot_eld + $tot_dalit + $tot_dis + $partial;
?>
	<tr>
		<td><?= $ward; ?></td>

		<td><?= $wag['female_70_plus'] ?></td>
		<td><?= $wag['male_70_plus'] ?></td>
		<td><b><?= $tot_eld; ?></b></td>
		<td><?= $wag['female_70_plus_dalit'] ?></td>
		<td><?= $wag['male_70_plus_dalit'] ?></td>
		<td><b><?= $tot_dalit; ?></b></td>
		<td><?= $wag['single_female'] ?></td>
		<td><?= $wag['tot_dis_female'] ?></td>
		<td><?= $wag['tot_dis_male'] ?></td>
		<td><b><?= $tot_dis; ?></b></td>
		<td><?= $wag['partial_dis_female'] ?></td>
		<td><?= $wag['partial_dis_male'] ?></td>
		<td><?= $partial; ?></td>
		<td><b><?= $grand_tot; ?></b></td>
	</tr>
<?php $ward++; } } ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
</thead>
</table> -->

<h3>३६. बार्षिक कार्यक्रमबाट लक्षित कार्यक्रमतर्फ भएको बिनियोजन तथा खर्चको अवस्था:</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="70">आर्थिक बर्ष</th>
		<th width="400">लक्षित कार्यक्रम</th>
		<th width="120">बिनियिजन रकम</th>
		<th width="150">खर्च रकम</th>
	</tr>

</thead>
</table>

<h3>३७. शैक्षिक संस्थाहरुको विवरण:</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="200">विवरण</th>
		<th width="200">सरकारी</th>
		<th width="200">सामुदायिक</th>
		<th width="200">निजि</th>
		<th width="200">कुल</th>
	</tr>
<?php
foreach ($edu_ins as $edu) {
$primary_tot = $edu['primary_gov'] + $edu['primary_samu'] + $edu['primary_pri'];
$low_sec_tot = $edu['low_sec_gov'] + $edu['low_sec_samu'] + $edu['low_sec_pri'];
$sec_tot = $edu['sec_gov'] + $edu['sec_samu'] + $edu['sec_pri'];
$hi_tot = $edu['higher_sec_gov'] + $edu['higher_sec_samu'] + $edu['higher_sec_pri'];
$oth_tot = $edu['others_gov'] + $edu['others_samu'] + $edu['others_pri'];
 ?>
	<tr>
		<td>प्रा. वि.</td>
		<td><?= $edu['primary_gov'] ?></td>
		<td><?= $edu['primary_samu'] ?></td>
		<td><?= $edu['primary_pri'] ?></td>
		<td><?= $primary_tot ?></td>
	</tr>
	<tr>
		<td>नि. मा. वि</td>
		<td><?= $edu['low_sec_gov'] ?></td>
		<td><?= $edu['low_sec_samu'] ?></td>
		<td><?= $edu['low_sec_pri'] ?></td>
		<td><?= $low_sec_tot ?></td>
	</tr>
	<tr>
		<td>मा. वि</td>
		<td><?= $edu['sec_gov'] ?></td>
		<td><?= $edu['sec_samu'] ?></td>
		<td><?= $edu['sec_pri'] ?></td>
		<td><?= $sec_tot ?></td>
	</tr>
	<tr>
		<td>उ. मा. वि</td>
		<td><?= $edu['higher_sec_gov'] ?></td>
		<td><?= $edu['higher_sec_samu'] ?></td>
		<td><?= $edu['higher_sec_pri'] ?></td>
		<td><?= $hi_tot ?></td>
	</tr>
	<tr>
		<td>अन्य</td>
		<td><?= $edu['others_gov'] ?></td>
		<td><?= $edu['others_samu'] ?></td>
		<td><?= $edu['others_pri'] ?></td>
		<td><?= $oth_tot ?></td>
	</tr>
	<?php } ?>
</thead>
</table>

<h3>३८. बिश्वविधालय तथा कलेजहरु:</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="50">क्र.सं.</th>
		<th width="300">उ. मा. वि.., कलेजको नाम</th>
		<th width="350">ठेगाना</th>
		<th width="200">संचालित कार्यक्रम तथा तह</th>
		<th width="200">बिद्यार्थी संख्या</th>
	</tr>
<?php
$t= 1;
foreach ($college as $col) {
	$dis_name = $this->page_model->get_district_name_by_code($col['district_code']);
	$toto = $col['male_std'] + $col['female_std'];
?>
	<tr>
		<td><?= $t; ?></td>
		<td><?= $col['org_name'] ?></td>
		<td><?= $col['local_unit']; ?></td>
		<td>उ. मा. वि</td>
		<td><?= $toto ?></td>
	</tr>

<?php $t++; } ?>
</thead>
</table>

<h3>३९. ५ बर्ष वा सो भन्दा माथिको सक्षारताको आधारमा जनसंख्याको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80" rowspan="2">लिङ्ग</th>
		<th width="300" rowspan="2">५ बर्ष र ५ बर्ष भन्दा माथिको जनसंख्या</th>
		<th width="350" colspan="4">जनसंख्याको अवस्था</th>
	</tr>
	<tr>
		<th>लेख्न र पढ्न सक्ने</th>
		<th>पढ्न मात्रै सक्ने</th>
		<th>पढ्न लेख्न नसक्ने</th>
		<th>थाहा नभएको</th>
	</tr>
	<tr>
		<td>पुरुष</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>महिला</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</thead>
</table>

<h3>४०. विधालयमा अध्ययन गरिरहेको छात्रछात्राहरुको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80" rowspan="2">तह</th>
		<th width="300" colspan="4">सरकारी बिधालय</th>
		<th width="350" colspan="4">निजि बिधालय</th>
		<th width="350" rowspan="2">कुल जम्मा</th>
	</tr>
	<tr>
		<th>कक्षा</th>
		<th>छात्र</th>
		<th>छात्रा</th>
		<th>जम्मा</th>

		<th>कक्षा</th>
		<th>छात्र</th>
		<th>छात्रा</th>
		<th>जम्मा</th>
	</tr>
<?php
foreach ($primary as $pri) {
	$prim_gov_tot = $pri['primary_gov_female'] + $pri['primary_gov_male'];
	$prim_pvt_tot = $pri['primary_pvt_female'] + $pri['primary_pvt_male'];
?>
	<tr>
		<td>प्रा. वि</td>
		<td>१-५</td>
		<td><?= $pri['primary_gov_female'] ?></td>
		<td><?= $pri['primary_gov_male'] ?></td>
		<td><b><?= $prim_gov_tot ?></b></td>
		<td>१-५</td>
		<td><?= $pri['primary_pvt_female'] ?></td>
		<td><?= $pri['primary_pvt_male'] ?></td>
		<td><b><?= $prim_pvt_tot ?></b></td>
		<td><?= $prim_pvt_tot + $prim_gov_tot ?></td>
	</tr>
	<?php
	$sec_gov_tot = $pri['sec_gov_female'] + $pri['sec_gov_male'];
	$sec_pvt_tot = $pri['sec_pvt_female'] + $pri['sec_pvt_male'];
	?>
	<tr>
		<td>नि. मा. वि</td>
		<td>६-८</td>
		<td><?= $pri['sec_gov_female'] ?></td>
		<td><?= $pri['sec_gov_male'] ?></td>
		<td><b><?= $sec_gov_tot ?></b></td>
		<td>६-८</td>
		<td><?= $pri['sec_pvt_female'] ?></td>
		<td><?= $pri['sec_pvt_male'] ?></td>
		<td><b><?= $sec_pvt_tot ?></b></td>
		<td><?= $sec_pvt_tot + $sec_gov_tot ?></td>
	</tr>
<?php
	$ma_gov_tot = $pri['gov_female'] + $pri['gov_male'];
	$ma_pvt_tot = $pri['pvt_female'] + $pri['pvt_male'];
?>
	<tr>
		<td>मा. वि</td>
		<td>९-१०</td>
		<td><?= $pri['gov_female'] ?></td>
		<td><?= $pri['gov_male'] ?></td>
		<td><b><?= $ma_gov_tot ?></b></td>
		<td>९-१०</td>
		<td><?= $pri['pvt_female'] ?></td>
		<td><?= $pri['pvt_male'] ?></td>
		<td><b><?= $ma_pvt_tot ?></b></td>
		<td><?= $ma_pvt_tot + $ma_gov_tot ?>
	</tr>
	<?php } ?>
</thead>
</table>

<h3>४१. ५ बर्ष वा सो भन्दा माथिको शैक्षिक अवस्था :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80" rowspan="2">लिङ्ग</th>
		<th width="80" rowspan="2">जम्मा</th>
		<th width="700" colspan="11">जनसंख्याको अवस्था</th>
	</tr>
	<tr>
		<th>साक्षर(beginners)</th>
		<th>प्रा. वि. तह (१-५)</th>
		<th>नि. मा. वि तह (६-८)</th>
		<th>मा. वि तह (९-१०)</th>
		<th>प्रविणता प्रमाण पत्र तह</th>
		<th>स्नातक तह</th>
		<th>स्नाकोत्तर तह</th>
		<th>अनौपचारिक शिक्षा</th>
		<th>तह नखुलेको</th>
	</tr>
<?php
foreach ($educ as $val) {
	// print_r($educ)
	?>
	<tr>
		<td>पुरुष</td>
		<td><?= $val['tot'] ; ?></td>
		<td><?= $val['sakhxar'] ?></td>
		<td><?= $val['pri_edu'] ?></td>
		<td><?= $val['sakhxar'] ?></td>
		<td><?= $val['sakhxar'] ?></td>
		<td><?= $val['sakhxar'] ?></td>
		<td><?= $val['sakhxar'] ?></td>
		<td><?= $val['sakhxar'] ?></td>
		<td><?= $val['unoff'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>महिला</td>
		<td><?= $val['tot_fem'] ; ?></td>
		<td><?= $val['sakhxar_fem'] ?></td>
		<td><?= $val['pri_edu_fem'] ?></td>
		<td><?= $val['sec_fem'] ?></td>
		<td><?= $val['low_sec_fem'] ?></td>
		<td><?= $val['high_school_fem'] ?></td>
		<td><?= $val['bach_fem'] ?></td>
		<td><?= $val['mast_fem'] ?></td>
		<td><?= $val['unoff_fem'] ?></td>
		<td></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>४२. विद्यालयमा भर्ना नभएका तथा विद्यालय छाडेका वालवालिका हरुको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">लिङ्ग</th>
		<th width="300">भर्ना नभएका संख्या</th>
		<th width="300">विद्यालय छाडेका संख्या</th>
	</tr>
<?php 
	foreach ($left_school as $sch) {
		
?>
	<tr>
		<td>छात्र</td>
		<td><?//= $sch['male_not_admit'] ?></td>
		<td><?//= $sch['male_left_school'] ?></td>
	</tr>
	<tr>
		<td>छात्रा</td>
		<td><?//= $sch['female_not_admit'] ?></td>
		<td><?//= $sch['female_left_school'] ?></td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td><?//= $sch['female_not_admit'] + $sch['male_not_admit'] ?></td>
		<td><?//= $sch['male_left_school'] + $sch['female_left_school'] ?></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3>४४. साक्षरता प्रतिशत (१५ बर्ष भन्दा माथि):</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<!-- <th width="100">वडा नं</th> -->
		<th width="700" colspan="2">सक्षरता दर</th>
	</tr>
<?php 
 // for ($y=1; $y < 12; $y++) { 
	 $literacy = $this->rm_model->ward_wise_literacy_rate();
	 foreach ($literacy as $lit) {
		 // echo '<pre>';
		 // print_r($literacy);
	$g_tot = $lit['female'] + $lit['male'] +$lit['dalit'] +$lit['janajati'] +$lit['other_caste'] ;
 ?> 
	<tr>
		<!-- <td><?= $y; ?></td> -->
		<td><b>औसतमा </b></td>
		<td><b><?php if (empty($lit['female'])){echo "0"; }else{echo number_format($lit['all_edu'] / $lit['count(id)'] *100, 2, '.', ''); } ?>%</b></td>
	</tr>
	<tr>
		<!-- <td></td> -->
		<td>महिला</td>
		<td><?php if (empty($lit['female'])){echo "0"; }else{ echo number_format($lit['female'] / $g_tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<!-- <td></td> -->
		<td>पुरुष</td>
		<td><?php if (empty($lit['male'])){echo "0"; }else{ echo number_format($lit['male'] / $g_tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	
<?php } // } ?>
</thead>
</table>

<h3>४५. बालविकास केन्द्रको विवरण:</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="100" rowspan="2">वडा नं</th>
		<th width="300" rowspan="2">बालविकास केन्द्रको जम्मा संख्या</th>
		<th width="300" colspan="2">भर्ना भएका वालवालिका संख्या</th>
		<th width="100" rowspan="2">जम्मा</th>
	</tr>
	<tr>
		<th>बालक</th>
		<th>बालिका</th>
	</tr>
<?php
for ($p=1; $p < 10; $p++) { 
$balbikash = $this->rm_model->balbikash_info($p);
foreach ($balbikash as $val) {
?>
	<tr>
		<td><?= $p; ?></td>
		<td><?= $val['tot']; ?></td>
		<td><?= $val['fem']; ?></td>
		<td><?= $val['male']; ?></td>
		<td><?= $val['fem'] + $val['male']; ?></td>
	</tr>

<?php } } ?>
	<tr>
		<td>जम्मा</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</thead>
</table>

<!-- <h3>४९. तहगत शिक्षक विवरण:</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="100" rowspan="3">तह</th>
		<th width="500" colspan="7">स्वीकृत दरबन्दी कार्यरत</th>
		<th width="300" rowspan="2" colspan="2">परियोजना</th>
		<th width="300" rowspan="2" colspan="3">राहत दरबन्दी कार्यरत</th>
		<th width="300" rowspan="2" colspan="3">नीजी श्रोतमा</th>
		<th width="300" rowspan="2" colspan="3">PCF मा</th>
		<th width="100" rowspan="3">तालिम प्राप्त शिक्षक + शिक्षिका</th>
		<th width="100" rowspan="3">जम्मा</th>
	</tr>
	<tr>
		<th rowspan="2">म</th>
		<th rowspan="2">पु</th>
		<th rowspan="2">जम्मा</th>
		<th colspan="2">स्थायी</th>
		<th colspan="2">अस्थायी</th>
	</tr>
	<tr>
		<th>म</th>
		<th>पु</th>
		<th>म</th>
		<th>पु</th>
		<th>म</th>
		<th>पु</th>

		<th>म</th>
		<th>पु</th>
		<th>जम्मा</th>

		<th>म</th>
		<th>पु</th>
		<th>जम्मा</th>
		<th>म</th>
		<th>पु</th>
		<th>जम्मा</th>
	</tr>
	<?php
foreach ($teachers as $val) {
	$pri_1 = $val['pri_fem_darbandi'] + $val['pri_fem_darbandi_temp'];
	$pri_2 = $val['pri_mal_darbandi'] + $val['pri_mal_darbandi_temp'];
	$pri_pcf_tot = $val['pcf_male_pri'] + $val['pcf_female_pri'];
	$pri_dar = $val['rahat_male_pri'] + $val['rahat_female_pri'];
	$pri_pers = $val['pers_male_pri'] + $val['pers_female_pri'];
	$tot_pri = $pri_1 + $pri_2 + $pri_dar +$pri_pcf_tot + $pri_pers;
	$lsec_1 = $val['lsec_fem_darbandi'] + $val['lsec_fem_darbandi_temp'];
	$lsec_2 = $val['lsec_mal_darbandi'] + $val['lsec_mal_darbandi_temp'];
	$lsec_dar = $val['rahat_female_lsec'] + $val['rahat_male_lsec'];
	$lsec_srot = $val['pers_female_lsec'] + $val['pers_male_lsec'];
	$lsec_pcf_tot = $val['pcf_male_lsec'] + $val['pcf_female_lsec'];
	$sec_1 = $val['sec_fem_darbandi'] + $val['sec_fem_darbandi_temp'];
	$sec_2 = $val['sec_mal_darbandi'] + $val['sec_mal_darbandi_temp'];
	$sec_dar = $val['rahat_female_sec'] + $val['rahat_male_sec'];
	$sec_srot = $val['pers_female_sec'] + $val['pers_male_sec'];
	$sec_pcf_tot = $val['pcf_male_sec'] + $val['pcf_female_sec'];
	?>
	<tr>
		<td>प्रा. वि</td>
		<td><?= $pri_1; ?></td>
		<td><?= $pri_2 ?></td>
		<td><b><?= $pri_1 + $pri_2 ?></b></td>
		<td><?= $val['pri_fem_darbandi'] ?></td>
		<td><?= $val['pri_mal_darbandi'] ?></td>
		<td><?= $val['pri_fem_darbandi_temp'] ?></td>
		<td><?= $val['pri_mal_darbandi_temp'] ?></td>
		<td><?= $val['proj_female_pri'] ?></td>
		<td><?= $val['proj_male_pri'] ?></td>
		<td><?= $val['rahat_female_pri'] ?></td>
		<td><?= $val['rahat_male_pri'] ?></td>
		<td><b><?= $pri_dar ?></b></td>
		<td><?= $val['pers_female_pri'] ?></td>
		<td><?= $val['pers_male_pri'] ?></td>
		<td><b><?= $pri_pers ?></b></td>
		<td><?= $val['pcf_female_pri'] ?></td>
		<td><?= $val['pcf_male_pri'] ?></td>
		<td><b><?= $pri_pcf_tot ?></b></td>
		<td><?= $val['train_female_pri'] + $val['train_male_pri'] ?></td>
		<td><?= $tot_pri ?></td>
	</tr>
	<tr>
		<td>नि. मा. वि</td>
		<td><?= $lsec_1; ?></td>
		<td><?= $lsec_2; ?></td>
		<td><b><?= $lsec_1 + $lsec_2 ?></b></td>
		<td><?= $val['lsec_fem_darbandi'] ?></td>
		<td><?= $val['lsec_mal_darbandi'] ?></td>
		<td><?= $val['lsec_fem_darbandi_temp'] ?></td>
		<td><?= $val['lsec_mal_darbandi_temp'] ?></td>
		<td><?= $val['proj_female_lsec'] ?></td>
		<td><?= $val['proj_male_lsec'] ?></td>
		<td><?= $val['rahat_female_lsec'] ?></td>
		<td><?= $val['rahat_male_lsec'] ?></td>
		
		<td><b><?= $lsec_dar ?></b></td>
		<td><?= $val['pers_female_lsec'] ?></td>
		<td><?= $val['pers_male_lsec'] ?></td>
		<td><b><?= $lsec_srot ?></b></td>
		<td><?= $val['pcf_female_lsec'] ?></td>
		<td><?= $val['pcf_male_lsec'] ?></td>
		<td><b><?= $lsec_pcf_tot ?></b></td>
		<td><?= $val['train_male_lsec'] ?></td>
		<td><?= $val['proj_male_pri'] ?></td>
	</tr>
	<tr>
		<td>मा. वि</td>
		<td><?= $sec_1; ?></td>
		<td><?= $sec_2; ?></td>
		<td><b><?= $sec_1 + $sec_2 ?></b></td>
		<td><?= $val['sec_fem_darbandi'] ?></td>
		<td><?= $val['sec_mal_darbandi'] ?></td>
		<td><?= $val['sec_fem_darbandi_temp'] ?></td>
		<td><?= $val['sec_mal_darbandi_temp'] ?></td>
		<td><?= $val['proj_female_sec'] ?></td>
		<td><?= $val['proj_male_sec'] ?></td>
		<td><?= $val['rahat_female_sec'] ?></td>
		<td><?= $val['rahat_male_sec'] ?></td>
		
		<td><b><?= $sec_dar ?></b></td>
		<td><?= $val['pers_female_sec'] ?></td>
		<td><?= $val['pers_male_sec'] ?></td>
		<td><b><?= $sec_srot ?></b></td>
		<td><?= $val['pcf_female_sec'] ?></td>
		<td><?= $val['pcf_male_sec'] ?></td>
		<td><b><?= $sec_pcf_tot ?></b></td>
		<td><?= $val['train_male_sec'] ?></td>
		<td><?= $val['proj_male_pri'] ?></td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
	</tr>
<?php } ?>
</thead>
</table> -->

<h3>५०. शिक्षक तथा कक्षा कोठको पर्याप्तता:</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="100">क्र.सं.</th>
		<th width="300">विध्यालयको नाम</th>
		<th width="200">विद्यार्थी संख्या</th>
		<th width="200">शिक्षक संख्या</th>
		<th width="200">विद्यार्थी शिक्षक अनुपात (STR)</th>
		<th width="200">विद्यार्थी कक्षा कोठा अनुपात (SCR)</th>
	</tr>
	<?php
foreach ($ratio as $key) {
// print_r($ratio);
	?>
	<tr>
		<td>1</td>
		<td><?= $key['school_child_development_name'] ?></td>
		<td><?= $key['tot_students'] ?></td>
		<td><?= $key['tot_teachers_m'] + $key['tot_fem_teach'] ?></td>
		<td><?= number_format($key['students_teachers_ratio'],2,'.',''); ?></td>
		<td><?= $key['students_classroom_ratio'] ?></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3> गाउँपालिकाको स्वस्थ संस्थामा स्वास्थ्यको स्थिति सम्बन्धि विवरण:</h3>
<table border="1" class="table">
	<tr>
		<th width="100">वडा नं.</th>
		<th width="200">स्वास्थ्य संस्थामा बच्चा जन्माउने संख्या</th>
		<th width="200">४ फरक Pregnancy Test गराउने संख्या</th>
		<th width="200">खोप लगाउने संख्या</th>
		<th width="200">स्वास्थ्य चौकीको भवन संख्या</th>
		<th width="200">शौचालयको सुबिधा</th>
		<th width="200">STD/STI(A64) महिला</th>
		<th width="200">STD/STI(A64) पुरुष</th>
		<th width="200">HIV/AIDS(B24) महिला</th>
		<th width="200">HIV/AIDS(B24) पुरुष</th>
	</tr>
	
		<?php
		$tot_birth=$tot_test=$tot_vacc=$tot_bld=$tot_toi=$tot_std_f=$tot_std_m=$tot_hiv_f=$tot_hiv_m=0;
		for ($h=1; $h < 10; $h++) { 
			$health_post = $this->rm_model->health_post_info($h);
			foreach ($health_post as $post) {
				$tot_birth += $post['sum(child_birth_in_healthpost)'];
				$tot_test += $post['sum(four_type_preg_test)'];
				$tot_vacc += $post['sum(vaccines_taken)'];
				$tot_bld += $post['building'];
				$tot_toi += $post['toilet'];
				$tot_std_f += $post['sum(std_female)'];
				$tot_std_m += $post['sum(std_male)'];
				$tot_hiv_f += $post['sum(hiv_female)'];
				$tot_hiv_m += $post['sum(hiv_male)'];

				echo '<tr>';
				echo '<td>'.$h.'</td>';
				echo '<td>'.$post['sum(child_birth_in_healthpost)'].'</td>';
				echo '<td>'.$post['sum(four_type_preg_test)'].'</td>';
				echo '<td>'.$post['sum(vaccines_taken)'].'</td>';
				echo '<td>'.$post['building'].'</td>';
				echo '<td>'.$post['toilet'].'</td>';
				echo '<td>'.$post['sum(std_female)'].'</td>';
				echo '<td>'.$post['sum(std_male)'].'</td>';
				echo '<td>'.$post['sum(hiv_female)'].'</td>';
				echo '<td>'.$post['sum(hiv_male)'].'</td>';
				echo '</tr>';
			}
		} ?>
		<tr>
			<td>जम्मा</td>
			<td><?= $tot_birth ?></td>
			<td><?= $tot_test ?></td>
			<td><?= $tot_vacc ?></td>
			<td><?= $tot_bld ?></td>
			<td><?= $tot_toi ?></td>
			<td><?= $tot_std_f ?></td>
			<td><?= $tot_std_m ?></td>
			<td><?= $tot_hiv_f ?></td>
			<td><?= $tot_hiv_m ?></td>
		</tr>
</table>


<!-- <h3> कामदारको रुपमा घर / परिवारबाट बाहिर गएका बालबालिकाहरुको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="100">लिङ्ग</th>
		<th width="300">संख्या</th>
	</tr>
<?php 
foreach ($child_workers as $work) {
?>
	<tr>
		<td>बालिका</td>
		<td><?= $work['child_fem'] ?></td>
	</tr>
	<tr>
		<td>बालक</td>
		<td><?= $work['child_male'] ?></td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td><?= $work['child_male'] + $work['child_fem'] ?></td>
	</tr>
<?php } ?>
</thead>
</table> -->


<h3> बालकलबहरुको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="500" colspan="4">समुदायमा आधारित बालकलब</th>
		<th width="500" colspan="4">बिद्यालयको आधारित बालकलब</th>
	</tr>
	<tr>
		<th>बालकलबको कुल संख्या</th>
		<th>बालिका सदस्य</th>
		<th>बालक सदस्य</th>
		<th>जम्मा</th>
		<th>बालकलबको कुल संख्या</th>
		<th>बालिका सदस्य</th>
		<th>बालक सदस्य</th>
		<th>जम्मा</th>
	</tr>
	<?php
foreach ($child_club as $club) {
	
	?>
	<tr>
		<td><?= $club['club'] ?></td>
		<td><?= $club['girls_count'] ?></td>
		<td><?= $club['boys_count'] ?></td>
		<td><?= $club['boys_count'] + $club['girls_count'] ?></td>
		<td><?= $club['club_sch'] ?></td>
		<td><?= $club['girls_count_sch'] ?></td>
		<td><?= $club['boys_count_sch'] ?></td>
		<td><?= $club['boys_count_sch'] + $club['girls_count_sch'] ?></td>

	</tr>
<?php } ?>
</thead>
</table>

<h3> जन्म दर्ता भएका बालबालिकाको संख्या :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="150" rowspan="2">विवरण</th>
		<th width="300" colspan="3">कुल जन्म दर्ता संख्या</th>
		<th width="200" rowspan="2">कैफियत</th>
	</tr>
	<tr>
		<th>बालिका</th>
		<th>बालक</th>
		<th>जम्मा</th>
	</tr>
	<?php
foreach ($birth as $val) {	?>
	<tr>
		<td>संख्या</td>
		<td><?= $val['fem_child'] ?></td>
		<td><?= $val['male_child'] ?></td>
		<td><?= $val['club'] ?></td>
		<td></td>
	</tr>

<?php } ?>
</thead>
</table>

<h3> फोहोरमैला ब्यबस्थापन :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="200">पारिवारिक विवरण</th>
		<th width="200">नदि वा खोल्सामा</th>
		<th width="200">सडकमा</th>
		<th width="200">फोहोर थुपार्ने ठाउँ, कन्टेनर</th>
		<th width="200">घरमा नै लिन आउछ</th>
		<th width="200">आफ्नै कम्पाउन्ड</th>
		<th width="200">कमपोस्ट मल बनाइन्छ</th>
		<th width="200">जलाउने</th>
		<th width="200">जम्मा</th>
	</tr>
	<?php foreach ($garbage as $val) { ?>
	<tr>
		<td>परिवार संख्या</td>
		<td><?= $val['river']  ?></td>
		<td><?= $val['road']  ?></td>
		<td><?= $val['container']  ?></td>
		<td><?= $val['ghar']  ?></td>
		<td><?= $val['compound']  ?></td>
		<td><?= $val['mal']  ?></td>
		<td><?= $val['burn']  ?></td>
		<td><b><?= $val['tot'] ?></b></td>
	</tr>
	<tr>
		<td>प्रतिशत</td>
		<td><?php if (empty($val['tot'])){echo "0"; }else{ echo number_format($val['river'] / $val['tot']*100, 2, '.', ''); } ?>%</td>
		<td><?php if (empty($val['tot'])){echo "0"; }else{ echo number_format($val['road'] / $val['tot']*100, 2, '.', ''); } ?>%</td>
		<td><?php if (empty($val['tot'])){echo "0"; }else{ echo number_format($val['container'] / $val['tot']*100, 2, '.', ''); } ?>%</td>
		<td><?php if (empty($val['tot'])){echo "0"; }else{ echo number_format($val['ghar'] / $val['tot']*100, 2, '.', ''); } ?>%</td>
		<td><?php if (empty($val['tot'])){echo "0"; }else{ echo number_format($val['compound'] / $val['tot']*100, 2, '.', ''); } ?>%</td>
		<td><?php if (empty($val['tot'])){echo "0"; }else{ echo number_format($val['mal'] / $val['tot']*100, 2, '.', ''); } ?>%</td>
		<td><?php if (empty($val['tot'])){echo "0"; }else{ echo number_format($val['burn'] / $val['tot']*100, 2, '.', ''); } ?>%</td>
		<td><b>100%</b></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3> गाउँ / नगर क्षेत्रभित्र गठन भएका टोल विकास संस्थाहरुको विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">क्र.सं.</th>
		<th width="200">टोलविकास संस्थाको नाम</th>
		<th width="200">ठेगाना</th>
		<th width="200">संस्थाको किसिम (महिला, पुरुष, मिश्रित)</th>
		<th width="200">सम्पर्क नं</th>
		<th width="200">बचत रकम</th>
	</tr>
<?php $t = 1;
foreach ($tole as $val) { ?>
	<tr>
		<td><?= $t; ?></td>
		<td><?= $val['samudayik_sanstha_name'] ?></td>
		<td><?= $val['local_unit'] . ', ' . $val['wada_no']?></td>
		<td><?= $val['sanstha_type'] ?></td>
		<td></td>
		<td><?= $val['revenue_left'] ?></td>
	</tr>
<?php $t++; } ?>
</thead>
</table>

<h3> औसत मासिक पारिवारिक आम्दानी विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">क्र.सं.</th>
		<th width="400">औसत मासिक पारिवारिक आम्दानी विवरण (रुपैयाँमा)</th>
		<th width="200">परिवार संख्या</th>
		<th width="200">प्रतिशत</th>
	</tr>
<?php foreach ($monthly_income as $mon) { 
$tot = $mon['less_than_1000'] + $mon['bet_100_2000'] + $mon['bet_2_3000'] + $mon['bet_3_5000'] + $mon['bet_5_10'] + $mon['bet_10_15'] + $mon['bet_15_25'] + $mon['more'];
	?>
	<tr>
		<td>१</td>
		<td>१००० भन्दा कम</td>
		<td><?= $mon['less_than_1000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['less_than_1000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>१००१ देखि २०००</td>
		<td><?= $mon['bet_100_2000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_100_2000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>२००१ देखि ३०००</td>
		<td><?= $mon['bet_2_3000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_2_3000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>३००१ देखि ५०००</td>
		<td><?= $mon['bet_3_5000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_3_5000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>५००१ देखि १००००</td>
		<td><?= $mon['bet_5_10'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_5_10'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>१०००० देखि १५०००</td>
		<td><?= $mon['bet_10_15'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_10_15'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>७</td>
		<td>१५००० देखि २५०००</td>
		<td><?= $mon['bet_15_25'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_15_25'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>७</td>
		<td>२५००० भन्दा माथि</td>
		<td><?= $mon['more'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['more'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td></td>
		<td><?= $tot; ?></td>
		<td><b>100%</b></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3> औसत मासिक पारिवारिक बचत विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">क्र.सं.</th>
		<th width="400">औसत मासिक पारिवारिक बचत विवरण (रुपैयाँमा)</th>
		<th width="200">परिवार संख्या</th>
		<th width="200">प्रतिशत</th>
	</tr>
<?php foreach ($monthly_savings as $mon) { 
$tot = $mon['zero'] + $mon['bet_5_1000'] + $mon['bet_1_2000'] + $mon['bet_2_3000'] + $mon['bet_3_5000'] + $mon['bet_5_10'] + $mon['more'];
	?>
	<tr>
		<td>१</td>
		<td>शुन्य</td>
		<td><?= $mon['zero'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['zero'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>२</td>
		<td>५०० देखि १०००</td>
		<td><?= $mon['bet_5_1000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_5_1000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>३</td>
		<td>१००१ देखि २०००</td>
		<td><?= $mon['bet_1_2000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_1_2000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>४</td>
		<td>२००१ देखि ३०००</td>
		<td><?= $mon['bet_2_3000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_2_3000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>५</td>
		<td>३००१ देखि ५०००</td>
		<td><?= $mon['bet_3_5000'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_3_5000'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>५००१ देखि १००००</td>
		<td><?= $mon['bet_5_10'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['bet_5_10'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>६</td>
		<td>१०००० भन्दा माथि</td>
		<td><?= $mon['more'] ?></td>
		<td><?php if (empty($tot)){echo "0"; }else{ echo number_format($mon['more'] / $tot*100, 2, '.', ''); } ?>%</td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td></td>
		<td><?= $tot; ?></td>
		<td><b>100%</b></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3> वडा अनुसार विपन्नता स्तरीकरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80" rowspan="2">वडा नं.</th>
		<th width="500" colspan="5">विपन्नता स्तरीकरण</th>
		<th width="200" rowspan="2">कैफियत</th>
	</tr>
	<tr>
		<td>अति गरीब</td>
		<td>गरीब</td>
		<td>मध्यम</td>
		<td>सम्पन्न</td>
		<td>जम्मा</td>
	</tr>
<?php
$v_poor=$poor=$med=$rich=$totl = 0;
for ($q=1; $q < 10; $q++) { 
$poverty = $this->rm_model->ward_wise_poverty_distribution($q);
foreach ($poverty as $pov) {
	$tot = $pov['very_poor'] + $pov['poor'] + $pov['medium'] +$pov['rich'];
	$v_poor+= $pov['very_poor'];$poor+=$pov['poor'];$med+=$pov['medium'];$rich+=$pov['rich'];$totl+=$tot;
	?>
	<tr>
		<td><?= $q; ?></td>
		<td><?= $pov['very_poor'] ?></td>
		<td><?= $pov['poor'] ?></td>
		<td><?= $pov['medium'] ?></td>
		<td><?= $pov['rich'] ?></td>
		<td><?= $tot ?></td>
		<td></td>
	</tr>
<?php } } ?>
	<tr>
		<td>जम्मा</td>
		<td><?= $v_poor ?></td>
		<td><?= $poor ?></td>
		<td><?= $med ?></td>
		<td><?= $rich ?></td>
		<td><?= $totl ?></td>
		<td></td>
	</tr>
</thead>
</table>
<p>*नोट: अति गरीब < १२०००, गरीब १२०००-३६०००, मध्यम ३६०००-३०००००, सम्पन्न > ३००००० (बार्षिक आम्दानी)</p>


<h3>मुख्य पेशा सम्बन्धि विवरण</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">क्र.सं.</th>
		<th width="200" >सरकारी स्थायी</th>
		<th width="200" >सरकारी करार वा अस्थायी</th>
		<th width="200" >अन्य निजी तथा गै स स</th>
		<th width="200" >वेरोजगार</th>
		<th width="200" >विद्यार्थी</th>
		<th width="200" >नावालक</th>
		<th width="200" >सेवा निवृत्त</th>

	</tr>
	<tbody>
		<?php 
foreach ($main_occ as $occ) {
	echo '<tr>';
		echo '<td></td>';
		echo '<td>'.$occ['gov'].'</td>';
		echo '<td>'.$occ['gov_contract'].'</td>';
		echo '<td>'.$occ['private'].'</td>';
		echo '<td>'.$occ['unemp'].'</td>';
		echo '<td>'.$occ['student'].'</td>';
		echo '<td>'.$occ['child'].'</td>';
		echo '<td>'.$occ['retired'].'</td>';
	echo '</tr>';
}

		?>
	</tbody>
</thead>
</table>

<h3> बेरोजगार तथ्यांक :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">क्र.सं.</th>
		<th width="200" >लिङ्ग</th>
		<th width="200" >संख्या</th>
		<th width="200" >कैफियत</th>
	</tr>
<?php
foreach ($unemployed as $key) {
?>
	<tr>
		<td>१</td>
		<td>पुरुष</td>
		<td><?= $key['unemp_male'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>२</td>
		<td>महिला</td>
		<td><?= $key['unemp_female'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>३</td>
		<td>अन्य</td>
		<td><?= $key['unemp_others'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td>जम्मा</td>
		<td></td>
		<td><?= $key['unemp_all'] ?></td>
		<td></td>
	</tr>
<?php } ?>
</thead>
</table>

<h3> दुर संचार सम्बन्धि विवरण :</h3>
	<table  border="1" class="table">
	<thead>
	<tr>
		<th>क्र.सं.</th>
		<th>संचार सेवाको किसिम</th>
		<th>परिमाण</th>
		<th>कैफियत</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($sim_cards as $val) { ?>
		<tr>
			<td>१</td>
			<td>N.T.C</td>
			<td><?//= $val['ntc'] ?></td>
			<td></td>
		</tr>
		<tr>
			<td>२</td>
			<td>NCELL</td>
			<td><?//= $val['ncell'] ?></td>
			<td></td>
		</tr>
		<tr>
			<td>३</td>
			<td>अन्य</td>
			<td><?//= $val['others'] ?></td>
			<td></td>
		</tr>
	<?php } ?>
	</tbody>
	</table>

<h3> पशु धन संख्या र वडा नं सम्बन्धि विवरण :</h3>
	<table border="1" class="table">
	<thead>
	<tr>
		<th width="80">वडा नं.</th>
		<th width="80">किसिम</th>
		<th width="200" ></th>
		<th width="300" colspan="3">संख्या</th>
		<!-- <th width="300" colspan="3">उत्पादन</th> -->
	</tr>
	
	<tr>
		<th></th>
		<th></th>
		<th>स्थानीय</th>
		<th>उन्नत</th>
		<th>जम्मा</th>
		<!-- <th>दुध लि.</th> -->
		<!-- <th>मासु केजी</th> -->
		<!-- <th>उन केजी</th> -->
	</tr>
	<?php
	for ($wrd=1; $wrd < 8; $wrd++) { 
		$pasu = $this->rm_model->pasu_prod_info($wrd);
		foreach ($pasu as $pval) {
	?>
	<tr>
		<td><?= $wrd ?></td>
		<td>गाई/गोरु</td>
		<td><?= $pval['local_cow'] ?></td>
		<td><?= $pval['adv_cow'] ?></td>
		<td><?= $pval['adv_cow'] + $pval['local_cow'] ?></td>
		<!-- <td></td>
		<td></td>
		<td></td> -->
	</tr>
	<tr>
		<td></td>
		<td>भैसी/राँगा</td>
		<td><?= $pval['buff'] ?></td>
		<td>-</td>
		<td><?= $pval['buff'] ?></td>
		<!-- <td></td> -->
		<!-- <td></td>
		<td></td>
		<td></td> -->
	</tr>
	<tr>
		<td></td>
		<td>बोका/ खसी/ बाख्रा</td>
		<td><?= $pval['local_sheep'] ?></td>
		<td><?= $pval['sheep'] ?></td>
		<td><?= $pval['local_sheep'] + $pval['sheep'] ?></td>
		<!-- <td></td> -->
		<!-- <td></td>
		<td></td>
		<td></td> -->
	</tr>
	<tr>
		<td></td>
		<td>सुँगुर / बंगुर</td>
		<td><?= $pval['pig'] ?></td>
		<td>-</td>
		<td><?= $pval['pig'] ?></td>
		<!-- <td></td> -->
		<!-- <td></td>
		<td></td>
		<td></td> -->
	</tr>
	<tr>
		<td></td>
		<td>कुखुरा / हाश</td>
		<td><?= $pval['pig'] ?></td>
		<td>-</td>
		<td><?= $pval['pig'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>मौरी</td>
		<td><?= $pval['bee'] ?></td>
		<td>-</td>
		<td><?= $pval['bee'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>घोडा / खच्चढ</td>
		<td><?= $pval['horse'] ?></td>
		<td>-</td>
		<td><?= $pval['horse'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>अन्य</td>
		<td><?= $pval['others'] ?></td>
		<td>-</td>
		<td><?= $pval['others'] ?></td>
	</tr>
<?php } } ?>

<!--  ends here -->
</div>