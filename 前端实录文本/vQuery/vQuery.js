function $(arguments){
	return new vQuery(arguments);
}

function vQuery(arguments){

	this.Element = [];

	switch( typeof arguments){

		case 'function': //传入document window
			bindEvent(window,'load',arguments); //事件绑定
		break;

		case 'string': //是字符串的话 {ID,CLASS,TAG}
			var sFirst = arguments.substr(0,1); //获得字符串第一个字符

			switch(sFirst){
				case '#': //ID选择器
					this.Element.push( document.getElementById( arguments.substring(1) ) ); //获取ID
				break;
				case '.':
					this.Element = getByClass(document,arguments.substring(1)); // 获取Class
				break;
				case 'object':
					this.Element.push( arguments );
				break;
				default:
					this.Element = toArray( document.getElementsByTagName( arguments ) );//获取Tag JS自带的是集合 所以要转数组
				break;
			}

		break;

		case 'object':
			if(arguments.constructor == Array){
				this.Element = arguments;
			}else{
				this.Element.push(arguments);	
			}
		break;
		


	}

}

vQuery.prototype.html = function(str){

	if( str ){
		for(var i=0;i<this.Element.length;i++){
			this.Element[i].innerHTML = str;
		}
	}else{
		return this.Element[0].innerHTML;
	}

}


function getStyle(obj,attr){ //获取样式

	if(obj.currentStyle){
		return obj.currentStyle[attr];
	}else{
		return getComputedStyle(obj,false)[attr];
	}

}


function bindEvent(obj,eventName,fn){ //事件绑定
	if(obj.addEventListener){
		obj.addEventListener(eventName,fn,false); //新版浏览器
	}else{
		obj.attachEvent('on'+eventName,fn); //IE老版本浏览器
	}
}

function getByClass(oParent,sClass){ // 获取Class
	var aAll = oParent.getElementsByTagName('*');
	var result = [];
	for(var i=0;i<aAll.length;i++){
		if(aAll[i].className == sClass){
			result.push(aAll[i]);
		}
	}

	return result;
}

function toArray(Element){

	var result = [];
	for(var i=0;i<Element.length;i++){
		result.push(Element[i]);
	}
	return result;

}

// hide函数  show函数
vQuery.prototype.show = function(){
	for(var i=0;i<this.Element.length;i++){
		this.Element[i].style.display = 'block';
	}
}
vQuery.prototype.hide = function(){
	for(var i=0;i<this.Element.length;i++){
		this.Element[i].style.display = 'none';
	}
}

// hide show结束


// CSS方法
vQuery.prototype.css = function(attr,value){

	if(arguments.length == 2){ //设置CSS

		for(var i=0;i<this.Element.length;i++){
				this.Element[i].style[attr] = value;
		}

	}else if(arguments.length == 1){ //获取CSS

		if( typeof attr == 'object' ){ //如果是json

			for(var sub in attr){

				for(var i=0;i<this.Element.length;i++){

						this.Element[i].style[sub] = attr[sub];
				}

			}

		}else{ //不是json就获取
			return getStyle(this.Element[0],attr);
		}

	}
}
// CSS方法结束

// eq index find方法
vQuery.prototype.eq = function(num){
	return $(this.Element[num]);
}

vQuery.prototype.index = function(){ //获取在兄弟节点的位置索引
	var elem = this.Element[0].parentNode.children;

	for(var i=0;i<elem.length;i++){
		if(elem[i] == this.Element[0]){
			return i;
		}
	}

}
vQuery.prototype.find = function( select ){
	// alert();
	var result = [];

	if( select.charAt(0) == '.' ){ //CLASS SELECT

		for(var i=0;i<this.Element.length;i++){
			result = result.concat(getByClass(this.Element[0],select.substring(1)));
		}

	}else{
		for(var i=0;i<this.Element.length;i++){
			result = result.concat(toArray(this.Element[i].getElementsByTagName(select)));
		}
	}

	return $(result);

}

// eq index find方法结束


// 事件处理函数
vQuery.prototype.on = function(event,fn){

	for(var i=0;i<this.Element.length;i++){

		bindEvent(this.Element[i],event,fn);
	}

}


vQuery.prototype.mouseover = function(fn){this.on('mouseover',fn);}
vQuery.prototype.mouseout = function(fn){this.on('mouseout',fn);}
vQuery.prototype.mousemove = function(fn){this.on('mousemove',fn);}
vQuery.prototype.mousedown = function(fn){this.on('mousedown',fn);}
vQuery.prototype.mouseup = function(fn){this.on('mouseup',fn);}
vQuery.prototype.click = function(fn){this.on('click',fn);}

// 事件处理函数结束