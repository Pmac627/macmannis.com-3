<?php /* home.php */

if($sections[1]['active'] > 0) {
?>
	<section id="services" class="bg-light-gray">
		<div class="container">
		<?php echo $section1HTML;
			echo $servicesHTML;
			echo $section1DescrHTML;
		?>
		</div>
	</section>
<?php
}
if($sections[2]['active'] > 0) {
?>
	<section id="portfolio">
		<div class="container">
		<?php echo $section2HTML;
			echo $portfolioHTML;
			echo $section2DescrHTML;
		?>
		</div>
	</section>
<?php
}
if($sections[9]['active'] > 0) {
?>
	<aside id="certs" class="bg-light-gray">
		<div class="container">
		<?php echo $section7HTML;
			echo $certsHTML;
			echo $section7DescrHTML;
		?>
		</div>
	</aside>
<?php
}
if($sections[3]['active'] > 0) {
?>
	<section id="about">
		<div class="container">
		<?php echo $section3HTML;
			echo $aboutHTML;
			echo $section3DescrHTML;
		?>
		</div>
	</section>
<?php
}
if($sections[4]['active'] > 0) {
?>
	<section id="people" class="bg-light-gray">
		<div class="container">
		<?php echo $section4HTML;
			echo $peopleHTML;
			echo $section4DescrHTML;
		?>
		</div>
	</section>
<?php
}
if($sections[6]['active'] > 0) {
?>
	<aside class="clients">
		<div class="container">
		<?php echo $section6HTML;
			echo $clientsHTML;
			echo $section6DescrHTML;
		?>
		</div>
	</aside>
<?php
}
if($sections[5]['active'] > 0) {
?>
	<section id="contact">
		<div class="container">
		<?php echo $section5HTML; ?>
			<div class="row">
				<div class="col-lg-12">
					<form name="sentMessage" id="contactForm" novalidate>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<input type="tel" class="form-control" placeholder="Your Phone (xxx-xxx-xxxx) *" id="phone" required data-validation-required-message="Please enter your phone number.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-lg-12 text-center">
								<div id="success"></div>
								<button type="submit" class="btn btn-xl" title="Send Message">Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php echo $section5DescrHTML; ?>
		</div>
	</section>
<?php }
echo $portfolioModalHTML;
?>