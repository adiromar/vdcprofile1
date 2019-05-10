<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">

 <?php if($this->session->flashdata('updated')):
    echo '<p style="text-atdgn: center" class="alert alert-success">'.$this->session->flashdata('updated').'</td>';
  endif; ?>

<?php if($this->session->flashdata('error')):
    echo '<p style="text-atdgn: center" class="alert alert-warning">'.$this->session->flashdata('error').'</td>';
  endif; ?>
<style type="text/css">
  p{
    color: blue;
  }
  td{
    tdst-style: none;
  }
  .head_bold ul td{
    font-weight: 800;
    border-bottom: 2px sotdd grey;
    margin-bottom: 8px;
    margin-top: 8px;
    height: 25px;
    tdne-height: 10px;
  }

  .data_head ul td{
    border-bottom: 2px sotdd grey;
    margin-bottom: 8px;
    margin-top: 8px;
    height: 25px;
    tdne-height: 10px;
  }
#wrappers {
  margin-left: 200px;
}
#contnts {
  float: right;
  width: 100%;
  background-color: #CCF;
}
#sidbar {
  float: left;
  width: 200px;
  margin-left: -200px;
  background-color: #FFA;
}
#cleared {
  clear: both;
}
</style>
 <div class="heading_title">
  <h5 style='text-atdgn: center; color: #337AB7;'>View: व्यक्तिगत सूचना फारम</h5>
</div>

  <form class="form_color" action="<?php echo base_url(); ?>darta/update_personal" method="post" id="form">

  		<div class="first_form col-md-12 col-sm-9">
<?php
// echo $dat_id;
// echo '<pre>';
// echo $info[0]['household_name'];
foreach ($info as $key) {
	
?>
		<div class="row col-md-12 ml-1">
			<legend class="legend-blue-color">विवरण</legend>
				<div class="col-md-3">
					<label>गणकको नाम: </label>
					<td><?= $key['surveyer_name'];?></td>
				</div>

				<div class="col-md-3">
					<label>जलाधार क्षेत्रको नाम: </label>
					<td><?= $key['jaladhar_name'];?></td>
				</div>

				<div class="col-md-2 col-xs-4">
					<label>वडा नं: </label>
					<td><?= $key['ward_no'];?></td>
				</div>

				<div class="col-md-3">
					<label>फाराममा भएको क्र सं: </label>
					<td><?= $key['sn_in_form'];?></td>
				</div>
		</div>

		<div class="row col-md-12 mt-4 ml-1">
			<div class="col-md-3">
					<label>घर नं: </label>
					<td><?= $key['house_no'];?></td>
			</div>

			<div class="col-md-3">
					<label>घरमुलीको नाम: </label>
					<td><?= $key['household_name'];?></td>
			</div>
		</div>
<?php } ?>
		<div class="row col-md-12 mt-4 ml-2">
			 <div class="card col-md-12">
    <div class="card-header" id="headingsdOne">
      <h5 class="mb-0">
        <a class="btn btn-tdnk acc_color" data-toggle="collasdpse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
          पारिवारिक सदस्यको विवरण 
        </a>
        <p class="float-right">
        <a class="btn btn-success btn-sm plus_color" id="add_rela">+</a>
        <!-- <a class="btn btn-danger btn-sm plus_color" id="del_relation">-</a></td> -->
      </h5>
    </div>

<div class="row" id="wrappers">
  <div class="head_bold mt-4" id="sidbar">
<tr>
  <th>क्र सं </th>
  <th>सदस्यको नाम </th>
  <th>लिङ्ग</th>
  <th>घरमुली सँगको नाता</th>
  <th>परिवार छुट्टीएको </th>
  <th>बसाई सराई </th>

  <th>अन्य नाता भए </th>
  <th>जन्मेको साल</th>
  <td>हालको उमेर</th>
  <th>नागरिकता लिएको:</th>
  <th>नागरिकता प्रमाण पत्र नं</th>
  <th>नागरिकता जारी गरेको जिल्ला</th>
  <th>विदेशि भए सम्वन्धित देशको नाम</th>
  <th>बाबुको नाम </th>
  <th>वैवाहिक विवरण</th>
  <th>पति वा पत्निको नाम</th>
  <th>विवाह भएको बर्ष </th>
  <th>विवाह दर्ता </th>
  <th>विवाह दर्ता नं</th>
  <th>एकल भएमा</th>
  <th>शिक्षाको अवस्था</th>
  <th>हालको अवस्था</th>
  <th>शैक्षिक निकाय</th>
  <th>शैक्षिक निकाय रहेको स्थान</th>
  <th>रोजगारीको अवस्था</th>
  <th>मुख्य पेशा</th>
  <th>सहायक पेशा भए</th>
  <th>दक्ष जनशक्ति हो भने के सम्बन्धी</th>
  <th>लिङ्ग</th>
