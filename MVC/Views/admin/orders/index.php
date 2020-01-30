<div class="container py-3">
	<div class="row">
		<div class="col-md-3 border">
			<strong>Order IDs</strong>
		</div>
		<div class="col-md-9 border">
			<strong>Order Overview</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 border">
			<?php foreach(\MVC\Models\Order::ids() AS $key => $order): ?>
				<div class="row py-1">
					<div class="col-md-12">
						<button type="button" class="btn btn-primary btn-block" order-target="<?php echo $order->order_id; ?>">View Order <?php echo $order->order_id; ?></button>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="col-md-9 border">
			<?php foreach(\MVC\Models\Order::ids() AS $key => $order): ?>
				<div class="row py-1" style="display: none;" order-id="<?php echo $order->order_id; ?>">
					<div class="col-md-12">
						<div id="accordion<?php echo $key; ?>">
						<?php foreach(\MVC\Models\Order::id($order->order_id) AS $itemKey => $item): ?>
							<div class="card py-1">
								<div class="card-header">
								<h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#order<?php echo $key.'-'.$itemKey; ?>" aria-expanded="true" aria-controls="order<?php echo $key.'-'.$itemKey; ?>">
									<?php echo $item->product_title; ?>
								</button>
								</h5>
								</div>

								<div id="order<?php echo $key.'-'.$itemKey; ?>" class="collapse" data-parent="#accordion<?php echo $key; ?>">
									<div class="card-body">
										<div class="row">
											<div class="col-md-3 border">
												<strong>Customer Name</strong>
											</div>
											<div class="col-md-3 border">
												<strong>Customer Email</strong>
											</div>
											<div class="col-md-3 border">
												<strong>Customer Phone</strong>
											</div>
											<div class="col-md-3 border">
												<strong>Customer Address</strong>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3 border">
												<?php echo $item->first_name.' '.$item->last_name; ?>
											</div>
											<div class="col-md-3 border">
												<?php echo $item->email_address; ?>
											</div>
											<div class="col-md-3 border">
												<?php echo $item->contact_number; ?>
											</div>
											<div class="col-md-3 border">
												<?php echo $item->address_line_1; ?><br>
												<?php echo $item->address_line_2; ?><br>
												<?php echo $item->city; ?><br>
												<?php echo $item->county; ?><br>
												<?php echo $item->country; ?><br>
												<?php echo $item->post_code; ?>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-3 border">
												<strong>Product SKU</strong>
											</div>
											<div class="col-md-3 border">
												<strong>Product Title</strong>
											</div>
											<div class="col-md-6 border">
												<strong>Product Image</strong>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3 border">
												<?php echo $item->product_sku; ?>
											</div>
											<div class="col-md-3 border">
												<?php echo $item->product_title; ?>
											</div>
											<div class="col-md-6 border">
												<img src="<?php echo $item->product_image; ?>" class="img-fluid">
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-3 border">
												<strong>Type</strong>
											</div>
											<div class="col-md-3 border">
												<strong>Paymemnt Method</strong>
											</div>
											<div class="col-md-3 border">
												<strong>Price Paid</strong>
											</div>
											<div class="col-md-3 border">
												<strong>Order Completed</strong>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3 border">
												<?php echo $item->type; ?>
											</div>
											<div class="col-md-3 border">
												<?php echo $item->payment_method; ?>
											</div>
											<div class="col-md-3 border">
												£<?php echo $item->product_price; ?>
											</div>
											<div class="col-md-3 border">
												<?php echo $item->order_date; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						<div class="alert alert-success">Total Order Value: £<?php echo \MVC\Models\Order::totalValue($order->order_id); ?></div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>