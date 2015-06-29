<?php include 'config/config.php';?>
<?php include 'libraries/Database.php';?>
<?php $db = new DataBase ();
if(isset($_GET['topic_code'])){
	$topic_code = $_GET['topic_code'];
	
	//Get the questions from the selected topic
	$query = 'SELECT * FROM movies WHERE question_code IN (SELECT question_code FROM connect WHERE topic_code ="'.$topic_code.'")';
	$questions = $db->select($query);
	
	//Get the main topic name
	
	$query = 'SELECT * FROM topics WHERE topic_code = "'.$topic_code.'" ';
	$maintopic = $db->select($query)->fetch_assoc();
	
	
}else {
	
	$maintopic['topic_name']="Mathematics topics";
	$topic_code="";
	

}
	




//Display all the topics that can be selected from the database
$query = "SELECT * FROM topics";

$topics = $db->select($query);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/colorbox.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/jquery.colorbox-min.js"></script>
   
  

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1> <?php echo $maintopic['topic_name'];?></h1>
      </div>
      <div class="col-md-8">
       <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Question</th>
          <th>Paper</th>
          <th>Answer</th>
          <th>Remark</th>
        </tr>
      </thead>
      <tbody>

      <?php if($topic_code!=""):?>
      <?php while($row = $questions->fetch_assoc()):?>
      
        <tr>
          <th scope="row">1</th>
          <td><a class="youtube" href="http://www.youtube.com/embed/<?php echo $row['link'];?>"><?php echo $row['year'];?> Question <?php echo $row['question_no'];?></a></td>
          <td><?php echo $row['paper'];?></td>
          <td>27cm</td>
          <td>Some students....</td>
        </tr>
        <?php endwhile;?>
   
          <?php else:?>
        
<h1>There are no posts yet</h1>
<?php endif;?>
        
           <tr>
          <th scope="row">1</th>

          <td><a class="youtube" href=" http://www.youtube.com/embed/2JMoPFUYeLg?rel=0&amp;wmode=transparent">2005 Q1</a></td>
          <td>I</td>
          <td>27cm</td>
          <td>Some students....</td>
        </tr>
           <tr>
          <th scope="row">1</th>
          <td>2005 Q1</td>
          <td>I</td>
          <td>27cm</td>
          <td>Some students....</td>
        </tr>
       
       
      </tbody>
    </table>
    </div>
     <div class="col-md-4">
   <div  id="sidebar">

          <div class="list-group">
             <?php while($row = $topics->fetch_assoc()):?>
   
            <a href="index.php?topic_code=<?php echo $row['topic_code'];?>" class="list-group-item"><?php echo $row['topic_name'];?></a>
            <a href="#" class="list-group-item">Link</a>
        
            <?php endwhile;?>
          </div>
        </div><!--/.sidebar-offcanvas-->
        </div>
  </div>
 

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Maths.</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  <script src="js/jquery.colorbox-min.js"></script>
    <script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
			
			});
		</script>
  </body>
</html>
