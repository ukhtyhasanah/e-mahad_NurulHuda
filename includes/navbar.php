	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
			</div>

			<div class="navbar-header">
			<?php if($_GET['menu'] == 'upload'){ echo 'class="active"'; } ?>><a class="navbar-brand" href="upload.php?menu=upload"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</a>
			</div>
			
			<div class="navbar-header">
			<?php if(!$_GET['menu']){ echo 'class="active"'; } ?>><a class="navbar-brand" href="galeri.php"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery</a>
			</div>

			
			</div>
		</div>
	</nav>