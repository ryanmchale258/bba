<section id="staffContact-wrap">
	<article class="small-12 text-center columns companyContact">
		<h2><?php echo $company->company_name; ?></h2>
		<p>
			<?php echo $company->company_streetnumber.' '.$company->company_streetname; ?><br>
			<?php echo $company->company_city.', '.$company->company_province.' '.$company->company_postalcode; ?><br>
			<?php echo 'Tel: '.$company->company_phone; ?><br>
			<?php echo 'Fax: '.$company->company_fax; ?><br>
			<?php echo 'Email: '.$company->company_email; ?><br>
		</p>
	</article>
	<?php foreach($stafflist as $row): ?>
		<article class="small-12 medium-6 text-center columns staffContact">
			<h2><?php echo $row->staffbios_name.', '; ?>
			<?php echo $row->staffbios_designation; ?></h2>
			<p>
				<?php echo $row->staffbios_streetnumber.' '.$row->staffbios_streetname; ?><br>
				<?php if(isset($row->staffbios_rr) && $row->staffbios_rr != NULL ){echo $row->staffbios_rr.'<br>'; }?>
				<?php echo $row->staffbios_city.', '.$row->staffbios_province.' '.$row->staffbios_postalcode; ?><br>
				<?php echo 'Tel: '.$row->staffbios_phone; ?><br>
				<?php if(isset($row->staffbios_mobile) && $row->staffbios_mobile != NULL ){echo 'Mobile: '.$row->staffbios_mobile.'<br>'; }?>
				<?php echo 'Fax: '.$row->staffbios_fax; ?><br>
				<?php echo 'Email: '.$row->staffbios_email; ?><br>
				<?php if(isset($row->staffbios_mobile) && $row->staffbios_mobile == NULL ){echo '<br>'; }?>
			</p>
		</article>
	<?php endforeach; ?>
</section>