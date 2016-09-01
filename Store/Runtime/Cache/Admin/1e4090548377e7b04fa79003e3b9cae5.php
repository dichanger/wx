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
		<div class="container" id="container">
<header class="header">
    <h5>微信公众号运营管理后台 v1.0</h5>
</header>
<nav class="menu">
	<div class="menu_left"></div>
	<ul>
		<li>
			<p><span style="transform: rotate(135deg);"></span>用户管理</p>
			<ul class="xiala" style="display: block;">
				<li>
					<a class="xl_cur" id="alldata" data-id="alldata_v">总体数据</a>
					<a id="jiangpin_audit" data-id="jiangpin_audit_v">奖品管理</a>
					<a id="tixian" data-id="tixian_v" >提现审核</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<div class="content_box">
	<div class="alldata ym" id="alldata_v">
		<ul>
			<li>
				<h1>123456789</h1>
				<p>总用户数</p>
			</li>
			<li>
				<h1>123456789</h1>
				<p>昨日签到人数</p>
			</li>
			<li>
				<h1>123456789</h1>
				<p>今日签到人数</p>
			</li>
		</ul>
	</div>
	<div class="jiangpin_audit ym" id="jiangpin_audit_v" style="display: none;">
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
		
			 
	 	
	<div class="tixian ym" id="tixian_v" style="display: none;">
		<p>提现审核</p>
		<div class="search_box"><input type="text" placeholder="昵称、手机号"/><span onclick="search(this)">搜索</span></div>
		<div class="xuanze"><select name="type"><option value="2">自主兑换</option><option value="1">英雄排行榜</option></select><input type="text" placeholder="时间" /> 至 <input type="text" placeholder="时间" /><button>筛选</button></div>
		<table id="tx_cont">
			<tr>
				<td>选择</td>
				<td>手机号</td>
				<td>昵称</td>
				<td>提现奖品</td>
				<td>姓名</td>
				<td>累计提现次数</td>
				<td>累计邀请人数</td>
				<td>提交时间</td>
				<td>操作</td>
			</tr>
			<?php if(is_array($dat)): $i = 0; $__LIST__ = $dat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><input type="checkbox" id="<?php echo ($vo["id"]); ?>"></td>
				<td><?php echo ($vo["phone_number"]); ?></td>
				<td><?php echo ($vo["wechat_name"]); ?></td>
				<td><?php echo ($vo["prize_name"]); ?></td>
				<td><?php echo ($vo["real_name"]); ?></td>
				<td><?php echo ($vo["tx_num"]); ?></td>
				<td><?php echo ($vo["yq_usernum"]); ?></td>
				<td><?php echo ($vo["time"]); ?></td>
				<td>打款</td>			
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<div class="pay_box"><input type="checkbox" />全选<button>打款</button><button>开启自动打款</button></div>
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



</div>

		</div>
		
		<div id="loadingToast" class="weui_loading_toast" style="display: none;">
		    <div class="weui_mask_transparent"></div>
		    <div class="weui_toast">
		        <div class="weui_loading">
		            <div class="weui_loading_leaf weui_loading_leaf_0"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_1"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_2"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_3"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_4"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_5"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_6"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_7"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_8"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_9"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_10"></div>
		            <div class="weui_loading_leaf weui_loading_leaf_11"></div>
		        </div>
		        <p class="weui_toast_content">数据加载中</p>
		    </div>
		</div>




		<script type="text/javascript">
			$(function(){
				var type = <?php echo ($type); ?>;
				if(type == 1){
					 $('#jiangpin_audit').addClass("xl_cur").siblings("a").removeClass("xl_cur").parents("li").siblings("li").children(".xiala").children("li").children("a").removeClass("xl_cur");
	    			// var id = $('#jiangpin_audit').data("id");
	    			 $('.ym').hide();
	    			 $('#jiangpin_audit_v').show('fast');
	    			
				}else if(type== 2){
					 $('#tixian').addClass("xl_cur").siblings("a").removeClass("xl_cur").parents("li").siblings("li").children(".xiala").children("li").children("a").removeClass("xl_cur");
	    			// var id = $('#jiangpin_audit').data("id");
	    			 $('.ym').hide();
	    			 $('#tixian_v').show('fast');
	    			
				}



				$('#jiangpin_audit,#tixian,#alldata').click(function(){
					 $(this).addClass("xl_cur").siblings("a").removeClass("xl_cur").parents("li").siblings("li").children(".xiala").children("li").children("a").removeClass("xl_cur");
	    			 $('.ym').hide();	    			
	    			
	    			 $('#'+$(this).attr('data-id')).show('fast');
				});

				$(".add_btn").click(function(){
	             	$(".box1").show().siblings("div.jiangpin_audit").hide();
	    		});

				$('.product_add').click(function(){               
	               $('#form_add').submit()
	            });

	            $('.product_edit').click(function(){
	            	$('#form_edit').submit();
	            });


////////////////////////////////////////////////////////////////////////////////

				$(".container").css("background-color","#fff");
	    		$(".menu>ul>li>p").click(function(){
					var $this = $(this);
					var $xiala = $this.siblings(".xiala");
					var $span = $this.children("span");
					
					if($xiala.css("display") === "none"){
						$span.css("transform","rotate(135deg)");
						$xiala.show();
					}else{
						$span.css("transform","rotate(45deg)");
						$xiala.hide();
					}
				});
////////////////////////////////////////////////////////////////////////////////////
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

			function search(o){
				
				$.ajax({
				    url: '/index.php/Admin/Tx/index',
				    type: 'POST',
				    async:true,
				    dataType: 'json',
				    data: {
				        content : $(o).prev().val()				                
				    },
				    success:function(obj){
				    	if(obj.code == 0){
				    		$('#tx_cont').empty();
				    		var str = '';
				    			str+= '<tr><td>选择</td><td>手机号</td><td>昵称</td><td>提现奖品</td><td>姓名</td><td>累计提现次数</td><td>累计邀请人数</td><td>提交时间</td><td>操作</td></tr>';
				    		$.each(obj.data,function(i,index){
								
								str+='<tr>';
								str+='<td><input type="checkbox" id="'+index.id+'"></td>';
								str+='<td>'+index.phone_number+'</td>';
								str+='<td>'+index.wechat_name+'</td>';
								str+='<td>'+index.prize_name+'</td>';
								str+='<td>'+index.real_name+'</td>';
								str+='<td>'+index.tx_num+'</td>';
								str+='<td>'+index.yq_usernum+'</td>';
								str+='<td>'+index.time+'</td>';
								str+='<td>打款</td>';
								str+='</tr>';
				    		});

				    		$('#tx_cont').html(str);


				    	}else if(obj.code == 1){
				    		alert(obj.msg);
				    		window.location.href="/index.php/Admin/Index/index/type/2";
			    		}
				          
				    }
				    	
				});
			}

		</script>
	</body>
</html>