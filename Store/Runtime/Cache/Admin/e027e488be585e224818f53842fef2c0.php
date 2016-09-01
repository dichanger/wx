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


	 	
	<div class="tixian ym" id="tixian_v" >
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
	
	<script language="JavaScript" type="text/javascript">

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
				    		window.parent.location.href="/index.php/Admin/Index/index/type/2";
			    		}
				          
				    }
				    	
				});
			}
    </script>

	
	
		
</body>
</html>