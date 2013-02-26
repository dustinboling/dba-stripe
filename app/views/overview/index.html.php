<div class="wrap dbastripe">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Stripe Dashboard</h2>

	<div id="statchart">
	    <div id="statchart-box">
	        <h3>Summary</h3>
	        <div id="stat-chart-container">
	        	<div id="stats-nuggets">
	                <ul>
	                    <li><div><span>$<?php echo isset( $transfers[1] ) ? money_format( '%i', $transfers[1]->amount/100 ) : 0; ?></span> last transfer</div></li>
	                    <li><div><span>$<?php echo isset( $transfers[0] ) ? money_format( '%i', $transfers[1]->amount/100 ) : 0; ?></span> next transfer</div></li>
	                    <li><div><span>21</span> total customers</div></li>
	                    <li><div><span>$7,373.77</span> ytd volume</div></li>
	                    <li><div class="last"><span>$24,992.04</span> total volume</div></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>
<!--
<div id="statchart">
    <div id="statchart-box">
        <h3>Overview</h3>
        <ul id="chartswitch">
                        <li><a href="user-stats.php?blog=wordpress.dev&amp;api_key=3a66dd92e2ba" class="active">6 Month</a></li>
            <li><a href="user-stats.php?blog=wordpress.dev&amp;api_key=3a66dd92e2ba&amp;show=one-year">1 Year</a></li>
            <li><a href="user-stats.php?blog=wordpress.dev&amp;api_key=3a66dd92e2ba&amp;show=all-time">All Time</a></li>
        </ul>
        <div id="stat-chart-container">
        	<div id="stats-nuggets">
                <ul>
                    <li><div><span>0</span> total spam</div></li>
                    <li><div><span>0</span> total ham</div></li>
                    <li><div><span>0</span> missed spam</div></li>
                    <li><div><span>0</span> false positives</div></li>
                    <li><div class="last"><span>0%</span> accuracy rate</div></li>
                </ul>
            </div>
        </div>
    </div>
</div>
-->
	<div id="statchart">
	    <div id="statchart-box">
	        <h3 style="margin-bottom: 0;">Recent Transfers</h3>
	        <div id="stat-chart-container" class="historical">
	        	<table class="statsDay" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th style="background-color: #fff;">Posting Date</th>
							<th class="center">ID</th>
							<th class="center">Amount</th>
							<th class="center">Fee</th>
							<th class="center">Status</th>
						</tr>
						<?php $count = 0; ?>
						<?php foreach($transfers as $tr ) : ?><pre><?php //var_export( $tr ); ?></pre>
						
						<tr <?php echo (++$count % 2) ? 'class="alt"' : ''; ?>>
							<th scope="row"><?php echo date( 'M d, Y', $tr->date ); ?></th>
							<td><a href="/wp-admin/admin.php?page=dbastripe_transfers&action=show&transfer_id=<?php echo $tr->id; ?>"><?php echo $tr->id; ?></td>
							<td><?php echo '$' . money_format( '%i', $tr->amount/100 ); ?></td>
							<td><?php echo '$' . money_format( '%i', $tr->fee/100 ); ?></td>
							<td><?php echo $tr->status; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
	            </table>
	            <!--
				<div style="padding: 10px;">
	                <h2>What the heck is <em>ham</em> doing on my blog? I’m a vegetarian.</h2>
	                <p><strong>Spam</strong> most people know; it's the unwanted commercial comments on their blogs. <strong>Ham</strong> is what we call its counterpart, legitimate comments. On the Akismet mistakes side, <strong>missed spam</strong> is pretty self-explanatory, and a <strong>false positive</strong> is a legitimate comment incorrectly identified as spam (which, we hope, happens very rarely). Also, we meant no offense to vegetarians.</p>
		        </div>
				-->
			</div>
	    </div>
	</div>
	<div id="statchart">
	    <div id="statchart-box">
	        <h3 style="margin-bottom: 0;">Recent Payments</h3>
	        <div id="stat-chart-container" class="historical">
	        	<table class="statsDay" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th style="background-color: #fff;">Date</th>
							<th class="center">Charge ID</th>
							<th class="center">Customer</th>
							<th class="center">Customer Email</th>
							<th class="center">Amount</th>
							<th class="center">Fee</th>
							<th class="center">Paid</th>
						</tr>
						<?php $count = 0; ?>
						<?php foreach($charges as $ch ) : ?><pre><?php //var_export( $ch ); ?></pre>
						
						<tr <?php echo (++$count % 2) ? 'class="alt"' : ''; ?>>
							<th scope="row"><?php echo date( 'M d, Y', $ch->created ); ?></th>
							<td><a href="/wp-admin/admin.php?page=dbastripe_payments&action=show&charge_id=<?php echo $ch->id; ?>"><?php echo $ch->id; ?></td>
							<td><a href="/wp-admin/admin.php?page=dbastripe_customers&action=show&customer_id=<?php echo $ch->customer->id; ?>"><?php echo $ch->customer->description; ?></a></td>
							<td><a href="mailto:<?php echo $ch->customer->email; ?>" target="_blank"><?php echo $ch->customer->email; ?></a></td>
							<td><?php echo '$' . money_format( '%i', $ch->amount/100 ); ?></td>
							<td><?php echo '$' . money_format( '%i', $ch->fee/100 ); ?></td>
							<td><?php echo $ch->paid ? 'yes' : 'no'; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
	            </table>
			</div>
	    </div>
	</div>
	<div id="statchart">
	    <div id="statchart-box">
	        <h3 style="margin-bottom: 0;">Newest Customers</h3>
	        <div id="stat-chart-container" class="historical">
	        	<table class="statsDay" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th style="background-color: #fff;">Date</th>
							<th class="center">Description</th>
							<th class="center">Email</th>
							<th class="center">ID</th>
							<th class="center">Delinquent</th>
						</tr>
						<?php $count = 0; ?>
						<?php foreach($customers as $cu ) : ?>
						<tr <?php echo (++$count % 2) ? 'class="alt"' : ''; ?>>
							<th scope="row"><?php echo date( 'M d, Y', $cu->created ); ?></th>
							<td><?php echo $cu->description; ?></td>
							<td><?php echo $cu->email; ?></td>
							<td><?php echo $cu->id; ?></td>
							<td><?php echo $cu->delinquent ? 'yes' : 'no'; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
	            </table>
	            <!--
				<div style="padding: 10px;">
	                <h2>What the heck is <em>ham</em> doing on my blog? I’m a vegetarian.</h2>
	                <p><strong>Spam</strong> most people know; it's the unwanted commercial comments on their blogs. <strong>Ham</strong> is what we call its counterpart, legitimate comments. On the Akismet mistakes side, <strong>missed spam</strong> is pretty self-explanatory, and a <strong>false positive</strong> is a legitimate comment incorrectly identified as spam (which, we hope, happens very rarely). Also, we meant no offense to vegetarians.</p>
		        </div>
				-->
			</div>
	    </div>
	</div>
</div><!--/wrap -->