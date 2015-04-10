<?php /* footer.php */ ?>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<span class="copyright">&copy; macmannis web development <?php echo date('Y'); ?></span>
				</div>
				<div class="col-md-4">
					<ul class="list-inline social-buttons">
						<li>
							<a href="http://codepen.io/Pmac627/" title="Codepen"><i class="fa fa-codepen"></i></a>
						</li>
						<li>
							<a href="http://www.facebook.com/MacMannis/" title="Facebook"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="https://github.com/Pmac627" title="GitHub"><i class="fa fa-github"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-inline quicklinks">
						<li>
							<a href="<?php echo $site['base_url']; ?>humans.txt" title="Humans.txt">Humans.txt</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="<?php echo $site['base_url']; ?>view/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo $site['base_url']; ?>view/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
	<!--<script src="<?php echo $site['base_url']; ?>view/js/combo.min.js" type="text/javascript"></script>-->
	<script src="<?php echo $site['base_url']; ?>view/js/classie.js" type="text/javascript"></script>
	<script src="<?php echo $site['base_url']; ?>view/js/cbpAnimatedHeader.js" type="text/javascript"></script>
	<script src="<?php echo $site['base_url']; ?>view/js/jqBootstrapValidation.js" type="text/javascript"></script>
	<script src="<?php echo $site['base_url']; ?>view/js/contact_me.js" type="text/javascript"></script>
	<script src="<?php echo $site['base_url']; ?>view/js/agency.js" type="text/javascript"></script>
	<script type="text/javascript">
		function findId(id) {
			return document.getElementById(id);
		}

		var p = findId('phone');
		p.maxLength = 12;
		p.onkeyup = function(e) {
			e = e || window.event;
			if (e.keyCode >= 65 && e.keyCode <= 90) {
				this.value = this.value.substr(0, this.value.length - 1);
				return false;
			} else if (e.keyCode >= 37 && e.keyCode <= 40) {
				return true;
			} else if (e.keyCode == 8) {
				return true;
			}
			var v = (this.value.replace(/[^\d]/g, ''));
			if (v.length === 3) {
				this.value = (v.substring(0, 3) + "-");
			} else if (v.length === 6) {
				this.value = (v.substring(0, 3) + "-" + v.substring(3, 6) + "-");
			} else if (v.length === 10) {
				this.value = (v.substring(0, 3) + "-" + v.substring(3, 6) + "-" + v.substring(6, 10));
			};
		}
	</script>
</body>
</html>