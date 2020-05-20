<?php echo validation_errors('<div class="alert alert-danger col-md-4 mx-auto">', '</div>'); ?>
<?php echo form_open('users/login'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h4 class="text-center"><?= $title ?></h4>
			<!-- username -->
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Įveskite Vartotojo Vardą" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Įveskite Slaptažodį" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Prisijungti</button>
		</div>
	</div>
<?php echo form_close(); ?>
