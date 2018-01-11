<html>
	<head>
		<title> ManU </title>
	<link rel="stylesheet" type="text/css" href="new.css">
	<style>
		body{
			background-image: url("ManU2.png");
			background-repeat: no-repeat;
			background-position: center top;
			background-size: 200px 200px;
			margin-top: 200px;
			}
	</style>
	</head>
	<body>
	<h1> Manchester United </h1>
	 <br /> 
	  <br /> 
	   <br /> 
	    <br /> 
	   <br /> 
	<p class="format">
			Information about the club is displayed </p>     
	<hr>
	<table>
        <thead>
            <tr>
                <th>Club Name</th>
                <th>Wins</th>
				<th>Draws</th>
				<th>Loss</th>
            </tr>
        </thead>
        <tbody>
	<?php 
		$db = 'soccerdb';
		$connect = mysqli_connect("localhost:3306", "root");
		$db_selected = mysqli_select_db($connect,$db);
		$sql = "SELECT * FROM `team` ORDER BY Wins DESC";
		$result = mysqli_query($connect, $sql);
		echo "<p>Premiere League</p>";
		while($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $row['Team_Name']?></td>
				<td><?php echo $row['Wins']?></td>
				<td><?php echo $row['Draws']?></td>
				<td><?php echo $row['Loss']?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
		</table>
	<hr>
	<table>
        <thead>
            <tr>
                <th>Player</th>
                <th>Goals Scored</th>
				<th>Position</th>
            </tr>
        </thead>
        <tbody>
	<?php 
		$db = 'soccerdb';
		$connect = mysqli_connect("localhost:3306", "root");
		$db_selected = mysqli_select_db($connect,$db);
		$sql = "SELECT * FROM `player` Where Roster_id = 1";
		$result = mysqli_query($connect, $sql);
		echo "<p>Squad</p>";
		while($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $row['Player_Name']?></td>
				<td><?php echo $row['goals_scored']?></td>
				<td><?php echo $row['Position']?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
		</table>
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
	</body>
</html>