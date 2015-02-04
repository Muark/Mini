<div class="container">
	<h3>Add a Photo</h3>
	<form action="<?php echo URL; ?>photos/addphoto" method="POST" enctype="multipart/form-data">
		<label>Add a Photo</label>
		<input type="file" name="file" value="add_photo" required />
		<input type="submit" name="submit_add_photos" value="upload" />
	</form>
</div>