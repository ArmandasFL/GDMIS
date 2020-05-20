<div class="row">
	<div class="col-md-6 mx-auto">
		<h2><?php echo $post['title']; ?></h2>
		<small class="post-date">Įkelta: <?php echo $post['created_at']; ?></small><br>
		<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
		<br><br>
		<div class="post-body">
			<?php echo $post['body']; ?>
		</div>
		<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
				<hr>
				<?php echo form_open('/posts/delete/'.$post['id']); ?>
					<a class="btn btn-info pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Redaguoti</a>
					<input type="submit" value="Ištrinti" class="btn btn-danger">
				</form>
			<?php endif; ?>
			<hr>
			<h4>Komentarai</h4>
			<br>
			<?php if($comments) : ?>
				<?php foreach($comments as $comment) : ?>

					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<h6><?php echo $comment['body']; ?> [<strong><?php echo $comment['NAME']; ?></strong>] <?php echo $post['created_at']; ?></h6>
					</nav>

				<?php endforeach; ?>
			<?php else : ?>
				<p>Komentarų nėra</p>
			<?php endif; ?>
			<hr>
			<h4>Pridėti komentarą</h4>
			<?php echo validation_errors(); ?>
			<?php echo form_open('comments/create/'.$post['id']); ?>
				<div class="form-group">
					<label>Vardas</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Emailas</label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Apibūdinimas</label>
					<textarea name="body" class="form-control"></textarea>
				</div>
				<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
				<button class="btn btn-primary" type="submit">Patvirtinti</button>
			</form>

	</div>
	</div>
