<div id="addpage" class="bodycontent">
	<h1><?php echo $header; ?></h1>
	<p>You can add new pages with this form. If you'd like the pages to appear in the menu, choose a parent menu item from the dropdown list. If no parent item is selected, the page will not be visible in any navigation menus. Choosing a higher weight from the Weight selection menu will inforce what placement the new menu item takes in the dropdown. Higher values for weight will cause the menu item to appear closer to the top.</p>

	<?php echo $formstart; ?>
	<div class="row">
		<label>Page Name</label>
		<div class="small-12 medium-12 large-6 large-push-6 columns">
			<p class="cmslabel">Will appear at the top of each page. It should be short/succinct.</p>
		</div>
		<div class="small-12 medium-12 large-6 large-pull-6 columns">
			<?php echo $pagename; ?>
		</div>
	</div>
	<div class="row">
		<label>URL Segment</label>
		<div class="small-12 medium-12 large-6 large-push-6 columns">
			<p class="cmslabel">This will be the url segment used in the browser address bar to access this page. If you do not specify one it will be automatically generated based on the page title.</p>
		</div>
		<div class="small-12 medium-12 large-6 large-pull-6 columns">
			<?php echo $slug; ?>
		</div>
	</div>
	<div class="row">
		<label>Meta Description. <span id="wordcount">150</span> characters remaining.</label>
		<div class="small-12 medium-12 large-6 large-push-6 columns">
			<p class="cmslabel">The meta description appear beneath the page title in search engine results. It should describe each page accurately with a strong focus on relevant keywords. Max length is approximately 150 characters.</p>
		</div>
		<div class="small-12 medium-12 large-6 large-pull-6 columns">
			<?php echo $metadesc; ?>
		</div>
	</div>

	<div class="row">
		<label>Navigation Parent</label>
		<div class="small-12 medium-12 large-6 large-push-6 columns">
			<p class="cmslabel">If a parent item is chosen, the new page title will appear in a dropdown menu when hovering over the parent menu item. If the value is left as Orphan Page, it will not be accessible in any menu item and should be linked to from page text somewhere.</p>
		</div>
		<div class="small-6 medium-6 large-3 large-pull-6 columns">
			<select name="parent">
				<option selected>Orphan Page</option>
				<?php foreach($navparents as $row): ?>
					<option value="<?php echo $row->pages_slug; ?>"><?php echo $row->pages_title; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="small-3 medium-3 large-1 large-pull-6 columns">
			<label>Weight:</label>
		</div>
		<div class="small-3 medium-3 large-2 small-pull-1 medium-pull-2 large-pull-6 columns">
			<select name="weight">
				<option selected value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
			</select>
		</div>
	</div>
	
	<div class="row">
		<label>Page Content</label>
		<div class="small-12 columns">
			<?php echo $body; ?>
		</div>
	</div>

	<input type="submit" name="submit" value="Submit">
	<?php if(isset($id)){ echo $id; } ?>
</form>