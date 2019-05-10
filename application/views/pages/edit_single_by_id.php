<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">
 <?php if($this->session->flashdata('updated_r')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('updated_r').'</p>';
  endif; ?>

<?php if($this->session->flashdata('error_')):
    echo '<p style="text-align: center" class="alert alert-warning">'.$this->session->flashdata('error_r').'</p>';
  endif; ?>

    	<div class="heading_title">
  			<h5 style='text-align: center; color: #337AB7;'>Edit Form: व्यक्तिगत सूचना फारम</h5>
		</div>

    	<form class="form_color" action="<?php echo base_url(); ?>darta/update_single" method="post" id="form">
    		<div class="first_form col-md-12 col-sm-9">
<?php
foreach ($show as $key) {
?>
          <!-- <select name="family_seperated[]" class="form-control col-md-1 mr-2">
            <option><?= $key['family_seperated'] ?></option>
            <option>छ</option>
            <option>छैन</option>
          </select>
          <select name="family_migrated[]" class="form-control col-md-1 mr-2">
            <option><?= $key['family_migrated'] ?></option>
            <option>गएको</option>
            <option>आएको</option>
          </select> -->

<div class="mb-3">
     <div id="acc_copy" class="row col-md-12 ml-2" style="background: lightgrey; padding: 8px;">

     <div class="col-md-3">
     	<label>सदस्यको नाम</label>
          <input type="text" name="family_memb_name_list[]" value="<?= $key['family_memb_name_list'] ?>" class="form-control">
     </div>
     <div class="col-md-2">
     	<label>लिङ्ग</label>
     	<select name="gender[]" class="form-control">
          	<option><?= $key['gender'] ?></option>
            <option>महिला</option>
            <option>पुरुष</option>
            <option>तेश्रो लिङ्गी </option>
          </select>
     </div>
     <div class="col-md-2">
     	<label>घरमुलि संगको नाता</label>
     	<select name="relation_with_head_of_house[]" class="form-control">
            <option><?= $key['relation_with_head_of_house'] ?></option>
            <option>स्वयम</option>
            <option>पिता</option>
            <option>आमा </option>
            <option>पति</option>
            <option>पत्नि</option>
            <option>छोरा </option>
            <option>छोरी</option>
            <option>वुहारी</option>
            <option>नाति </option>
            <option>नातिनी</option>
            <option>पनाती</option>
            <option>पनातिनी </option>

            <option>दाजु </option>
            <option>भाई</option>
            <option>भाउजु</option>
            <option>भाइवुहारी </option>
            <option>भतिजो </option>
            <option>भतिजी</option>
            <option>अन्य </option>
          </select>
     </div>

    <div class="col-md-2"><label>अन्य नाता भए </label>
    <input type="text" name="any_other_relation_with_household[]" value="<?= $key['any_other_relation_with_household']?>" class="form-control mr-2"></div>

<?php if($key['status'] == 'Deceased'){ ?>
    <div class="col-md-3"><label>Status </label><br>
    <button class="btn btn-danger" disabled>मृत्यु भएको</button></div>
<?php } ?>

    <h5 class="p_header col-md-12 mt-3">जन्म विवरण</h5>
    <div class="col-md-2">
      <label>जन्मेको साल</label>
      <input type="text" name="birth_year[]" value="<?= $key['birth_year']?>" class="form-control" autocomplete="off" id="nepali_date">
    </div>

    <div class="col-md-2">
      <label>English Date</label>
      <input type="text" name="dob_english[]" value="<?= $key['dob_english']?>" class="form-control" autocomplete="off" id="english_date">
    </div>

    <div class="col-md-2">
      <label>हालको उमेर</label>
      <input type="text" name="current_age[]" value="<?= $key['current_age']?>" id="current_age" class="current_age form-control">

    </div>
    <div class="col-md-2">
    <label>नागरिकता लिएको: </label>
    <select class="form-control" name="citizenship_certificate_taken[]" >
      <option><?= $key['citizenship_certificate_taken'] ?></option>
      <option>छ</option>
      <option>छैन</option>
      <option>बिदेशी</option>
    </select>
  </div>
  <div class="col-md-2">
    <label>नागरिकता प्रमाण पत्र नं: </label>
    <input type="text" name="citizenship_number[]" class="form-control" value="<?= $key['citizenship_number']?>">
  </div>  
<div class="row col-md-12 mt-4">
	<div class="col-md-3">
    <label>नागरिकता जारी गरेको जिल्ला: </label>
    <!-- <select class="form-control" name="issued_district[]"> -->

    <select name="issued_district[]" class="form-control">
	<option value="">Select</option>
<?php 
$dist = $this->Dropdown_val_model->districts();
foreach($dist as $keyy => $value) { ?>
<option value="<?= $value ?>" <?php if ($key['issued_district'] == $value){ ?> selected="selected"<?php } ?>><?= $value ?></option>
<?php  } ?>
</select>
  	</div>

  <div class="col-md-3">
    <label>विदेशि भए सम्वन्धित देशको नाम</label>
    <input type="text" name="if_foreign_national[]" class="form-control" value="<?= $key['if_foreign_national']?>">
  </div>

  <div class="col-md-3">
    <label>बाबुको नाम </label>
    <input type="text" name="father_name[]" class="form-control" value="<?= $key['father_name']?>">
  </div>
</div>

<div class="row mt-4 ml-1">
  <h5 class="p_header col-md-12">वैवाहिक विवरण</h5>
  <div class="col-md-2">
    <label>वैवाहिक स्थिति </label>
    <!-- <input type="text" name="maritial_status[]" class="form-control" value="<?= $key['maritial_status']?>"> -->
    <select class="form-control" name="maritial_status[]">
    <option><?= $key['maritial_status']?></option>
    <option>अबिबाहित</option>
    <option>बिबाहित</option>
    <option>एकल </option>
    </select>
  </div>
  <div class="col-md-3">
    <label>पति वा पत्निको नाम</label>
    <input type="text" name="husband_or_wife_name[]" class="form-control" value="<?= $key['husband_or_wife_name']?>">
  </div>
  <div class="col-md-2">
    <label>विवाह भएको बर्ष </label>
    <input type="text" name="marriage_year[]" class="form-control" value="<?= $key['marriage_year']?>">
  </div>
  <div class="col-md-2">
    <label>विवाह दर्ता </label>
    <select class="form-control" name="marriage_registered[]">
      <option><?= $key['marriage_registered'] ?></option>
      <option>छ</option>
      <option>छैन</option>
      
    </select>
  </div>
  <div class="col-md-2">
    <label>विवाह दर्ता नं</label>
    <input type="text" name="marriage_registered_no[]" class="form-control" value="<?= $key['marriage_registered_no']?>">
  </div>
  <div class="col-md-2">
    <label>एकल भएमा</label>
    <select class="form-control" name="if_single[]">
      <option><?= $key['if_single'] ?></option>
      <option>सम्वन्ध विच्छेद</option>
      <option>पति वा पत्निको मृत्यु</option>
      
    </select>
  </div>
</div>
<div class="row mt-4 ml-2">
  <h5 class="p_header col-md-12">शिक्षाको विवरण</h5>
  <div class="col-md-3">
    <label>शिक्षाको अवस्था</label>
    <select class="form-control" name="education_status[]">
      <option><?= $key['education_status'] ?></option>
      <option>नावालक</option>
      <option>निरक्षर</option>
      <option>साक्षर</option>
      <option>अनौपचारिक शिक्षा</option>
      <option>प्राथमिक शिक्षा</option>
      <option>नि. माध्यामिक शिक्षा</option>
      <option>माध्यामिक शिक्षा</option>
      <option>उ मा वि </option>
      <option>स्नातक</option>
      <option>स्नातकोत्तर</option>
      <option>विद्दावारिधी</option>
    </select>
  </div>
  <div class="col-md-3">
    <label>हालको अवस्था</label>
    <select class="form-control" name="current_situation[]">
      <option><?= $key['current_situation'] ?></option>
      <option>नियमित विद्यालय जाने गरेको</option>
      <option>भर्ना नभएको</option>
      <option>विद्यालय जान छोडेको</option>
    </select>
  </div>
  <div class="col-md-3">
    <label>शैक्षिक निकाय</label>
    <select class="form-control" name="education_institution[]">
    	<option><?= $key['education_institution'] ?></option>
      <option>सरकारी</option>
      <option>निजि</option>
    </select>
  </div>
  <div class="col-md-3">
    <label>शैक्षिक निकाय रहेको स्थान</label>
    <select class="form-control" name="institution_location[]">
      <option><?= $key['institution_location'] ?></option>
      <option>गाउँपालिका भित्र</option>
      <option>गाउँपालिका वाहिर</option>
    </select>
  </div>
</div>
  <div class="row mt-4 ml-2">
  <h5 class="p_header col-md-12">रोजगारीको विवरण</h5>
  <div class="col-md-3">
    <label>रोजगारीको अवस्था</label>
    <select class="form-control" name="employment_status[]">
      <option><?= $key['employment_status'] ?></option>
      <option>सरकारी स्थायी</option>
      <option>सरकारी करार वा अस्थायी</option>
      <option>अन्य निजी तथा गै स स</option>
      <option>वेरोजगार</option>
      <option>विद्यार्थी</option>
      <option>नावालक</option>
      <option>सेवा निवृत्त</option>
    </select>
  </div>
  <div class="col-md-3">
    <label class="control-label"> मुख्य पेशा :</label>
    <select name="main_job[]" class="form-control">
    <option><?= $key['main_job'] ?></option>
    <option value="लघुउद्यम">लघुउद्यम</option>
    <option value="कृषि">कृषि</option>
    <option value="व्यवसाय">व्यवसाय</option>
    <option value="नोकरी">नोकरी</option>
    <option value="मजदुरी">मजदुरी</option>
    <option value="विदेश">विदेश</option>
    <option value="शिक्षण">शिक्षण</option>
    <option value="सेवा निवृत्त">सेवा निवृत्त</option>
    </select>
  </div>
  <div class="col-md-3">
  <label class="control-label fsize"> सहायक पेशा भए :</label>
  <select name="if_any_side_job[]" class="form-control">
  <option><?= $key['if_any_side_job'] ?></option>
  <option value="लघु उद्यम">लघु उद्यम</option>
  <option value="कृषि">कृषि</option>
  <option value="व्यवसाय">व्यवसाय</option>
  <option value="नोकरी">नोकरी</option>
  <option value="मजदुर">मजदुर</option>
  <option value="विदेश">विदेश</option>
  <option value="शिक्षण">शिक्षण</option>
  <option value="केहि पनि नभएको">केहि पनि नभएको</option>
  </select>
  </div>
  <div class="col-md-3">
    <label>दक्ष जनशक्ति हो भने के सम्बन्धी</label>
    <input type="text" name="if_skilled_manpower[]" class="form-control" value="<?= $key['if_skilled_manpower']?>">
  </div>
  <div class="col-md-3 mt-2">
    <label>बैङ्क खाता</label>
    <select class="form-control" name="bank_account[]">
      <option><?= $key['bank_account'] ?></option>
      <option>छ</option>
      <option>छैन</option>
    </select>
  </div>
  <div class="col-md-3 mt-2">
    <label>आर्थिक कारोबार भएको संस्था</label>
    <select class="form-control" name="financial_transaction_bank_or_org[]">
      <option><?= $key['financial_transaction_bank_or_org'] ?></option>
      <option>बैंक</option>
      <option>अन्य बितिय संस्था</option>
      <option>सहकारी</option>
    </select>
  </div>
  </div>
  <div class="row mt-4 ml-2"> 
  <h5 class="p_header col-md-12">अपाङ्गता विवरण</h5>
  <div class="col-md-3">
    <label>अपाङ्गता </label>
    <select class="form-control" name="disability[]">
     <option><?= $key['disability'] ?></option>
      <option>छ</option>
      <option>छैन</option>
    </select>
  </div>
  <div class="col-md-3">
    <label>अपाङ्गगता प्रकार </label>
      <select name="disability_type[]" class="form-control">
      <optio>Select</option>
        <option><?= $key['disability_type'] ?></option>
        <option value="पूर्ण अपाङ्गता (रातो)">पूर्ण अपाङ्गता (रातो)</option>
        <option value="अति अशक्त (निलो)">अति अशक्त (निलो)</option>
        <option value="मध्यम अपाङ्गता (पहेलो)">मध्यम अपाङ्गता (पहेलो)</option>
        <option value="सामान्य अपाङ्गता (सेतो)">सामान्य अपाङ्गता (सेतो)</option>
      </select>
  </div>
  <div class="col-md-3">
    <label>अपाङ्गता भएको शरीरको अङ्ग</label>
    <input type="text" name="disabillity_body_part[]" value="<?= $key['disabillity_body_part'] ?>" class="form-control">
  </div>
  <div class="col-md-3">
    <label>अपाङ्गता परिचय पत्र लिएको</label>
    <select class="form-control" name="disability_id_card_taken[]">
      <option><?= $key['disability_id_card_taken'] ?></option>
      <option>छ</option>
      <option>छैन</option>
    </select>
    </div>
</div>
<div class="row col-md-12 mt-4 ml-1">
    <h5 class="p_header col-md-12">दीर्घकालिन रोग विवरण</h5>
    <div class="col-md-3">
    <label>कुनै किसिमको दीर्घकालिन रोग</label>
    <select class="form-control" name="any_sustained_illness[]">
      <option><?= $key['any_sustained_illness'] ?></option>
      <option>छ</option>
      <option>छैन</option>
    </select>
    </div>

    <div class="col-md-3">
    <label>छ भने कुन प्रकारको रोग</label>
    <select class="form-control" name="illness_type[]">
      <option><?= $key['illness_type'] ?></option>
      <option>छारेरोग </option>
      <option>दम </option>
      <option>मुटुरोग  </option>
      <option>दीर्घ मृगौला रोग </option>
      <option>मधुमेह  </option>
      <option>एच अाई भि </option>
      <option>क्यान्सर  </option>
    </select>
    </div>
</div>
    <div class="row mt-4 ml-2">
  <h5 class="p_header col-md-12">बालबालिकाको हकमा कामदारको रुपमा घरपरिवारवाट बाहिर</h5>
    <div class="col-md-3">
    <label>बसेको </label>
    <select class="form-control" name="child_labour_outside_home[]">
      <option><?= $key['child_labour_outside_home'] ?></option>
      <option>छ</option>
      <option>छैन</option>
    </select>
    </div>

    <div class="col-md-3">
    <label>बसेको छ भने</label>
    <select class="form-control" name="child_stay_outside_home_as_labour[]">
      <option><?= $key['child_stay_outside_home_as_labour'] ?></option>
      <option>गाउँपालिका भित्र</option>
      <option>गाउँपालिका बाहिर</option>
    </select>
    </div>
    <div class="col-md-3" id="labour_type">
    <label>कामदारको प्रकार</label>
    <select class="form-control" name="child_labour_work[]">
    <option><?= $key['child_labour_work'] ?></option>
      <option>घरेलु कामदार</option>
      <option>होटेल तथा रेस्टुरेन्ट</option>
      <option>उद्योग तथा ब्यबसाय</option>
      <option>अन्य</option>
    </select>
    </div>
</div>
<div class="row col-md-12 mt-4 ml-1">
  <h5 class="p_header col-md-12">मोबाइलको प्रयोग विवरण</h5>
    <div class="col-md-3">
    <label>क्लव/सामाजिक स‌घ संस्थामा अावद्ध</label>
    <select name="enrolled_in_club_or_social_org[]" class="form-control">
          <option><?= $key['enrolled_in_club_or_social_org'] ?></option>
          <option >क्लव</option>
          <option >वन</option>
          <option >उपभोक्ता समुह</option>
          <option >अामा समुह</option>
          <option >सहकारी</option>
          <option >अन्य संस्था</option>
          <option >कुनैमा नभएको</option>
    </select>
    </div>
    <div class="col-md-3">
    <label style="height: 49px">मोवाइल प्रयोग गर्ने गरेको </label>
    <select id="mobile_use" class="mobile_use form-control" name="mobile_used[]">
      <option><?= $key['mobile_used'] ?></option>
      <option value="छ">छ</option>
      <option value="छैन">छैन</option>
    </select>
    </div>
    <div id="mobile_set" class="mobile_set col-md-3">
    <label style="height: 49px">मोवाइल प्रयोग गर्ने गरेको भए</label>
    <select class="form-control" name="mobile_set_used[]">
      <option><?= $key['mobile_set_used'] ?></option>
      <option>सामान्य सेट</option>
      <option>स्मार्ट सेट</option>
    </select>
    </div>
    <div id="sim_card" class="sim_card col-md-3">
    <label>प्रयोग गर्ने गरेको सिम तथा रिम कार्ड</label>
    <select class="form-control" name="sim_card_used[]">
      <option><?= $key['sim_card_used'] ?></option>
      <option>NTC</option>
      <option>NCELL</option>
      <option>अन्य</option>
    </select>
    </div>
</div>
<div class="row mt-4 ml-1">
  <h5 class="p_header col-md-12">अन्य विवरण</h5>
    <div class="col-md-3">
    <label>सामाजिक सञ्जालमा अावद्धता</label>
    <select class="form-control" name="on_social_network[]">
      <option><?= $key['on_social_network'] ?></option>
      <option>छ</option>
      <option>छैन</option>
    </select>
    </div>

    <div class="col-md-4">
    <label>आफनो स्वामित्वमा भएका कुनै सवारी साधन: </label>
    <select class="form-control" name="vehicle_possessed[]">
      <option><?= $key['vehicle_possessed'] ?></option>
      <option>मोटर साइकल /स्कुटी</option>
      <option>जीप/ कार</option>
      <option>बस</option>
      <option>ट्र्याक्टर</option>
      <option>ट्रक</option>
      <option>डोजर जेसिवी</option>
      <option>साइकल</option>
      <option>अन्य</option>
      <option>नभएको</option>
    </select>  
  </div>

  <div class="col-md-2">
  <label>छोराको संख्या</label>
  <input type="text" name="son_count[]" class="form-control" value="<?= $key['son_count']?>">
  </div>

  <div class="col-md-2">
  <label>छोरीको संख्या</label>
  <input type="text" name="daughter_count[]" class="form-control" value="<?= $key['daughter_count']?>">
  </div>
</div>

<div class="row mt-4 ml-1">
  
  <div class="col-md-3">
  <label style="height: 49px;">के तपाई गर्भवति हुनुहुन्छ ?</label>
  <select class="form-control" name="are_you_pregnent[]">
    <option><?= $key['are_you_pregnent'] ?></option>
    <option>छ</option>
    <option>छैन</option>
  </select>
  </div>

  <div class="col-md-3">
  <label style="height: 49px;">गर्भवति भए कति महिना</label>
  <input type="text" name="pregnent_month[]" class="form-control" value="<?= $key['pregnent_month']?>">
  </div>

  <div class="col-md-3">
  <label>गर्भवती भए पुर्व प्रसुति जाँच प्रोटोकल अनुसार जाँच भएको</label>
  <select class="form-control" name="checkup_as_protocol[]">
    <option><?= $key['checkup_as_protocol'] ?></option>
    <option>छ</option>
    <option>छैन</option>
  </select>
  </div>

  <div class="col-md-3">
  <label style="height: 49px;">नियमित आइरन चक्कि खाइ राखेको</label>
  <select class="form-control" name="iron_tablet_regularly[]">
    <option><?= $key['iron_tablet_regularly'] ?></option>
    <option>छ</option>
    <option>छैन</option>
  </select>
  </div>
</div>
<div class="row mt-4 ml-1">
  <div class="col-md-3">
  <label>नियमित जुकाको औषधि खाए नखाएको</label>
  <select class="form-control" name="yucca_medicine_taken_regularly[]">
    <option><?= $key['yucca_medicine_taken_regularly'] ?></option>
    <option>छ</option>
    <option>छैन</option>
  </select>
  </div>

  <div class="col-md-3">
  <label>टि टी खोप लगाएको</label>
  <select class="form-control" name="tt_vaccine_taken[]">
    <option><?= $key['tt_vaccine_taken'] ?></option>
    <option>छ</option>
    <option>छैन</option>
  </select>
  </div>

  <div class="col-md-3">
  <label>सुत्केरीको अवस्था</label>
  <select class="form-control" name="sutkeri_ko_awasta[]">
    <option><?= $key['sutkeri_ko_awasta'] ?></option>
    <option>छ</option>
    <option>छैन</option>
  </select>
  </div>

  <div class="col-md-3">
  <label>सुत्केरी अवस्थामा आइरन चक्कि सेवन गर्नेगरेको</label>
  <select class="form-control" name="iron_chakki_taken_during_sutkeri[]">
    <option><?= $key['iron_chakki_taken_during_sutkeri'] ?></option>
    <option>छ</option>
    <option>छैन</option>
  </select>
  </div>

  <div class="col-md-3">
  <label>सुत्केरी भएको स्थान</label>
  <select class="form-control" name="sutkeri_bhayeko_sthan[]">
    <option><?= $key['sutkeri_bhayeko_sthan'] ?></option>
    <option>स्वास्थ्य संस्था</option>
    <option>घरमा</option> 
    <option>अन्य</option>
  </select>
  </div>

  <div class="col-md-3">
  <label>शिशुको खोपको अवस्था</label>
  <select class="form-control" name="child_vaccine_status[]">
    <option><?= $key['child_vaccine_status'] ?></option>
    <option>नियमित खोप लगाएको</option>
    <option>खोप लगाउन छुटेको वा वाकी रहेको</option> 
    <option>थाहा नभएको</option>
  </select>
  </div>

  <div class="col-md-3">
    <label>खोप लगाउन छुटनुको कारण</label>
    <input type="text" name="vaccine_missed_reason[]" class="form-control" value="<?= $key['vaccine_missed_reason']?>">
  </div>
</div>

</div>
<input type="hidden" name="sec_table_id[]" value="<?= $key['id']?>">
    </div></div>
<?php } ?>
		
	<div class="offset-5 col-md-7 mt-5 mb-5">
	<input type="hidden" name="primary_id" value="<?= $link_id ?>">
	<input class="btn btn-info btn-sm" type="submit" name="update_single" value="उपडेट गर्नुहोस">
    <input class="btn btn-danger btn-sm" type="reset" value="रद गर्नुहोस" id="reset">
    </div>
</form>
</div>
</div>

<script src="<?php echo base_url(); ?>assets_front/nepali/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.css" />
<script type="text/javascript">
	$(document).ready(function(){
	$('#nepali_date').nepaliDatePicker({
		npdMonth: true,
        npdYear: true,
        npdYearCount: 40,
		ndpEnglishInput: 'eng_date'
		});
	$('#eng_date').change(function(){
			$('.nepali_date').val(AD2BS($('.eng_date').val()));
		});

	});
</script>

