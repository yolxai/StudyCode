function setCookie(name,value,iDay){

	var oDate = new Date();

	oDate.setDate(oDate.getDate() + iDay);

	document.cookie = name + '=' + value + ';expires=' + oDate;

}

function getCookie(name){

	arr = document.cookie.split('; ');

	var i = 0;

	for( i=0;i<arr.length;i++){

		var arr2 = arr[i].split('=');

		if ( arr2[0] == name ){

			return arr2[1];

		}

	}


}