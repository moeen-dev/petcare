<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Submission</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f8f9fa;
			color: #333;
			margin: 0;
			padding: 0;
		}
		.email-container {
			width: 100%;
			max-width: 600px;
			margin: 0 auto;
			background-color: #ffffff;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			border: 1px solid #ddd;
		}
		.email-header {
			background-color: #007bff;
			color: #ffffff;
			padding: 20px;
			text-align: center;
			font-size: 24px;
		}
		.email-body {
			padding: 20px;
		}
		.email-body table {
			width: 100%;
			border-collapse: collapse;
		}
		.email-body th {
			background-color: #007bff;
			color: white;
			padding: 10px;
			text-align: left;
		}
		.email-body td {
			padding: 10px;
			border-bottom: 1px solid #ddd;
		}
		.email-footer {
			background-color: #f4f4f4;
			text-align: center;
			padding: 10px;
			font-size: 12px;
			color: #888;
		}
		.email-footer a {
			color: #007bff;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="email-container">
		<!-- Email Header -->
		<div class="email-header">
			<h1>New Message</h1>
		</div>

		<!-- Email Body -->
		<div class="email-body">
			<h2>You've received a new message from {{ $data['name'] }}</h2>
			<table style="width: 100%; border-collapse: collapse;">
				<tr style="border: 1px solid #fff;">
					<th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Name</th>
					<td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['name'] }}</td>
				</tr>
				<tr style="border: 1px solid #fff;">
					<th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Email</th>
					<td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['email'] }}</td>
				</tr>
				<tr style="border: 1px solid #fff;">
					<th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Subject</th>
					<td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['subject'] }}</td>
				</tr>
				<tr style="border: 1px solid #fff;">
					<th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Message</th>
					<td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['message'] }}</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>
