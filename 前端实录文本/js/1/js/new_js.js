
window.onload = function(){

			var oUl = document.getElementById('photo');
			var aLi = oUl.getElementsByTagName('li');
			var newIndex = 2;
			var i = 0;


			var oTxt = document.getElementById('text');
			var oBtn = document.getElementById('btn');
			var oUl = document.getElementById('ul1');
// 相册开始
			for(var i=0;i<aLi.length;i++){

				aLi[i].style.left = aLi[i].offsetLeft;
				aLi[i].style.top = aLi[i].offsetTop;

			}

			for(var i=0;i<aLi.length;i++){

				aLi[i].style.position = 'absolute';
				aLi[i].style.margin = 0;
				//var aImg = aLi[i].getElementsByTagName('img')[0];

				aLi[i].onmouseover = function (){
					this.style.zIndex = newIndex++;
					startMove(this,{width:300,height:300,marginLeft:-50,marginTop:-50});
					startMove(this.getElementsByTagName('img')[0],{width:300,height:300});

				}

				aLi[i].onmouseout = function (){

					startMove(this,{width:200,height:200,marginLeft:0,marginTop:0});
					startMove(this.getElementsByTagName('img')[0],{width:200,height:200});

				}
			}

// 相册结束

// 发表内容
		   oBtn.onclick = function(){

		   		var oLi = document.createElement('li');
		   		var aLi = oUl.getElementsByTagName('li');


		   		if(oTxt.value == ''){return}

		   		oLi.innerHTML = oTxt.value;
		   		oTxt.value = '';


		   		if( aLi ){
		   			oUl.insertBefore(oLi,aLi[0]);
		   		}else{
		   			oUl.appendChild(oLi);
		   		}

		   		var iHeight = oLi.offsetHeight;
		   		oLi.style.height = 0;
		   		oLi.style.opacity = 0;
		   		oLi.style.filter = 'alpha(opacity:0)';

		   		startMove(oLi,{height:iHeight},function(){
		   			startMove(oLi,{opacity:100});
		   		});



		   }
		}