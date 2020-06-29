<?php if($this->session->userdata('username')){ 

  redirect($this->session->userdata('url'));
}else{
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
	  <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<title>Document</title>
	<style>
		body{
			background-color: white;
		}

		.kotak {
			width: 500px;
			background-color: aquamarine;
			margin: auto;
			padding: 20px;
			border-radius: 10px;
		}
		.form-login button{
			width:100%;
		}
		.judul-login{
			text-align: center;
			font-size: 30px;
			font-family: sans-serif;
		}
		.container .kotak-logo{
			width: 500px;
			margin: auto;
			margin-top: 60px;
			text-align: center;
		}
		.kotak-logo h2{
			letter-spacing: 5px;
			font-size: 30PX;
			margin-top: 5px;
			font-weight: bold;
			margin-bottom: 0px;
		}
		.kotak-logo span{
			font-weight: bold;
			margin-bottom: 15px;
			display: inline-block;
			font-size: 12px;
		}

	</style>
</head>

<body>
	<div class="container">
		<div class="kotak-logo">
			<img width="120" height="120" src="<?php echo base_url('assets/img/logo.png') ?>" alt="">
			<h2 class="">SIRLABKOM</h2>
			<span>SISTEM RESERVASI LAB KOMPUTER</span>
		</div>
		<div class="kotak">
			<h3 class="judul-login">FORM LOGIN</h3>
			<hr>
			<?php if($this->session->flashdata('pesan')): ?>
			
			<?php echo $this->session->flashdata('pesan') ?>

		<?php endif ?>
		<form method="post" class="form-login" action="<?= base_url('Auth/proses_login') ?>">
			<div class="form-group">
				<i class="fas fa-users btn-4x"></i>
				<label for="username">Username / Email</label>
				<input type="text" name="username" class="form-control" id="username" value="<?php echo set_value('username') ?>">
				<?php echo form_error('username','<div style="color:red">','</div>'); ?>
			</div>
			<div class="form-group">
				<i class="fas fa-unlock"></i>
				<label for="password">Password</label>
				<input name="password" type="password" class="form-control" id="password">
				<?php echo form_error('password','<div style="color:red">','</div>'); ?>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</div>
</body>

</html>

<?php } ?>

