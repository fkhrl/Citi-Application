<?php 
		include("class/auth.php");
		include("plugin/plugin.php");
		$plugin=new cmsPlugin();
		$table="product_category"; ?>
		<?php 
		if(isset($_POST['create'])){
			extract($_POST);
			if(!empty($name) && !empty($_FILES['photo']['name']) && !empty($_FILES['photo_2']['name']) && !empty($content))
			{  include('class/uploadImage_Class.php'); $imgclassget=new image_class();  
                                          $photo=$imgclassget->upload_fiximage("upload","photo","photo_upload_".$table_name."_".time());  
                                          $photo_2=$imgclassget->upload_fiximage("upload","photo_2","photo_2_upload_".$table_name."_".time());  $insert=array('name'=>$name,'photo'=>$photo,'photo_2'=>$photo_2,'content'=>$content,'date'=>date('Y-m-d'),'status'=>1);
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
			extract($_POST);if(!empty($name) && !empty($content))
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
                                                    }
                                                    if(!empty($_FILES['photo_2']['name']))
                                                    { 
                                                            $photo_2_1=$imgclassget->upload_fiximage("upload","photo_2","photo_2_upload_".$table_name."_".time()); 
                                                            $photo_2=$photo_2_1; 
                                                            @unlink("upload/".$ex_photo_2);      
                                                    }
                                                    else
                                                    { 
                                                            $photo_2=$ex_photo_2; 
                                                    }$upd2=array('name'=>$name,'photo'=>$photo,'photo_2'=>$photo_2,'content'=>$content,'date'=>date('Y-m-d'),'status'=>1);
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
			$delarray=array("id"=>$_GET['id']);$photolink=$obj->SelectAllByVal($table,'id',$_GET['id'],'photo_2'); @unlink("upload/".$photolink);if($obj->delete($table,$delarray)==1)
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
    echo $plugin->softwareTitle("Product Category");
    echo $plugin->TableCss(); 
    echo $plugin->FileUploadCss(); 
    //echo $plugin->TextAreaCss();  
    ?>
        
  <!-- <link rel="stylesheet" href="editor/froala_editor/css/froala_editor.css">
  <link rel="stylesheet" href="editor/froala_editor/css/froala_style.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/code_view.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/colors.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/emoticons.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/image_manager.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/image.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/table.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/char_counter.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/video.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/file.css">
  <link rel="stylesheet" href="editor/froala_editor/css/plugins/quick_insert.css"> -->
  <link href="editor/froala_v1/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="editor/froala_v1/css/froala_editor.min.css" rel="stylesheet" type="text/css">

    </head>
    <body class="">
		<?php include('include/topnav.php'); include('include/mainnav.php'); ?>
        




        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Product Category</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Product Category</a></li>
                    <li><a href="product_category_data.php">Product Category List</a></li>
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
                                <h4 class="heading">Update/Change - Product Category</h4>
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
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Photo 2 </label>

                            <div class='col-sm-3'>
                                    <?php 
                    $ex_photo_2_data=$obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_2");
                    echo $plugin->FileUploadBox(1,$ex_photo_2_data,'photo_2');
                    ?>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Content </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='content' placeholder='Content' class='summernote'><?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"content"); ?></textarea>
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
                                <h4 class="heading">Create New Product Category</h4>
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
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Photo 2 </label>

                            <div class='col-sm-3'>
                                    <?php 
                    echo $plugin->FileUploadBox(0,'','photo_2');
                    ?>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Content </label>

                            <div class='col-sm-9'>
                                    <textarea id='editor' name='content' class='summernote'></textarea>
                            </div>
                      
                    </div>


                        <!-- div id="editor">
    <div id='edit' style="margin-top: 30px;">
      
    </div>
  </div> -->


                    <div class="form-group">
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
    
    <?php 
    echo $plugin->TableJs();  
    echo $plugin->FileUploadJS();  
    //echo $plugin->TextAreaJS();  
    ?>
     
  <!-- <script type="text/javascript" src="editor/froala_editor/js/froala_editor.min.js" ></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="editor/froala_editor/js/plugins/video.min.js"></script>

  <script>
    $(function(){
      $.FroalaEditor.DefineIcon('imageInfo', {NAME: 'info'});
      $.FroalaEditor.RegisterCommand('imageInfo', {
        title: 'Info',
        focus: false,
        undo: false,
        refreshAfterCallback: false,
        callback: function () {
          var $img = this.image.get();
          alert($img.attr('src'));
        }
      });

      $('textarea').froalaEditor({
        imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove']
      })
    });
  </script>  -->
<script src="editor/froala_v1/js/libs/jquery-1.11.1.min.js"></script>
  <script src="editor/froala_v1/js/froala_editor.min.js"></script>
  <!--[if lt IE 9]>
    <script src="editor/froala_v1/js/froala_editor_ie8.min.js"></script>
  <![endif]-->
  <script src="editor/froala_v1/js/plugins/tables.min.js"></script>
  <script src="editor/froala_v1/js/plugins/lists.min.js"></script>
  <script src="editor/froala_v1/js/plugins/colors.min.js"></script>
  <script src="editor/froala_v1/js/plugins/media_manager.min.js"></script>
  <script src="editor/froala_v1/js/plugins/font_family.min.js"></script>
  <script src="editor/froala_v1/js/plugins/font_size.min.js"></script>
  <script src="editor/froala_v1/js/plugins/block_styles.min.js"></script>
  <script src="editor/froala_v1/js/plugins/video.min.js"></script>

  <script>
      $(function(){
          $('textarea').editable({inlineMode: false, imageButtons: ["removeImage", "replaceImage", "linkImage"]})
      });
  </script>
    <script type='text/javascript'>
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