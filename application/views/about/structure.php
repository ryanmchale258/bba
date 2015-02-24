<div class="row bodycontent">
	<section class="structure">
		<h1>Who We Are</h1>
		<p><span class="boldItalics">Barker Blagrave &amp; Associates Dietetics Professional Corporation (BB&amp;A)  is incorporated under the Ministry of Government Services and the College of Dietitians of Ontario.  We are comprised of four Directors and a team of Associate Dietitians, as specified below.</span></p>
		<p><span class="boldItalics">The founding Directors,</span> Paula Blagrave, Christine Barker, started the company in 1997.  Julie Urbshott and Sarah Faulds joined BB&amp;A over the past 5 years to help manage the growing business.  Together, the directors oversee their team of   dietitians, meeting regularly to provide education opportunities and guidance, and to ensure a consistent approach to dietetic and nutrition care practice in all LTC Homes where they provide dietitian services.</p>
		<p><span class="boldItalics">The Directors and all Associate Dietitians:</span></p>
		<ul>
			<li>Are members in good standing of the College of Dietitians of Ontario (CDO)</li>
			<li>Maintain professional liability insurance</li>
			<li>Provide service in a manner that adheres to the professional Code of Ethics and CDO’s Standards of Practice and that respects Resident Rights and the confidentiality of health information according to PHIPA guidelines</li>
			<li>Participate in regular professional development/continuing education opportunities.</li>
		</ul>
		<h2>Bios:</h2>
	<?php foreach($stafflist as $row): ?>
		<article class="small-12 columns bio">
			<img src="<?php echo base_url() . 'img/' . $row->staffbios_photo; ?>">
			<h3><?php echo $row->staffbios_name.', '; ?>
			<?php echo $row->staffbios_degree.', '; ?>
			<?php echo $row->staffbios_designation; ?></h3>
			<p><?php echo $row->staffbios_bio; ?></p>
		</article>
	<?php endforeach; ?>
	</section>