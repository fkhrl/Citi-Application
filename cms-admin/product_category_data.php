<?php
$table="product_category"; ?><?php 
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin(); 
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
		<?php 
		echo $plugin->softwareTitle();
		echo $plugin->TableCss();
		echo $plugin->KendoCss();
		 ?>
    </head>
    <body class="">
		<?php 
		include('include/topnav.php'); 
		include('include/mainnav.php'); 
		?>
        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Product Category Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="product_category.php">Create New Product Category</a></li>
                    <li class="active"><a href="#">Product Category Data List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="product_category_66"></div>
            </div>
        </div>
        <!-- // Product Category END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Product Category wrapper END -->
        
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_product_category" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="product_category.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_product_category" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(product_category_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./controller/product_category_controller.php",
                            data: {id: product_category_id,table:"product_category",acst:3},
                            success: function (result) {
							if(result==1)
							{
								location.reload();
							}
							else
							{
								$(".k-i-refresh").click();
							}
                            }
                        });
                    }
                }

            </script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
					var postarray={"id":1};
                    var dataSource = new kendo.data.DataSource({
                        pageSize: 5,
                        transport: {
                            read: {
                                url: "./controller/product_category_controller.php",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"product_category",
									"cond":0,
									"multi":postarray
									
								}
                            }
                        },
                        autoSync: false,
                        schema: {
                            data: "data",
                            total: "data.length",
                            model: {
                                id: "id",
                                fields: {
                                    id: {nullable: true},name: {type: "string"},photo: {type: "string"},photo_2: {type: "string"},content: {type: "string"},
									date: {type: "string"}
                                }
                            }
                        }
                    });
                    jQuery("#product_category_66").kendoGrid({
                        dataSource: dataSource,
                        filterable: true,
                        pageable: {
                            refresh: true,
                            input: true,
                            numeric: false,
                            pageSizes: true,
                            pageSizes: [5, 10, 20, 50],
                        },
                        sortable: true,
                        groupable: true,
                        columns: [
                        {field: "id", title: "#", width: "60px"},
                        {field: "name", title: "Name", width: "120px"},
                        {field: "photo", title: "Photo", width: "120px"},
                        {field: "photo_2", title: "Photo 2", width: "120px"},
                        // {field: "content", title: "Content",encoded: false, width: "400px"},
							{field: "date", title: "Record Added", width: "100px"},
							{
                                title: "Edit", width: "150px",
                                template: kendo.template($("#edit_product_category").html())
                            },
							{
                                title: "Delete", width: "150px",
                                template: kendo.template($("#delete_product_category").html())
                            }
                        ]
                    });
                });

            </script>  
            <style type="text/css">
                /*table tr td{height: 200px;}*/
            </style>  
    <?php 
	echo $plugin->TableJs(); 
	echo $plugin->KendoJS(); 
	?>
    
</body>
</html>