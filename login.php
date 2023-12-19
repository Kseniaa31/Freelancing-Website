<?php include('server.php');

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Freelance'S Corner</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.header1{background-color: #EEEEEE;padding-left: 1%;}
	.header2{padding:20px 40px 20px 40px;color:#fff;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
</style>

</head>
<body>

<!--Navbar menu-->
<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
	<div class="container">
		<div class="navber-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand"> Freelance'S Corner</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
		
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php" data-toggle="modal" data-target="#loginModal">Login</a></li>
			</ul>
		</div>		
	</div>	
</nav>
<!--End Navbar menu-->


<script>
$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            },
            usertype: {
                validators: {
                    notEmpty: {
                        message: 'The usertype is required'
                    }
                }
            }
        }
    });

});
</script>


</body>
</html>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="page-header">
                <h2>Login</h2>
            </div>
            <form id="loginForm" method="post" class="form-horizontal">
                <div style="color:red;">
                    <p><?php echo $errorMsg; ?></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="username" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Usertype</label>
                    <div class="col-sm-5">
                        <div class="radio">
                            <label>
                                <input type="radio" name="usertype" value="freelancer" /> Freelancer
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="usertype" value="employer" /> Employer
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="login" class="btn btn-info btn-lg">Login</button>
                    </div>
                </div>
            </form>
        </div>
</div>
</div>


<!--Footer-->
<div class="text-center" style="padding:4%;background:#222;color:#fff;margin-top:20px;">
    <div class="row">
            <div class="col-lg-3">
            <h3>Quick Links</h3>
            <p><a href="index.php">Home</a></p>
        </div>
        <div class="col-lg-3">
           <h3>About Us</h3>
			<p>Freelance'S Corner</p>
			<p>Ksenia Muho</p>
			<p>&copy 2023</p>
		</div>
		<div class="col-lg-3">
			<h3>Contact Us</h3>
			<p><a href="mailto:freelancecorner23@gmail.com">freelancecorner23@gmail.com</a> </p>
			<p>Tirana, Albania</p>
			<p>&copy  2023</p>
        </div>
        <div class="col-lg-3">
            <h3>Social Contact</h3>
            <a href="https://www.facebook.com/your_facebook_username" target="_blank" rel="noopener noreferrer">
            <p style="font-size: 20px; color: #3B579D;">
            <i class="fab fa-facebook-square"></i> Facebook
            </p>
            </a>
            <a href="https://plus.google.com/google_username" target="_blank" rel="noopener noreferrer">
            <p style="font-size: 20px; color: #D34438;">
            <i class="fab fa-google-plus-square"></i> Google
            </p>
            </a>
            <a href="https://twitter.com/twitter_username" target="_blank" rel="noopener noreferrer">
            <p style="font-size: 20px; color: #2CAAE1;">
            <i class="fab fa-twitter-square"></i> Twitter
            </p>
            </a>
            <a href="https://www.linkedin.com/in/linkedin_username" target="_blank" rel="noopener noreferrer">
            <p style="font-size: 20px; color: #0274B3;">
            <i class="fab fa-linkedin"></i> LinkedIn
            </p>
            </a>
        </div>
    </div>
</div>

<!--End Footer-->


