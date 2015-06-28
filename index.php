<?php include 'config/config.php';?>
<?php include 'libraries/Database.php';?>
<?php $db = new DataBase ();

$topic_code = $_GET['topic_code'];

//Get the questions from the selected topic
$query = 'SELECT * FROM movies WHERE question_code IN (SELECT question_code FROM connect WHERE topic_code ="'.$topic_code.'")';
$questions = $db->select($query);

//Display all the topics that can be selected from the database
$query = "SELECT * FROM topics";

$topics = $db->select($query);

//Get the main topic name

$query = 'SELECT * FROM topics WHERE topic_code = "'.$topic_code.'" ';
$maintopic = $db->select($query)->fetch_assoc();
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

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <?php while($row = $questions->fetch_assoc()):?>
        <tr>
          <th scope="row">1</th>
          <td><a href="https://www.youtube.com/watch?v=<?php echo $row['link'];?>"><?php echo $row['year'];?> Question <?php echo $row['question_no'];?></a></td>
          <td><?php echo $row['paper'];?></td>
          <td>27cm</td>
          <td>Some students....</td>
        </tr>
        <?php endwhile;?>
        
           <tr>
          <th scope="row">1</th>
          <td>2005 Q1</td>
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
  </body>
</html>
