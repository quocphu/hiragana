Quiz =  function (data) {
	var displayEl;
	var inputEl;
	var crDataArr = Array();
	var crIdxArr = Array();
	var crIdx = 0;
	
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
	
	function controlEvent(){
		inputControl = $('#inputControl');
		showControl = $('#showControl');
		// set event for control element
		setEvent(inputControl);
		setEvent(showControl);
		
		// Set event for next element
		var inputEl = $('.input').find('li>input');
		var liEl = $('.input').find('li');
		inputEl.each(function(idx, el){
			$(el).off('keyup').on('keyup blur', function(e){
				if(e.keyCode == 13 || e.type == 'blur'){
					if(data.data[crIdxArr[crIdx]][idx].toLowerCase() == $(el).val().toLowerCase()){
						var nextInput = null;
						for(var i = idx + 1; i < liEl.length; i++){
							if(!liEl.eq(i).hasClass('hide')){
								nextInput = liEl.eq(i);
								break;
							}
						}
						if(nextInput != null){
							nextInput.find('input')[0].select();
							nextInput.find('input')[0].focus();
//							$(nextInput.find('input')[0]).val('');
						} else {
							crIdx++;
							$(el).val('');
							$('.input li:not(.hidden):first').find('input').select().focus();
							
							// Set display data
							$('.detail-show li').each(function(idx, el){
								$(el).html(data.data[crIdxArr[crIdx]][idx]);
							});
						}
					}
				}
			});
		});
	}
	
	function setEvent (control) {
		controlEl = control.find('a');
		controlEl.each(function(idx, el){
			$(el).on('click', function(e){
				var seft = $(this);
				e.preventDefault();
				controlOther = $('#' + control.attr('other'));
				controlOtherEl = controlOther.find('a');
				var selectedCount = control.find('a.selected').length;
				if((selectedCount < 2 && seft.hasClass('selected')) || (selectedCount > 3 && !seft.hasClass('selected'))){
					return;
				}
				
				if(!seft.hasClass('selected')){
//					if(controlOther.find('a.selected').length == 1 && controlOtherEl.eq(idx).hasClass('selected')){
//						return;
//					}
					controlOtherEl.eq(idx).removeClass('selected');
					seft.addClass('selected');
					
				}else{
					seft.removeClass('selected');
				}
				
				for(var i = 0; i < controlOther.find('a').length; i++) {
					if($(controlOther.find('a')[i]).hasClass('selected')){
						$(controlOther.attr('display')).find('li:eq(' + i + ')').removeClass('hide');
					} else {
						$(controlOther.attr('display')).find('li:eq(' + i + ')').addClass('hide');
						
					}
				}
				
				for(var i = 0; i < control.find('a').length; i++) {
					if($(control.find('a')[i]).hasClass('selected')){
						$(control.attr('display')).find('li:eq(' + i + ')').removeClass('hide');
					} else {
						$(control.attr('display')).find('li:eq(' + i + ')').addClass('hide');
						
					}
				}
				
			});
		});
	}
	
	this.init = function () {
		// Show header
		var display = $('.detail-show>ul');
		var input = $('.input ul');
		
		// Get first html element
		var displayLi = $('.detail-show').find('li').eq(0);
		var item = $('.input').find('li').eq(0);
		var elShowControl = $('#showControl').find('li').eq(0);
		var elInputControl = $('#inputControl').find('li').eq(0);
		
		// Remove default html element
		$('.detail-show').find('li').remove();
		$('.input').find('li').remove();
		$('#showControl').find('li').remove();
		$('#inputControl').find('li').remove();
		
		// Clone html element
		for(var i = 0; i < data.header.length; i++){
			var d = displayLi.clone();
			var x = item.clone();
			var y = elShowControl.clone();
			var z = elInputControl.clone();
			
			d.html(data.data[0][i]);
			x.find('span').html(data.header[i]);
			y.find('a').html(data.header[i]);
			z.find('a').html(data.header[i]);
			
			input.append(x);
			$('#showControl').append(y);
			$('#inputControl').append(z);
			display.append(d);
		}
		
		// Default display 
		// Show all column except column1
		$('.detail-show li').addClass('hide');
		$('.detail-show li:not(:first)').removeClass('hide');
		
		// Hide all column except column1
		$('.input li').removeClass('hide');
		$('.input li:not(:first)').addClass('hide');
		
		// Select all column except column1
		$('#showControl a').removeClass('selected');
		$('#showControl a:not(:first)').addClass('selected');
		
		// Select column column1
		$('#inputControl a').removeClass('selected');
		$('#inputControl a:first').addClass('selected');
		
		// Empty value of input element
		$('.input input').val('');
		
		// Set event
		controlEvent();
	}
	
	this.random = function (regx) {
		// 
		var selectedIdxArr  = applyData(regx);
		crIdx = 0;
		crIdxArr = random3(selectedIdxArr.length);
		$('.detail-show li').each(function(idx, el){
			$(el).html(data.data[crIdxArr[crIdx]][idx]);
		});
	}
	this.next = function(step){
		crIdx += step;
		if(crIdx < 0 ){
			crIdx = 0;
		} else if(crIdx >= crIdxArr.length){
			crIdx = crIdxArr.length - 1;
		}
		// Set display data
		$('.detail-show li').each(function(idx, el){
			$(el).html(data.data[crIdxArr[crIdx]][idx]);
		});
	}
	// Get data from regx
	function applyData(regx){
		regx = regx.trim();
		var arr = regx.split(',');
		var rs = Array();
		
		if(arr.length > 0){
			var j = 0;
			for(var i = 0; i < arr.length; i++) {
				if(isNumber(arr[i])) {
					var tempI = parseInt(arr[i]);
					if(tempI < data.data.length & tempI >= 0){
						rs[j] = tempI;
						j++;
					}
				} else {
					var tmp = arr[i].trim().split('-');
					if(tmp.length > 1 && isNumber(tmp[0]) && isNumber(tmp[1])){
						for (var k = parseInt(tmp[0]); k <= parseInt(tmp[1]); k++) {
							if(k < data.data.length & k >= 0){
								rs[j] = k;
								j++;
							}
						}
					}
				}
			}
		}
		if(rs.length == 0){
			for(var i= 0 ; i< data.data.length; i++) {
				rs[i] = i;
			}
		}
		return rs;
	}
	
	function isNumber(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n);
	}
};