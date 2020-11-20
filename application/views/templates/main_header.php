<!DOCTYPE html>
<html lang="en">
<head>
    <title>PROBLEM MANAGEMENT</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="<?php echo base_url('assets/dist/semantic.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/pacejs/pace.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/datedropper/datedropper.min.css'); ?>" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" />
    
    <!--jquery-->
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
    <!--JS-->
    <script data-pace-options='{ "ajax": false }' src="<?php echo base_url('assets/plugins/pacejs/pace.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
</head>

<body>
    	<div class="ui grid">
		<!-- BEGIN COMPUTER ONLY MENU -->
		<div class="computer only row">
			<div class="column">
				<div class="ui top fixed menu">
					<div class="item logo brand">
						<table class="brandlogo">
							<tr>
								<td style="vertical-align: middle;">
									<span style="font-size: 18px; font-weight: bold;">PROBLEM MANAGEMENT</span>
								</td>
							</tr>
						</table>
					</div>
					<!-- Menu Nav -->
					<div class="right menu open-sans">
						<a href="<?php echo base_url('/manage/dashboard');?>" class="nav item">DASHBOARD</a>
						<a href="<?php echo base_url('/manage/incident');?>" class="nav item">DATA INCIDENT LOG</a>
						<a href="<?php echo base_url('/manage/problem_log');?>" class="nav item">DATA PROBLEM LOG</a>
						<a href="<?php echo base_url('/manage/problem_reg');?>" class="nav item">DATA PROBLEM REG</a>
						<a href="<?php echo base_url('/manage/known_error');?>" class="nav item">DATA KNOWN ERROR</a>
						<a href="<?php echo base_url('/manage/user');?>" class="nav item">MANAGE AKUN</a>
						<a class="nav item" href="<?php echo base_url('/manage/login/logout'); ?>">
							<button class="ui teal button">
						        <i class="sign out icon"></i>
						         Keluar
					      	</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END COMPUTER ONLY MENU -->
	</div>
    <!--maincontent-->