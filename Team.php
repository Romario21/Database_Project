<html>
	<head>
		<title> Clubs </title>
	<link rel="stylesheet" type="text/css" href="new.css">
	</head>
	<body>
	<h1> CLUBS </h1>
	<p class="format">
			The Current Matches are displayed. Click on desired Team for more 
			information </p>     
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
				<td><?php  echo '<a href="ManchesterU.php?id='.$row['Team_Name'].'">'.$row['Team_Name'].'</a>';?></td>
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
	</body>
</html>