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
			<h1 style="color:red; text-align: center;">Thêm cầu thủ</h1>
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
				  		<td><input type="text" class="form-control" name="name"></td>
				  	</tr>
				  	<tr>
				  		<th scope="col">Age:</th>
				  		<td><input type="text" class="form-control" name="age"></td>
				  	</tr>
				 	 <tr>
				  		<th scope="col">National:</th>
				  		<td><input type="text" class="form-control" name="national"></td>
				  	</tr>
				  	<tr>
				  		<th scope="col">Position:</th>
				  		<td><input type="text" class="form-control" name="position"></td>
				  	</tr>
				  	<tr>
				  		<th scope="col">Salary:</th>
				  		<td><input type="text" class="form-control" name="salary"></td>
				  	</tr>
				  	<tr>
				  		<td></td>
				  		<td><button class="btn btn-primary" type="submit">Thêm cầu thủ</button></td>
				  	</tr>
				</table>
				@csrf	
			</form>
		</div>
	</div>	
</body>
</html>