<div class="container">
	<div class="row py-3">		
		<div class="col-md-12">
			<h1>Upload New Data</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a class="btn btn-primary" href="/admin">Back to Dashboard</a>
			<a class="btn btn-primary" href="/admin/orders">View Order Data</a>
		</div>
	</div>
	<div class="row py-5">
		<div class="col-md-6 offset-md-3">
			<h2>Upload Form</h2>
			<form action="/admin/store" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="upload" accept=".csv" required>
				</div>
				<button type="submit" class="btn btn-primary">Upload</button>
			</form>
		</div>
	</div>
</div>

