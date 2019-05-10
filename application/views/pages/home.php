
<!-- hide and show -->
<div>
<div class="container-fluid  paralax-back">
	<div class="row">
		<div class="col-md-12">
			<div class="map wow bounceInLeft" data-wow-duration="1s" data-wow-delay="0s"></div>
			<div class="flag wow bounceInRight" data-wow-duration="1s" data-wow-delay="0s""></div>
			<div class="chandra wow rollIn" data-wow-duration="1s" data-wow-delay="1s""></div>
			<div class="surya wow rollIn" data-wow-duration="1s" data-wow-delay="1s""></div>

			<div id="chartContainer">
				<!-- <a href="<?= base_url()?>pages/view_charts" class="btn btn-primary" target="_blank"><i class="fa fa-external-link"></i>View Charts</a> -->
			</div>

			<?php if($this->session->flashdata('login_success')):
    		echo '<p style="text-align: center; width: 300px; float: right;" class="alert alert-success" id="alert_msgs">'.$this->session->flashdata('login_success').'</p>';
  			endif; ?>
  			<?php if($this->session->flashdata('login_error')):
    		echo '<p style="text-align: center; width: 450px; float: right;" class="alert alert-danger" id="alert_msg">'.$this->session->flashdata('login_error').'</p>';
  			endif; ?>
  			<?php if($this->session->flashdata('logout')):
    		echo '<p style="text-align: center; width: 300px; float: right;" class="alert alert-light" id="alert_msg">'.$this->session->flashdata('logout').'</p>';
  			endif; ?>
  			<?php if($this->session->flashdata('session_ended')):
    		echo '<p style="text-align: center; width: 450px; float: right;" class="alert alert-secondary" id="alert_msg">'.$this->session->flashdata('session_ended').'</p>';
  			endif; ?>

			<div class="row">
				<div class="col-lg-6 top-heading-back">
					<div class="top-heading">
						<h1><i class="gau"><u>दुप्चेश्वर</u></i>
							<i class='palika'><u> गाउँपालिका</u></i><u style="color: #b5f15b;"> प्रोफाइल
						</u></h1>
					</div>
					<div class="top-para">
						<p>नावा र कोट शब्द  मिलि बनेको ऐतिहासिक जिल्ला नुवाकोटमा  यसको नाम  जस्तै वरिपरी नौ वटा पहाडको टुप्पामा धार्मिक महत्वका मन्दिरहरुले सु सज्जित भै रहनु हो | यसै मध्येका दुप्चेस्वर महादेव रहेको यस  दुप्चेस्वर गाउँ पालिका ऐतिहासिक ,धार्मिक र पर्यटकीय हिसाबले अग्रणी रहेको छ |</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$hou = $this->chart_model->get_household_by_gender(); 
foreach ($hou as $value) {
 $femaleh = $value['महिला'];
  $maleh = $value['पुरुष'];
  $othh = $value['अन्य'];
  $toth = $femaleh + $maleh + $othh;
}
$pop = $this->chart_model->get_population_by_gender(); 
foreach ($pop as $key) {
  $female = $key['महिला'];
  $male = $key['पुरुष'];
  $oth = $key['अन्य'];
  $tot = $female + $male + $oth;
}
?>

