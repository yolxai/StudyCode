/* 获取样式 */
function getStyle ( obj , attr ){

	if( obj.currentStyle ){

		return obj.currentStyle[attr];

	}else{

		return getComputedStyle(obj,false)[attr];

	}

}

/* VsCss */ 
function VsCss( obj , attr , value ){

	var vs = arguments.length;

	if( vs == 2){

		return getStyle(obj,attr);

	}else if( vs == 3 ){

		obj.style[attr] = value;
		
	}

}