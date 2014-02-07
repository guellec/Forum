<p>
	
	Les Sujets

	<ul id="sujet">
		<?php

		//$i à supprimer 
		$i=0;
		while (/*$tab=mysqli_fetch_assoc($res)*/ $i<2) 
			{?>

			<?php require("views/sujet.html") ?>

			
		<?php $i++; }?>

	</ul>

</p>