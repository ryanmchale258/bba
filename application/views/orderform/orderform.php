<div class="bodycontent">
	<h1>BB&amp;A Resource Order Form</h1>
	<form class="order row">
		<?php foreach($arrResources as $row): ?>
		<div class="product">
			<label class="productTitle"><?php echo $row->resource_name;?></label>
			<p><?php echo $row->resource_desc;?></p>
			<?php 
				if($row->presentation_id != null){
					foreach($arrPresentations as $row):
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
				echo '<input class ="price" type="text" name="quantity" min="0"> x $<span class="mod">'.$row->resource_individualprice.'</span> Each<br><br>';
			}
			if($row->resource_comboprice != null){
				echo '<input class ="price" type="text" name="quantity" min="0"> x $<span class="mod">'.$row->resource_comboprice.'</span> for both<br><br>';
			}
			?>
			<p class="right total">$0.00</p>
			<br><br>
		</div>
		<?php endforeach; ?>

		<div class="product">
			<label class="productTitle">1. Quality Care Audits, 1st Edition, September 2014</label>
			<p>25 audits in the areas of Residents’ Dining, Food Production and Nutrition Care to support the Home’s Continuous Quality Improvement program</p>
			CD <input class="price" type="text" name="quantity" min="0"> x $<span class="mod">75</span>.00
			<p class="right total">$0.00</p>
			<br><br>
		</div>

		<div class="product">
			<label class="productTitle">2. Diabetes Update P&amp;P</label>
			<p>Updated Policies &amp; Procedures Based on the 2013 Clinical Practice Guidelines</p>
			CD <input class="price" type="text" name="quantity" min="0"> x $<span class="mod">25</span>.00 &nbsp;&nbsp;&nbsp;&nbsp;
			Email <input class ="price" type="text" name="quantity" min="0"> x $<span class="mod">25</span>.00
			<p class="right total">$0.00</p>
			<br><br>
		</div>
		
		<label class="productTitle">3. Education Essentials, 1st Edition</label>
		<p>PP Presentations &amp; Participant Quizzes for Ensuring Quality Nutrition &amp; Hydration in LTC</p>
		<div class="small-12 medium-6 columns">
			<label><input type="checkbox" name="presentations" value="constipation">Constipation</label>
			<label><input type="checkbox" name="presentations" value="kidney disease">Chronic Kidney Disease</label>
			<label><input type="checkbox" name="presentations" value="diabetes">Diabetes &amp; Hypoglycemia</label>
			<label><input type="checkbox" name="presentations" value="dysphagia">Dysphagia &amp; Feeding – Diet Mod., Chewing, Swallowing</label>
			<label><input type="checkbox" name="presentations" value="ileostomy">Ileostomy &amp; Colostomy Care</label>
			<label><input type="checkbox" name="presentations" value="hydration">Hydration</label>
			<label><input type="checkbox" name="presentations" value="managing">Managing Stroke in LTC</label>
			<label><input type="checkbox" name="presentations" value="nutrition">Nutrition, Hydration and Protein Update</label>
			<label><input type="checkbox" name="presentations" value="osteoporosis">Nutrition &amp; Osteoporosis</label>
			<label><input type="checkbox" name="presentations" value="supplements">Nutritional Supplements</label>
		</div>
		<div class="small-12 medium-6 columns">
			<label><input type="checkbox" name="presentations" value="ulcers">Pressure Ulcers</label>
			<label><input type="checkbox" name="presentations" value="therapeutic">Therapeutic Nutrition</label>
			<label><input type="checkbox" name="presentations" value="foodnfluid">Food &amp; Fluid Documentation</label>
			<label><input type="checkbox" name="presentations" value="mealtime">Dysphagia &amp; Feeding - Assiting Residents at Meal Time</label>
			<label><input type="checkbox" name="presentations" value="dining">Pleasurable Dining</label>
			<label><input type="checkbox" name="presentations" value="restorative">Restorative Feeding &amp; Dining</label>
			<label><input type="checkbox" name="presentations" value="cgf">Eating Well with CFG</label>
			<label><input type="checkbox" name="presentations" value="foodsafety">Food Safety &amp; Sanitation</label>
			<label><input type="checkbox" name="presentations" value="menu">Menu Plannning in LTC</label>
			<label><input type="checkbox" name="presentations" value="ethics">Ethical Nutrition Considerations</label>
		</div><br><br>
		Each $10.00 <input type="text" name="quantity" min="0">
		3 for $25.00 <input type="text" name="quantity" min="0">&nbsp;&nbsp;&nbsp;&nbsp;
		22 (full CD) for $100 <input type="text" name="quantity" min="0">
		<p class="right">$0.00</p>
		<br><br>

		<div class="product">
			<label class="productTitle">4. Policy Pointers I, 4th Edition</label>
			<p>Policies and Procedures for Nutrition and Hydration in Long Term Care</p>
			CD <input type="text" name="quantity" min="0"> x $<span class="mod">85</span>.00
			Manual <input type="text" name="quantity" min="0"> x $<span class="mod">150</span>.00<br>
			Manual plus CD <input type="text" name="quantity" min="0"> x $<span class="mod">195</span>.00
			<p class="right total">$0.00</p>
			<br><br>
		</div>
		
		<div class="product">
			<label class="productTitle">5. Policy Pointers II, 4th Edition</label>
			<p>Policies and Procedures for Dietary Services Administration in Long Term Care</p>
			CD <input type="text" name="quantity" min="0"> x $<span class="mod">85</span>.00
			Manual <input type="text" name="quantity" min="0"> x $<span class="mod">135</span>.00<br>
			Manual plus CD <input type="text" name="quantity" min="0"> x $<span class="mod">180</span>.00
			<p class="right total">$0.00</p>
			<br><br>
		</div>

		<label class="productTitle">6. Algorithms, Protocols &amp; Tools</label>
		<div class="small-12 medium-6 columns">
			<label><input type="checkbox" name="presentations" value="hypoMnt">Maintenance of Hypoglycemia</label>
			<label><input type="checkbox" name="presentations" value="hydrationMnt">Assistance &amp; Maintenance of Hydration</label>
			<label><input type="checkbox" name="presentations" value="nutritionDelivery">Delivery of Nutrition Care</label>
		</div>
		<div class="small-12 medium-6 columns">
			<label><input type="checkbox" name="presentations" value="skinMnt">Maintenance of Impared Skin Integrity</label>
			<label><input type="checkbox" name="presentations" value="enteralFeeding">Enteral Feeding Protocol</label>
			Each $7.50 <input type="text" name="quantity" min="0">
		</div>
		<p class="right">$0.00</p>

	</form>
