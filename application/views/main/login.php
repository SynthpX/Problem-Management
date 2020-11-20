<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="<?php echo base_url('assets/dist/semantic.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/pacejs/pace.css'); ?>" rel="stylesheet" />
</head>
<body>
	<div class="ui centered grid">
		<div class="four wide computer column" style="margin-top: 10%;">
			<form action="<?php echo base_url('manage/login/proses_login'); ?>" method="post">
				<div class="ui segment">
					<!-- validasi -->
					  <?php if($this->session->flashdata('pesan1')) {?>
					          <div class="eight wide phone eight wide tablet five wide computer centered column">
					              <div class="ui red icon message">
					                  <i class="remove icon"></i>
					                  <i class="close icon"></i>
					                  <div class="content">
					                  <div class="header">
					                    Login Gagal
					                  </div>
					                  <?php echo $this->session->flashdata('pesan1'); ?>
					                  </div>
					              </div>
					          </div>
					      	<br>
					  <?php }elseif($this->session->flashdata('pesan2')) {?>
					          <div class="eight wide phone eight wide tablet five wide computer centered column">
					              <div class="ui red icon message">
					                  <i class="remove icon"></i>
					                  <i class="close icon"></i>
					                  <div class="content">
					                  <div class="header">
					                    Login Gagal
					                  </div>
					                  <?php echo $this->session->flashdata('pesan2'); ?>
					                  </div>
					              </div>
					          </div>
					      	<br>
					  <?php }; ?>
					  <!-- End validasi -->
					<div class="ui form">
				        <div class="field">
				            <label>USERNAME</label>
				            <input name="username" placeholder="USERNAME" type="text">
				        </div>
				        <div class="field">
				            <label>PASSWOD</label>
				            <input name="password" placeholder="PASSWORD" type="password">
				        </div>
				    </div>	
				    <br>
				    <button  type="submit" style="width: 100%;" class="ui primary button">
			            <i class="ion-log-in icon"></i>
			            LOGIN
			        </button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>