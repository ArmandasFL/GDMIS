<?php echo validation_errors('<div class="alert alert-danger col-md-4 mx-auto">', '</div>'); ?>

<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h4 class="text-center"><?= $title ?></h4>
			<!-- Name -->
			<div class="form-group">
				<label>Vardas</label>
				<input type="text" class="form-control" name="name" placeholder="Vardas">
			</div>
			<!-- Zipcode -->
			<div class="form-group">
				<label>Pašto kodas</label>
				<input type="text" class="form-control" name="zipcode" placeholder="Pašto kodas">
			</div>
			<!-- Email -->
			<div class="form-group">
				<label>Emailas</label>
				<input type="email" class="form-control" name="email" placeholder="Emailas">
			</div>
			<!-- Username -->
			<div class="form-group">
				<label>Vartotojo vardas</label>
				<input type="text" class="form-control" name="username" placeholder="Vartotojo vardas">
			</div>
			<!-- Password -->
			<div class="form-group">
				<label>Slaptažodis</label>
				<input type="password" class="form-control" name="password" placeholder="Slaptažodis">
			</div>
			<div class="form-group">
				<label>Patvirtinti Slaptažodį</label>
				<input type="password" class="form-control" name="password2" placeholder="Patvirtinti Slaptažodį">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Patvirtinti</button>
		</div>
	</div>
<?php echo form_close(); ?>
