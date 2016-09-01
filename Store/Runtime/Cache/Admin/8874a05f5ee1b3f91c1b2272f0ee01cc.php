<?php if (!defined('THINK_PATH')) exit();?><link type="text/css" rel="stylesheet" href="css/management.css" />
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
					<a class="xl_cur" data-id="alldata">总体数据</a>
					<a data-id="jiangpin_audit">奖品管理</a>
					<a data-id="tixian">提现审核</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<div class="content_box">
	<div class="alldata" id="alldata">
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
	<div class="jiangpin_audit" id="jiangpin_audit" style="display: none;">
		<p>奖品管理</p>
		<div class="add_btn">添加奖品</div>
		<table>
			<tr>
				<td>ID</td>
				<td>奖品名称</td>
				<td>奖品图片</td>
				<td>奖品类型</td>
				<td>单价(元)</td>
				<td>剩余份数</td>
				<td>累计发放份数</td>
				<td>累计提现人数</td>
				<td>操作</td>
			</tr>
			<tr>
				<td>1</td>
				<td>1元现金</td>
				<td>
					<div><img src="img/jiangpin.png" /></div>
				</td>
				<td>现金</td>
				<td>1.0</td>
				<td>100</td>
				<td>10000</td>
				<td>100000</td>
				<td><a>编辑</a>&nbsp;&nbsp;&nbsp;<a>删除</a></td>
			</tr>
			<tr>
				<td>2</td>
				<td>1元现金</td>
				<td>
					<div><img src="img/jiangpin.png" /></div>
				</td>
				<td>现金</td>
				<td>1.0</td>
				<td>100</td>
				<td>10000</td>
				<td>100000</td>
				<td><a>编辑</a>&nbsp;&nbsp;&nbsp;<a>删除</a></td>
			</tr>
			<tr>
				<td>3</td>
				<td>1元现金</td>
				<td>
					<div><img src="img/jiangpin.png" /></div>
				</td>
				<td>现金</td>
				<td>1.0</td>
				<td>100</td>
				<td>10000</td>
				<td>100000</td>
				<td><a>编辑</a>&nbsp;&nbsp;&nbsp;<a>删除</a></td>
			</tr>
			<tr>
				<td>4</td>
				<td>1元现金</td>
				<td>
					<div><img src="img/jiangpin.png" /></div>
				</td>
				<td>现金</td>
				<td>1.0</td>
				<td>100</td>
				<td>10000</td>
				<td>100000</td>
				<td><a>编辑</a>&nbsp;&nbsp;&nbsp;<a>删除</a></td>
			</tr>
			<tr>
				<td>5</td>
				<td>蕾丝情趣内衣(隐私发货)</td>
				<td>
					<div><img src="img/jiangpin.png" /></div>
				</td>
				<td>现金</td>
				<td>1.0</td>
				<td>100</td>
				<td>10000</td>
				<td>100000</td>
				<td><a>编辑</a>&nbsp;&nbsp;&nbsp;<a>删除</a></td>
			</tr>
		</table>
	</div>
	<div class="addka_box" style="display: none;">
		<p><a href=""></a>奖品管理-添加奖品</p>
		<div>奖品名称：<p><input type="text" placeholder="请输入奖品名称" /></p></div>
		<!--<div>奖品类型：<select><option>现金</option><option>实物</option></select></div>-->
		<div>奖品单价：<p><input type="text" placeholder="请输入奖品单价" /></p></div>
		<div>剩余份数：<p><input type="text" placeholder="请输入奖品的份数" /></p></div>
		<div>奖品图片：<div class="weui_uploader_input_wrp add_img"><input class="weui_uploader_input" type="file" accept="image/*" multiple=""></div><span>建议尺寸360*200</span></div>
		<div class="add_con">确定添加</div>
	</div>
	<div class="tixian" id="tixian" style="display: none;">
		<p>提现审核</p>
		<div class="search_box"><input type="text" placeholder="昵称、手机号"/><span>搜索</span></div>
		<div class="xuanze"><select><option>自主兑换</option><option>英雄排行榜</option></select><input type="text" placeholder="时间" /> 至 <input type="text" placeholder="时间" /><button>筛选</button></div>
		<table>
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
			<tr>
				<td><input type="checkbox"></td>
				<td>13800138000</td>
				<td>哈喽我来咯</td>
				<td>1元现金</td>
				<td>***</td>
				<td>23</td>
				<td>123</td>
				<td>2016-01-01 00:00:00</td>
				<td>打款</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>13800138000</td>
				<td>哈喽我来咯</td>
				<td>1元现金</td>
				<td>***</td>
				<td>23</td>
				<td>123</td>
				<td>2016-01-01 00:00:00</td>
				<td>打款</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>13800138000</td>
				<td>哈喽我来咯</td>
				<td>1元现金</td>
				<td>***</td>
				<td>23</td>
				<td>123</td>
				<td>2016-01-01 00:00:00</td>
				<td>打款</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>13800138000</td>
				<td>哈喽我来咯</td>
				<td>1元现金</td>
				<td>***</td>
				<td>23</td>
				<td>123</td>
				<td>2016-01-01 00:00:00</td>
				<td class="aleadpay">已打款</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>13800138000</td>
				<td>哈喽我来咯</td>
				<td>1元现金</td>
				<td>***</td>
				<td>23</td>
				<td>123</td>
				<td>2016-01-01 00:00:00</td>
				<td class="aleadpay">已打款</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>13800138000</td>
				<td>哈喽我来咯</td>
				<td>1元现金</td>
				<td>***</td>
				<td>23</td>
				<td>123</td>
				<td>2016-01-01 00:00:00</td>
				<td class="aleadpay">已打款</td>
			</tr>
		</table>
		<div class="pay_box"><input type="checkbox" />全选<button>打款</button><button>开启自动打款</button></div>
	</div>
</div>