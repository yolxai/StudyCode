function getElementsByClassName(Parent,cName){

	var arr=[];
	var i=0;
	var num = Parent.getElementsByTagName('*');

	for( i=0 ; i < num.length ; i++ ){

		if( num[i].className == cName ){

			arr.push( num[i] );

		}


	}

	return arr;

}