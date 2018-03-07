<?php 
/*
 * Created by Nathan Gaffney
 * This program will implement CRUD elements in an object oriented manner
 * echo '<td>'. trim($row['id']) . '</td>'; 
   echo '<td>'. trim($row['per_id']) . '</td>'; 
   echo '<td>'. trim($row['ques_id']) . '</td>';  
	 echo '<td>'. trim($row['comment']) . '</td>';  
   echo '<td>'. trim($row['rating']) . '</td>';  
 *
 */
include '/home/gpcorser/public_html/database/header.php';
include '/home/gpcorser/public_html/database/database.php';

class QmComments { 
    public $aMemberVar = 'aMemberVar Member Variable'; 
    public $aFuncName = 'aMemberFunc'; 
    
    function aMemberFunc() { 
        print 'Inside `aMemberFunc()`'; 
    } 
	
	function listTable() { // Person List
	
		// beginning body section of person list
		//echo '<body style="background-color: lightblue !important";> <div class="container"><div class="row"><h3>Persons</h3></div><div class="row"><p><a href="qm_per_create.php" class="btn btn-primary">Add Person</a></p><table class="table table-striped table-bordered" style="background-color: lightgrey !important"><thead><tr><th>Lastname</th><th>Firstname</th><th>Email</th><th>Action</th></tr></thead><tbody>';
		/*Beginning of Body section*/
		echo '<body> <div class="container"><div class="row">';
		/*Begin table section*/
		echo '<h3>Comments</h3></div><div class="row">';
		
		//Button to make another row
		echo '<p><a href="qm_comments.php?oper=1&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '" class="btn btn-primary">Add Comment</a></p>';
		
		echo '<table class="table table-striped table-bordered" style="background-color: lightgrey !important">';
		echo '<thead><tr><th>com id</th><th>per id</th><th>ques id</th><th>comment</th><th>rating</th><th>Actions</th></tr></thead><tbody>';
		
		// populate comments List table
		$pdo = Database::connect();
		$sql = 'SELECT * FROM qm_comments WHERE per_id =' . $_GET['per'] . ' AND ques_id=' . $_GET['ques'];

		foreach ($pdo->query($sql) as $row) {
			//Display the rows of the table
			echo '<tr>';
			echo '<td>'. trim($row['id']) . '</td>'; 
			echo '<td>'. trim($row['per_id']) . '</td>'; 
			echo '<td>'. trim($row['ques_id']) . '</td>';  
			echo '<td>'. trim($row['comment']) . '</td>';  
			echo '<td>'. trim($row['rating']) . '</td>'; 
			 /* Begin actions table row */
			echo '<td>';
			echo '<a class="btn btn-secondary" href="qm_comments.php?oper=2&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] .'">Read</a>';
			echo ' ';
			echo '<a class="btn btn-success" href="qm_comments.php?oper=3&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '&com=' . $row['id'] . '">Update</a>';
			echo ' ';
			echo '<a class="btn btn-danger" href="qm_comments.php?oper=4&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '&com=' . $row['id'] . '">Delete</a>';
			echo ' ';						
			echo '</td>';
			echo '</tr>';
		}
		Database::disconnect();
		
		// end body section of person list
		echo '</tbody></table></div></div></body>';
		
		
	}
	function listAllTable() { // Person List
	
		// beginning body section of person list
		//echo '<body style="background-color: lightblue !important";> <div class="container"><div class="row"><h3>Persons</h3></div><div class="row"><p><a href="qm_per_create.php" class="btn btn-primary">Add Person</a></p><table class="table table-striped table-bordered" style="background-color: lightgrey !important"><thead><tr><th>Lastname</th><th>Firstname</th><th>Email</th><th>Action</th></tr></thead><tbody>';
		/*Beginning of Body section*/
		echo '<body> <div class="container"><div class="row">';
		/*Begin table section*/
		echo '<h3>Comments</h3></div><div class="row">';
		
		//Button to make another row
		echo '<p><a href="qm_comments.php?oper=1&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '" class="btn btn-primary">Add Comment</a></p>';
		
		echo '<table class="table table-striped table-bordered" style="background-color: lightgrey !important">';
		echo '<thead><tr><th>com id</th><th>per id</th><th>ques id</th><th>comment</th><th>rating</th><th>Actions</th></tr></thead><tbody>';
		
		// populate comments List table
		$pdo = Database::connect();
		$sql = 'SELECT * FROM qm_comments';

		foreach ($pdo->query($sql) as $row) {
			//Display the rows of the table
			echo '<tr>';
			echo '<td>'. trim($row['id']) . '</td>'; 
			echo '<td>'. trim($row['per_id']) . '</td>'; 
			echo '<td>'. trim($row['ques_id']) . '</td>';  
			echo '<td>'. trim($row['comment']) . '</td>';  
			echo '<td>'. trim($row['rating']) . '</td>'; 
			 /* Begin actions table row */
			echo '<td>';
			echo '<a class="btn btn-secondary" href="qm_comments.php?oper=2&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] .'">Read</a>';
			echo ' ';
			echo '<a class="btn btn-success" href="qm_comments.php?oper=3&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '&com=' . $row['id'] . '">Update</a>';
			echo ' ';
			echo '<a class="btn btn-danger" href="qm_comments.php?oper=4&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '&com=' . $row['id'] . '">Delete</a>';
			echo ' ';						
			echo '</td>';
			echo '</tr>';
		}
		Database::disconnect();
		
		// end body section of person list
		echo '</tbody></table></div></div></body>';
		
		
	}
  //TODO: Currently not functioning, does not insert values into table
	
