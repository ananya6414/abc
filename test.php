
<html>
<head>
<title>Sample article blog</title>

    <style type="text/css" media="screen">

.ho1{
	font-family: san-serif;
	color:#707070 ;
	text-decoration:none;
}

 .ho1:hover{
 font-family: san-serif;
	color: #FFFFFF;
	text-decoration:none;
 }
#horizontalmenu ul 
{
	padding:1; margin:1; list-style:none;
}

#horizontalmenu li
{

float:left;
 position:relative;
 padding-right:89;
 display:block;
border:0px solid #CC55FF; 
border-style:inset;
margin-left:20px;
}
#horizontalmenu li ul
 {
	display:none;
	position:absolute;
}
#horizontalmenu li:hover ul{
    display:block;
    background:#222222;
	height:auto; width:8em; 
}
#horizontalmenu li ul li
{
    clear:both;
border-style:none;}
#table{
border: 2px solid #a1a1a1;
    padding: 10px 40px; 
    <!--background: #dddddd;-->
    width: 300px;
    border-radius: 25px;
}
#t1{
	background:-webkit-radial-gradient(center, ellipse farthest-corner, #FFFFFF 0%, #612911 100%);
	box-shadow: 12px 10px 7px black;
	
}

	
body
{
	background:#342D7E;
}
</style>	
</head>
<body>
<form name="admin" action="test.php" method="POST">
<center>

<table id="t1" width="1200" height="400" border="1" style="border-radius:10px;" >
  <tbody>
    <tr style="background-color:#98AFC7;">
    <th height="100" colspan="5" ><div style="text-align:left;color:#FFFFFF"><b><font size="+3">
			Online Quiz</th>
    </tr>
    
</div>


    <tr>
      <td height="38" colspan="2" style="background-color:#A83E49; border-radius:10px;"><!-- navigation bar-->
	
      <div id="horizontalmenu">
	  
        <ul ><!-- ALL MENUS...-->
		<li ><a href="index.php" class="ho1" style="color:#FFFFFF;"><b >Login</b></a></li>
		
		<!--<li ><a href="home.php" class="ho1" ><b >HOME</b></a></li>
        <li><a href="articles.php" class="ho1"><b>ARTICLES</b></a></li>
		<li><a href="categories.php" class="ho1"><b>CATEGORIES</b></a></li>	
        <li><a href="my_profile.php" class="ho1"><b>MY PROFILE</b></a></li>
		<li><a href="about.php" class="ho1"><b>ABOUT </b></a></li>
		<li><a href="logout.php" class="ho1" ><b>LOG OUT</b></a>-->
       </div>
              </li>
		 </ul>
                 
         

        
      </td>
    </tr>
	
    <tr>
	<!--
	<td  width="343" style="background-color:#F2E6E4;border-radius:10px;">
	<center>
	<h2><a href="input_article.php">Write An Article</a></h2>
	<h2><a href="articles.php">View All The Article </a></h2>
	<h2><a href="editarticle.php">Edit In Existing Article</a></h2>
	<h2><a href="Removearticle.php">Remove Your own Article</a></h2>
	
	
	   
	</center>
   	--> 
	
   
  <td width="974" height="555" bgcolor="#F2E6E6" style="vertical-align:text-top ;border-radius:10px;">
	 <center></br></br>
				Best Of Luck for Test..
				</br></br></br></br></br></br>
				
				


</center>
</form>
</body>
</html>
<?php
session_start();
$timestamp = time();
$diff = 900; //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if(isset($_SESSION['ts'])) {
    $slice = ($timestamp - $_SESSION['ts']);    
    $diff = $diff - $slice;
}

if(!isset($_SESSION['ts']) || $diff > $hld_diff || $diff < 0) {
    $diff = $hld_diff;
    $_SESSION['ts'] = $timestamp;
}

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;


?>
<div id="strclock">Clock Here!</div>
<script type="text/javascript">
 var hour = <?php echo floor($hours); ?>;
 var min = <?php echo floor($minutes); ?>;
 var sec = <?php echo floor($seconds); ?>

