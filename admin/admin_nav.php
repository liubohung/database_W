<?php
function nav_in(){
	print <<<_END
		<nav class="navbar navbar-light navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="admin.php">首頁</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
                        新增<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="new_teacher.php">新增教師</a></li>
                            <li><a href="new_student.php">新增學生</a></li>
                        </ul>
                        </li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
                            刪除<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="delete_teacher.php">刪除教師</a></li>
								<li><a href="delete_student.php">刪除學生</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		_END;
}
?>