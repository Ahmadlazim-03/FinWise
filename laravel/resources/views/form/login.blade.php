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
				<form action="/" method="post">
                    @csrf
                    <img src="images/logo-app.png" alt="Logo" style="display: block; margin: auto; width: 80px;">
					<h3 style="margin-top:15px">WELCOME !</h3>
					
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Mail" name="email" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
                    <input type="hidden" name="login" value="login">
					
					<button>
						<span>Login</span>
					</button>
					<div class="form-holder">
						<p style="text-align:center; margin-top:7px">Don't have an account ? <a href="/register" style="color:blue;">Register</a></p>
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

        @if (session('errorlogin'))
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Failed !',
					text: "{{ session('errorlogin') }}",
					confirmButtonColor: '#d33',
					confirmButtonText: 'Try Again'
				});
			</script>
		@endif
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>