function countdown() {
 if(sec <= 0 && min > 0) {
  sec = 59;
  min -= 1;
 }
 else if(min <= 0 && sec <= 0) {
  min = 0;
  sec = 0;
 }
 else {
  sec -= 1;
 }

 if(min <= 0 && hour > 0) {
  min = 59;
  hour -= 1;
 }

 var pat = /^[0-9]{1}$/;
 sec = (pat.test(sec) == true) ? '0'+sec : sec;
 min = (pat.test(min) == true) ? '0'+min : min;
 hour = (pat.test(hour) == true) ? '0'+hour : hour;

 document.getElementById('strclock').innerHTML = hour+":"+min+":"+sec;
 setTimeout("countdown()",1000);
 }
 countdown();
</script>
<?php
//session_start();
 //echo "Session variable result".$_SESSION['result'];
$_SESSION['counter']++;

$count=$_SESSION['counter'];
echo "Counter is".$count;

if (isset($_POST['submit'])) 
{
	//$_SESSION['counter']==2;
$_SESSION['cat']=$_POST['submit'];
$_SESSION['result']=array_fill(1, 3, '');
}

if (isset($_POST['next'])) 
{
	
	echo "Answer value:".$_POST['answer'];
	$_SESSION['result'][$count-1]=$_POST['answer'];
	echo"Session value".$_SESSION['result'][$count-1];
	foreach($_SESSION['result'] as $value)
	{
		echo" fetch value:".$value;
	}
}
if (isset($_POST['finish'])) 
{
	$_SESSION['result'][$count-1]=$_POST['answer'];
	foreach($_SESSION['result'] as $value)
	{
		echo"fetch value:".$value;
		$arr[]=$value;
		
	}
	foreach($arr as $value)
	{
		echo "array element:".$value."\n";
		
	}
	//echo $_POST['answer'];
	$user=$_SESSION['user'];
	$con=mysqli_connect('localhost','root','')or die("no Connection");
	mysqli_select_db($con,'quiz')or die("no DB");
	if($_SESSION['cat']=="Career_Test")
	{
	$query2="insert into results(user,q1,q2,q3) values('$user','$arr[0]','$arr[1]','$arr[2]')";
	}
	elseif($_SESSION['cat']=="Personality_Test")
	{
		$query2="insert into results(user,q1,q2,q3) values('$user','$arr[0]','$arr[1]','$arr[2]')";
	}
	mysqli_query($con,$query2);
	//echo"<script>document.location='index.php'</script>";
	
	
	
}

	$con=mysqli_connect('localhost','root','')or die("no Connection");
	mysqli_select_db($con,'quiz')or die("no DB");
if($_SESSION['cat']=="Career_Test")
{
	$table="Questions_cr";
	$query="select ques,op1,op2,op3,op4 from Questions_cr where id='$count'";
}
elseif($_SESSION['cat']=="Personality_Test")
{
	$table="Questions_py";
	$query="select ques,op1,op2,op3,op4 from Questions_py where id='$count'";
}

	if($rs=mysqli_query($con,$query))
	{
		//echo"RS working";
	if($row = mysqli_fetch_array($rs,MYSQLI_ASSOC))
	{
		?>
		<center><Table><?php
		echo"<tr><td> Question: </td><td> {$row["ques"]} </td></tr>";
		echo"<tr><td> A): </td><td> {$row["op1"]} </td></tr>";
		echo"<tr><td> B): </td><td> {$row["op2"]} </td></tr>";
		echo"<tr><td> C): </td><td> {$row["op3"]} </td></tr>";
		echo"<tr><td> D): </td><td> {$row["op4"]} </td></tr>";
		if($count<3)
		{
		?>
		
		<tr><input type="text" name="answer"></tr>
		<button type="submit" name="next" value="next">NEXT</button>
		<?php
		}
		else
		{
			?>
			<tr><input type="text" name="answer"></tr>
		<button type="submit" name="finish" value="finish">FINISH</button>
		<?php
		}
		echo"</table></center>";
		
	}
	}
	else	
		echo"Error in query";
	

?>