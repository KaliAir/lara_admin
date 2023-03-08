<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JH Pro Builders - New Inquiry Received</title>
</head>
<body>
	<table style="width: 100%; max-width: 600px; margin: 0 auto; border-collapse: collapse; font-family: Arial, sans-serif;">
		<!-- Header -->
		<tr>
			<td style="padding: 20px; background-color: #f0f0f0; text-align: center;">
				<h1 style="margin: 0; font-size: 24px; font-weight: bold;">JH Pro Builders</h1>
			</td>
		</tr>
		<!-- Content -->
		<tr>
			<td style="padding: 20px; background-color: #fff;">
				<h2 style="margin: 0 0 20px 0; font-size: 18px; font-weight: bold;">Your Email Successfully Send</h2>
				<h3>Thank you for your inquiry. We will provide you with an update as soon as possible.</h3>
				<p style="margin: 0 0 10px 0; font-size: 16px;"><strong>Name:</strong> {{ $name }} {{ $lastname }}</p>
				<p style="margin: 0 0 10px 0; font-size: 16px;"><strong>Email:</strong> {{ $email }}</p>
				<p style="margin: 0 0 10px 0; font-size: 16px;"><strong>Phone Number:</strong> {{ $phonenumber }}</p>
				<p style="margin: 0 0 10px 0; font-size: 16px;"><strong>Inquiry:</strong></p>
				<p style="margin: 0; font-size: 16px;">{{ $inquiry }}</p>
			</td>
		</tr>
		<!-- Footer -->
		<tr>
			<td style="padding: 20px; background-color: #f0f0f0; text-align: center;">
				<p style="margin: 0; font-size: 14px;">&copy;  JH Pro Builders. All rights reserved.</p>
			</td>
		</tr>
	</table>
</body>
</html>