<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2><?php echo $customer->description ?></h2>
	
	<h3>Customer Details</h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th>ID:</th>
				<td><?php echo $customer->id ?></td>
			</tr>
			<tr>
				<th>Created:</th>
				<td><?php echo date( 'M d, Y', $customer->created ) ?></td>
			</tr>
			<tr>
				<th>Email:</th>
				<td><?php echo $customer->email ?></td>
			</tr>
			<tr>
				<th>Description:</th>
				<td><?php echo $customer->description ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	
	<h3>Active Card</h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th>Name:</th>
				<td><?php echo $customer->active_card->name ?></td>
				<th>Address:</th>
				<td><?php echo $customer->active_card->address_line1, ', ', $customer->active_card->address_line2 ?></td>
			</tr>
			<tr>
				<th>Number:</th>
				<td>**** **** **** <?php echo $customer->active_card->last4 ?></td>
				<th>&nbsp;</th>
				<td><?php echo $customer->active_card->address_city, ', ', $customer->active_card->address_state, ' ', $customer->active_card->address_zip, ' ', $customer->active_card->address_country ?></td>
			</tr>
			<tr>
				<th>Fingerprint:</th>
				<td><?php echo $customer->active_card->fingerprint ?></td>
				<th>Origin:</th>
				<td><?php echo $customer->active_card->country ?></td>
			</tr>
			<tr>
				<th>Expires:</th>
				<td><?php echo $customer->active_card->exp_month, '/', $customer->active_card->exp_year ?></td>
				<th>CVC Check:</th>
				<td><?php echo $customer->active_card->cvc_check ?></td>
			</tr>
			<tr>
				<th>Type:</th>
				<td><?php echo $customer->active_card->type ?></td>
				<th>Street Check:</th>
				<td><?php echo $customer->active_card->address_line1_check ?></td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td>&nbsp;</td>
				<th>Zip Check:</th>
				<td><?php echo $customer->active_card->address_zip_check ?></td>
			</tr>
		</tbody>
	</table>
	
</div>
<?php
/*
echo('<pre>');
	print_r( $customer );
echo('</pre>');
*/