<!DOCTYPE html>
<html>
<head>
	<title>Patients Review</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start -->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;Manage Patients Review</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12"> </div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="doctor_filter" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Feedback</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Admin/filter_feedback/new_feedback'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;New  Feedback </a></li>
						<li><a href="<?= base_url('Admin/filter_feedback/old_feedback'); ?>" class="waves-effect">
							<span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;Old Feedback </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Content</th>
					<th>Status</th>
					<th>Created  Date</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if($review_patient):
					count($review_patient);
				foreach($review_patient as $review): ?>
				
				<tbody>
					<tr>
						<td >
							<a class="tooltipped" data-position="top" data-tooltip="<?= $review->review_title; ?>">
							 <img src="<?= base_url().'./public/uploads/frontend/review_image/'.$review->review_image; ?>" class="responsive-img" id="doctor_image" height="50">
						 	</a>
						</td>
						<td >
							<?= $review->review_title; ?>
						</td>
						<td >
							<?= word_limiter($review->review_content, 4); ?>
						</td>
						<td>
							<!-- <?= $doc_fee->status; ?> -->
							<?php if($review->status == "Active"):
							echo '<span style="color:green">Active</span>';
							 else:
							 	echo '<span style="color:red">InActive</span>';
							?>
						<?php endif; ?>
						</td>
						<td>
							<span class="fa fa-clock" style="color: green">
								<?= date('d M, Y', strtotime($review->created_at)); ?>
							</span>
							
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $review->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>
							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $review->id; ?>">
								<li><a href="<?= base_url('Admin/delete_review/'.$review->id); ?>" onclick="return confirm('Are you sure you want to  delete this Feedback Details?..');" style="border-bottom: 1px dashed silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

								<?php if ($review->status == "Active"):  ?>
								<li><a href="<?= base_url('Admin/change_feedback_status/'.$review->id.'/Verify'); ?>">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								Verify</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Admin/change_feedback_status/'.$review->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;UnVerified</a></li>
								<?php endif; ?>
							</ul>
						<!---Action Dropdown --->
						</td>
					</tr>
				</tbody>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">Patients Review Not Found</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>

</div>
<!---Body Section End -->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>