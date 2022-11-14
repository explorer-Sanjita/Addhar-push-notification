<?php $this->load->view('home/header'); ?>
<!--=== Content Part ===-->
<div class="container content">
	<div class="row " style="margin-bottom: 30px;">
		<div class="col-md-9" style="margin-bottom: 30px;">
			<div class="headline">
				<h2>User Form</h2>
			</div>
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
			<form method="post" class="sky-form sky-changes-3">
				<fieldset>
					<div class="row">
						<section class="col col-4">
							<label class="label">First Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="fname" id="fname" value="<?php echo set_value('fname'); ?>">
								<?php echo form_error('fname', '<div class="text-danger">', '</div>'); ?>
							</label>
						</section>
						<section class="col col-4">
							<label class="label">Middle Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="midname" id="midname" value="<?php echo set_value('midname'); ?>">
								<?php echo form_error('midname', '<div class="text-danger">', '</div>'); ?>
							</label>
						</section>
						<section class="col col-4">
							<label class="label">last Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="lname" id="lname" value="<?php echo set_value('lname'); ?>">
								<?php echo form_error('lname', '<div class="text-danger">', '</div>'); ?>
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-4">
							<label class="label">Date of Birth</label>
							<label class="input">
								<i class="icon-append fa fa-calendar-check-o"></i>
								<input type="date" name="dob" id="dob" value="<?php echo set_value('dob'); ?>">
								<?php echo form_error('dob', '<div class="text-danger">', '</div>'); ?>
							</label>
						</section>
						<section class="col col-4">
							<label class="label">Mobile Number</label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="number" name="number" id="number" value="<?php echo set_value('number'); ?>">
								<?php echo form_error('number', '<div class="text-danger">', '</div>'); ?>
							</label>
						</section>
						<section class="col col-4">
							<label class="label">Addhar Number</label>
							<label class="input">
								<i class="icon-append fa fa-tag"></i>
								<input type="number" name="addhar" id="addhar" value="<?php echo set_value('addhar'); ?>">
								<?php echo form_error('addhar', '<div class="text-danger">', '</div>'); ?>
							</label>
						</section>
					</div>

					<section>
						<label class="label">Address</label>
						<label class="textarea">
							<i class="icon-append fa fa-comment"></i>
							<textarea rows="4" name="address" id="address"><?php echo set_value('address'); ?></textarea>
							<?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
						</label>
					</section>

				</fieldset>
				<div class="alert alert-success successBox" style="width: 90%; margin-left: 30px;">
					<button type="button" class="close" onclick="showMsg(1);">×</button>
					<strong style="font-size: 16px;">Congratulations!</strong><span class="alert-link"> Your
						Message Has been sent!</span>
				</div>

				<footer>
					<button type="submit" class="btn-u">add user</button>
				</footer>

			</form>
		</div>
		<!--/col-md-9-->

		<div class="col-md-3" style="margin-top: 56px;">
			<!-- Address -->
			<div class="headline">
				<h2>Address</h2>
			</div>
			<ul class="list-unstyled who" style="margin-bottom: 30px;">
				<li><a href="#"><i class="fa fa-home"></i>Ahmedabad, IN.</a></li>
				<li><a href="#"><i class="fa fa-envelope"></i>ybi@gmail.com</a></li>
				<li><a href="#"><i class="fa fa-phone"></i>886 666 00555</a></li>
				<li><a href="#"><i class="fa fa-globe"></i>http://www.ybi.com</a></li>
			</ul>

			<!-- Business Hours -->
			<div class="headline">
				<h2>Business Hours</h2>
			</div>
			<ul class="list-unstyled " style="margin-bottom: 30px;">
				<li><strong>Monday-Saturday:</strong> 24/7 Available.</li>
				<li><strong>Sunday:</strong> 4 AM to 11 PM.</li>
			</ul>

			<!-- Why choose us? -->
			<div class="headline">
				<h2>Why Choose Us?</h2>
			</div>
			<p>All financial facilities can be accessed here under one roof, making YBI Bank a one point
				contact for all your financial needs.</p>
			<ul class="list-unstyled">
				<li><i class="fa fa-check color-green"></i> 24/7 UPI Support.</li>
				<li><i class="fa fa-check color-green"></i> Eminent and Experienced Staff.</li>
				<li><i class="fa fa-check color-green"></i> Multiple Options For accounts.</li>
			</ul>
		</div>
		<!--/col-md-3-->
	</div>
	<!--/row-->
</div>
<!--/container-->
<?php $this->load->view('home/footer'); ?>