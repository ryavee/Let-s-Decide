<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Lest's Decide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="footer.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Markazi+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
	
    <header>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Let's Decide</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php"><b>Home</b> <span class="sr-only">(current)</span></a></li>
				<li><a href="unanswered.php"><b>Unanswered</b></a></li>
<form class="navbar-form navbar-right" action="searchp.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="college"placeholder="Search Questions">
				</div>
				<button type="submit" name="search" value="Search" class="btn btn-default">Submit</button>
			  </form>
<li>

<?php
                                     session_start();
                                    $link = mysqli_connect('localhost', 'root', '','counselling');
                                     if($_SESSION['IS_AUTHENTICATED']){
                                     $hello =$_SESSION['email'];
                                         $sql="SELECT name FROM users WHERE email ='$hello'";
                                         $result=mysqli_query($link,$sql);
                                            // Mysql_num_row is counting table row
                                        $row=mysqli_fetch_array($result);
                                         $name=$row['name'];
                                         

                                echo "<div class='dropdown' style='margin-top:7px'>
  <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
    $name
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
    <li><a href='profile.php'>My profile</a></li>
    <li><a href='#'>setting</a></li>
    <li><a href='loggout.php'>Log out</a></li>
  </ul>
</div>";
                                     }
                                    ?>
 <!-- Modal -->
  <div class='modal fade' id='myModal1' role='dialog'>
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h2 class='modal-title'>Answer</h2>
          <ul>
                <li>Keep your Answer short and to the point</li>
                <li>Check your Language</li>
                <li>Phrase it like a Answer</li>
          </ul>
        </div>
        <div class='modal-body'>
         <form action='postans.php' method='post'> <div class='form-group'>
    <label for='exampleFormControlTextarea1'>Write your Answer below:-</label>
    <textarea name='ans' class='form-control' id='exampleFormControlTextarea1' rows='3'> </textarea>
  </div>
          <button type='submit' class='btn btn-success'>Submit</button>
        </div>
     </form>"; </li>
 <!-- Trigger the modal with a button -->
  <button type="button" style="margin-top:7px;margin-left:10px;" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Ask Question</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Ask Question</h2>
          <ul>
                <li>Keep your question short and to the point</li>
                <li>Check for grammar or spelling errors</li>
                <li>Phrase it like a question</li>
          </ul>
        </div>
        <div class="modal-body">
         <form action="postques.php" method="post"> <div class="form-group">
    <label for="exampleFormControlTextarea1">Write your question below:-</label>
    <textarea name="ques" class="form-control" id="exampleFormControlTextarea1" rows="3"> </textarea>
  </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
     </form>
			  </ul>
			 
			</div>
		  </div>
		</nav>

	</header>
<body style="font-family:Times New Roman;">
<?php
if($_GET['var'])
{
$ques_id = $_GET['var'];
$_SESSION['hey']=$ques_id;
}
else
{
$ques_id=$_SESSION['hey'];
}
$link=mysqli_connect('localhost','root','','counselling') or die ('Unable to connect to the server');
$sql="select *
from question where ques_id='$ques_id'";

$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
echo "<div><div style='margin-top:70px;margin-left:235px;margin-right:235px;font-family:Markazi Text, serif;'><h2><strong>Q.".ucwords($row['question'])."</strong></h2></div><div style='margin-left:235px;margin-bottom:20px;'> <button type='button'  class='btn btn-success' data-toggle='modal' data-target='#myModal1'>Answer</button></div></div>";

$sql1="select *
from answer where ques_id='$ques_id'";
$result1=mysqli_query($link,$sql1);

$count=1;


 while ($row1=mysqli_fetch_array($result1))
//echo "<div style='background-color:#ADD8E6;'>";
{ 
    
    $aid=$row1['email'];
    
     $sql3="SELECT email,name from users WHERE email='$aid';";
   
   
   
     $result3=mysqli_query($link,$sql3);
     $row3=mysqli_fetch_array($result3);
     $temp=$row1['ans'];
     $em=$row3['email'];
     $answer=ucwords("$temp");     
     echo "<div style=border-style:groove;padding:40px;margin-left:235px;margin-right:235px;border-radius:20px;margin-bottom:5px;'>";
     echo "<h5 style='margin-bottom:-1px;color:#BF1515;'>Answered By <a href = 'who.php?var=$em'>".$row3['name']."</a></h5>";
     echo "<h4 style='font-family:Markazi Text, serif;font-size:23px;'>".$answer."</h4>";
     $count=$count+1;
     echo "</div>";
  
}

?>


























</body>
</html>

