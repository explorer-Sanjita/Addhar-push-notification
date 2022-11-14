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
								Update ADDhar </span>
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
								<h1 class="content-heading">ADDhar Enrollment/Correction/Update Form</h1>
								<div class="row">
									<div class="col-md-12">
										<h6><i>ADDhar Enrolment and Mandatory Biometric Update is free. No charges are applicable for Form. In case of Cirrection/ Update, provice your ADDhar Number(UID),Full Name and only that field which needs Correction/Update.</i></h6>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-2">
										<input type="checkbox" name="nationality" checked="checked" disabled>&nbsp;&nbsp;<label>Resident</label>
									</div>
									<div class="col-md-3">
										<input type="checkbox" name="nationality" disabled>&nbsp;&nbsp;<label>Non-Resident(NRI*)</label>
									</div>
									<div class="col-md-7">
										<h6 style="color:red;"><i>Please follow he instructions overleaf while filling up the form. Use capital letters only.</i></h6>
									</div>
								</div><br>
								<p>
								<h6>Check ADDhar Status</h6>
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
								</ul>
								</p>
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
								<table class="table table-bordered">
									<tr>
										<th>1</th>
										<td><label>Pre Enrolment ID(If applicable):</label><br>
											<input type="text" name="pre_id" value="<?php echo (!set_value('pre_id')  && !empty($e_record)) ? set_value('pre_id', $e_record->user_eid) : set_value('pre_id'); ?>" disabled>
										</td>
										<th>2</th>
										<td><label>ADDhar Number(UID):</label><br>
											<input type="text" name="aadhar_no" maxlength="12" id="part" value="<?php echo (!set_value('aadhar_no')  && !empty($e_record)) ? set_value('aadhar_no', $e_record->addhar_number) : set_value('aadhar_no'); ?>" disabled>
										</td>
									</tr>
									<tr>
										<th>2.1</th>
										<td colspan="3">
											<input type="checkbox" name="biomatric" disabled>&nbsp;&nbsp;<label>Biometric Update(Phot + Fingerprint + Iris)</label>&nbsp;&nbsp;
											<input type="checkbox" name="biomatric" disabled>&nbsp;&nbsp;<label>Mobile</label>&nbsp;&nbsp;
											<input type="checkbox" name="biomatric" disabled>&nbsp;&nbsp;<label>Date of Birth</label>&nbsp;&nbsp;
											<input type="checkbox" name="biomatric" disabled checked="checked">&nbsp;&nbsp;<label>Address</label>&nbsp;&nbsp;
											<input type="checkbox" name="biomatric" disabled>&nbsp;&nbsp;<label>Gender</label>&nbsp;&nbsp;
											<input type="checkbox" name="biomatric" disabled>&nbsp;&nbsp;<label>Email</label>&nbsp;&nbsp;
										</td>
									</tr>
									<tr>
										<th>3</th>
										<td colspan="4">
											<label>Full Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="text" name="name" value="<?php echo (!set_value('name')  && !empty($e_record)) ? set_value('name', $e_record->user_name . ' ' . $e_record->middle_name . ' ' . $e_record->last_name) : set_value('name'); ?>" disabled>
										</td>
									</tr>
									<tr>
										<th>4</th>
										<td><label>Gender</label>
											<input type="checkbox" name="gender" disabled <?php if ($e_record->gender == 'Male') echo "checked='checked'"; ?>>&nbsp;&nbsp;<label>Male</label>&nbsp;&nbsp;
											<input type="checkbox" name="gender" disabled <?php if ($e_record->gender == 'Female') echo "checked='checked'"; ?>>&nbsp;&nbsp;<label>Female</label>&nbsp;&nbsp;
											<input type="checkbox" name="gender" disabled>&nbsp;&nbsp;<label>Transgender</label>&nbsp;&nbsp;
										</td>
										<th>5</th>
										<td>
											<label>Date of Birth:</label>&nbsp;&nbsp;<input type="text" name="age" style="width:80px;" value="<?php echo (!set_value('age')  && !empty($e_record)) ? set_value('age', $e_record->dob) : set_value('age'); ?>" disabled><br>
										</td>
									</tr>
									<form action="<?php echo base_url() ?>/home/updateAddhar/<?php echo encode($e_record->user_id) ?>"  method="POST">
										<tr>
											<th>6</th>
											<td colspan="3"><label>Address: </label>&nbsp;&nbsp;
												<textarea type="" name="address" style="width:100%;resize:vertical"><?php echo (!set_value('address')  && !empty($e_record)) ? set_value('address', $e_record->user_address) : set_value('address'); ?></textarea>
												<?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
											</td>
										</tr>
										<tr>
											<th>6</th>
											<td colspan="3"><label>choose other agencies for update address that link with addhar: </label><br>
												<?php if (!empty($agency_link)) {
													foreach ($agency_link as $key => $value) { ?>
														<input type="checkbox" name="other[<?php echo $value->agency_code; ?>]">&nbsp;&nbsp;<label><?php echo $value->agency_url; ?></label><br>
												<?php	}
												} ?>
											</td>
										</tr>
										<tr>
											<th>7</th>
											<td colspan="3"><label>Upload your Ekyc: </label><br>
												<input type="file" name="upload_file"  />
											</td>
										</tr>
										<tr>
											<th>8</th>
											<td colspan="3"><label>Enter ekyc password: </label><br>
												<input type="password" name="epassword" maxlength="4" />
											</td>
										</tr>
										<tr>
											<th>9</th>
											<td colspan="4">
												<button type="submit" class="btn btn-primary">Submit</button>
												<a href="<?php echo base_url() ?>home/verifyAddhar" class="btn btn-primary">Cancel</a>
											</td>
										</tr>
									</form>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('addhar/footer'); ?>