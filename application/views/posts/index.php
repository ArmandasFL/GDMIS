<div class="row">
	<div class="col-md-6 mx-auto">
		<h4><?= $title ?></h4>
		<br>
		<?php foreach($posts as $post) : ?>
			<h5><?php echo $post['title']; ?></h5>
			<div class="row mb-5">
				<div class="col-md-6">
					<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
				</div>

			</div>
		<?php endforeach; ?>
		<div class="pagination-links">
				<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
