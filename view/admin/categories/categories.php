
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Phone Store</title>

<link href="../../../public/css/bootstrap.min.css" rel="stylesheet">
<link href="../../../public/css/datepicker3.css" rel="stylesheet">
<link href="../../../public/css/bootstrap-table.css" rel="stylesheet">
<link href="../../../public/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../../../public/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="../../../public/js/html5shiv.js"></script>
<script src="../../../public/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                        <a class="navbar-brand" href="#"><span>Sneaker</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
									<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
								</ul>
							</li>
						</ul>
					</div>
									
				</div><!-- /.container-fluid -->
			</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
            <li><a href="?controller=admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            <li><a href="?controller=admin&redirect=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
            <li class="active"><a href="?controller=admin&redirect=categories"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
            <li><a href="?controller=admin&redirect=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="order.php"><svg class="glyph stroked two messages">
                        <use xlink:href="#stroked-two-messages" />
                    </svg> Quản lý khách hàng</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="?controller=<?= $controllers ?>&redirect=<?= $redirect ?>&action=create" class="btn btn-primary">
                <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
            </a>
        </div>
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên danh mục</th>
										<th>Hành động</th>
									</tr>
									</thead>
									<tbody>
										<?php
                                            $stt =1;
                                            foreach($record as $item){
										?>
										<tr>
											<td style=""><$stt?></td>
											<td style=""><$item['cate_name']?></td>
											<td class="form-group">
											<a href="?controller=<?= $controller ?>&redirect=<?= $redirect ?>&action=edit&cate_id=<?= $item['cate_id'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
											<a href="?controller=<?= $controller ?>&redirect=<?= $redirect ?>&action=destroy&cate_id=<?= $item['cate_id'];?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
											</td>
										</tr>
										<?php
                                            $stt++;
                                            }
										?>
										
									
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
									</ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="../../../public/js/jquery-1.11.1.min.js"></script>
	<script src="../../../public/js/bootstrap.min.js"></script>
	<script src="../../../public/js/bootstrap-table.js"></script>
</body>

</html>