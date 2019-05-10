<!DOCTYPE html>
<html>
<head>
	<title>स्थानीय तह फारम</title>
</head>
<style type="text/css">
  select option[disabled] {
    display: none;
}
.form_sty{
border: 2px solid lightgrey; padding: 30px; 
}
.btn_margin{
  margin-top: 0px; margin-left: 5px; height: 40px;
}
</style>
<body>
	<div class="ml-5 mt-5 mr-5 mb-5">
<?php if($this->session->flashdata('record_inserted')):
    echo '<p class="alert alert-success">'.$this->session->flashdata('record_inserted').'</p>';
  endif; ?>

<?php if($this->session->flashdata('error')):
    echo '<p class="alert alert-danger">'.$this->session->flashdata('error').'</p>';
  endif; ?>
		<h4 style="text-align: center;">Update Form: स्थानीय तह फारम</h4>
	<form style="background: #fff; padding: 24px;" method="post" action="<?php echo base_url(); ?>posts/update_dis">
<?php
// print_r($dist);echo $link_id;
foreach ($dist as $val) {

?>
<div class="offset-1 col-md-9 mb-4 form_sty">
  <div class="form-row">
    <div class="form-group offset-2 col-md-4">
      <label for="inputEmail4">प्रदेशको नाम: </label>
      <select class="form-control" name="state_name" id="state_name" required>
      	<option value="1" <?php if($val['state'] == 1){echo ' selected="selected"'; } ?>>प्रदेश १</option>
      	<option value="2" <?php if($val['state'] == 2){echo ' selected="selected"'; } ?>>प्रदेश २</option>
      	<option value="3" <?php if($val['state'] == 3){echo ' selected="selected"'; } ?>>प्रदेश ३</option>
      	<option value="4" <?php if($val['state'] == 4){echo ' selected="selected"'; } ?>>प्रदेश ४</option>
      	<option value="5" <?php if($val['state'] == 5){echo ' selected="selected"'; } ?>>प्रदेश ५</option>
      	<option value="6" <?php if($val['state'] == 6){echo ' selected="selected"'; } ?>>प्रदेश ६</option>
      	<option value="7" <?php if($val['state'] == 7){echo ' selected="selected"'; } ?>>प्रदेश ७</option>      	
      </select>
      
    </div>
   
    <div class="form-group col-md-4">
      <label for="inputPassword4">प्रदेशको कोड: </label>
      <select class="form-control" name="state_code" id="state_code" required>
      	<option data-group="1" value="१" <?php if($val['state_code'] == '१'){echo ' selected="selected"'; } ?>>१</option>
      	<option data-group="2" value="२" <?php if($val['state_code'] == '२'){echo ' selected="selected"'; } ?>>२</option>
      	<option data-group="3" value="३" <?php if($val['state_code'] == '३'){echo ' selected="selected"'; } ?>>३</option>
      	<option data-group="4" value="४" <?php if($val['state_code'] == '४'){echo ' selected="selected"'; } ?>>४</option>
      	<option data-group="5" value="५" <?php if($val['state_code'] == '५'){echo ' selected="selected"'; } ?>>५</option>
      	<option data-group="6" value="६" <?php if($val['state_code'] == '६'){echo ' selected="selected"'; } ?>>६</option>
      	<option data-group="7" value="७" <?php if($val['state_code'] == '७'){echo ' selected="selected"'; } ?>>७</option>  
      	
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group offset-2 col-md-4">
      <label for="inputEmail4">जिल्ला: </label>
      <!-- <input type="text" class="form-control" id="inputEmail4" name="district_name" placeholder=""> -->
      <select name="district_name" class="form-control" id="district_name" required>
        <option><?= $val['district'] ?></option>
        <option data-group="6">हुम्ला</option>
      <option data-group="7">अछाम</option>
      <option data-group="7">बाजुरा</option>
      <option data-group="7">कैलाली</option>
      <option data-group="7">डोटी</option>
      <option data-group="7">बझाङ</option>
    <option data-group="7">कंचनपुर</option>
    <option data-group="7">डडेलधुरा </option>
    <option data-group="7">बैतडी </option>
    <option data-group="7">दार्चुला </option>
    <option data-group="6">पश्चिमी रूकुम </option>
    <option data-group="6">सल्यान </option>
    <option data-group="6">डोल्पा </option>
    <option data-group="6">जुम्ला </option>
    <option data-group="6">कालिकोट </option>
    <option data-group="6">मुगु </option>
    <option data-group="6">सुर्खेत </option>
    <option data-group="6">दैलेख </option>
    <option data-group="6">जाजरकोट </option>

    <option data-group="5">कपिलवस्तु </option>
    <option data-group="5">परासी </option>
    <option data-group="5">रुपन्देही </option>
    <option data-group="5">अर्घाखाँची </option>
    <option data-group="5">गुल्मी </option>
    <option data-group="5">पाल्पा </option>
    <option data-group="5">दाङ </option>
    <option data-group="5">प्युठान </option>
    <option data-group="5">रोल्पा </option>
    <option data-group="5">पूर्वी रूकुम </option>
    <option data-group="5">बाँके </option>
    <option data-group="5">बर्दिया </option>

    <option data-group="4">गोरखा </option>
    <option data-group="4">कास्की </option>
    <option data-group="4">लमजुङ </option>
    <option data-group="4">स्याङग्जा </option>
    <option data-group="4">तनहुँ </option>
    <option data-group="4">मनाङ </option>
    <option data-group="4">नवलपुर </option>
    <option data-group="4">बागलुङ </option>
    <option data-group="4">म्याग्दी </option>
    <option data-group="4">पर्वत </option>
    <option data-group="4">मुस्ताङ </option>

    <option data-group="3">सिन्धुली </option>
    <option data-group="3">रामेछाप </option>
    <option data-group="3">दोलखा </option>
    <option data-group="3">भक्तपुर </option>
    <option data-group="3">धादिङ </option>
    <option data-group="3">काठमाडौँ </option>
    <option data-group="3">काभ्रेपलान्चोक </option>
    <option data-group="3">ललितपुर </option>
    <option data-group="3">नुवाकोट </option>
    <option data-group="3">रसुवा </option>
    <option data-group="3">सिन्धुपाल्चोक </option>
    <option data-group="3">चितवन </option>
    <option data-group="3">मकवानपुर </option>

    <option data-group="2">सप्तरी </option> 
    <option data-group="2">सिराहा </option>
    <option data-group="2">धनुषा </option>
    <option data-group="2">महोत्तरी </option>
    <option data-group="2">सर्लाही </option>
    <option data-group="2">बारा </option>
    <option data-group="2">पर्सा </option>
    <option data-group="2">रौतहट </option>

    <option data-group="1">भोजपुर </option>
    <option data-group="1">धनकुटा </option>
    <option data-group="1">इलाम </option>
    <option data-group="1">झापा </option>
    <option data-group="1">खोटाँग </option>
    <option data-group="1">मोरंग </option>
    <option data-group="1">ओखलढुंगा </option>
    <option data-group="1">पांचथर </option>
    <option data-group="1">संखुवासभा </option>
    <option data-group="1">सोलुखुम्बू </option>
    <option data-group="1">सुनसरी </option>
    <option data-group="1">ताप्लेजुंग </option>
    <option data-group="1">तेह्रथुम </option>
    <option data-group="1">उदयपुर </option>
      </select>
  </div>
  <div class="form-group col-md-4">
      <label for="inputEmail4">जिल्लाको कोड: </label>
      <input type="text" class="form-control" name="district_code" value="<?= $val['district_code'] ?>" required="required">
  </div>
</div>
</div>
<?php } ?>


