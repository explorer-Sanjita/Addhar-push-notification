<?php $this->load->view('addhar/header'); ?>
<div id="breadcrumb" class="tjbase-breadcrumb" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="tjbase-module breadcrumb-style col-xs-12" id="tjmod-335">
				<div class="module-content">
					<ul itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb breadcrumb-style col-xs-12">
						<li class="active">
							<span class="divider icon-location"></span>
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" href="#" class="pathway"><span itemprop="name">About your ADDhar</span></a>
							<span class="divider">
								<img src="../../media/system/images/arrow.png" alt="" /> </span>
							<meta itemprop="position" content="2">
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
							<span itemprop="name">
								Check Enrolment & Update Status </span>
							<meta itemprop="position" content="3">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="main-content" class="tjbase-mainbodyblock  parentid-2376  com_content view-article ">
	<div class="container">
		<div id="mainbody" class="row tjbase-mainbody">
			<div id="maincontent" class="col-xs-12 col-sm-12" role="main">
				<div class="col-12">
					<div class="itempage">
						<div class="cs-top-gradient"></div>
						<div class="item-page" itemscope itemtype="https://schema.org/Article">
							<meta itemprop="inLanguage" content="en-GB" />
							<div class="page-header">
							</div>
							<div class="fields-container search-result-design">
							</div>
							<div itemprop="articleBody">
								<h4>Check ADDhar Status</h4>
								<ul>
									<li>
										Check if your ADDhar is generated or updated (In case you have updated at an Enrolment/Update center).
									</li>
									<li>
										You will require EID (Enrolment ID), SRN or URN to check your ADDhar Status. The EID is displayed on the top of your enrolment/update acknowledgement slip and contains 14 digit enrolment number (1234/12345/12345) and the 14 digit date and time (yyyy/mm/dd hh:mm:ss) of enrolment. These 28 digits together form your Enrolment ID (EID).
									</li>
									<li>
										In case if you lost EID you can retrieve lost or forgotten EID by your registered mobile number.
									</li>
								</ul><br>
								<?php
								$error = $this->session->flashdata('error_msg');
								if ($error) {
								?>
									<div class="alert alert-danger text-center" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('error_msg'); ?>
									</div>
								<?php } ?>
								<?php
								$success = $this->session->flashdata('success_msg');
								if ($success) {
								?>
									<div class="alert alert-success text-center" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('success_msg'); ?>
									</div>
								<?php } ?>
								<form action="" method="POST">
									<div class="form-group">
										<label for="number">Enter ADDhar Number :</label>
										<input type="number" name="number" class="form-control <?php echo (form_error('number')) ? 'is-invalid' : '' ?>" id="number" value="<?php echo (!set_value('number')) ? '' : set_value('number'); ?>">
										<?php echo form_error('number', '<div class="text-danger">', '</div>'); ?>
									</div>
									<button type="submit" class="btn btn-info btn-sm" name="form" value="number">Send OTP</button><br><br>
									<div class="otp-form" id="otpform" style="<?php echo ($form == 'otp_verify') ? 'display:block;' : 'display:none;' ?>">
										<div class="form-group">
											<label for="otp">Enter One Time Password (OTP) :</label>
											<input type="number" name="otp" class="form-control" id="otp" value="<?php echo (!set_value('otp')) ? '' : set_value('otp'); ?>">
											<?php echo form_error('otp', '<div class="text-danger">', '</div>'); ?>
										</div>
										<button type="submit" class="btn btn-primary btn-sm" name="form" value="otp">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('addhar/footer'); ?>