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
			<h1 style="color:red; text-align: center;">Sửa cầu thủ</h1>
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form action="" method="POST">
					<table class="table">
					  	<tr>
					  		<th scope="col">Name:</th>
					  		<td><input type="text" class="form-control" name="name" value="{{$user->name}}"></td>
					  	</tr>
					  	<tr>
					  		<th scope="col">Age:</th>
					  		<td><input type="text" class="form-control" value="{{$user->age}}" name="age"></td>
					  	</tr>
					 	 <tr>
					  		<th scope="col">National:</th>
					  		<td><input type="text" class="form-control" value="{{$user->national}}" name="national"></td>
					  	</tr>
					  	<tr>
					  		<th scope="col">Position:</th>
					  		<td><input type="text" class="form-control" value="{{$user->position}}" name="position"></td>
					  	</tr>
					  	<tr>
					  		<th scope="col">Salary:</th>
					  		<td><input type="text" class="form-control" value="{{$user->salary}}" name="salary"></td>
					  	</tr>
					  	<tr>
					  		<td></td>
					  		<td><a href="{{route('qlct.update', ['id' => $user->id])}}"><button class="btn btn-primary" type="submit">Sửa cầu thủ</button></a></td>
					  	</tr>
					</table>
				@csrf	
			</form>
		</div>
	</div>	
</body>
</html>