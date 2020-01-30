<div class="container">
	<div class="alert alert-danger">
		<?php echo $error; ?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p>Please see a list of accepted fields below and their required format:</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 border">
			<strong>Field</strong>
		</div>
		<div class="col-md-9 border">
			<strong>Accepted format</strong>
		</div>
	</div>
	<?php foreach(\MVC\Validation\OrderData::fieldFormats() AS $field): ?>
	<div class="row">
		<div class="col-md-3 border">
			<strong><?php echo $field['header']; ?></strong>
		</div>
		<div class="col-md-9 border">
			<?php echo $field['format']; ?>
		</div>
	</div>
	<?php endforeach; ?>
</div>

