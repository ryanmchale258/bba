<div class="bodycontent">
	<section class="jobs row">
		<h1>Our Team:</h1>
		<p>
			<span class="boldItalics">Barker Blagrave &amp; Associates Dietetics Professional Corporation (BB&amp;A)</span> is a team of Registered Dietitians specializing in the provision of services to Long Term Care Homes across central, mid and south-western Ontario. These services include:
		</p>
		<ul>
			<li>resident clinical nutrition care</li>
			<li>administrative support</li>
			<li>staff education</li>
			<li>dietetic resource development</li>
		</ul>
		<p><span class="boldItalics">Positions with BB&amp;</span>A are posted below as they become available.</p>

		<h2>Current / Upcoming Openings</h2>
		<ul class="accordion" data-accordion>
			<?php foreach($jobs as $row): ?>
				<li class="accordion-navigation">
				    <a href="#job<?php echo $row->jobs_id;?>"><h3><?php echo $row->jobs_title;?></h3></a>
				    <div id="job<?php echo $row->jobs_id;?>" class="content active">
				    	<p><span class="bold">Type: </span><?php echo $row->jobs_type;?></p>
				    	<p><span class="bold">Location: </span><?php echo $row->jobs_location;?></p>
				    	<p><span class="bold">Start Date: </span><?php echo $row->jobs_start;?></p>
				    	<p><span class="bold">Description: </span><?php echo $row->jobs_desc;?></p>
				    	<p><span class="bold">Qualifications &amp; Requirements: </span><?php echo $row->jobs_reqs;?></p>
				    </div>
				</li>
			<?php endforeach; ?>
		</ul>

		<p>Barker Blagrave &amp; Associates Dietetics Professional Association (BB&amp;A) accepts resumes to be kept on file for any future position openings.</p>
		<p>
			If you are interested in becoming a member of our dynamic team, please respond with a resume and letter to <a href="mailto:jaurbshott@urbgall.com">Julie Urbshott</a> indicating when you could be available to start, the hours of work per month you are seeking and describing your relevant experience in the field of long term care. 
		</p>
		<p>
			For more information, email Julie Urbshott at <a href="mailto:jaurbshott@urbgall.com">jaurbshott@urbgall.com</a>
		</p>
	</section>