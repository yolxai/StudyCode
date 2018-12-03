/*
	1:startMove
		- obj 
		- iTarget
*/

//匀速运动
/*
function startMove(obj,iTarget){

	clearInterval(obj.timer);
	obj.timer = setInterval(function(){

		if(obj.offsetLeft >= iTarget){
			clearInterval(obj.timer);
			obj.style.left = iTarget + 'px';
		}else{
			obj.style.left = obj.offsetLeft + 10 + 'px';
		}

	},30);

}
*/

//缓冲运动
/*
	function startMove(obj,attr,iTarget,fn){

	clearInterval(obj.timer);
	obj.alpha = parseInt(parseFloat(getStyle(obj,attr))*100);
	obj.timer = setInterval(function(){
		if(attr == 'opacity'){
			var iCus = parseInt(parseFloat(getStyle(obj,attr))*100);
		}else{
			var iCus = parseInt(getStyle(obj,attr));
		}

		var iSpeed = (iTarget - iCus) /8;
		iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);


		if(attr == 'opacity'){
			obj.alpha = obj.alpha + iSpeed;
			obj.style.opacity = (obj.alpha) / 100;
			obj.style.filter = 'alpha(opacity'+(obj.alpha)+')';
		}else{
			obj.style[attr] = iCus + iSpeed + 'px';
		}
		if( iTarget == iCus){
			clearInterval(obj.timer);
			if(fn){
				fn();
			};
		}


	},30);

}
*/

//json多物体运动

	function startMove(obj,json,fn){

	clearInterval(obj.timer);
	obj.timer = setInterval(function(){
		var bTrue = true;
		for( attr in json){

				obj.alpha = parseInt(parseFloat(getStyle(obj,attr))*100);
				
				if(attr == 'opacity'){
					var iCus = parseInt(parseFloat(getStyle(obj,attr))*100);
				}else{
					var iCus = parseInt(getStyle(obj,attr));
				}

				var iSpeed = (json[attr] - iCus) /8;
				iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);

				if(json[attr] != iCus){
					bTrue = false;
				}

				if(attr == 'opacity'){
					obj.alpha = obj.alpha + iSpeed;
					obj.style.opacity = (obj.alpha) / 100;
					obj.style.filter = 'alpha(opacity'+(obj.alpha)+')';
				}else{
					obj.style[attr] = iCus + iSpeed + 'px';
				}

			}

			if(bTrue){
				clearInterval(obj.timer);
				if(fn){
					fn();
				}
			}

			// end
	},30);
}





function getStyle(obj,attr){
	if(obj.currentStyle){
		return obj.currentStyle[attr];
	}else{
		return getComputedStyle(obj,false)[attr];
	}
}



