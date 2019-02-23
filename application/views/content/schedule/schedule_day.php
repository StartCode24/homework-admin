<?php // debug_array($data); ?>
<style>
	.card{
    	box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.54);
	}
</style>
<script>
	// $( ".card_day" ).click(function() {
 //  		alert( "Handler for .click() called." );
	// });
</script>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Schedule</p>
            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 25px;">
		        <a href="<?php echo $_SERVER['REQUEST_URI'];?>Senin" title="">
		        	<div class="col-lg-4 card_day">
				        <div class="card card-stats" style="margin-bottom: 0px;">
				          <div class="card-content">
				          	<p>Senin</p>
				          </div>
				        </div>
			    	</div>
				</a>
		        <a href="<?php echo $_SERVER['REQUEST_URI'];?>Selasa" title="">
		        	<div class="col-lg-4 card_day">
				        <div class="card card-stats" style="margin-bottom: 0px;">
				          <div class="card-content">
				          	<p>Selasa</p>
				          </div>
				        </div>
			    	</div>
				</a>
		        <a href="<?php echo $_SERVER['REQUEST_URI'];?>Rabu" title="">
		        	<div class="col-lg-4 card_day">
				        <div class="card card-stats" style="margin-bottom: 0px;">
				          <div class="card-content">
				          	<p>Rabu</p>
				          </div>
				        </div>
			    	</div>
				</a>
		        <a href="<?php echo $_SERVER['REQUEST_URI'];?>Kamis" title="">
		        	<div class="col-lg-4 card_day">
				        <div class="card card-stats" style="margin-bottom: 0px;">
				          <div class="card-content">
				          	<p>Kamis</p>
				          </div>
				        </div>
			    	</div>
				</a>
		        <a href="<?php echo $_SERVER['REQUEST_URI'];?>Jumat" title="">
		        	<div class="col-lg-4 card_day">
				        <div class="card card-stats" style="margin-bottom: 0px;">
				          <div class="card-content">
				          	<p>Jumat</p>
				          </div>
				        </div>
			    	</div>
				</a>
		        <a href="<?php echo $_SERVER['REQUEST_URI'];?>Sabtu" title="">
		        	<div class="col-lg-4 card_day">
				        <div class="card card-stats" style="margin-bottom: 0px;">
				          <div class="card-content">
				          	<p>Sabtu</p>
				          </div>
				        </div>
			    	</div>
				</a>
		    </div>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>