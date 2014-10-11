<?php
session_start();
?>
<!---
Site : http:www.smarttutorials.net
Author :muni
--->

<?php 
require 'config.php';
if(!empty($_SESSION['name'])){
    
    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   $keys=array_keys($_POST);
   $order=join(",",$keys);
   
   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;
   
   $response=mysql_query("select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
   
   while($result=mysql_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               
       
               $right_answer++;

           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
  }
   $message= "";
   
   if($right_answer < 5)
   {
  $message="Try again, you didn't answer all correctly!";

   }
   else
   {
  $message= "You have successfully finished this level";
   } 
   $name=$_SESSION['name'];  
   mysql_query("update myusers set score='$right_answer' where user_name='$name'");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Responsive Quiz Application Using PHP, MySQL, jQuery, Ajax and Twitter Bootstrap</title>
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
      <li><p><?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}?></p></li>

    </ul>
    </nav>
    <style type="text/css">
    .container {
        margin-top: 110px;
        background: url("image/bg2.jpg") no-repeat;
        margin-bottom: 10px;
        color: #0000CC;

      }
    </style>

        </header>
        <div class="container result">
            <div class="row"> 
                    <div class='result-logo'>
                            <img src="image/Quiz_result.png" class="img-responsive"/>
                    </div>    
           </div>  
           <hr>   
           <div class="row1"> 
                  <div class="col-xs-18 col-sm-9 col-lg-9"> 
                    <div class='result-logo1'>
                            <img src="image/thumbs.png" class="img-responsive"/>
                    </div>
                  </div>
                  
                  <div class="col-xs-6 col-sm-3 col-lg-3"> 
                     <a href="<?php echo BASE_PATH;?>" class='btn btn-success'>Next level</a>                   
                     <a href="<?php echo BASE_PATH.'logout.php';?>" class='btn btn-success'>Logout</a>
                   
                       <div style="margin-top: 20%", "margin-left: 50%">

                        <p>Total no. of right answers : <span class="answer"><?php echo $right_answer;?></span></p>
                        <!--<p>Total no. of wrong answers : <span class="answer"><?php echo $wrong_answer;?></span></p>
                        <p>Total no. of Unanswered Questions : <span class="answer"><?php echo $unanswered;?></span></p>--> 
                        <p style="color: red"><b><?php echo $message;?></b></p>                  
                       </div> 
                   
                   </div>
                    
            </div>    
            <div class="row">    
                    
            </div>
        </div>
        <footer>
            <p class="text-center" id="foot">
                &copy; <a href="#" target="_blank">Ehealth Quiz </a>2014
            </p>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/jquery.validate.min.js"></script>

        

    </body>
</html>
<?php }
else{
    
 header( 'Location: http://users.metropolia.fi/~bikilat/quiz3/index.php' ) ;
      
}?>