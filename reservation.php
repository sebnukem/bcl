<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Boxcars Limo Service</title>
<meta name="description" content="Limousine service Denver, Colorado area">
<meta name="keywords" content="limo, limousine, limousine service, denver">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/boxcars.css">
</head>
<body>
<!--[if lt IE 8]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="body">
	<div id="menu">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="about.html">About Us</a></li>
			<li><a href="fleet.html">Our Fleet</a></li>
			<li><a href="rates.html">Rates</a></li>
			<li class="thispage"><a href="reservation.php">Reservation</a></li>
			<li><a href="contact.html">Contact Us</a></li>
		</ul>
	</div>

	<div id="banner">
		<h1><a href="index.html">Boxcars Limo Service</a></h1>
	</div>

	<div id="content">
		<div id="numbers">
			<div>
				<a href="https://www.facebook.com/advantagelimousine"><img src="img/fb.gif"></a> &nbsp; &nbsp;
				<small>Phone:</small> 720 310-0051 &nbsp; &nbsp;
				<span class="nowrap"><small>E-mail:</small> <a href="mailto:boxcarslimo@gmail.com">boxcarslimo@gmail.com</a></span>
			</div>
		</div>

		<div class="b">
			<h2>Make a Reservation</h2>

<?php
if (isset($_POST["submit"])) {
	// user clicked the Submit button
	$subject = "[BOXCARSLIMO.COM] Reservation";
	$from = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	if (filter_var($from, FILTER_SANITIZE_EMAIL)) {
		// submitter email is valid
		$to = "boxcarslimo@gmail.com";
		$headers = 'From: '.$email_from."\r\n" .
			'CC: '.$from."\r\n" .
			'Reply-To: '.$email_from."\r\n";
		$body = "Boxcars Limo Service Reservation\r\n\r\n";
		$fb = $body;
		foreach ($_POST as $field => $data ) {
			$sdata = htmlspecialchars($data);
			$body .= "$field: $sdata\r\n";
			if ($field != "submit" && $field != "hear") {
				$fb .= "$field: $sdata\r\n";
			}
		}

		$ok = mail($to, $subject, $body, $headers); // send email
		if ($ok) {
			// all good, email sent
			echo "<div class=\"submitok\">Thank you! We will contact you within 24 hours.</div>\n";
			echo "<div class=\"submitfb\"><pre>$fb</pre></div>\n";
		} else {
			// couldn't send email for some reason
			echo "<div class=\"submitfail\">There was a problem submitting this form. Please try again or call us.</div>\n";
		}
  } else {
		// invalid email from submitter
		echo "<div class=\"submitfail\">There was a problem submitting this form. Please check your email and try again, or call us.</div>\n";
	}
} else {
	// print the form
?>
			<p><span class="required">*</span> <span class="formnote">indicates a mandatory field.</span></p>

			<form id="reservation" name="reservation" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" onsubmit="return validate_form();">
				<table>
					<tr><td class="label"><span class="required">*</span><label>Your Name:</label></td>
					<td class="input"><input id="input-name" name="name" type="text" placeholder="My Mame" autofocus class="field">
					<span id="req-name" class="requirement" style="display:none;">Please enter your name.</span>
					</td></tr>
	
					<tr><td class="label"><span class="required">*</span><label>Your Email Address:</label></td>
					<td><input id="input-email" name="email" type="email" placeholder="myemail@domain.com" class="field">
					<span id="req-email" class="requirement" style="display:none;">Please enter your email address.</span>
					</td></tr>

					<tr><td class="label"><span class="required">*</span><label>Contact Phone Number:</label></td>
					<td><input id="input-phone" name="phone" type="tel" placeholder="720 555 5555" class="field">
					<span id="req-phone" class="requirement" style="display:none;">Please enter a phone number.</span>
					</td></tr>

					<tr><td class="label"><label>Cell Phone Number:</label></td>
					<td><input id="input-cell" name="cell" type="tel" placeholder="720 555 5555" class="field"></td></tr>

					<tr><td class="label"><label>Date of Service:</label></td>
					<td><input name="date" type="date" placeholder="12/31/2014" class="field"></td></tr>

					<tr><td class="label"><label>Time of Service:</label></td>
					<td><input name="time" type="time" placeholder="11:00 PM" class="field"></td></tr>

					<tr><td class="label"><label>Number of Hours:</label></td>
					<td><input name="hours" type="duration" placeholder="123" class="field"></td></tr>

					<tr><td class="label"><label>Requested Vehicle:</label></td>
					<td><select name="vehicle">
						<option value="">pick one...</option>
						<option value="Lexus LS 460">Lexus LS 460</option>
						<option value="7 passenger Chevrolet Suburban">7 Passenger Chevrolet Suburban</option>
						<option value="10 passenger Lincoln Town Car">10 Passenger Lincoln Town Car</option>
						<option value="12-14 passenger Mercedes Sprinter">12-14 Passenger Mercedes Sprinter</option>
						<option value="25 passenger H2 Hummer">25 Passenger H2 Hummer</option>
					</select></td></tr>

					<tr><td class="label"><label>Pick Up Area:</label></td>
					<td><input name="pickup" type="text" placeholder="an address" class="field"></td></tr>

					<tr><td class="label"><label>Drop Off Area:</label></td>
					<td><input name="dropoff" type="text" placeholder="an address" class="field"></td></tr>

					<tr><td class="label"><label>Event:</label></td>
					<td><input name="event" type="text" placeholder="an event" class="field"></td></tr>

					<tr><td class="label"><label>Message / Comments:</label></td>
					<td><textarea name="message" class="field" placeholder="anything..."></textarea></td></tr>

					<tr><td class="label"><label>How Did You Hear About Us?</label></td>
					<td><textarea name="hear" class="field"></textarea></td></tr>

					<tr><td></td>
					<td><input name="submit" type="submit" value="Submit" class="button">
					    <input id="reset" name="reset" type="reset" value="Reset" class="button">
					</td></tr>
				</table>
			</form>
<?php
}
?>
		</div>
		
		<div id="footer">
			&copy; 2014 Boxcars Limo Service 720-310-0051. All Rights Reserved.
		</div>
	</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

<script src="js/plugins.js"></script>
<script src="js/reservation.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	e.src='//www.google-analytics.com/analytics.js';
	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>
