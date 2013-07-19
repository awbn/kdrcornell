<h2><?php echo $brother->name; ?></h2>
<?php
	if (count($offices) > 0)
	{
		printf("<p class='grey'>Offices: %s</p>", join(", ", $offices->as_array('id','title')));
	}
?>
<hr />

<div class="row-fluid brodetail">
     <div class="span4">
     	<?php
     		printf("<img src='%s' alt='%s' />", $brother->image, $brother->name);
     	?>
     </div>

     <div class="span8">
		  <div class="well">
		     <h6 class="title">About <?php echo $brother->informal_name() ?></h6>
		     <p><?php echo $brother->about?></p>
		     <hr />
		     <dl>
		        <dt>Hometown</dt>
		        <dd><?php echo $brother->hometown?></dd>
		        <dt>Class Year</dt>
		        <dd><?php echo $brother->year?></dd>
		        <dt>Major</dt>
		        <dd><?php echo $brother->major?></dd>
		        <dt>Pledge Class</dt>
		        <dd><?php echo $brother->pledge_class?></dd>
		     </dl>
		  </div>
		</div>
     </div>
</div>