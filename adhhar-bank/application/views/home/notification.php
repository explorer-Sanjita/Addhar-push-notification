<?php $this->load->view('home/header'); ?>
<!--=== Content Part ===-->
<div class="container content">
	<div class="row " style="margin-bottom: 30px;">
		<div class="col-md-12" style="margin-bottom: 30px;">
			<div class="headline">
				<h2>User Addhar Updated</h2>
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
			<fieldset>
				<div class="row">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Adhar Number</th>
									<th>Updated Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($update_array->result)) {
									foreach ($update_array->result as $key => $value) { ?>
										<tr>
											<td><?php echo $value->addhar_number ?> </td>
											<td><?php echo $value->updated_address ?></td>
											<td>
												<form action="<?php echo base_url() ?>/home/update" method="post">
													<input type="hidden" name="id" value="<?php echo $value->id ?>" />
													<input type="hidden" name="addhar_number" value="<?php echo $value->addhar_number ?>" />
													<input type="hidden" name="updated_address" value="<?php echo $value->updated_address ?>" />
													<button type="submit" class="btn btn-sm btn-primary">Mark As  Read</button>
												</form>
											</td>
										</tr>
								<?php	} }
								?>
							</tbody>
						</table>
					</div>
			</fieldset>
		</div>
		<!--/col-md-9-->
	</div>
	<!--/row-->
</div>
<!--/container-->
<?php $this->load->view('home/footer'); ?>