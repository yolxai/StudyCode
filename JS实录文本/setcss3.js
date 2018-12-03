	function setCss3(obj,json){
		
		for(var i in json){

			var index = i;

			if( i.indexOf('-') > 0 ){
				//i中存在-
				i = i.replace(i.substr(i.indexOf('-'),2),i.substr(i.indexOf('-')+1,1).toUpperCase() );
			}

			//alert(i);
			obj.style[i] = json[index];

			i = i.replace(i.substr(0,1),i.substr(0,1).toUpperCase());

			obj.style['webkit'+i] = json[index];
			obj.style['Moz'+i] = json[index];
			obj.style['ms'+i] = json[index]
			obj.style['o'+i] = json[index];

			//alert(i);
		}


	}