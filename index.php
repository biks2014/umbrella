<?php
session_start();
?>
<!---
Site : http:www.smarttutorials.net
Author :muni
--->

<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ehealth Umbarella quiz game! </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<header class="mainHeader">
		<nav><ul>
			<li class="active"><a href="index.php">Home</a></li>
      <li><a href="#">Information</a></li>
      
      <li><a href="<?php echo BASE_PATH.'logout.php';?>">Logout</a></li>
     
		</ul>
		</nav>
<style type="text/css">
    .container {
      
        margin-bottom: 10px;
        color: #0000CC;
    

      }
      </style>
      <!--<p class="text-center">
				Welcome <?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}?>
			</p>-->
		</header>
		<div class="container">

			<div class="row">
			<!--<p class="text-center">Welcome to this quiz game!</p>-->
				<div class="col-xs-14 col-sm-7 col-lg-7">
					<div class='image'>
						<img src="image/logo1.jpg" class="img-responsive"/>
					</div>
				</div>
				<div class="col-xs-10 col-sm-5 col-lg-5">
					<div class="intro">
					
						<p style="color: green" id="afterlogin" class="text-center">
							Enter your Nickname and select your favorite avatar!
						</p>
						<?php if(empty($_SESSION['name'])){?>
						<form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
							<div class="form-group">
								<input type="text" id='name' name='name' class="form-control" placeholder="Enter your Nickame"/>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
							    
                    <div> <input type="radio" value="1" id="berry" name="category"/><label for="berry">Berry<span></span><img src="image/berry.gif"/></label>
                    </div>
                   <div><input type="radio" value="2" id="coke" name="category"/><label for="coke">Ananas<span></span><img src="image/dance.gif"/></label>
                    </div>                      
                   <div><input type="radio" value="3" id="burger" name="category"/><label for="burger">Carrot<span></span><img src="image/carrot.gif"/></label>
                    </div>
                    <div> <input type="radio" value="1" id="ber" name="category"/><label for="ber">Berry<span></span><img src="image/berry.gif"/></label>
                    </div>
                    <div> <input type="radio" value="1" id="berr" name="category"/><label for="berr">Berry<span></span><img src="image/berry.gif"/></label>
                    </div>
                    <div> <input type="radio" value="1" id="banana" name="category"/><label for="banana">Berry<span></span><img src="image/berry.gif"/></label>
                    </div>
                    
                                <span class="help-block"></span>
							</div>
							
							<br>
							<button class="btn btn-success  btn-block" type="submit">
								Let's Go!
							</button>
						</form>
						
						<?php }else{?>
						    <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
                            <div class="form-group">
                            
                                
                                <script type="text/javascript">
                                  document.getElementById("afterlogin").innerHTML = "Select your avatar to go to the next level!";
                                </script>
                               <div> <input type="radio" value="1" id="category" name="category"/><label for="category">Berry<span></span><img src="image/berry.gif"/></label>
                    </div>
                   <div><input type="radio" value="2" id="coke" name="category"/><label for="coke">Ananas<span></span><img src="image/dance.gif"/></label>
                    </div>                      
                   <div><input type="radio" value="3" id="burger" name="category"/><label for="burger">Carrot<span></span><img src="image/carrot.gif"/></label>                           
                                <span class="help-block"></span>
                            </div>
                            
                            <br>
                            <button class="btn btn-success  btn-block" type="submit">
                                Let's Go!
                            </button>
                        </form>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<p class="text-center" id="foot">
				&copy; <a href="#" target="_blank">Ehealth Game </a>2014
			</p>
		</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/jquery.validate.min.js"></script>

		<script>
			$(document).ready(function() {
				$("#signin").validate({
					submitHandler : function() {
					    console.log(form.valid());
						if (form.valid()) {
						    alert("sf");
							return true;
						} else {
							return false;
						}

					},
					rules : {
						name : {
							required : true,
							minlength : 3,
							remote : {
								url : "check_name.php",
								type : "post",
								data : {
									username : function() {
										return $("#name").val();
									}
								}
							}
						},
						category:{
						    required : true
						}
					},
					messages : {
						name : {
							required : "Please enter your Nickname",
							remote : "Name is already taken, Please choose some other name"
						},
						category:{
                            required : "Please choose your category to start Quiz"
                        }
					},
					errorPlacement : function(error, element) {
						$(element).closest('.form-group').find('.help-block').html(error.html());
					},
					highlight : function(element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success : function(element, lab) {
						//var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");
						//var messages = "That's Great!";
						var num = Math.floor(Math.random() * 6);
						//$(lab).closest('.form-group').find('.help-block').text(messages[num]);
						$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			});
		</script>

	</body>
</html>
