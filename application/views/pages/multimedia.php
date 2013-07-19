<h2>Multimedia</h2>
<p class="big grey">Pictures and videos from a few of our events</p>
<hr />

<div class="row">
	<div class="span12">
		<div class="gallery">
		<?php
			foreach($data->photos->data as $photo)
			{
				$description = isset($photo->name) ? $photo->name : "";
				printf("<a href='%s' data-gallery='multimedia[%s]' title='%s'><img src='%s' alt='%s'></a>", $photo->source, $data->name, $description, $photo->picture, $description);
			}
		?>
		</div>
	</div>
</div>