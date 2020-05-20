<html>
	<head>
		<title>GDMIS</title>
		<link rel="stylesheet" href="https://bootswatch.com/3/cyborg/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

	</head>
	<body>
	<nav class="navbar navbar-inverse">
      <div class="container">
				<div class="logo">
					<a href="<?php echo base_url(); ?>">
           <img src="assets/images/dimplomas.png">
        </div>
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">GDMIS</a>
        </div>
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>">Pradžia</a></li>
            <li><a href="<?php echo base_url(); ?>posts">Galerija</a></li>
             <li><a href="<?php echo base_url(); ?>categories">Forumas</a></li>
						 <li><a href="<?php echo base_url(); ?>about">Apie Mus</a></li>
             <li><a href="<?php echo base_url(); ?>Rekvizitai">Kontaktai</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php if(!$this->session->userdata('logged_in')) : ?>
            <li><a href="<?php echo base_url(); ?>users/login">Prisijungti</a></li>
            <li><a href="<?php echo base_url(); ?>users/register">Registruotis</a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
            <li><a href="<?php echo base_url(); ?>posts/create">Sukurti Postą</a></li>
            <li><a href="<?php echo base_url(); ?>categories/create">Sukurti Kategoriją</a></li>
            <li><a href="<?php echo base_url(); ?>users/logout">Atsijungti</a></li>
          <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <!-- Rodyti vietą -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>
