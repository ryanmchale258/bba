<div class="bodycontent">
	<h1>BB&amp;A Resource Order Form</h1>
	<form class="order row">
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
						echo '<label><input type="checkbox" name="presentations" value="'.$row->presentation_name.'">'.$row->presentation_name.'</label>';
					endforeach;
					echo '<br>';
				}
			?>
			<?php
			if($row->resource_cdprice != null){
				echo '<input class ="price" type="text" name="quantity" min="0"> x $<span class="mod">'.$row->resource_cdprice.'</span> for CD<br><br>';
			}
			if($row->resource_emailprice != null){
				echo '<input class ="price" type="text" name="quantity" min="0"> x $<span class="mod">'.$row->resource_emailprice.'</span> for Email<br><br>';
			}
			if($row->resource_manualprice != null){
				echo '<input class ="price" type="text" name="quantity" min="0"> x $<span class="mod">'.$row->resource_manualprice.'</span> for Manual<br><br>';
			}
			if($row->resource_individualprice != null){
				echo '$<span class="mod individualPrice">'.$row->resource_individualprice.'</span> Each<br><br>';
			}
			if($row->resource_discount != null){
				echo '$<span class="mod discount">'.$row->resource_discount.'</span> off for every <span class="discountReq">'.$row->resource_discountreq.'</span> ordered<br><br>';
			}
			if($row->resource_comboprice != null && $row->presentation_id == null){
				echo '<input class ="price" type="text" name="quantity" min="0"> x $<span class="mod">'.$row->resource_comboprice.'</span> for both<br><br>';
			}elseif($row->resource_comboprice != null && $row->presentation_id != null){
				echo '$<span class="mod">'.$row->resource_comboprice.'</span> for all<br><br>';
			}
			?>
			<p class="right">$<span class="total">0.00</span></p>
			<br><br>
		</div>
		<?php endforeach; ?>

		<h2>Subtotal</h2>
		<p class="right subtotal">$0.00</p>

	</form>