<div class="offset-1 col-md-9 multi-field-wrapper form_sty">
  <label class="offset-2">नगरपालिका/गाउँपालिका को नाम (RM)</label>
  <label class="offset-1">नगरपालिका/गाउँपालिका को कोड</label>
  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-field">+</button>
  	<?php foreach ($unit as $uni) { ?>
  <div class="form-row mt-2">
  <div class="form-group offset-2 col-md-4">
      <input type="hidden" name="tbl_id[]" value="<?= $uni['id'] ?>">
      <input type="text" class="form-control" id="local" name="local_unit[]" value="<?= $uni['local_unit'] ?>">
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="local" name="unit_code[]" value="<?= $uni['unit_code'] ?>">
  </div>
</div>
<?php } ?>

 	<div class="add_multi_fields"></div>
</div>


<div class="offset-1 col-md-9 tole-wrapper mt-4 form_sty">
  <label class="offset-2">टोलको नाम</label>
  <label class="offset-3">टोलको कोड</label>
  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-tole">+</button>

  <?php foreach ($tole as $tol) { ?>
<div class="form-row mt-2">
   <div class="form-group offset-2 col-md-4">
      <input type="hidden" name="tole_id[]" value="<?= $tol['id'] ?>">
      <input type="text" class="form-control" id="tole" name="tole_name[]" value="<?= $tol['tole_name'] ?>">
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="tole" name="tole_code[]" value="<?= $tol['tole_code'] ?>">
  </div>
</div>
<?php } ?>
<div class="add_tole_fields"></div>

