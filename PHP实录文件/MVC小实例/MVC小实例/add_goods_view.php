<?php
	header("Content-type:text/html;charset=utf-8");
?>
<html>
<head>
	<title>添加商品</title>
</head>
<body>
	<form id="form1" action="add_goods.php" method="post">
		<table>
			
			<tbody>
				<tr>
					<td>商品名字:</td>
					<td><input type="text" name="goods_name" value=""/></td>
					<td><span class="goods_name_error"></span></td>
				</tr>
				<tr>
					<td>商品价格:</td>
					<td><input type="text" name="goods_price" value=""/></td>
					<td><span class="goods_price_error"></span></td>
				</tr>
				<tr>
					<td colspan=2 align="right"><input type="button" id="btn" value="添加商品"/></td>
				</tr>
			</tbody>
			
		</table>
	</form>
</body>
</html>
<script>
	var oBtn = document.getElementById('btn');
	var oForm = document.getElementById('form1');
	var aSpan = oForm.getElementsByTagName('span');
	oBtn.onclick = function(){
			if(oForm.goods_name.value == ''){
				aSpan[0].innerHTML = '请填写商品名字';
				return false;
			}
			
			aSpan[0].innerHTML = '';
			
			if(oForm.goods_price.value == ''){
				aSpan[1].innerHTML = '请填写商品价格';
				return false;
			}else{
					if(isNaN(oForm.goods_price.value) ){
						aSpan[1].innerHTML = '请输入正确的商品价格';
						return false;
					}
			}
			
			aSpan[1].innerHTML = '';
			
			oForm.submit();
	}
</script>