</tr></div>

<div>
<!-- <div id="contnts"> -->
<?php $k = 1;
foreach ($show as $key) {
?>
<div class="data_head mt-4 col-md-3" id="contnts">
  <tr>
          <td><?= $k; ?></td>
          <td><?= $key['family_memb_name_list']; ?></td>
          <td><?= $key['gender'] ?></td>
          <td><?= $key['relation_with_head_of_house'] ?></td>
          <td><?= $key['family_seperated'] ?></td>
          <td><?= $key['family_migrated'] ?></td>
          <td><?= $key['any_other_relation_with_household'] ?></td>
          <td><?= $key['birth_year']?></td>
          <td><?= $key['current_age']?></td>
          <td><?= $key['citizenship_certificate_taken']?></td>
          <td><?= $key['citizenship_number']?></td>
          <td><?= $key['issued_district']?></td>
          <td><?= $key['if_foreign_national']?></td>
          <td><?= $key['father_name']?></td>
          <td><?= $key['maritial_status']?></td>
          <td><?= $key['husband_or_wife_name']?></td>
          <td><?= $key['marriage_year']?></td>
          <td><?= $key['marriage_registered']?></td>
          <td><?= $key['marriage_registered_no']?></td>
          <td><?= $key['if_single']?></td>
          <td><?= $key['education_status']?></td>
          <td><?= $key['current_situation']?></td>
          <td><?= $key['education_institution']?></td>
          <td><?= $key['institution_location']?></td>
          <td><?= $key['employment_status']?></td>
          <td><?= $key['main_job']?></td>

          <td><?= $key['if_any_side_job']?></td>
          <td><?= $key['if_skilled_manpower']?></td>
          <td><?= $key['bank_account']?></td>
          <td><?= $key['financial_transaction_bank_or_org']?></td>
          <td><?= $key['disability']?></td>
          <td><?= $key['disability_type']?></td>
          <td><?= $key['disabillity_body_part']?></td>
          <td><?= $key['disability_id_card_taken']?></td>
          <td><?= $key['any_sustained_illness']?></td>
          <td><?= $key['illness_type']?></td>
          <td><?= $key['child_labour_outside_home']?></td>
          <td><?= $key['child_stay_outside_home_as_labour']?></td>

          <td><?= $key['child_labour_work'] ?></td>
          <td><?= $key['enrolled_in_club_or_social_org'] ?></td>
          <td><?= $key['mobile_used'] ?></td>
          <td><?= $key['mobile_set_used'] ?></td>
          <td><?= $key['sim_card_used'] ?></td>
          <td><?= $key['on_social_network'] ?></td>
          <td><?= $key['vehicle_possessed'] ?></td>
          <td><?= $key['son_count'] ?></td>
          <td><?= $key['daughter_count'] ?></td>
          <td><?= $key['are_you_pregnent'] ?></td>
          <td><?= $key['pregnent_month'] ?></td>
          <td><?= $key['checkup_as_protocol'] ?></td>
          <td><?= $key['iron_tablet_regularly'] ?></td>
          <td><?= $key['yucca_medicine_taken_regularly'] ?></td>
          <td><?= $key['tt_vaccine_taken'] ?></td>
          <td><?= $key['sutkeri_ko_awasta'] ?></td>
          <td><?= $key['iron_chakki_taken_during_sutkeri'] ?></td>
          <td><?= $key['sutkeri_bhayeko_sthan'] ?></td>

          <td><?= $key['child_vaccine_status'] ?></td>
          <td><?= $key['vaccine_missed_reason'] ?></td>
        </tr>
</div>
<!-- </div> -->
<?php $k++;  } ?>
</div>
<div id=cleared></div>
	</div>

</div>
</div>
