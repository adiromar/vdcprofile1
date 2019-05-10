
	$(document).ready(function(){
	$("#rem_col").click(function(){
		// alert("sds");
		$( "#added_class" ).remove();
		$( "#add_col" ).show();
		return false;
	});

	var no = foo;
	$("#add_rela").click(function(){
		// alert("hello");
    var rem = "#card" + foo;

		var new_rel = '<div id="card'+no+'"><div id="info_body'+no+'" class="row col-md-12 mb-4">\
          <input type="text" name="family_sn_ed[]" value="'+no+'" class="form-control col-md-1 mr-2" style="height: 40px;">\
          <input type="text" name="family_memb_name_list_ed[]" class="form-control col-md-3 mr-2" style="height: 40px;">\
          <select name="gender_ed[]" class="form-control col-md-1 mr-2" required>\
            <option value="">Select</option>\
            <option>महिला</option>\
            <option>पुरुष</option>\
            <option>तेश्रो लिङ्गी </option>\
          </select>\
          <select name="relation_with_head_of_house_ed[]" class="form-control col-md-2 mr-2">\
            <option value="">Select</option>\
            <option>स्वयम</option>\
            <option>पिता</option>\
            <option>आमा </option>\
            <option>पति</option>\
            <option>पत्नि</option>\
            <option>छोरा </option>\
            <option>छोरी</option>\
            <option>वुहारी</option>\
            <option>नाति </option>\
            <option>नातिनी</option>\
            <option>पनाती</option>\
            <option>पनातिनी </option>\
\
            <option>दाजु </option>\
            <option>भाई</option>\
            <option>भाउजु</option>\
            <option>भाइवुहारी </option>\
            <option>भतिजो </option>\
            <option>भतिजी</option>\
            <option>अन्य </option>\
          </select>\
         <input type="text" name="household_number[]" class="form-control col-md-2" style="height: 40px;">\
          <a class="btn btn-link collapsed acc_color" data-toggle="collapse" data-target="#collapse_edit'+no+'" aria-expanded="false" aria-controls="collapseTwo">\
          <i style="font-size: 35px;" class="fa fa-angle-down"></i> </a>\
          <a class="btn btn-danger btn-sm plus_color" id="del_relation'+no+'">-</a>\
      </div>\
		<div id="collapse_edit'+no+'" class="collapse mb-3" aria-labelledby="headingTwo" data-parent="#accordion">\
     <div id="acc_copy" class="row col-md-12 ml-2" style="background: lightgrey; padding: 8px;">\
    <div class="col-md-3"><label>अन्य नाता भए </label>\
    <input type="text" name="any_other_relation_with_household[]" class="form-control mr-2"></div>\
    <h5 class="p_header col-md-12">जन्म विवरण</h5>\
    <div class="col-md-2">\
      <label>जन्म मिति</label>\
      <input type="text" name="birth_year_ed[]" class="bod-picker form-control">\
    </div>\
    <div class="col-md-2">\
      <label>हालको उमेर</label>\
      <input type="text" name="current_age_ed[]" class="form-control">\
    </div>\
    <div class="col-md-2">\
    <label>नागरिकता लिएको: </label>\
    <select class="form-control" name="citizenship_certificate_taken_ed[]">\
      <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
      <option>बिदेशी</option>\
    </select>\
  </div>\
  <div class="col-md-3">\
    <label>नागरिकता प्रमाण पत्र नं: </label>\
    <input type="text" name="citizenship_number_ed[]" class="form-control">\
  </div>\
  \
<div class="row col-md-12 mt-4">\
  <div class="col-md-3">\
    <label>नागरिकता जारी गरेको जिल्ला: </label>\
    <select class="form-control" name="issued_district_ed[]">\
      <option>काठमाडौँ</option>\
      \
    </select>\
  </div>\
  <div class="col-md-3">\
    <label>विदेशि भए सम्वन्धित देशको नाम</label>\
    <input type="text" name="if_foreign_national_ed[]" class="form-control">\
  </div>\
\
  <div class="col-md-3">\
    <label>बाबुको नाम </label>\
    <input type="text" name="father_name_ed[]" class="form-control">\
  </div>\
</div>\
\
<div class="row mt-4 ml-1">\
  <h5 class="p_header col-md-12">वैवाहिक विवरण</h5>\
  <div class="col-md-3">\
    <label>वैवाहिक स्थिति </label>\
    <select class="form-control" name="maritial_status_ed[]">\
    <option value="">Select</option>\
    <option>बिबाहित</option>\
    <option>एकल </option>\
    </select>\
  </div>\
  <div class="col-md-3">\
    <label>पति वा पत्निको नाम</label>\
    <input type="text" name="husband_or_wife_name_ed[]" class="form-control">\
  </div>\
  <div class="col-md-2">\
    <label>विवाह भएको साल </label>\
    <input type="text" name="marriage_year_ed[]" class="form-control">\
  </div>\
  <div class="col-md-2">\
    <label>विवाह दर्ता </label>\
    <select class="form-control" name="marriage_registered_ed[]">\
    <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
      \
    </select>\
  </div>\
  <div class="col-md-2">\
    <label>एकल भएमा</label>\
    <select class="form-control" name="if_single_ed[]">\
      <option value="">Select</option>\
      <option>सम्वन्ध विच्छेद</option>\
      <option>पति वा पत्निको मृत्यु</option>\
      \
    </select>\
  </div>\
</div>\
<div class="row mt-4 ml-2">\
  <h5 class="p_header col-md-12">शिक्षाको विवरण</h5>\
  <div class="col-md-3">\
    <label>शिक्षाको अवस्था</label>\
    <select class="form-control" name="education_status_ed[]">\
      <option value="">Select</option>\
      <option>नावालक</option>\
      <option>निरक्षर</option>\
      <option>साक्षर</option>\
      <option>अनौपचारिक शिक्षा</option>\
      <option>प्राथमिक शिक्षा</option>\
      <option>नि. माध्यामिक शिक्षा</option>\
      <option>माध्यामिक शिक्षा</option>\
      <option>उ मा वि </option>\
      <option>स्नातक</option>\
      <option>स्नातकोत्तर</option>\
      <option>विद्दावारिधी</option>\
    </select>\
  </div>\
  <div class="col-md-3">\
    <label>हालको अवस्था</label>\
    <select class="form-control" name="current_situation_ed[]">\
      <option value="">Select</option>\
      <option>नियमित विद्यालय जाने गरेको</option>\
      <option>भर्ना नभएको</option>\
      <option>विद्यालय जान छोडेको</option>\
    </select>\
  </div>\
  <div class="col-md-3">\
    <label>शैक्षिक निकाय</label>\
    <select class="form-control" name="education_institution_ed[]">\
    <option value="">Select</option>\
      <option>सरकारी</option>\
      <option>निजि</option>\
    </select>\
  </div>\
  <div class="col-md-3">\
    <label>शैक्षिक निकाय रहेको स्थान</label>\
    <select class="form-control" name="institution_location_ed[]">\
    <option value="">Select</option>\
      <option>गाउँपालिका भित्र</option>\
      <option>गाउँपालिका वाहिर</option>\
    </select>\
  </div>\
</div>\
  <div class="row mt-4 ml-2">\
  <h5 class="p_header col-md-12">रोजगारीको विवरण</h5>\
  <div class="col-md-3">\
    <label>रोजगारीको अवस्था</label>\
    <select class="form-control" name="employment_status_ed[]">\
    <option value="">Select</option>\
      <option>सरकारी स्थायी</option>\
      <option>सरकारी करार वा अस्थायी</option>\
      <option>अन्य निजी तथा गै स स</option>\
      <option>वेरोजगार</option>\
      <option>विद्यार्थी</option>\
      <option>नावालक</option>\
      <option>सेवा निवृत्त</option>\
    </select>\
  </div>\
  <div class="col-md-3">\
    <label class="control-label"> मुख्य पेशा :</label>\
    <select name="main_job_ed[]" class="form-control">\
    <option value="">Select</option>\
    <option value="लघुउद्यम">लघुउद्यम</option>\
    <option value="कृषि">कृषि</option>\
    <option value="व्यवसाय">व्यवसाय</option>\
    <option value="नोकरी">नोकरी</option>\
    <option value="मजदुरी">मजदुरी</option>\
    <option value="विदेश">विदेश</option>\
    <option value="शिक्षण">शिक्षण</option>\
    <option value="सेवा निवृत्त">सेवा निवृत्त</option>\
    </select>\
  </div>\
  <div class="col-md-3">\
  <label class="control-label fsize"> सहायक पेशा भए :</label>\
  <select name="if_any_side_job_ed[]" class="form-control">\
  <option value="">Select</option>\
  <option value="लघु उद्यम">लघु उद्यम</option>\
  <option value="कृषि">कृषि</option>\
  <option value="व्यवसाय">व्यवसाय</option>\
  <option value="नोकरी">नोकरी</option>\
  <option value="मजदुर">मजदुर</option>\
  <option value="विदेश">विदेश</option>\
  <option value="शिक्षण">शिक्षण</option>\
  <option value="केहि पनि नभएको">केहि पनि नभएको</option>\
  </select>\
  </div>\
  <div class="col-md-3">\
    <label>दक्ष जनशक्ति हो भने के सम्बन्धी</label>\
    <input type="text" name="if_skilled_manpower_ed[]" class="form-control">\
  </div>\
  <div class="col-md-3 mt-2">\
    <label>बैङ्क खाता</label>\
    <select class="form-control" name="bank_account_ed[]">\
    <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
    </select>\
  </div>\
  <div class="col-md-3 mt-2">\
    <label>आर्थिक कारोबार भएको संस्था</label>\
    <select class="form-control" name="financial_transaction_bank_or_org_ed[]">\
    <option value="">Select</option>\
      <option>बैंक</option>\
      <option>अन्य बितिय संस्था</option>\
      <option>सहकारी</option>\
    </select>\
  </div>\
  </div>\
  <div class="row mt-4 ml-2"> \
  <h5 class="p_header col-md-12">अपाङ्गता विवरण</h5>\
  <div class="col-md-3">\
    <label>अपाङ्गता </label>\
    <select class="form-control" name="disability_ed[]">\
    <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
    </select>\
  </div>\
  <div class="col-md-3">\
    <label>अपाङ्गगता प्रकार </label>\
      <select name="disability_type_ed[]" class="form-control">\
      <option value="">Select</option>\
        <option value="पूर्ण अपाङ्गता (रातो)">पूर्ण अपाङ्गता (रातो)</option>\
        <option value="अति अशक्त (निलो)">अति अशक्त (निलो)</option>\
        <option value="मध्यम अपाङ्गता (पहेलो)">मध्यम अपाङ्गता (पहेलो)</option>\
        <option value="सामान्य अपाङ्गता (सेतो)">सामान्य अपाङ्गता (सेतो)</option>\
      </select>\
  </div>\
  <div class="col-md-3">\
    <label>अपाङ्गता भएको शरीरको अङ्ग</label>\
    <input type="text" name="disabillity_body_part_ed[]" class="form-control">\
  </div>\
  <div class="col-md-3">\
    <label>अपाङ्गता परिचय पत्र लिएको</label>\
    <select class="form-control" name="disability_id_card_taken_ed[]">\
    <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
    </select>\
    </div>\
</div>\
<div class="row col-md-12 mt-4 ml-1">\
    <h5 class="p_header col-md-12">दीर्घकालिन रोग विवरण</h5>\
    <div class="col-md-3">\
    <label>कुनै किसिमको दीर्घकालिन रोग</label>\
    <select class="form-control" name="any_sustained_illness_ed[]">\
    <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
    </select>\
    </div>\
\
    <div class="col-md-3">\
    <label>छ भने कुन प्रकारको रोग</label>\
    <select class="form-control" name="illness_type_ed[]">\
    <option value="">Select</option>\
      <option>छारेरोग </option>\
      <option>दम </option>\
      <option>मुटुरोग  </option>\
      <option>दीर्घ मृगौला रोग </option>\
      <option>मधुमेह  </option>\
      <option>एच अाई भि </option>\
      <option>क्यान्सर  </option>\
    </select>\
    </div>\
</div>\
    <div class="row mt-4 ml-2">\
  <h5 class="p_header col-md-12">बालबालिकाको हकमा कामदारको रुपमा घरपरिवारवाट बाहिर</h5>\
    <div class="col-md-3">\
    <label>बसेको </label>\
    <select class="form-control" name="child_labour_outside_home_ed[]">\
    <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
    </select>\
    </div>\
    <div class="col-md-3">\
    <label>बसेको छ भने</label>\
    <select class="form-control" name="child_stay_outside_home_as_labour_ed[]">\
    <option value="">Select</option>\
      <option>गाउँपालिका भित्र</option>\
      <option>गाउँपालिका बाहिर</option>\
    </select>\
    </div>\
    <div class="col-md-3" id="labour_type">\
    <label>कामदारको प्रकार</label>\
    <select class="form-control" name="child_labour_work_ed[]">\
    <option value="">Select</option>\
      <option>घरेलु कामदार</option>\
      <option>होटेल तथा रेस्टुरेन्ट</option>\
      <option>उद्योग तथा ब्यबसाय</option>\
      <option>अन्य</option>\
    </select>\
    </div>\
</div>\
<div class="row col-md-12 mt-4 ml-1">\
  <h5 class="p_header col-md-12">मोबाइलको प्रयोग विवरण</h5>\
    <div class="col-md-3">\
    <label>क्लव/सामाजिक स‌घ संस्थामा अावद्ध</label>\
    <select name="enrolled_in_club_or_social_org_ed[]" class="form-control">\
          <option value="">Select</option>\
          <option value="क्लव">क्लव</option>\
          <option value="वन">वन</option>\
          <option value="उपभोक्ता समुह">उपभोक्ता समुह</option>\
          <option value="अामा समुह">अामा समुह</option>\
          <option value="सहकारी">सहकारी</option>\
          <option value="अन्य संस्था">अन्य संस्था</option>\
          <option value="कुनैमा नभएको">कुनैमा नभएको</option>\
    </select>\
    </div>\
    <div class="col-md-3">\
    <label style="height: 49px">मोवाइल प्रयोग गर्ने गरेको </label>\
    <select id="mobile_use'+no+'" class="mobile_use form-control" name="mobile_used_ed[]">\
      <option value="">Select</option>\
      <option value="yes">छ</option>\
      <option value="no">छैन</option>\
    </select>\
    </div>\
    <div id="mobile_set'+no+'" class="mobile_set col-md-3" style="display: none;">\
    <label style="height: 49px">मोवाइल प्रयोग गर्ने गरेको भए</label>\
    <select class="form-control" name="mobile_set_used_ed[]">\
    <option value="">Select</option>\
      <option>सामान्य सेट</option>\
      <option>स्मार्ट सेट</option>\
    </select>\
    </div>\
    <div id="sim_card'+no+'" class="sim_card col-md-3" style="display: none;">\
    <label>प्रयोग गर्ने गरेको सिम तथा रिम कार्ड</label>\
    <select class="form-control" name="sim_card_used_ed[]">\
    <option value="">Select</option>\
      <option>NTC</option>\
      <option>NCELL</option>\
      <option>अन्य</option>\
    </select>\
    </div>\
</div>\
<div class="row mt-4 ml-1">\
  <h5 class="p_header col-md-12">अन्य विवरण</h5>\
    <div class="col-md-3">\
    <label>सामाजिक सञ्जालमा अावद्धता</label>\
    <select class="form-control" name="on_social_network_ed[]">\
    <option value="">Select</option>\
      <option>छ</option>\
      <option>छैन</option>\
    </select>\
    </div>\
\
    <div class="col-md-4">\
    <label>आफनो स्वामित्वमा भएका कुनै सवारी साधन: </label>\
    <select class="form-control" name="vehicle_possessed_ed[]">\
    <option value="">Select</option>\
      <option>मोटर साइकल /स्कुटी</option>\
      <option>जीप/ कार</option>\
      <option>बस</option>\
      <option>ट्र्याक्टर</option>\
      <option>ट्रक</option>\
      <option>डोजर जेसिवी</option>\
      <option>साइकल</option>\
      <option>अन्य</option>\
      <option>नभएको</option>\
    </select>  \
  </div>\
\
  <div class="col-md-2">\
  <label>छोराको संख्या</label>\
  <input type="text" name="son_count_ed[]" class="form-control">\
  </div>\
\
  <div class="col-md-2">\
  <label>छोरीको संख्या</label>\
  <input type="text" name="daughter_count_ed[]" class="form-control">\
  </div>\
</div>\
\
<div class="row mt-4 ml-1">\
  \
  <div class="col-md-3">\
  <label style="height: 49px;">के तपाई गर्भवति हुनुहुन्छ ?</label>\
  <select class="form-control" name="are_you_pregnent_ed[]">\
  <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
  <label style="height: 49px;">गर्भवति भए कति महिना</label>\
  <input type="text" name="pregnent_month_ed[]" class="form-control">\
  </div>\
\
  <div class="col-md-3">\
  <label>गर्भवती भए पुर्व प्रसुति जाँच प्रोटोकल अनुसार जाँच भएको</label>\
  <select class="form-control" name="checkup_as_protocol_ed[]">\
  <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
  <label style="height: 49px;">नियमित आइरन चक्कि खाइ राखेको</label>\
  <select class="form-control" name="iron_tablet_regularly_ed[]">\
  <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
  </div>\
</div>\
<div class="row mt-4 ml-1">\
  <div class="col-md-3">\
  <label>नियमित जुकाको औषधि खाए नखाएको</label>\
  <select class="form-control" name="yucca_medicine_taken_regularly_ed[]">\
  <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
  <label>टि टी खोप लगाएको</label>\
  <select class="form-control" name="tt_vaccine_taken_ed[]">\
  <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
  <label>सुत्केरीको अवस्था</label>\
  <select class="form-control" name="sutkeri_ko_awasta_ed[]">\
  <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
  <label>सुत्केरी अवस्थामा आइरन चक्कि सेवन गर्नेगरेको</label>\
  <select class="form-control" name="iron_chakki_taken_during_sutkeri_ed[]">\
  <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
  <label>सुत्केरी भएको स्थान</label>\
  <select class="form-control" name="sutkeri_bhayeko_sthan_ed[]">\
  <option value="">Select</option>\
    <option>स्वास्थ्य संस्था</option>\
    <option>घरमा</option> \
    <option>अन्य</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
  <label>शिशुको खोपको अवस्था</label>\
  <select class="form-control" name="child_vaccine_status_ed[]">\
  <option value="">Select</option>\
    <option>नियमित खोप लगाएको</option>\
    <option>खोप लगाउन छुटेको वा वाकी रहेको</option> \
    <option>थाहा नभएको</option>\
  </select>\
  </div>\
\
  <div class="col-md-3">\
    <label>खोप लगाउन छुटनुको कारण</label>\
    <input type="text" name="vaccine_missed_reason_ed[]" class="form-control">\
  </div>\
</div>\
<div class="row col-md-12 mt-3">\
<div class="col-md-3">\
    <label>Delivery at hospital ?</label>\
    <select class="form-control" name="delivery_at_hospital[]">\
    <option value="">Select</option>\
    <option>हो</option>\
    <option>हैन</option>\
  </select>\
</div>\
<div class="col-md-3">\
    <label>नेपाल सरकारको सुबिधा पाएको ?</label>\
    <select class="form-control" name="govt_facility[]">\
    <option value="">Select</option>\
    <option>छ</option>\
    <option>छैन</option>\
  </select>\
</div>\
<div class="col-md-3">\
    <label>के सुबिधा पाउनुभयो ?</label>\
    <select class="form-control" name="govt_facility_name[]">\
    <option value="">Select</option>\
    <option>झोला</option>\
    <option>बाटो खर्च (रू १५००)</option>\
    <option>Iron चक्की</option>\
  </select>\
</div>\
</div>\
</div>\
    </div></div>'

    var delbtn = "#del_relation" + no;
		$("#add_relation_indi").append(new_rel);
		
    $(delbtn).click(function(){
    // alert(rem);
    $(rem).remove();

    no = no -1;
    });
		

    // mobile use or not

    var mob = "#mobile_use" + no;
    var show_set = "#mobile_set" + no;
    var sim = "#sim_card" + no;
    $(mob).change(function(){
  // alert("hello");
  var val = $(this).val();
  // alert(val);
    if(val === "छ") {
        $(show_set).show("slow");
        $(sim).show("slow");
    }if(val === "छैन") {
        $(show_set).hide("slow");
        $(sim).hide("slow");
    }
    return false;
  });
// mobile use or not ends

    // citizenship use or not

    var cit_taken = "#cit_taken" + no;
    var cit_no = "#cit_no" + no;
    var cit_issued_dis = "#cit_issued_dis" + no;
    var tourist = "#if_tourist" + no;
    $(cit_taken).change(function(){
  // alert("hello");
  var val = $(this).val();
  // alert(val);
    if(val === "छ") {
        $(cit_no).show("slow");
        $(cit_issued_dis).show("slow");
        $(tourist).hide("slow");
    }if(val === "छैन") {
        $(cit_no).hide("slow");
        $(cit_issued_dis).hide("slow");
        $(tourist).hide("slow");
    }if(val === "बिदेशी") {
        $(tourist).show("slow");
        $(cit_issued_dis).hide("slow");
        $(cit_no).hide("slow");
    }
    return false;
  });

// married or not

    var maritial_status = "#maritial_status" + no;
    var husband_or_wife_name = "#husband_or_wife_name" + no;
    var marriage_year = "#marriage_year" + no;
    var marriage_registered = "#marriage_registered" + no;
    var mar_reg_no = "#marriage_reg_no" + no;
    var if_single = "#if_single" + no;
    $(maritial_status).change(function(){
  // alert("hello");
  var val = $(this).val();
  // alert(val);
    if(val === "अबिबाहित") {
        $(husband_or_wife_name).hide("slow");
        $(marriage_year).hide("slow");
        $(marriage_registered).hide("slow");
        $(mar_reg_no).hide("slow");
        $(if_single).hide("slow");
    }if(val === "बिबाहित") {
        $(husband_or_wife_name).show("slow");
        $(marriage_year).show("slow");
        $(marriage_registered).show("slow");
        $(mar_reg_no).show("slow");
        $(if_single).hide("fast");
    }if(val === "एकल") {
        $(if_single).show("slow");
        $(husband_or_wife_name).hide("fast");
        $(marriage_year).hide("fast");
        $(marriage_registered).hide("fast");
    }
    return false;
  });
// married or not ends

// education status
    var edu_status = "#education_status" + no;
    var curr_sit = "#curr_sit" + no;
    var edu_ins = "#edu_ins" + no;
    var edu_ins_loc = "#edu_ins_loc" + no;
    $(edu_status).change(function(){
    var val = $(this).val();
  // alert(val);
    if(val === "नावालक" || val === "निरक्षर") {
        $(curr_sit).hide("slow");
        $(edu_ins).hide("slow");
        $(edu_ins_loc).hide("slow");
    }else if(val === "स्नातक" || val === "स्नातकोत्तर" || val === "विद्दावारिधी") {
        $(curr_sit).hide("slow");
        $(edu_ins).show("slow");
        $(edu_ins_loc).show("slow");
    }else {
        $(curr_sit).show("slow");
        $(edu_ins).show("slow");
        $(edu_ins_loc).show("slow");
    }
    return false;
  });

    // disability status
    var disability = "#disability" + no;
    var dis_type = "#dis_type" + no;
    var dis_body = "#dis_body" + no;
    var dis_id = "#dis_id" + no;
    $(disability).change(function(){
    var val = $(this).val();
  // alert(val);
    if(val === "छ") {
        $(dis_type).show("slow");
        $(dis_body).show("slow");
        $(dis_id).show("slow");
    }else {
        $(dis_type).hide("slow");
        $(dis_body).hide("slow");
        $(dis_id).hide("slow");
    }
    return false;
  });

     // illness status
    var sus_illness = "#sustained_illness" + no;
    var if_illness = "#if_illness" + no;
    $(sus_illness).change(function(){
    var val = $(this).val();
  // alert(val);
    if(val === "छ") {
        $(if_illness).show("slow");
    }else {
        $(if_illness).hide("slow");
    }
    return false;
  });

    // employment status
    var emp_status = "#emp_status" + no;
    var main_job = "#main_job" + no;
    var side_job = "#side_job" + no;
    var skilled_man = "#skilled_man" + no;
    var ret = "#skilled_man" + no;
    $(emp_status).change(function(){
    var val = $(this).val();
  // alert(val);
    if(val === "वेरोजगार" || val === "विद्यार्थी" || val === "नावालक" || val === "सेवा निवृत्त") {
        $(main_job).hide("slow");
        $(side_job).hide("slow");
        $(skilled_man).hide("slow");
        $(ret).hide("slow");
    }else { 
        $(main_job).show("slow");
        $(side_job).show("slow");
        $(skilled_man).show("slow");
        $(ret).show("slow");
    }
    return false;
  });

    // illness status
    var cloh = "#cloh" + no;
    var csoh = "#csoh" + no;
    $(cloh).change(function(){
    var val = $(this).val();
  // alert(val);
    if(val === "छ") {
        $(csoh).show("slow");
    }else {
        $(csoh).hide("slow");
    }
    return false;
  });

     // pregnent status
    var if_preg = "#if_preg" + no;
    var preg_month = "#preg_month" + no;
    var checkup_as_protocol = "#checkup_as_protocol" + no;
    var iron_tablet_regularly = "#iron_tablet_regularly" + no;
    var yucca_medicine_taken_regularly = "#yucca_medicine_taken_regularly" + no;
    var tt_vaccine_taken = "#tt_vaccine_taken" + no;
    var sutkeri_ko_awasta = "#sutkeri_ko_awasta" + no;
    var iron = "#iron_chakki_taken_during_sutkeri" + no;
    var place = "#sutkeri_bhayeko_sthan" + no;
    var status = "#child_vaccine_status" + no; child_vaccine_status1
    var reason = "#vaccine_missed" + no;
    $(if_preg).change(function(){
    var val = $(this).val();
  // alert(val);  
    if(val === "छैन") {
        $(preg_month).hide("slow");
        $(checkup_as_protocol).hide("slow");
        $(iron_tablet_regularly).hide("slow");
        $(ret).hide("slow");
    }else { 
        $(preg_month).show("slow");
        $(checkup_as_protocol).show("slow");
        $(iron_tablet_regularly).show("slow");
        $(ret).show("slow");
    }
    return false;
  });

    $(sutkeri_ko_awasta).change(function(){
    var val = $(this).val();
  // alert(val);
    if(val === "छ") {
        $(iron).show("slow");
        $(place).show("slow");
        $(status).show("slow");
        $(reason).show("slow");
    }else { 
        $(iron).hide("slow");
        $(status).hide("slow");
        $(reason).hide("slow");
        $(place).hide("slow");
    }
    return false;
  });

 $('a').on('click', function(e) {
  $(this).find('[class*="angle"]').toggleClass('fa-angle-down fa-angle-up');
});
 
		no++;

    $(".bod-picker").nepaliDatePicker({
    // dateFormat: "%D, %M %d, %y",
    dateFormat: "%y-%m-%d",
    closeOnDateSelect: true
});

	});
});

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

// $(".bod-picker").nepaliDatePicker({
//     // dateFormat: "%D, %M %d, %y",
//     dateFormat: "%M %d, %y",
//     closeOnDateSelect: true
// });

