		function getStyle(obj,attr){
			if(obj.currentStyle){
				return obj.currentStyle[attr];
			}else{
				return getComputedStyle(obj)[attr];
			}
		}


		function startMove(obj,json,fn){

			clearInterval(obj.timer);

			obj.timer = setInterval(function(){
				var bStop = true;
				for(var attr in json){

					if(attr == 'opacity'){
						var iCus = parseInt(parseFloat(getStyle(obj,attr))*100);
					}else{
						var iCus = parseInt(getStyle(obj,attr));
					}
					var iSpeed = (json[attr] - iCus)/8;
					iSpeed = iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);

					if(iCus != json[attr]){
						bStop=false;
					}
					
					if(attr == 'opacity'){
						obj.style.opacity = (iCus+iSpeed)/100;
						obj.style.filter = 'alpha(opacity:'+ (iCus+iSpeed) +')';
					}else{
						obj.style[attr] = iCus + iSpeed + 'px';
					}
				}

				if(bStop){
					clearInterval(obj.timer);
					if(fn){
						fn();
					}
				}
					
			},30);

		}