<?php

    /**
     * gọi file autoload
     */
    include __DIR__ ."/../../autoload/autoload.php";

   /**
    *  xử lý
    */
    $open = "setting";
    $active = "menu";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        $tenmenu = postInput("tenmenu");
        $vitri        = postInput("vitri");
        
        $slug = postInput("slug");
        $email        = postInput("email");
        $soluong    = postInput("soluong");
        $mota       = postInput("mota");


        if ($tenmenu == '')
        {
            $error['tenmenu'] = " Tên menu không được để trống !";
        }

        if ($vitri == '')
        {
            $error['vitri'] = " Vị trí không được để trống !";
        }

        if ($slug == '')
        {
            $error['slug'] = " Tên đường dẫn  không được để trống !";
        }

       


        if( empty($error))
        {
            $data = [
                'tenmenu' => $tenmenu,
                'slug'    => $slug,
                'vitri'   => $vitri
              
            ];

            $id_insert = $db->insert("menu" , $data);   
            if($id_insert)
            {
                $_SESSION['success'] = ' Thêm Mới Thành Công ';
                redirectAdmin("menu");
            }
            else
            {
                $_SESSION['error'] = 'Thêm Mới thất bại ';
                redirectAdmin('menu');
            }
        }
    }
?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../../layouts/header.php";
 ?>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_admin() ?>">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                   
                    <li>
                        <a href="index.php" ><i> Quản lý menu  </i></a>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>
              <?php include __DIR__ ."/../../layouts/notification.php"; ?>
             <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Thêm mới menu 
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action="" enctype="multipart/form-data">
                       
                        <div class="form-body ">
                            <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left bor" novalidate="" enctype="multipart/form-data">
                            
                            <div class="col-md-12 bor" style="padding-top: 20px;">

                               

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Tên Menu <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="tenmenu" class="form-control col-md-7 col-xs-12" value="<?php echo isset($tenmenu) ? $tenmenu : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Vị trí <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="number" name="vitri" min="0" class="form-control col-md-7 col-xs-12" value="<?php echo isset($vitri) ? $vitri : '0' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Đường dẫn <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="slug" class="form-control col-md-7 col-xs-12" value="<?php echo isset($slug) ? $slug : '' ?>">
                                    </div>
                                </div>

                              
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                           
                      
                        </div>
                        <div class="form-actions right">
                            <button type="submit" class="btn green">Lưu</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/../../layouts/footer.php";
 ?>