<?php 
		include("class/auth.php");
		include("plugin/plugin.php");
		$plugin=new cmsPlugin();
		$table="product"; ?>
		<?php 
		if(isset($_POST['create'])){
			extract($_POST);
			if(!empty($name) && !empty($_FILES['photo']['name']) && !empty($details) && !empty($product_category))
			{  include('class/uploadImage_Class.php'); $imgclassget=new image_class();  
                                          $photo=$imgclassget->upload_fiximage("upload","photo","photo_upload_".$table_name."_".time());  $insert=array('name'=>$name,'photo'=>$photo,'details'=>$details,'product_category'=>$product_category,'date'=>date('Y-m-d'),'status'=>1);
				if($obj->insert($table,$insert)==1)
				{
					$plugin->Success("Successfully Saved",$obj->filename());
				}
				else 
				{
					$plugin->Error("Failed",$obj->filename());
				}
			}
			else 
			{
				$plugin->Error("Fields is Empty",$obj->filename());
			}   
		}
		elseif(isset($_POST['update'])) 
		{
			extract($_POST);if(!empty($name) && !empty($details) && !empty($product_category))
			{$updatearray=array("id"=>$id); include('class/uploadImage_Class.php'); $imgclassget=new image_class(); 
                                                    if(!empty($_FILES['photo']['name']))
                                                    { 
                                                            $photo_1=$imgclassget->upload_fiximage("upload","photo","photo_upload_".$table_name."_".time()); 
                                                            $photo=$photo_1; 
                                                            @unlink("upload/".$ex_photo);      
                                                    }
                                                    else
                                                    { 
                                                            $photo=$ex_photo; 
                                                    }$upd2=array('name'=>$name,'photo'=>$photo,'details'=>$details,'product_category'=>$product_category,'date'=>date('Y-m-d'),'status'=>1);
						$update_merge_array=array_merge($updatearray,$upd2);
						if($obj->update($table,$update_merge_array)==1)
						{ 
							$plugin->Success("Successfully Updated",$obj->filename());
						} 
						else 
						{ 
							$plugin->Error("Failed",$obj->filename()); 
						}}}
		elseif(isset($_GET['del'])=="delete") 
		{
			$delarray=array("id"=>$_GET['id']);$photolink=$obj->SelectAllByVal($table,'id',$_GET['id'],'photo'); @unlink("upload/".$photolink);if($obj->delete($table,$delarray)==1)
			{ 
				$plugin->Success("Successfully Delete",$obj->filename());  
			} 
			else 
			{ 
				$plugin->Error("Failed",$obj->filename()); 
			}
		}
		?><!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head><?php  
    echo $plugin->softwareTitle("Product");
    echo $plugin->TableCss();  echo $plugin->FileUploadCss();  echo $plugin->TextAreaCss();  ?></head>
    <body class="">
		<?php include('include/topnav.php'); include('include/mainnav.php'); ?>
        




        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Product</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Product</a></li>
                    <li><a href="product_data.php">Product List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
				<?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                        <!-- Widget -->
                        <div class="widget widget-inverse" >
							<?php 
							if(isset($_GET['edit']))
							{
							?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Update/Change - Product</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
								<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                            <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='name' value='<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"name"); ?>' placeholder='Name' class='form-control' />
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Photo </label>

                            <div class='col-sm-3'>
                                    <?php 
                    $ex_photo_data=$obj->SelectAllByVal($table, "id", $_GET['edit'], "photo");
                    echo $plugin->FileUploadBox(1,$ex_photo_data,'photo');
                    ?>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Details </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='details' placeholder='Details' class='summernote'><?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"details"); ?></textarea>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Product Category </label>

                            <div class='col-sm-9'>
                                    <select id='form-field-1' name='product_category' class='form-control'><option value='0'>Please Select</option><?php 
                        $ex_product_category_data=$obj->SelectAllByVal($table,'id',$_GET['edit'],'product_category');
                        $sqlproduct_category=$obj->FlyQuery('SELECT id,name FROM `product_category`');
                        if(!empty($sqlproduct_category))
                        {
                            foreach ($sqlproduct_category as $product_category): ?><option <?php if($product_category->id==$ex_product_category_data){ ?> selected='selected' <?php } ?> value='<?=$product_category->id?>'><?=$product_category->name?></option><?php endforeach; ?><?php } ?></select>
                            </div>
                    </div><div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button  onclick="javascript:return confirm('Do You Want change/update These Record?')"  type="submit" name="update" class="btn btn-primary">Save Change</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
							<?php }else{ ?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Create New Product</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                            <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='name' placeholder='Name' class='form-control' />
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Photo </label>

                            <div class='col-sm-3'>
                                    <?php 
                    echo $plugin->FileUploadBox(0,'','photo');
                    ?>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Details </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='details' placeholder='Details' class='summernote'></textarea>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Product Category </label>

                            <div class='col-sm-9'>
                                    <select id='form-field-1' name='product_category' class='form-control'><option value='0'>Please Select</option><?php $sqlproduct_category=$obj->FlyQuery('SELECT id,name FROM `product_category`');
                        if(!empty($sqlproduct_category))
                        {
                            foreach ($sqlproduct_category as $product_category): ?><option value='<?=$product_category->id?>'><?=$product_category->name?></option><?php endforeach; ?><?php } ?></select>
                            </div>
                    </div><div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit"   onclick="javascript:return confirm('Do You Want Create/save These Record?')"  name="create" class="btn btn-info">Save</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- // Widget END -->


                        
                        
              <!-- // Widget END -->
            </div>
        </div>
        <!-- // Content END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    
    <?php echo $plugin->TableJs();  echo $plugin->FileUploadJS();  echo $plugin->TextAreaJS();  ?> <script type='text/javascript'>
				jQuery(function($) {
					$('#id-input-file-1').ace_file_input({
                                            no_file:'No File ...',
                                            btn_choose:'Choose',
                                            btn_change:'Change',
                                            droppable:true,
                                            onchange:null,
                                            thumbnail:true
					});
	
				})
			</script></body>
</html>