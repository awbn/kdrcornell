<div class="breadcrumbs">
<a href="<?php echo URL::site('centennial') ?>"> Centennial Celebration</a> &raquo; Attending
</div>

<h2>&Kappa;&Delta;&Rho; Beta Chapter Centennial Celebration</h2>
<p class="big grey">Celebrating 100 years of brotherhood</p>
<hr />

<div class="row">
	<div class="span12 copy">
		<p>The following brothers will be attending the Centennial celebration. Want more information? Check out the <a href="<?php echo $facebook_link?>">facebook group</a>!</p>
		<table class="table table-striped table-bordered table-hover">
	      <thead>
	        <tr>
	          <th>Class Year</th>
	          <th>Name</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php
	      		foreach($attendees as $guest)
	      		{
	      			printf("<tr><td>%s</td><td>%s</td><tr>", $guest->year, $guest->name);
	      		}
	      	?>
	      </tbody>
	    </table>
	</div>
</div>