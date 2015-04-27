<div class="bodycontent">
	<h1>BB&amp;A Resource Order Form</h1>
	<form class="order row" method="post" action="<?php echo base_url() . index_page() ?>send/orderform">
		<?php foreach($arrResources as $row): ?>
		<div class="product">
			<label class="productTitle"><?php echo $row->resource_name;?></label>
			<p><?php echo $row->resource_desc;?></p>
			<?php
				if($row->presentation_id != null){
					$rid = $row->resource_id;
					$arrPresentations = 'arrPresentations'.$rid;
					$newPresentation = eval('return $'.$arrPresentations.';');
					foreach($newPresentation as $row):
						echo '<label><input type="checkbox" name="presentations[]" value="'.$row->presentation_name.'">'.$row->presentation_name.'</label>';
					endforeach;
					echo '<br>';
				}
			?>
			<?php
			if($row->resource_cdprice != null){
				echo '<input class ="price" type="text" name="cd-'. $row->resource_slug . '" min="0"> x $<span class="mod">'.$row->resource_cdprice.'</span> for CD<br><br>';
			}
			if($row->resource_emailprice != null){
				echo '<input class ="price" type="text" name="email-'. $row->resource_slug . '" min="0"> x $<span class="mod">'.$row->resource_emailprice.'</span> for Email<br><br>';
			}
			if($row->resource_manualprice != null){
				echo '<input class ="price" type="text" name="manual-'. $row->resource_slug . '" min="0"> x $<span class="mod">'.$row->resource_manualprice.'</span> for Manual<br><br>';
			}
			if($row->resource_individualprice != null){
				echo '$<span class="mod individualPrice">'.$row->resource_individualprice.'</span> Each<br><br>';
			}
			if($row->resource_discount != null){
				echo '$<span class="mod discount">'.$row->resource_discount.'</span> off for every <span class="discountReq">'.$row->resource_discountreq.'</span> ordered<br><br>';
			}
			if($row->resource_comboprice != null && $row->presentation_id == null){
				echo '<input class ="price" type="text" name="combo-'. $row->resource_slug . '" min="0"> x $<span class="mod">'.$row->resource_comboprice.'</span> for both<br><br>';
			}elseif($row->resource_comboprice != null && $row->presentation_id != null){
				echo '$<span class="mod">'.$row->resource_comboprice.'</span> for all<br><br>';
			}
			?>
			<p class="right">$<span class="total">0.00</span></p>
			<br><br>
		</div>
		<?php endforeach; ?>

		<div class="formPrice">
			<h2>Subtotal</h2>
			<p class="right subtotal">$0.00</p>
		</div>
		
		<div class="formPrice">
			<h2>Shipping and Handling</h2>
			<?php foreach($arrShipping as $row): ?>
				<?php
					echo '<label>For orders totalling less than $<span class="shipReq">'.$row->shipping_level.'</span>, add $<span class="shipBelow">'.$row->shipping_below.'</span></label>';
					echo '<label>For orders totalling more than $<span class="shipReq">'.$row->shipping_level.'</span>, add $<span class="shipAbove">'.$row->shipping_above.'</span></label>';
				?>
			<?php endforeach; ?>
			<p class="right shipTotal">$0.00</p>
		</div>

		<div class="formPrice">
			<h2>Total Order</h2>
			<p class="right grandtotal">$0.00</p>
		</div>

		<div class="formInfo row">
			<label class="small-6 columns" for="name">Name:<br>
				<input name="name" type="text">
			</label>
			<label class="small-6 columns" for="title">Title:<br>
				<input name="title" type="text">
			</label>
			<label class="small-6 columns" for="homeName">LTC Home Name:<br>
				<input name="homeName" type="text">
			</label>
			<label class="small-6 columns" for="phone">Phone:<br>
				<input name="phone" type="text">
			</label>
			<label class="small-6 columns" for="ext">Ext:<br>
				<input name="ext" type="text">
			</label>
			<label class="small-6 columns" for="email">Email:<br>
				<input name="email" type="text">
			</label>
			<label class="small-6 columns" for="street">Street:<br>
				<input name="street" type="text">
			</label>
			<label class="small-6 columns" for="city">City:<br>
				<input name="city" type="text">
			</label>
			<label class="small-6 columns" for="province">Province:<br>
				<input name="province" type="text">
			</label>
			<label class="small-6 columns" for="postal">Postal Code:<br>
				<input name="postal" type="text">
			</label>
			<input id="submit" type="submit" name="submit" value="send">
		</div>

	</form>