</div>

<div class="offset-1 col-md-9 mt-4 water-wrapper form_sty">
  <label class="offset-2">जलाधार क्षेत्रको नाम</label>
  <label class="offset-2">जलाधार क्षेत्रको कोड</label>
  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-water">+</button>
  <?php foreach ($jaladhar as $jala) { ?>
  <div class="form-row mt-2">
  <div class="form-group offset-2 col-md-4">
      <input type="hidden" name="jala_id[]" value="<?= $jala['id'] ?>">
      <input type="text" class="form-control" id="jala" name="jaladhar_name[]" value="<?= $jala['jaladhar_name'] ?>">
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="jala" name="jaladhar_code[]" value="<?= $jala['jaladhar_code'] ?>">
  </div>
</div>
<?php } ?>
<div class="add_water_fields"></div>
</div>
  

<div class="offset-1 col-md-9 mt-4 sub-wrapper form_sty">
  <label class="offset-2">उप-जलाधार क्षेत्रको नाम</label>
  <label class="offset-2">उप-जलाधार क्षेत्रको कोड</label>
  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-sub">+</button>
  <?php foreach ($sub_jaladhar as $sub) { ?>
  <div class="form-row mt-2">
  <div class="form-group offset-2 col-md-4">
      <input type="hidden" name="sub_id[]" value="<?= $sub['id'] ?>">
      <input type="text" class="form-control" id="sub_jala" name="sub_jaladhar_name[]" value="<?= $sub['upa_jaladhar_name'] ?>">
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="sub_jala" name="sub_jaladhar_code[]" value="<?= $sub['upa_jaladhar_code'] ?>">
  </div>
</div>
<?php } ?>
<div class="add_sub_fields"></div>

</div>
	
  <input type="hidden" name="link_id" value="<?= $link_id; ?>">
  <button type="button" class="btn btn-primary offset-5 mt-4" data-toggle="modal" data-target="#exampleModalCenter">
        Update</button>

<!-- Modal starts -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Changes ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="submit" class="btn btn-primary" name="btnsubmit">Update</button>
      </div>
    </div>
  </div>
</div>

</form>
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  // district name and district code
  var c = 1;
	$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    
    $("#add-field", $(this)).click(function(e) {
    	var field = ".multi-fields" + c;
    	var wrap = '<div class="multi-fields'+c+'">\
<div class="form-row rm_field">\
<div class="form-group offset-2 col-md-4">\
    <input type="text" class="form-control" id="local" name="local_units[]" value="">\
  </div>\
  <div class="form-group col-md-4">\
      <input type="text" class="form-control" id="local" name="unit_codes[]" value="">\
  </div>\
  <button type="button" id="rem_rm'+c+'" class="btn btn-danger remove-field ml-2 btn_margin">-</button>\
 </div>\
 	</div>';
    	// alert(field);
        var rm = "#rem_rm" + c;
        $(".add_multi_fields").append(wrap);
    $(rm).click(function() {
    	// alert("hit");
    	$(field).remove();
		c = c -1;
    });
    c++;
    });
});

