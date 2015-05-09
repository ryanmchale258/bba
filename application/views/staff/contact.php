<div id="staffContact-wrap" class="bodycontent">
	<article class="small-12 text-center columns companyContact">
		<h2>Corporate Office:</h2>
		<h3><?php echo $company->company_name; ?></h3>
		<p>
			<?php echo $company->company_streetnumber.' '.$company->company_streetname; ?><br>
			<?php echo $company->company_city.', '.$company->company_province.' '.$company->company_postalcode; ?><br>
			Tel: <a href="tel:+<?php echo preg_replace('/\D+/', '', $company->company_phone); ?>"><?php echo $company->company_phone; ?></a><br>
			<?php echo 'Fax: '.$company->company_fax; ?><br>
			Email: <a href="mailto:<?php echo $company->company_email; ?>"><?php echo $company->company_email; ?></a><br>
		</p>
	</article>
		<h2 class="text-center">Directors:</h2>
	<?php foreach($stafflist as $row): ?>
		<article class="small-12 medium-6 text-center columns staffContact">
			<h3><?php echo $row->staffbios_name.', '; ?>
			<?php echo $row->staffbios_degree.', '; ?>
			<?php echo $row->staffbios_designation; ?></h3>
			<p>
				<?php echo $row->staffbios_streetnumber.' '.$row->staffbios_streetname; ?><br>
				<?php if(isset($row->staffbios_rr) && $row->staffbios_rr != NULL ){echo $row->staffbios_rr.'<br>'; }?>
				<?php echo $row->staffbios_city.', '.$row->staffbios_province.' '.$row->staffbios_postalcode; ?><br>
				Tel: <a href="tel:+<?php echo preg_replace('/\D+/', '', $row->staffbios_phone); ?>"><?php echo $row->staffbios_phone; ?></a><br>
				<?php if(isset($row->staffbios_mobile) && $row->staffbios_mobile != NULL ){echo "Mobile: <a href=\"tel:+" . preg_replace('/\D+/', '', $row->staffbios_mobile) . "\">" . $row->staffbios_mobile . "</a><br>"; }?>
				<?php if(isset($row->staffbios_fax) && $row->staffbios_fax != NULL ){echo "Fax: " . $row->staffbios_fax . "<br>"; }?>
				Email: <a href="mailto:<?php echo $row->staffbios_email; ?>"><?php echo $row->staffbios_email; ?></a><br>
				<?php if(isset($row->staffbios_mobile) && $row->staffbios_mobile == NULL ){echo '<br>'; }?>
				<?php if(isset($row->staffbios_fax) && $row->staffbios_fax == NULL ){echo '<br>'; }?>
			</p>
		</article>
	<?php endforeach; ?>