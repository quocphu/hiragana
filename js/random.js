/**
 * Random integer number
 * */
function random(max){
	var x = Math.random();
	return Math.round(x*max);
};

/**
 * Random integer number between min-max
 * */
function random2(min, max){
	
	return Math.floor(Math.random()*(max-min+1) + min);
};

/**
 * Random integer array
 * */
function random3(num){
	var arr= Array();
	var idx=1;
	var exist = false;
	arr[0]= random2(1,num)-1;
	
	while(idx<num){
		exist = false;
		
		var rd = random2(1, num)-1;
		
		for(var i=0;i<arr.length;i++){
			if(arr[i]==rd){
				exist = true;
				break;
			}
		}
		
		if(exist){
			continue;
		}else{
			arr[idx]=rd;
			idx++;
		}
	}
	return arr;
};