// tole name and tole code
var t = 1;
  $('.tole-wrapper').each(function() {
    var $wrapper = $('.tole-fields', this);
    $("#add-tole", $(this)).click(function(e) {
    	var tole = ".tole-fields" + t;
    	var wrap = '<div class="tole-fields'+t+'">\
<div class="form-row rm_field">\
<div class="form-group offset-2 col-md-4">\
    <input type="text" class="form-control" id="local" name="tole_names[]" value="">\
  </div>\
  <div class="form-group col-md-4">\
      <input type="text" class="form-control" id="local" name="tole_codes[]" value="">\
  </div>\
  <button type="button" id="rem_tl'+t+'" class="btn btn-danger remove-field ml-2 btn_margin">-</button>\
 </div>\
 	</div>';
// alert(tole);

       var tl = "#rem_tl" + t;
        $(".add_tole_fields").append(wrap);
    $(tl).click(function() {
    	$(tole).remove();
		t = t -1;
    });
    t++;
    });
});

  // jaladhar name and code
var w =1;
  $('.water-wrapper').each(function() {
    var $wrapper = $('.water-fields', this);
    $("#add-water", $(this)).click(function(e) {
      var water = ".water-fields" + w;
    	var wrap = '<div class="water-fields'+w+'">\
<div class="form-row rm_field">\
<div class="form-group offset-2 col-md-4">\
    <input type="text" class="form-control" id="local" name="jaladhar_names[]">\
  </div>\
  <div class="form-group col-md-4">\
      <input type="text" class="form-control" id="local" name="jaladhar_codes[]">\
  </div>\
  <button type="button" id="rem_wat'+w+'" class="btn btn-danger remove-field ml-2 btn_margin">-</button>\
 </div>\
 	</div>';
       var wa = "#rem_wat" + w;
        $(".add_water_fields").append(wrap);
    $(wa).click(function() {
    	$(water).remove();
		w = w -1;
    });
    w++;
    });
});

  // sub-jaladhar name and code
var s =1;
  $('.sub-wrapper').each(function() {
    var $wrapper = $('.sub-fields', this);
    $("#add-sub", $(this)).click(function(e) {
      var water = ".sub-fields" + s;
    	var wrap = '<div class="sub-fields'+s+'">\
<div class="form-row rm_field">\
<div class="form-group offset-2 col-md-4">\
    <input type="text" class="form-control" id="local" name="sub_jaladhar_names[]">\
  </div>\
  <div class="form-group col-md-4">\
      <input type="text" class="form-control" id="local" name="sub_jaladhar_codes[]">\
  </div>\
  <button type="button" id="rem_sub'+s+'" class="btn btn-danger remove-field ml-2 btn_margin">-</button>\
 </div>\
 	</div>';
       var wa = "#rem_sub" + s;
        $(".add_sub_fields").append(wrap);
    $(wa).click(function() {
    	$(water).remove();
		s = s -1;
    });
    s++;
    });
});

$(function(){
    $('#state_name').on('change', function(){
        var val = $(this).val();
        var sub = $('#state_code');
        // alert(val);
        $('#fetch').appendTo("#state_code");
        $('option', sub).filter(function(){
            if (
                 $(this).attr('data-group') === val 
            ) {
            	$(sub).children().appendTo("#state_code");
                $(this).show();
            } else {
                $(this).hide();
            }
        });

    });
    $('#state_code').trigger('change');
});

$(function() {

    $('#state_name').on('change', function (e) {
    $('#state_code').val('');
        var endingChar = $(this).val().split('').pop();       
        var selected = $( '#state_name' ).val();
          $('#state_code option').addClass('show');
 
          $('#state_code option[value^='+selected+']').toggleClass('show');
    })

})

 $("#state_name").on('change', function(e){
        var district_name = $("#state_name").find('option:selected').val(); 
        // alert(district_name);
      $("#option-container").children().appendTo("#district_name");
        $("#district_name").children().removeAttr('disabled');
      var selectSeason = $("#district_name").children("[data-group!='"+district_name+"']"); 
            $(selectSeason).attr('disabled','disabled');
            $("#district_name").val($("#district_name optgroup[data-group='"+ district_name +"'] option:eq(0)").val());
      selectSeason.appendTo("#option-container");
            $("#district_name").removeAttr("disabled");  
  });
</script>