<?php
function nav_in(){
	print <<<_END
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				<a class="nav-link" href="admin.php">Home<span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<ul class="nav navbar-nav nav-flex-icons ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">新增</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="new_teacher.php">新增教師</a>
						<a class="dropdown-item" href="new_student.php">新增學生</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">刪除</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="delete_teacher.php">刪除教師</a>
						<a class="dropdown-item" href="delete_student.php">刪除學生</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">登出</a>
				</li>	
			</ul>	
		</div>
	</nav>
	_END;
}
?>