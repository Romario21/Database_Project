<html>
	<head>
		<title> ManU </title>
	<link rel="stylesheet" type="text/css" href="new.css">
	<style>
		body{
			background-image: url("Luk.png");
			background-repeat: no-repeat;
			background-position: center top;
			background-size: 200px 200px;
			margin-top: 200px;
		}
		
	</style>
	</head>
	<body>
	<h1> Lukaku </h1>
	<p class="format">
			Player Information is displayed. </p>     
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
		echo '<p class="format2">Team: Manchester United</p>';
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
	<table>
	<hr>
	
	</body>
</html>