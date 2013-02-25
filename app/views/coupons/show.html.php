<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2><?php echo $coupon->id ?></h2>
	
	<h3>Coupon Details</h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th>ID:</th>
				<td><?php echo $coupon->id ?></td>
			</tr>
			<tr>
				<th>Created:</th>
				<td><?php echo date( 'M d, Y', $coupon->created ) ?></td>
			</tr>
			<tr>
				<th>Amount:</th>
				<td><?php echo '$', money_format( '%i', $coupon->amount/100 ) ?></td>
			</tr>
			<tr>
				<th>Description:</th>
				<td><?php echo $coupon->description ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	
	<h3>Card Used</h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th>Name:</th>
				<td><?php echo $coupon->card->name ?></td>
				<th>Address:</th>
				<td><?php echo $coupon->card->address_line1, ', ', $coupon->card->address_line2 ?></td>
			</tr>
			<tr>
				<th>Number:</th>
				<td>**** **** **** <?php echo $coupon->card->last4 ?></td>
				<th>&nbsp;</th>
				<td><?php echo $coupon->card->address_city, ', ', $coupon->card->address_state, ' ', $coupon->card->address_zip, ' ', $coupon->card->address_country ?></td>
			</tr>
			<tr>
				<th>Fingerprint:</th>
				<td><?php echo $coupon->card->fingerprint ?></td>
				<th>Origin:</th>
				<td><?php echo $coupon->card->country ?></td>
			</tr>
			<tr>
				<th>Expires:</th>
				<td><?php echo $coupon->card->exp_month, '/', $coupon->card->exp_year ?></td>
				<th>CVC Check:</th>
				<td><?php echo $coupon->card->cvc_check ?></td>
			</tr>
			<tr>
				<th>Type:</th>
				<td><?php echo $coupon->card->type ?></td>
				<th>Street Check:</th>
				<td><?php echo $coupon->card->address_line1_check ?></td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td>&nbsp;</td>
				<th>Zip Check:</th>
				<td><?php echo $coupon->card->address_zip_check ?></td>
			</tr>
		</tbody>
	</table>
	
</div>
<?php
/*
echo('<pre>');
	print_r( $coupon );
echo('</pre>');
*/