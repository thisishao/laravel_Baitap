<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QLCT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container"> 
		<div class="col-sm-12">
			<h1 style="color:red; text-align: center;">Quản lý cầu thủ</h1>
			<table class="table table-hover">
				<a href="/qlct/add"><button type="button" class="btn btn-outline-success">Thêm cầu thủ</button></a>
			  <thead>
			    <tr>
				    <th scope="col">Id</th>
				    <th scope="col">Name</th>
				    <th scope="col">Age</th>
				    <th scope="col">National</th>
				    <th scope="col">Position</th>
					<th scope="col">Salary</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach ($data as $va)
    				<tr>
    					<td>{{ $va->id}}</td>
    					<td>{{$va->name}}</td>
    					<td>{{$va->age}}</td>
    					<td>{{$va->national}}</td>
    					<td>{{$va->position}}</td>
    					<td>${{$va->salary}}</td>
    					<td><a href="{{route('qlct.edit', ['id' => $va->id])}}"><button type="button" class="btn btn-outline-warning">Edit</button></a></td>
    					<td><a href="{{route('qlct.delete', ['id' => $va->id])}}"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
    				</tr>
				@endforeach
			  </tbody>
			</table>
			
		</div>
	</div>	
</body>
</html>