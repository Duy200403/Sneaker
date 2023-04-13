
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Phone Store</title>

<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/datepicker3.css" rel="stylesheet">
<link href="public/css/bootstrap-table.css" rel="stylesheet">
<link href="public/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="public/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="public/js/html5shiv.js"></script>
<script src="public/js/respond.min.js"></script>
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
                        <a class="navbar-brand" href="#"><span>Phone</span>Store</a>
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
			<li><a href="../client/admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="../user/user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="../categories/category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class="active"><a href="../products/product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<!-- <li><a href="comment.html"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
            <li><a href="ads.html"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
            <li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li> -->
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active">Edit Product</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản Phẩm</h1>
        </div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            foreach($array['products'] as $products){
                            ?>
                        <form action="index.php?controller=product&action=update&id=<?= $products['prd_id'];?>" role="form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="prd_id" value="">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                            <input required name="prd_ima" type="file" onchange="preview()">
                                            <img style="width: 200px; height: 200px;" id="frame"src="Public/images/<?= $products['prd_ima'];?>">
                                            <br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- <div class="form-group">
                                        <label>ID</label>
                                        <input required name="prd_id" class="form-control" placeholder="">
                                    </div> -->

                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input required name="prd_name" class="form-control" placeholder="" value="<?=$products['prd_name']?>">
                                    </div>
                                                                
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input required name="prd_price" type="number" min="0" class="form-control" value="<?=$products['prd_price']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tình Trạng</label>
                                        <input required name="prd_status" type="text" min="0" class="form-control"value="<?=$products['prd_status']?>">
                                    </div>
                                    <div class="form-group">
                                        <label label>Trạng thái</label>
                                        <select name="prd_status" class="form-control">
                                            <option value=1 selected>Còn hàng</option>
                                            <option value=0>Hết hàng</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="cate_id" class="form-control">
                                        <?php
                                            foreach($array['categories']  as $category){
                                        ?>
                                            <option <?php if($products['size_id'] == $category['cate_id']){echo 'selected';}?> value=<?php echo $category['cate_id'] ?>><?php echo $category['cate_name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Size</label>
                                        <select name="size_id" class="form-control">
                                            <?php
                                            foreach($array['size'] as $size){
                                                ?>
                                                <option <?php if($products['size_id'] == $size['size_id']){echo 'selected';}?> value="<?php echo $size['size_id'];?>"><?php echo $size['size'];?></option>
                                                <?php
                                            }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea required name="prd_new" value="<?= $products['prd_new'];?>"  class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phảm nổi bật</label>
                                        <div class="checkbox">
                                            <label>
                                                <input name="prd_featured" type="checkbox" <?php if($products['prd_featured'] == 1){echo 'checked';} ?>>Nổi bật
                                            </label>
                                        </div>
                                    </div>

                                    <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                    <button type="reset" class="btn btn-default">Làm mới</button>
                                </div>
                            </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
    <script>
        function preview() {
        frame.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>
