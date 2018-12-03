$ = {}; //将$设置为一个对象

$.getAjax = function(){ //在$对象中创建一个函数getAjax 作用是兼容各个浏览器的创建ajax
		if ( window.XMLHttpRequest ){
			return new XMLHttpRequest(); //标准
		}else{
			return new ActiveXObject("Microsoft.XMLHTTP"); //非标准
		}
}
	
$.ajax = function(arg){ //在$对象中创建主函数
	
	
	/*
	 *  $.ajax({
	 *     url:[url string],
	 *     data:[data json],
	 *     type:[post|get string],
	 *     sucssce:[sucssce function],
	 *     error:[error function]
	 *  });
	 * 
	 */
	
	var url = arg.url?arg.url:false; //url
	var type = arg.type?arg.type:'get'; //type
	var data = arg.data?arg.data:'';
	
	var ajax = $.getAjax();
	
	ajax.onreadystatechange = function(){ //监听ajax 监听目标内容是否改变
		
		if(ajax.readyState == 4){ //请求已完成，且响应已就绪
		
			if(ajax.status == 200){ //状态码为200的时候
					arg.sucssce(ajax.responseText);
			}else{
					arg.error();
			}
			
		}
		
		
	}
	
	if( type == 'get' ){
		ajax.open(type,url); //GET方式执行	
		ajax.send();
	}
	
	if( type == "post" ){
		
		var str = '';
		for(var i in data){
			str += i+"="+data[i]+"&";
		}
		
		ajax.open(type,url);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send(str);
	}
	
}

$.get = function(arg){
	
	/*
	 *  $.get({
	 *     url:'baidu.php?name=admin',
	 *     sucssce:function(data){
	 *        alert('ajax Result:'+data);
	 *    }
	 *  });
	 * 
	 * */
	
	$.ajax({
			url:arg.url,
			type:'get',
			sucssce:arg.sucssce
	});
}

$.post = function(arg){
	
	/*
	 *  $.post({
	 *    url:'baidu.php',
	 *    data:{'name':'admin'},
	 *    sucssce:function(data){
	 *       alert('ajax Result:'+data);
	 *    }
	 *  });
	 * 
	 * */
	
	$.ajax({
			url:arg.url,
			type:'post',
			data:arg.data,
			sucssce:arg.sucssce
	});
}
