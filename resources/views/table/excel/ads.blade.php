<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OLX Ajakteman - Ads</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>ADS ID</th>
				<th>OLX ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Created At</th>
				<th>Active</th>
				<th>Verified</th>
			</tr>
		</thead>
		<tbody>
		@foreach($ads as $ad)
			<tr>
				<td align="right">{{ $ad->ads_olx_id }}</td>
				<td align="right">{{ $ad->user_olx_id }}</td>
				<td align="right">{{ $ad->user->name }}</td>
				<td align="right">{{ $ad->user->email }}</td>
				<td align="right">{{ $ad->user->phone }}</td>
				<td align="right">{{ $ad->created_at->format('d-m-Y H:i:s') }}</td>
				<td align="right">{{ ($ad->is_active == 0) ? 'No' : 'Yes' }}</td>
				<td align="right">{{ ($ad->is_verified == 0) ? 'No' : 'Yes' }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</body>
</html>