<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Data Preview</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<strong>Column</strong>
		</div>
		<div class="col-md-9">
			<strong>Value</strong>
		</div>
	</div>
	<?php foreach(current($data) AS $key => $value): ?>
	<div class="row">
		<div class="col-md-3">
			<strong><?php echo $key; ?></strong>
		</div>
		<div class="col-md-9">
			<?php echo $value; ?>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="row py-3">
		<form action="/admin/store/confirm" method="post">
			<input type="hidden" name="path" value="<?php echo $path; ?>">
			<button class="btn btn-primary">Confirm Upload</button>
		</form>
	</div>
</div>


