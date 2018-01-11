<html>
	<head>
		<title> DB </title>
	<link rel="stylesheet" type="text/css" href="new.css">
	<style>
		body{
			background-image: url("fut2.png");
			background-repeat: no-repeat;
			background-position: right top;
			background-size: 250px 250px;
		}
	</style>
	</head>
	<body>
	<h1> My Fut </h1>
	<p>
			Romario Estrella    </p>     
	<p id="myText" >COP4710</p>
		
	<p class="format">
	Options</p>
	<form action="/Team.php">
<input type="submit" value="Club">
</form>
<form action="/Team2.php">
<input type="submit" value="National Team"> </form>
<form action="/Players.php">
<input type="submit" value="Players">
</form>
	<hr>
	<table>
        <thead>
            <tr>
                <th>MATCH UP</th>
                <th>SCORE</th>
            </tr>
        </thead>
        <tbody>
	<?php 
		$db = 'soccerdb';
		$connect = mysqli_connect("localhost:3306", "root");
		if($connect) { echo"<p> connected</p>";}
		else {echo "<p>not connected</p>";}
		$db_selected = mysqli_select_db($connect,$db);
		if($db_selected){echo "<p>Today's Games</p>";}
		else{ echo "<p>failure</p>";}
		$sql = "SELECT * FROM `game` WHERE `game_date` = '2017-07-31'";
		$result = mysqli_query($connect, $sql);
		while($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $row['Hometeam_name']; 
				echo " vs "; echo  $row['Awayteam_name'] ?>
				</td>
				<td><?php echo $row['hometeam_score']; echo " : ";
				echo $row['Awayteam_score']?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
		</table>
	
	<hr>
	</body>
</html>