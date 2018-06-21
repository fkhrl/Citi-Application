<?php 
		include("class/auth.php");
		include("plugin/plugin.php");
		$plugin=new cmsPlugin();
		$table="our_products"; ?>
		<?php 
		if(isset($_POST['create'])){
			extract($_POST);
			if(!empty($short_details) && !empty($long_details) && !empty($category_one) && !empty($category_two) && !empty($heading))
			{  $insert=array('short_details'=>$short_details,'long_details'=>$long_details,'category_one'=>$category_one,'category_two'=>$category_two,'heading'=>$heading,'date'=>date('Y-m-d'),'status'=>1);
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
			extract($_POST);if(!empty($short_details) && !empty($long_details) && !empty($category_one) && !empty($category_two) && !empty($heading))
			{$updatearray=array("id"=>$id);$upd2=array('short_details'=>$short_details,'long_details'=>$long_details,'category_one'=>$category_one,'category_two'=>$category_two,'heading'=>$heading,'date'=>date('Y-m-d'),'status'=>1);
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
			$delarray=array("id"=>$_GET['id']);if($obj->delete($table,$delarray)==1)
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
    echo $plugin->softwareTitle("Our Products");
    echo $plugin->TableCss();  echo $plugin->TextAreaCss();  ?></head>
    <body class="">
		<?php include('include/topnav.php'); include('include/mainnav.php'); ?>
        




        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Our Products</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Our Products</a></li>
                    <li><a href="our_products_data.php">Our Products List</a></li>
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
                                <h4 class="heading">Update/Change - Our Products</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form  class="form-horizontal" method="post" action="" role="form">
								<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Short Details </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='short_details' placeholder='Short Details' class='summernote'><?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"short_details"); ?></textarea>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Long Details </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='long_details' placeholder='Long Details' class='summernote'><?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"long_details"); ?></textarea>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Category One </label>

                            <div class='col-sm-9'>
                                    <select id='form-field-1' name='category_one' class='form-control'><option value='0'>Please Select</option><?php 
                        $ex_category_one_data=$obj->SelectAllByVal($table,'id',$_GET['edit'],'category_one');
                        $sqlcategory_one=$obj->FlyQuery('SELECT id,name FROM `product_category`');
                        if(!empty($sqlcategory_one))
                        {
                            foreach ($sqlcategory_one as $category_one): ?><option <?php if($category_one->id==$ex_category_one_data){ ?> selected='selected' <?php } ?> value='<?=$category_one->id?>'><?=$category_one->name?></option><?php endforeach; ?><?php } ?></select>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Category Two </label>

                            <div class='col-sm-9'>
                                    <select id='form-field-1' name='category_two' class='form-control'><option value='0'>Please Select</option><?php 
                        $ex_category_two_data=$obj->SelectAllByVal($table,'id',$_GET['edit'],'category_two');
                        $sqlcategory_two=$obj->FlyQuery('SELECT id,name FROM `product_category`');
                        if(!empty($sqlcategory_two))
                        {
                            foreach ($sqlcategory_two as $category_two): ?><option <?php if($category_two->id==$ex_category_two_data){ ?> selected='selected' <?php } ?> value='<?=$category_two->id?>'><?=$category_two->name?></option><?php endforeach; ?><?php } ?></select>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Heading </label>

                            <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='heading' value='<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"heading"); ?>' placeholder='Heading' class='form-control' />
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
                                <h4 class="heading">Create New Our Products</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form  class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Short Details </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='short_details' placeholder='Short Details' class='summernote'></textarea>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Long Details </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='long_details' placeholder='Long Details' class='summernote'></textarea>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Category One </label>

                            <div class='col-sm-9'>
                                    <select id='form-field-1' name='category_one' class='form-control'><option value='0'>Please Select</option><?php $sqlcategory_one=$obj->FlyQuery('SELECT id,name FROM `product_category`');
                        if(!empty($sqlcategory_one))
                        {
                            foreach ($sqlcategory_one as $category_one): ?><option value='<?=$category_one->id?>'><?=$category_one->name?></option><?php endforeach; ?><?php } ?></select>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Category Two </label>

                            <div class='col-sm-9'>
                                    <select id='form-field-1' name='category_two' class='form-control'><option value='0'>Please Select</option><?php $sqlcategory_two=$obj->FlyQuery('SELECT id,name FROM `product_category`');
                        if(!empty($sqlcategory_two))
                        {
                            foreach ($sqlcategory_two as $category_two): ?><option value='<?=$category_two->id?>'><?=$category_two->name?></option><?php endforeach; ?><?php } ?></select>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Heading </label>

                            <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='heading' placeholder='Heading' class='form-control' />
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
    
    <?php echo $plugin->TableJs();  echo $plugin->TextAreaJS();  ?> </body>
</html>