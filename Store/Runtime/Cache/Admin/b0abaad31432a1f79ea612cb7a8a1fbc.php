<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="manager_page">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp">
		<meta name="ROBOTS" content="NOARCHIVE" />
		<title>竹江南工坊管理后台</title>
		<link rel="stylesheet" type="text/css" href="/Public/Admin/css/weui.min.css"/>
		<link type="text/css" rel="stylesheet" href="/Public/Admin/css/reset.css" />
		<link type="text/css" rel="stylesheet" href="/Public/Admin/css/common.css" />
			<link type="text/css" rel="stylesheet" href="/Public/Admin/css/management.css" />

		<script src="/Public/Admin/js/jquery-1.10.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/Public/Admin/js/jquery.touchSwipe.min.js" type="text/javascript" charset="utf-8"></script>
		<!-- <script src="/Public/Admin/js/router.min.js" type="text/javascript" charset="utf-8"></script> -->
		<script src="/Public/Admin/js/util.js" type="text/javascript" charset="utf-8"></script>
		<!-- <script src="/Public/Admin/js/managerouter.js" type="text/javascript" charset="utf-8"></script> -->

	</head>
<body>

	
	<div class="jiangpin_audit ym" id="jiangpin_audit_v" >
		<p>奖品管理</p>
		<div class="add_btn">添加奖品</div>
		<table>
			<tr>
				<td>ID</td>
				<td>奖品名称</td>
				<td>奖品图片</td>
				<!-- <td>奖品类型</td> -->
				<td>单价(元)</td>
				<td>剩余份数</td>
				<td>累计发放份数</td>
				<td>累计提现人数</td>
				<td>操作</td>
			</tr>
			
			<?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
				
					<td><?php echo ($i); ?></td>
					<td><?php echo ($v["prize_name"]); ?></td>
					<td>
						<div><img src="<?php echo ($v["picture_path"]); ?>" /></div>
					</td>
					<!-- <td><?php echo $v['type']; ?></td> -->
					<td><?php echo ($v["price"]); ?></td>
					<td><?php echo ($v["surplus"]); ?></td>
					<td><?php echo ($v["total"]); ?></td>
					<td><?php echo ($v["already"]); ?></td>
					<td><a href="javascript:;" onclick="edit(this)" id="edit_<?php echo ($v["id"]); ?>">编辑</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Product/del',array('id'=>$v['id']));?>" onclick="return confirm('确认删除？')">删除</a></td>
				
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
		</table>
	</div>
	


		<div class="addka_box ym box1"  style="display: none;">

		<form action="<?php echo U('product/add');?>" method="post" name="form_add" id="form_add" enctype="multipart/form-data" class="addka_box" >
			<p><a href=""></a>奖品管理-添加奖品</p>
			<div>奖品名称：<p><input type="text" placeholder="请输入奖品名称"  name="prize_name" /></p></div>
			<!-- <div>奖品类型：<select name="type"><option value="现金">现金</option><option value="实物">实物</option></select></div> -->
			<div>奖品单价：<p><input type="text" placeholder="请输入奖品单价" name="price" /></p></div>
			<div>剩余份数：<p><input type="text" placeholder="请输入奖品的份数" name="surplus" /></p></div>
			<div>奖品图片：
				<div class="weui_uploader_input_wrp add_img">
					<input class="weui_uploader_input" type="file" accept="image/*" multiple="" name="picture"/>
				</div>
				<span>建议尺寸360*200</span>
			</div>
			<div class="product_add" >确定添加</div>
		</form>

		</div>	


				<!--修改-->
		<div class="addka_box box2 ym"  style="display: none;">

			<form action="<?php echo U('product/edit');?>" method="post" name="form_edit" id="form_edit" enctype="multipart/form-data" class="addka_box" >
				<input type="hidden" name="id" value="" id="h_id" />
				<p><a href=""></a>奖品管理-添加奖品</p>
				<div>奖品名称：<p><input type="text" placeholder="请输入奖品名称"  name="prize_name" /></p></div>
				<!-- <div>奖品类型：<select name="type"><option value="现金">现金</option><option value="实物">实物</option></select></div> -->
				<div>奖品单价：<p><input type="text" placeholder="请输入奖品单价" name="price" /></p></div>
				<div>剩余份数：<p><input type="text" placeholder="请输入奖品的份数" name="surplus" /></p></div>
				<div>奖品图片：
					<div class="weui_uploader_input_wrp add_img">
						<input class="weui_uploader_input" type="file" accept="image/*" multiple="" name="picture"/>
					</div>
					<span>建议尺寸360*200</span>
				</div>
				<div class="product_edit" >确定添加</div>
			</form>

		</div>	

		<style>
			.product_add,.product_edit{
				    background-color: #ccc;
				    border: 1px solid #000;
				    cursor: pointer;
				    line-height: 30px !important;
				    margin-left: 100px;
				    text-align: center;
				    color: #0055ff;
				    width: 100px !important;
			}
			
		</style>
		<script>
			$(".add_btn").click(function(){
	             	$(".box1").show().siblings("div.jiangpin_audit").hide();
	    	});

    		$('.product_add').click(function(){               
               $('#form_add').submit()
            });


            $('.product_edit').click(function(){
            	$('#form_edit').submit();
            });

           	function edit(o){		
				var id = o.id.substr(5);		
				$('#h_id').val(id);
				$(".box2").show().siblings("div.jiangpin_audit").hide();
				$.ajax({
				    url: '<?php echo U('Product/edit');?>',
				    type: 'POST',
				    async:true,
				    dataType: 'json',
				    data: {
				        'id' : id,
				        'type':'ajax'		             
				    },
				    success:function(data){
				     	var obj = $('.box2').find('input');
				    	obj.eq(1).val(data.prize_name);
				    	obj.eq(2).val(data.price);
				    	obj.eq(3).val(data.surplus);				   
				    }
				});
			}

		</script>
			 

</body>
</html>