<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OLX Ajakteman - Redeems</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>OLX ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>ID Card</th>
				<th>Created At</th>
				<th>Verified</th>
			</tr>
		</thead>
		<tbody>
		@foreach($redeems as $redeem)
			<tr>
				<td align="right">{{ $redeem->user_olx_id }}</td>
				<td align="right">{{ $redeem->name }}</td>
				<td align="right">{{ $redeem->user->email }}</td>
				<td align="right">{{ $redeem->phone }}</td>
				<td align="right">{{ $redeem->address }}</td>
				<td align="right">{{ asset('images/uploads/'.$redeem->image) }}</td>
				<td align="right">{{ $redeem->created_at->format('d-m-Y H:i:s') }}</td>
				<td align="right">{{ ($redeem->status == 0) ? 'No' : '?' }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</body>
</html>