<div class=" info-back">
	<div class="container">
		<div class="row ">
			<div class="col-lg-3 col-md-6 col-sm-6 ">
				<div class=" info-round-1">
					<div class="info-icon-1">
						<img src="<?= base_url(); ?>assets_front/image/home.png">
					</div>
					<div class="info-heading-1">
						<h4>HOUSEHOLD</h4>
					</div>
					<div class='count-num'>
						<h4><span class='numscroller' data-min='1' data-max='<?= $toth; ?>' data-delay='5' data-increment='10'><?= $toth; ?></span></h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div id="info" class=" info-round-2">
					<div class="info-icon-2 ">
						<img src="<?= base_url(); ?>assets_front/image/female-house.png">
					</div>
					<div class="info-heading-2">
						<h4 >FEMALE HOUSE</h4>
					</div>
					<div class='count-num'>
						<h4><span class='numscroller' data-min='1' data-max='<?= $femaleh?>' data-delay='5' data-increment='10'><?= $femaleh?></span></h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class=" info-round-3">
					<div class="info-icon-3">
						<img src="<?= base_url(); ?>assets_front/image/male.png">
					</div>
					<div class="info-heading-3">
						<h4>MALE</h4>
					</div>
					<div class='count-num'>
						<h4><span class='numscroller' data-min='1' data-max='<?= $male?>' data-delay='5' data-increment='10'><?= $male?></span></h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class=" info-round-4">
					<div class="info-icon-4">
						<img src="<?= base_url(); ?>assets_front/image/female.png">
					</div>
					<div class="info-heading-4">
						<h4>FEMALE</h4>
					</div>
					<div class='count-num'>
						<h4><span class='numscroller' data-min='1' data-max='<?= $female?>' data-delay='5' data-increment='10'><?= $female?></span></h4>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 info-total">
							<div>
								<h3>TOTAL POPULATION</h3>
							</div>
							<div class='total-count'>
								<h4><span class='numscroller' data-min='1' data-max='<?= $tot?>' data-delay='5' data-increment='20'><?= $tot?></span></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="chart-list-back">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div id="chartContainer3" class="chart" style="height: 350px; width: 100%; border: 1px solid grey;"></div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div id="chartContainer4" class="chart" style="height: 350px; width: 100%;border: 1px solid grey;"></div>
			</div> -->
			<!-- <div class="col-md-4">
				<div id="chartContainer5" class="chart" style="height: 300px; width: 100%;border: 1px solid grey;"></div>
			</div> -->
		<!-- </div>
	</div>
</div> -->

<div class="ex">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 mt-5">
				<div >
					<img class="chart-img" src="<?= base_url(); ?>assets_front/image/chart.png">
				</div>
			</div>
			<div class='col-lg-6 col-md-6 col-sm-12 mt-5'>
				<div class="topic-back-show">
					<div class="row">
						<div class="col-lg-12">
							<div class="img-1 topic-back-image">
								<!-- <img src="image/background.jpg"> -->
							</div>
						</div>
						<div class="col-lg-12">
							<div class="topic-icon">
								<img src="<?= base_url(); ?>assets_front/image/court.png">
								<span>Digital Governance</span>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="topic-info-show show">
								<p>Digital governance is a framework for establishing accountability, roles, and decision-making authority for an organization’s digital presence—which means its websites, mobile sites, social channels, and any other Internet and Web-enabled products and services. Having a well-designed digital governance framework minimizes the number of tactical debates regarding the nature and management of an organization’s digital presence by making clear who on your digital team has decision-making authority.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
			<div class="topic-back">
				<div class="row">
					<div class="col-lg-12">
						<div class="topic-icon">
							<img src="<?= base_url(); ?>assets_front/image/rep.png">
							<span>Smart Representatives</span>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="topic-info">
							<p>Smart leaders understand how to use their gifts in effective ways. They identify opportunities where they can improve the lives of others and benefit the greater good. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="topic-back">
				<div class="row">
					<div class="col-lg-12">
						<div class="topic-icon">
							<img src="<?= base_url(); ?>assets_front/image/citizen.png">
							<span>Smart Citizen</span>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="topic-info">
							<p>Smart Citizen uses the singular most ubiquitous piece of technology that most citizens have – a smartphone, to connect people with their City and the City to its’ people to help improve the environment, service levels and customer satisfaction. Smart Citizen comprises of four components: Citizen Engagement, City Control, Field Agent and Smart Citizen Integration. Click on the sections below to learn more.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="topic-back">
				<div class="row">
					<div class="col-lg-12">
						<div class="topic-icon">
							<img src="<?= base_url(); ?>assets_front/image/city.png">
							<span>Smart Nagar</span>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="topic-info">
							<p>Gaun Palika Profile is the complete data & information reference package about our village, community, population, indegenous groups, householders, and local level.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="topic-back">
				<div class="row">
					<div class="col-lg-12">
						<div class="topic-icon">
							<img src="<?= base_url(); ?>assets_front/image/catalog.png">
							<span>Dynamic Catalogue</span>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="topic-info">
							<p>Gaun Palika Profile is the complete data & information reference package about our village, community, population, indegenous groups, householders, and local level.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="chart-show">
	<div class="container ">
		<div class="row">
			<div class="col-lg-12">
				<div id="chartContainer2"></div>
			</div>
		</div>
	</div>
</div> -->

<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>