  /* Create a row in the qm_comments table
   * Core code borrowed from qm_quiz_create
   */
  function createRow() {
    /*
		echo '<body style="background-color: lightblue !important";><div class="container"><div class="span10 offset1"><div class="row"><h3>Add New Quiz</h3></div><form class="form-horizontal" action="qm_quiz_create.php" method="post"> <div class="control-group';
    echo !empty($quiz_nameError)?'error':''; echo '">';
    echo 'label class="control-label">Quiz Name</label><div class="controls"> <input name="quiz_name" type="text" placeholder="Quiz Name" value="';
    echo !empty($location)?$location:'';  echo '">';
    if (!empty($quiz_nameError)): echo'<span class="help-inline"><?php echo $quiz_nameError;?></span>'; endif; */
    
    if ( !empty($_POST)) { // if not first time through

	// initialize user input validation variables
	$com_commentError = null;
	$com_ratingError = null;
	
	// initialize $_POST variables
	$comValue = $_POST['comment'];
	$ratValue = $_POST['rating'];		
	$valid = true;
	// validate user input 		
	if (empty($comValue)) {
		$com_commentError = 'Please enter a comment';
		$valid = false;
	}		
	if (empty($ratValue)) {
		$com_ratingError = 'Please enter a rating';
		$valid = false;
	}

	// insert data
	if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO qm_comments (comment, rating) values(?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($comValue,$ratValue));
		Database::disconnect();
		header("Location: qm_comments.php?oper=0");//Where it will go when done
	}
}
    //action="qm_comments.php?oper=0" will be what is launched when you hit the create button
    echo '<body style="background-color: lightblue !important";>
    <div class="container">
		<div class="span10 offset1">
		
			<div class="row">
				<h3>Add New Comment</h3>
			</div>
	
			<form class="form-horizontal" action="qm_comments.php" method="post"> 
				
				<div class="control-group'; echo !empty($com_commentError)?'error':''; echo'">';
				echo '	<label class="control-label">Comment</label>
					<div class="controls">
						<input name="comment" type="text" placeholder="Comment" value="'; echo !empty($comValue)?$comValue:''; echo'">';
						if (!empty($com_commentError)):
							echo '<span class="help-inline">'; echo $com_commentError; echo'</span>';
						endif;
					echo'</div>
				</div>
				
				<div class="control-group' ; echo !empty($com_ratingError)?'error':'';echo'">';
					echo'<label class="control-label">Rating</label>
					<div class="controls">
						<input name="rating" type="text" placeholder="Rating" value="'; echo !empty($ratValue)?$ratValue:''; echo'">';
						 if (!empty($com_ratingError)): 
							echo'<span class="help-inline"><?php echo $quiz_descriptionError;?></span>';
						endif;
					echo'</div>
				</div>
				
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Create</button>
					<a class="btn" href="qm_comments.php?oper=0">Back</a>
				</div>
          
        </form>
        
      </div>
          
      </div>
    
  </body>';
    
  } 
	
  /* Read a row
   * Operation ===2
   */
   function readRow(){
     
   }
}

// Foo::aMemberFunc();
// echo "<br />";

// $foo = new Foo; 

// $foo->aMemberFunc();
//using == so it will do someting if called incorrectly
if($_GET['oper']==0) {QmComments::listAllTable();} // === must be declared and the same value | == must be close enough
elseif ($_GET['oper']==1){QmComments::createRow();}
elseif ($_GET['oper']==2){QmComments::readRow();}
elseif ($_GET['oper']==3){QmComments::updateRow();}
elseif ($_GET['oper']==4){QmComments::deleteRow();}
else {error;}//{echo "error";}

?> 