<div id="addpage" class="bodycontent">
	<h1><?php echo $header; ?></h1>
	<p>You can add new pages with this form. If you'd like the pages to appear in the menu, choose a parent menu item from the dropdown list. If no parent item is selected, the page will not be visible in any navigation menus.</p>

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
		<div class="small-12 medium-12 large-6 large-pull-6 columns">
			<select name="parent">
				<option selected>Orphan Page</option>
				<?php foreach($navparents as $row): ?>
					<option value="<?php echo $row->pages_slug; ?>"><?php echo $row->pages_title; ?></option>
				<?php endforeach; ?>
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
</form>