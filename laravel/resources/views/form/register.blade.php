<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v10 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<style>
			.btn-google {
				display: flex;
				align-items: center;
				justify-content: center;
				background-color: #db4437;
				color: white;
				padding: 10px 15px;
				border-radius: 5px;
				font-size: 16px;
				text-decoration: none;
				font-weight: bold;
				text-align: center;
			}

			.btn-google i {
				margin-right: 10px;
			}

		</style>

	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				<form action="/register" method="post">
					@csrf
					<img src="images/logo-app.png" alt="Logo" style="display: block; margin: auto; width: 80px;">
					<h3 style="margin-top:15px">New Account?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username" name="name" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Mail" name="email" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Confirm Password" name="repeat_password" required>
					</div>
					<input type="hidden" name="create" value="create">
					<button>
						<span>Register</span>
					</button>
					<div class="form-holder">
						<p style="text-align:center; margin-top:7px">Already have an account ? <a href="/" style="color:blue;">Login</a></p>
					</div>
					
					<div style="text-align: center;">
						<a href="/auth/google" class="btn btn-google">
							<i class="fab fa-google"></i><span style="margin-left:10px;">Sign Up with Google</span>
						</a>
					</div>


				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		@if (session('successregister'))
			<script>
				Swal.fire({
					icon: 'success',
					title: 'Success !',
					text: "{{ session('successregister') }}",
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'OK'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = "/"; 
					}
				});
			</script>
		@endif

		@if (session('errorpassword'))
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Failed !',
					text: "{{ session('error') }}",
					confirmButtonColor: '#d33',
					confirmButtonText: 'Try Again'
				});
			</script>
		@endif

		@if (session('emailexists'))
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Failed !',
					text: "{{ session('emailexists') }}",
					confirmButtonColor: '#d33',
					confirmButtonText: 'Try Again'
				});
			</script>
		@endif

		@if (session('phoneexists'))
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Failed !',
					text: "{{ session('phoneexists') }}",
					confirmButtonColor: '#d33',
					confirmButtonText: 'Try Again'
				});
			</script>
		@endif

		
			
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>