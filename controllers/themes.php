<p>
	
	Les themes

	<ul id="theme">
		<?php

		//$i à supprimer 
		$i=0;
		while (/*$tab=mysqli_fetch_assoc($res)*/ $i<2) 
			{?>

			<?php require("views/themes.html") ?>

			
		<?php $i++; }?>

	</ul>

</p>