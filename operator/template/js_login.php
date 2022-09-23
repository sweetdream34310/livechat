<script type="text/javascript">
$(document).ready(function() {
	$(".forgotP").hide();
	$(".signupF").hide();
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$(".lost-pwd").click(function(e) {
		e.preventDefault();
		$(".loginF").slideToggle();
		$(".forgotP").slideToggle();
	});

	let errors = '<?php echo $errors ;?>';
	let errorLogin = '<?php echo $ErrLogin ;?>';

	if(errors.length !== 0 && errorLogin.length == 0) {
		$(".loginF").slideToggle();
		$(".signupF").slideToggle();
	}

	$(".sign-up").click(function(e) {
		e.preventDefault();
		$(".loginF").slideToggle();
		$(".signupF").slideToggle();
	});
	$(".log-in").click(function(e) {
		e.preventDefault();
		$(".loginF").slideToggle();
		$(".signupF").slideToggle();
	});
	<?php if (isset($errorfp)) { ?>
		$(".loginF").hide();
		$(".forgotP").show();
		$(".forgotP").addClass("shake");
	<?php } if (isset($ErrLogin)) { ?>
		$(".loginF").addClass("shake");
	<?php } ?>
});
// Simple Framebuster
if (self != top) {
	var theBody = document.getElementsByTagName('body')[0];
	theBody.style.display = "none";
}
</script>