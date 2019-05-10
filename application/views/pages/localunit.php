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

	<div class="ml-5 mr-5 mb-5 form-show">
<?php if($this->session->flashdata('record_inserted')):
    echo '<p class="alert alert-success">'.$this->session->flashdata('record_inserted').'</p>';
  endif; ?>

<?php if($this->session->flashdata('error')):
    echo '<p class="alert alert-danger">'.$this->session->flashdata('error').'</p>';
  endif; ?>
		<h4 class="form-heading-title">स्थानीय तह फारम</h4>
	<form class="form_color" method="post" action="<?php echo base_url(); ?>posts/insert_dis">

<div class="offset-1 col-md-9 mb-4 form_sty">
  <div class="form-row">
    <div class="form-group offset-2 col-md-4">
      <label for="inputEmail4">प्रदेशको नाम: </label>
      <select class="form-control" name="state_name" id="state_name" required>
      	<option value="">Select</option>
      	<option value="1">प्रदेश १</option>
      	<option value="2">प्रदेश २</option>
      	<option value="3">प्रदेश ३</option>
      	<option value="4">प्रदेश ४</option>
      	<option value="5">प्रदेश ५</option>
      	<option value="6">प्रदेश ६</option>
      	<option value="7">प्रदेश ७</option>      	
      </select>
      
    </div>
   
    <div class="form-group col-md-4">
      <label for="inputPassword4">प्रदेशको कोड: </label>
      <select class="form-control" name="state_code" id="state_code" required>
      	<option value="">Select</option>
      	<option data-group="1" value="१">१</option>
      	<option data-group="2" value="२">२</option>
      	<option data-group="3" value="३">३</option>
      	<option data-group="4" value="४">४</option>
      	<option data-group="5" value="५">५</option>
      	<option data-group="6" value="६">६</option>
      	<option data-group="7" value="७">७</option>  
      	
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group offset-2 col-md-4">
      <label for="inputEmail4">जिल्ला: </label>
      <!-- <input type="text" class="form-control" id="inputEmail4" name="district_name" placeholder=""> -->
      <select name="district_name" class="form-control" id="district_name" required>
        <option value="">Select</option>
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
      <input type="text" class="form-control" id="inputEmail4" name="district_code" required="required">
  </div>
</div>
</div>



<div class="offset-1 col-md-9 multi-field-wrapper form_sty">
  <label class="offset-2">नगरपालिका/गाउँपालिका को नाम (RM)</label>
  <label class="offset-1">नगरपालिका/गाउँपालिका को कोड</label>
	<div class="multi-fields">
<div class="form-row multi-field">
  <div class="form-group offset-2 col-md-4">
      
      <input type="text" class="form-control" id="local" name="local_unit[]" required>
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="local" name="unit_code[]" required>
  </div>

  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-field">+</button>
  <button type="button" style="display: none;" class="btn btn-danger remove-field ml-2 btn_margin">-</button>
 </div>

 	</div>
</div>


<div class="offset-1 col-md-9 tole-wrapper mt-4 form_sty">
  <label class="offset-2">टोलको नाम</label>
  <label class="offset-3">टोलको कोड</label>
  <div class="tole-fields">
<div class="form-row tole-field">
  <div class="form-group offset-2 col-md-4">
      
      <input type="text" class="form-control" id="tole" name="tole_name[]" placeholder="">
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="tole" name="tole_code[]" placeholder="">
  </div>

  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-tole">+</button>
  <button type="button" style="display: none;" class="btn btn-danger remove-tole ml-2 btn_margin" >-</button>
 </div>

  </div>
</div>

<div class="offset-1 col-md-9 mt-4 water-wrapper form_sty">
  <label class="offset-2">जलाधार क्षेत्रको नाम</label>
  <label class="offset-2">जलाधार क्षेत्रको कोड</label>
  <div class="water-fields">
<div class="form-row water-field">
  <div class="form-group offset-2 col-md-4">
      
      <input type="text" class="form-control" id="jala" name="jaladhar_name[]">
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="jala" name="jaladhar_code[]">
  </div>


  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-water">+</button>
  <button type="button" style="display: none;" class="btn btn-danger remove-water ml-2 btn_margin">-</button>
 </div>
  </div>
</div>
  

<div class="offset-1 col-md-9 mt-4 sub-wrapper form_sty">
  <label class="offset-2">उप-जलाधार क्षेत्रको नाम</label>
  <label class="offset-2">उप-जलाधार क्षेत्रको कोड</label>
  <div class="sub-fields">
<div class="form-row sub-field">
  <div class="form-group offset-2 col-md-4">
      
      <input type="text" class="form-control" id="sub_jala" name="sub_jaladhar_name[]" placeholder="">
  </div>
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="sub_jala" name="sub_jaladhar_code[]" placeholder="">
  </div>

  <button type="button" class="btn btn-info btn-sm float-right btn_margin" id="add-sub">+</button>
  <button type="button" style="display: none;" class="btn btn-danger remove-sub ml-2 btn_margin">-</button>
 </div>

  </div>
</div>
  
  <button type="button" class="btn btn-primary offset-5 mt-4 mb-5" data-toggle="modal" data-target="#exampleModalCenter">
        Submit</button>

  <!-- Modal starts -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Save Form Data ?</h5>
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
        <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
      </div>
    </div>
  </div>
</div>

</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  // district name and district code
	$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    $("#add-field", $(this)).click(function(e) {
    	console.log('works');
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('#local').val('').focus();
        $('.multi-field:last-child .remove-field').show();

    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});

// tole name and tole code

  $('.tole-wrapper').each(function() {
    var $wrapper = $('.tole-fields', this);
    $("#add-tole", $(this)).click(function(e) {
      // alert("works");
      console.log('works');
        $('.tole-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('#tole').val('').focus();
        $('.tole-field:last-child .remove-tole').show();

    });
    $('.tole-field .remove-tole', $wrapper).click(function() {
        if ($('.tole-field', $wrapper).length > 1)
            $(this).parent('.tole-field').remove();
    });
});

  // jaladhar name and code

  $('.water-wrapper').each(function() {
    var $wrapper = $('.water-fields', this);
    $("#add-water", $(this)).click(function(e) {
      // alert("works");
      console.log('works');
        $('.water-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('#jala').val('').focus();
        $('.water-field:last-child .remove-water').show();
    });
    $('.water-field .remove-water', $wrapper).click(function() {
        if ($('.water-field', $wrapper).length > 1)
            $(this).parent('.water-field').remove();
    });
});

  // sub-jaladhar name and code

  $('.sub-wrapper').each(function() {
    var $wrapper = $('.sub-fields', this);
    $("#add-sub", $(this)).click(function(e) {
      // alert("works");
      console.log('works');
        $('.sub-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('#sub_jala').val('').focus();
         $('.sub-field:last-child .remove-sub').show();

    });
    $('.sub-field .remove-sub', $wrapper).click(function() {
        if ($('.sub-field', $wrapper).length > 1)
            $(this).parent('.sub-field').remove();
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