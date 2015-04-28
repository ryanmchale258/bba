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
					foreach($newPresentation as $pres):
						echo '<label><input type="checkbox" name="' . $row->resource_slug . '[]" value="'.$pres->presentation_name.'">'.$pres->presentation_name.'</label>';
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
			<input type="text" class="right total disabled" value="0.00" name=<?php echo '"price-' . $row->resource_slug . '"'; ?>>
			<p class="right">$</p>
			<br><br>
		</div>
		<?php endforeach; ?>

		<div class="formPrice">
			<h2>Subtotal</h2>
			<input type="text" class="right subtotal disabled" value="0.00" name="price-subtotal">
			<p class="right">$</p>
		</div>
		
		<div class="formPrice">
			<h2>Shipping and Handling</h2>
			<?php foreach($arrShipping as $row): ?>
				<?php
					echo '<label>For orders totalling less than $<span class="shipReq">'.$row->shipping_level.'</span>, add $<span class="shipBelow">'.$row->shipping_below.'</span></label>';
					echo '<label>For orders totalling more than $<span class="shipReq">'.$row->shipping_level.'</span>, add $<span class="shipAbove">'.$row->shipping_above.'</span></label>';
				?>
			<?php endforeach; ?>
			<input type="text" class="right shipTotal disabled" value="0.00" name="price-shipping">
			<p class="right">$</p>
		</div>

		<div class="formPrice">
			<h2>Total Order</h2>
			<input type="text" class="right grandtotal disabled" value="0.00" name="price-grandtotal">
			<p class="right">$</p>
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
