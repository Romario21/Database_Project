<html>
	<head>
		<title> National </title>
	<link rel="stylesheet" type="text/css" href="new.css">
	</head>
	<body>
	<h1> NATIONAL TEAM </h1>
	<p class="format">
			National Teams are displayed in ranked order. Click on desired Team for more 
			information </p>     
	<hr>
	<table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>National Team</th>
            </tr>
        </thead>
        <tbody>
	<?php 
		$db = 'soccerdb';
		$connect = mysqli_connect("localhost:3306", "root");
		$db_selected = mysqli_select_db($connect,$db);
		$sql = "SELECT * FROM `national_team` ORDER BY World_rank";
		$result = mysqli_query($connect, $sql);
		echo "<p>World Cup</p>";
		while($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $row['World_rank']?></td>
				<td><?php  echo '<a href="National.php?id='.$row['Team_Name'].'">'.$row['Team_Name'].'</a>';?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
		</table>
	<hr>
	</body>
</html>