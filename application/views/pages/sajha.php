<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>स्थानीय तह फारम</title>
</head>
<body>
	<div class="ml-5 mt-5 mr-5 mb-5">
<?php if($this->session->flashdata('record_inserted')):
    echo '<p class="alert alert-success">'.$this->session->flashdata('record_inserted').'</p>';
  endif; ?>

<?php if($this->session->flashdata('error')):
    echo '<p class="alert alert-danger">'.$this->session->flashdata('error').'</p>';
  endif; ?>
		<h4 style="text-align: center;">स्थानीय तह फारम</h4>
	<form style="background: #fff; padding: 24px;" method="post" action="<?php echo base_url(); ?>posts/insert_dis">

  <div class="form-row">
    <div class="form-group offset-2 col-md-4">
      <label for="inputEmail4">प्रदेशको नाम</label>
      <select class="form-control" name="state_name" id="state_name">
      	<option>Select</option>
      	<option value="प्रदेश १">प्रदेश १</option>
      	<option value="प्रदेश २">प्रदेश २</option>
      	<option value="प्रदेश ३">प्रदेश ३</option>
      	<option value="प्रदेश ४">प्रदेश ४</option>
      	<option value="प्रदेश ५">प्रदेश ५</option>
      	<option value="प्रदेश ६">प्रदेश ६</option>
      	<option value="प्रदेश ७">प्रदेश ७</option>      	
      </select>
      
    </div>
   
    <div class="form-group col-md-4">
      <label for="inputPassword4">प्रदेशको कोड</label>
      <select class="form-control" name="state_code" id="state_code">
      	
      	<option></option>
      	<option data-group="प्रदेश १" value="१">१</option>
      	<option data-group="प्रदेश २" value="२">२</option>
      	<option data-group="प्रदेश ३" value="३">३</option>
      	<option data-group="प्रदेश ४" value="४">४</option>
      	<option data-group="प्रदेश ५" value="५">५</option>
      	<option data-group="प्रदेश ६" value="६">६</option>
      	<option data-group="प्रदेश ७" value="७">७</option>  
      	
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group offset-2 col-md-4">
      <label for="inputEmail4">जिल्ला</label>
      <input type="text" class="form-control" id="inputEmail4" name="district_name" placeholder="">
  </div>
  <div class="form-group col-md-4">
      <label for="inputEmail4">जिल्लाको कोड</label>
      <input type="text" class="form-control" id="inputEmail4" name="district_code" placeholder="">
  </div>
</div>

<div class="offset-2 col-md-8 multi-field-wrapper" style="border: 2px solid lightgrey; padding: 30px; ">
	<div class="multi-fields">
<div class="form-row multi-field">
  <div class="form-group col-md-4">
      <label for="inputEmail4">स्थानीय तह</label>
      <input type="text" class="form-control" id="local" name="local_unit[]" placeholder="">
  </div>
  <div class="form-group col-md-4">
      <label for="inputEmail4">स्थानीय कोड</label>
      <input type="text" class="form-control" id="inputEmail4" name="unit_code[]" placeholder="">
  </div>

  <button type="button" class="btn btn-info btn-sm float-right" id="add-field" style="margin-top: 32px; height: 40px;">Add</button>
  <button type="button" class="btn btn-danger remove-field ml-2" style="margin-top: 32px; height: 40px;">Remove</button>

 </div>
 	
 	<!-- append div, primarily hidden -->
 	<!-- <div class="form-row append" style="display: none">
  <div class="form-group col-md-4">
      
      <input type="text" class="form-control" id="local" name="local_unit[]" placeholder="">
  </div>
  <div class="form-group col-md-4">
     
      <input type="text" class="form-control" id="local2" name="unit_code[]" placeholder="">
  </div>

  <button type="button" class="btn btn-info btn-sm float-right" id="add-field" style="margin-top: 32px; height: 40px;">Add</button>
  <button type="button" class="btn btn-danger remove-field ml-2" style="margin-top: 32px; height: 40px;">Remove</button>

 </div> -->
 <!-- append div, primarily hidden -->

 	</div>
</div>

  <button type="submit" class="btn btn-primary offset-5 mt-3 " name="btnsubmit">Submit</button>
</form>
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    $("#add-field", $(this)).click(function(e) {
    	console.log('works');
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('#local').val('').focus();

    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});

$(function(){
    $('#state_name').on('change', function(){
        var val = $(this).val();
        var sub = $('#state_code');
        // alert(val);
        
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
</script>