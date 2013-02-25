<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2><?php echo $plan->id ?></h2>
	
	<h3>Plan Details</h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th>ID:</th>
				<td><?php echo $plan->id ?></td>
			</tr>
			<tr>
				<th>Created:</th>
				<td><?php echo date( 'M d, Y', $plan->created ) ?></td>
			</tr>
			<tr>
				<th>Amount:</th>
				<td><?php echo '$', money_format( '%i', $plan->amount/100 ) ?></td>
			</tr>
			<tr>
				<th>Description:</th>
				<td><?php echo $plan->description ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	
	<h3>Card Used</h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th>Name:</th>
				<td><?php echo $plan->card->name ?></td>
				<th>Address:</th>
				<td><?php echo $plan->card->address_line1, ', ', $plan->card->address_line2 ?></td>
			</tr>
			<tr>
				<th>Number:</th>
				<td>**** **** **** <?php echo $plan->card->last4 ?></td>
				<th>&nbsp;</th>
				<td><?php echo $plan->card->address_city, ', ', $plan->card->address_state, ' ', $plan->card->address_zip, ' ', $plan->card->address_country ?></td>
			</tr>
			<tr>
				<th>Fingerprint:</th>
				<td><?php echo $plan->card->fingerprint ?></td>
				<th>Origin:</th>
				<td><?php echo $plan->card->country ?></td>
			</tr>
			<tr>
				<th>Expires:</th>
				<td><?php echo $plan->card->exp_month, '/', $plan->card->exp_year ?></td>
				<th>CVC Check:</th>
				<td><?php echo $plan->card->cvc_check ?></td>
			</tr>
			<tr>
				<th>Type:</th>
				<td><?php echo $plan->card->type ?></td>
				<th>Street Check:</th>
				<td><?php echo $plan->card->address_line1_check ?></td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td>&nbsp;</td>
				<th>Zip Check:</th>
				<td><?php echo $plan->card->address_zip_check ?></td>
			</tr>
		</tbody>
	</table>
	
</div>
<?php
/*
echo('<pre>');
	print_r( $plan );
echo('</pre>');
*/