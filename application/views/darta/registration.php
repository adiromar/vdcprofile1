<div id="page-content-wrapper" style="margin: 0px 10px 0px 10px; background-color: #fff">
  <div class="container-fluid">

  	<div class="row" id="janma_darta">
  		<div class="col-md-12">
  			<div class="tiles">
        	<div class="tile-body">
					<div class="heading_title">
  					<h5 style='text-align: center; color: #337AB7;'>जन्म दर्ता फारम</h5>
					</div>

<div id="show_search" class="show_search" style="display: inherit !important"> 
  <h6>Search by</h6>
  <!-- <?= base_url(); ?>posts/search_personal -->
  <form action="" method="post" id="birth_form" enctype="multipart/form-data">
  <div class="row ">
    <div class="col-md-3">
    <label>बुबाको नाम / आमाको नाम</label>
    <input type="text" name="parents_name" class="form-control">
    </div>
  <p style="margin-top: 36px;"><button id="submit" type="submit" name="submit" class="btn btn-info btn-sm" value="search">search</button>
    <input class="btn btn-danger btn-sm" type="reset" value="Clear" id="reset"></p>
  </div>

  </form>
</div>
<div id="loading-image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>
<div class="loading"></div>


        		</div>
        	</div>
        </div>
    </div>

<div class="row" id="family_sep" style="display: none">
  <div class="col-md-12">
    <div class="tiles">
      <div class="tile-body">
        <div class="heading_title">
            <h5 style='text-align: center; color: #337AB7;'> परिवार छुट्टीएको  </h5>
        </div>


<div id="show_search" class="show_search" style="display: inherit !important">
</div>
      </div>
    </div>
  </div>
</div>


<div class="row" id="marriage_reg" style="display: none;">
  <div class="col-md-12">
  	<div class="tiles">
      <div class="tile-body">
        <div class="heading_title">
            <h5 style='text-align: center; color: #337AB7;'>बिबाह दर्ता</h5>
        </div>

<div id="show_search" class="show_search" style="display: inherit !important"> 
              <h6>Search by</h6>
  <form action="" method="post" id="marriage_form" enctype="multipart/form-data">
  <div class="row ">
    <div class="col-md-3">
    <label>पतिको नाम</label>
    <input type="text" name="husband_name" class="form-control">
    </div>

    <div class="col-md-3">
    <label>पतिको नागरिकता नं</label>
    <input type="text" name="husband_cit_no" class="form-control">
    </div>

  <p style="margin-top: 36px;"><button id="submit" type="submit" name="submitit" class="btn btn-info btn-sm ml-3" value="search">search</button>
    <input class="btn btn-danger btn-sm" type="reset" value="Clear" id="reset"></p>
  </div>

  </form>
  <div id="sub_image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>
<div class="loading1"></div>

              </div>
        		</div>
        	</div>
        </div>
    </div>

</div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/jquery-3.1.0.js"></script>
<script type="text/javascript">
   $('#birth_form').submit(function () {
     // $( "#loading" ).show();
    $.post('<?= base_url()?>darta/search_parents', $('#birth_form').serialize(),   
        function (data, textStatus) {
            $("#loading-image").show();
        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);
      $( "#view_data" ).hide();
      setTimeout(function() {
            $('.loading').show('slidedown').html(data);
        }, 1105);
         // $('.loading').show().html(data);
    });
    return false;
});

$('#marriage_form').submit(function() { // catch the form's submit event
    $.ajax({ // create an AJAX call...
        data: $('#marriage_form').serialize(), // get the form data
        type: $('#marriage_form').attr('POST'), // GET or POST
        url: $('#marriage_form').attr('<?= base_url()?>darta/search_marriage'), // the file to call

        success: function(response) { // on success..
            $('.loading1').append(response); // update the DIV

        }
    });
    return false; // cancel original event to prevent form submitting
});
</script>