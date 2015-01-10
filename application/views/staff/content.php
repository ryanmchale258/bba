<div class="row">
<?php foreach($stafflist as $row): ?>
	<article class="small-12 columns bio">
		<img src="<?php echo base_url() . 'img/' . $row->staffbios_photo; ?>">
		<h2><?php echo $row->staffbios_name.', '; ?>
		<?php echo $row->staffbios_degree; ?>
		<?php echo $row->staffbios_designation; ?></h2>
		<p><?php echo $row->staffbios_bio; ?></p>
		<p><?php echo $row->staffbios_tagline; ?></p>
	</article>
<?php endforeach; ?>