<?php
 	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";

 	// Pages to list in the sitemap.  Better way of doing this?
 	$pages = array(
 		'',
 		'about',
 		'history',
 		'multimedia',
 		'brotherhood',
 		'contact',
 		'rush',
 		'donate'
 	);
 ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<?php foreach($pages as $page)
		{
			printf("<loc>%s</loc>", URL::site($page,'http'));
		}
		?>
	</url>
</urlset>