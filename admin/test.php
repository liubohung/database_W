
<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
	<title>Todo list </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="heading">
		<h2>To do list </h2>
	</div>

	<form method="POST" action="todo.php">
	<?php if (isset($errors)) { ?>
		<p><?php echo $errors ?></p>
	<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" class="add_btn" name="submit">Add Task</button>
	</form>

	<table>
		<thead>
			<tr>
				<th>N</th>
				<th>Task</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
		<?php $i = 1; while ($row = mysqli_fetch_array($tasks)) {?>
			<tr>
				<td><?php echo $i; ?></td>
				<td class="task"><?php echo $row['task']; ?></td>
				<td class="delete"><a href="todo.php?del_task=<?php echo $row['id']; ?>">x</a></td>
			</tr>
		<?php } ?>

		</tbody>
	</table>
</body>
</html>