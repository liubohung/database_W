<?php
function nav_in() {
	if (isset($_SESSION['account']) and isset($_SESSION['pwd'])) {
		$account = $_SESSION['account'];
		print "<header><h1> 歡迎";
		print $account;
		print "</h1><br></header>";
		print "<nav class=\"navbar navbar-light navbar-static-top\">
				<div class=\"container\">
				<div class=\"navbar-header\">
					<a class=\"navbar-brand\" href=\"Home.php\">首頁</a>
				</div>
				<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
					<ul class=\"nav navbar-nav navbar-right\">
						<li>
							<a href=\"searchtry.php\" aria-haspopup=\"true\" role=\"button\">課程查詢</a>
						</li>
						<li>
							<a href=\"data_a.php\" aria-haspopup=\"true\" role=\"button\">選課情況</a>
						</li>
						<li>
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\">
								選課模式
								<span class=\"caret\"></span></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"trypull.php\">一般選課</a></li>
								<li><a href=\"welcome.php\">快速選課</a></li>
								<li><a href=\"welcome2.php\">課表選課</a></li>
							</ul>
						</li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\">
								$account
								<span class=\"caret\"></span></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"logout.php\">用戶登出</a></li>
								<li><a href=\"chpwd.php\">更改密碼</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>";
	} else {
		header("refresh:0;url=Home.php");
	}
}
function nav_noin() {
	print "<nav class=\"navbar navbar-light navbar-static-top\">
				<div class=\"container\">
				<div class=\"navbar-header\">
					<a class=\"navbar-brand\" href=\"Home.php\">首頁</a>
				</div>
				<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
					<ul class=\"nav navbar-nav navbar-right\">
						<li>
							<a href=\"searchtry.php\" aria-haspopup=\"true\" role=\"button\">課程查詢</a>
						</li>
						<li>
						    <a href=\"data_a.php\" aria-haspopup=\"true\" role=\"button\">選課情況</a>
						</li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\">
								<span class=\"caret\"></span></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"login.php\">用戶登入</a></li>
								<li><a href=\"cwdsearch.php\">查詢密碼</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>";
}
function nav_judge() {
	if (isset($_SESSION['account']) and isset($_SESSION['pwd'])) {
		$account = $_SESSION['account'];
		print "<nav class=\"navbar navbar-light navbar-static-top\">
				<div class=\"container\">
				<div class=\"navbar-header\">
					<a class=\"navbar-brand\" href=\"Home.php\">首頁</a>
				</div>
				<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
					<ul class=\"nav navbar-nav navbar-right\">
						<li>
							<a href=\"searchtry.php\" aria-haspopup=\"true\" role=\"button\">課程查詢</a>
						</li>
						<li>
							<a href=\"data_a.php\" aria-haspopup=\"true\" role=\"button\">選課情況</a>
						</li>
						<li>
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\">
								選課模式
								<span class=\"caret\"></span></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"trypull.php\">一般選課</a></li>
								<li><a href=\"welcome.php\">快速選課</a></li>
								<li><a href=\"welcome2.php\">課表選課</a></li>
							</ul>
						</li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\">";
		print $account;
		print "<span class=\"caret\"></span></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"logout.php\">用戶登出</a></li>
								<li><a href=\"chpwd.php\">更改密碼</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>";
	} else {
		print "<nav class=\"navbar navbar-light navbar-static-top\">
				<div class=\"container\">
				<div class=\"navbar-header\">
					<a class=\"navbar-brand\" href=\"Home.php\">首頁</a>
				</div>
				<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
					<ul class=\"nav navbar-nav navbar-right\">
						<li>
							<a href=\"searchtry.php\" aria-haspopup=\"true\" role=\"button\">課程查詢</a>
						</li>
						<li>
						    <a href=\"data_a.php\" aria-haspopup=\"true\" role=\"button\">選課情況</a>
						</li>
						<li class=\"dropdown\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\">
								<span class=\"caret\"></span></a>
							<ul class=\"dropdown-menu\">
								<li><a href=\"login.php\">用戶登入</a></li>
								<li><a href=\"cwdsearch.php\">查詢密碼</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>";
	}
}

function nav_teacher() {

}

function admin() {

}
?>
