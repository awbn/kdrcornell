<h2>Brotherhood</h2>
<p class="big grey">The brothers of &Kappa;&Delta;&Rho;</p>
<hr />

<div class="row">
    <div class="span12">
	    <p>
	        <div class="button">
	           <ul id="filters">
	             <li><a href="#" data-filter="*">All</a></li>
	             <li><a href="#" data-filter=".officer">Officers</a></li>
	             <li><a href="#" data-filter=".pledge">Pledges</a></li>
	           </ul>
	        </div>
	    </p>

	    <div id="brotherhood">
	    	<?php
	    		foreach($brothers as $brother)
	    		{
	    			$offices = $brother->offices->order_by('rank')->find_all();

	    			printf("
	    				<div class='%s brother-gallery'>
	    				<a class='brother' href='%s?ajax=true'>
	    				<img src='%s' alt='%s' />
	    				<div>
	    					<h4>%s '%s</h4>
	    					<p>%s</p>
	    				</div>
	    				</a>
	    				</div>
	    			",
	    			(count($offices) > 0) ? "officer" : "",
	    			URL::site('brotherhood/' . $brother->slug),
	    			$brother->image_thumbnail,
	    			$brother->name,
	    			$brother->name,
	    			substr($brother->year,2),
	    			join(", ", $offices->as_array('id','title'))
	    			);
	    		}
	    	?>
	    </div>
	    <div class="filter-no-results">
	    	Sorry, no results.
	    </div>
	</div>
</div>