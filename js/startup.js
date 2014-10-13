
function createStep1() {
	var fName = 'create';
	var form = $('form[name="'+fName+'"]');
	var select = form.find('select');
	var input = form.find('input[type="text"]');

	var columnNumber = Number(select.val());
	for (var i = 1, len = input.length; i < len; i++) {
		if(i < columnNumber + 1){
			$(input[i]).closest('tr').css({'visibility':'visible'});
		}else{
			$(input[i]).closest('tr').css({'visibility':'hidden'});
			
		}
	}
	
	select.on('change', function() {
		var columnNumber = Number($(this).val());
		for (var i = 1, len = input.length; i < len; i++) {
			if(i < columnNumber + 1){
				$(input[i]).closest('tr').css({'visibility':'visible'});
			}else{
				$(input[i]).closest('tr').css({'visibility':'hidden'});
				
			}
		}
	});
}

function createStep2(){
	// Test only
	var data = Array();
	var header = Array();
	var size= 5;
	
	for (var i=0; i< 15; i++){
		var row = Array();
		for(var j=0; j<size; j++){
			row[j] = 'Data ' + '[' + i + '][' + j +']';
			if(i==0){
				header[j] = "Column " + j;
			}
		}
		data[i] = row;
		
	}
	
	var d = {"size": size, "header": header, "data" : data};
	// End test
	
	var table = $('table[id="data"]');
	createRow(table,header, true);
	for (var i = 0; i < d.data.length; i++) {
		createRow(table,d.data[i],false);
	}
}

// Add row to table
function createRow(table, rowData, isHeader){
	var tr = $('<tr></tr>');
	for(var i = 0; i < rowData.length; i++){
		if(isHeader){
			tr.append('<th>'+rowData[i]+'</th>');
		}else {
			tr.append('<td><input type="text" value="'+rowData[i]+'"/></td>');
		}
	}
	tr.append('<td><input type="button" value="Xoa" class="delete"/></td>');
	table.append(tr);
}

function review(){	
	var map={'comma':',', 'space': ' ', 'tab': '\t', 'other':'other'};
	
	// Radio button event
	$('input[name="serapator"]').on('change', function(){
		var data = $('#data').val();
		var val = $(this).val();
		if(val != 'other'){
			splitData( data, map[val]);
			$('input[name="otherSerapator"]').attr('disabled','disabled');
		}else{
			$('input[name="otherSerapator"]').removeAttr('disabled');
		}
		addDeleteButtonEvent($('.create'));
	});
	
	// Change text event
	$('input[name="otherSerapator"]').on('keyup', function(){
		var val = $(this).val();
		var data = $('#data').val();
		if($('input[name="serapator"]:checked').val() == "other"){
			splitData( data, val);
		}
		addDeleteButtonEvent($('.create'));
	});
	
	function splitData(data, separator){
		if(data == undefined || data.trim() == ""){
			return;
		}
		var rows = split(data, separator);
		var table = $('table[id="data"]');
		table.html('');
		for (var i = 0; i < rows.length; i++) {
			createRow(table, rows[i], false);
		}	
	}
}

function split(contents, wordSerapator){
	var lineSeparator = '\r\n';
	var lines;
	var result = Array();
	
	if(contents.indexOf('\r\n') > 0){
		lineSeparator = '\r\n';
	}else if(contents.indexOf('\n') > 0){
		lineSeparator = '\n';
	}else{
		lineSeparator = '\r';
	}
	
	lines = contents.split(lineSeparator);
	
	for(var i=0, n = lines.length; i<n; i++){
		var words = lines[i].split(wordSerapator);
		result[i]=words;
	}
	return result;
}

// add event for delete button
function addDeleteButtonEvent(table){
	table.find('.delete').click(function(){
		var del = confirm("Ban muon xoa?");
		if(del){
			$(this).closest('tr').remove();
		}
	});

}

function game(){
	// Test only
	var data = Array();
	var header = Array();
	var size= 5;
	
	for (var i=0; i< 15; i++){
		var row = Array();
		for(var j=0; j<size; j++){
			row[j] = 'Data ' + '[' + i + '][' + j +']';
			if(i==0){
				header[j] = "Column " + j;
			}
		}
		data[i] = row;
		
	}
	
	var d = {"size": size, "header": header, "data" : data};
	// End test
	
	var board = $('.game');
	var w = board.width();
	var h= board.he
	var flyer = $('<span>abc</span>');
	flyer.css({'position':'relative', 'background-color':'red', 'left':110, 'top':110});
	board.append(flyer);
}

function searchNewlest(){
	$.ajax({
		type : "POST",
		url : "/api/pattern/getNew"
	}).done(function(data) {
		result = $.parseJSON(data);
		if (result.result == 'OK') {
			listPattern = $('.list-pattern');
			item = $('.list-pattern>li:nth(0)')
			listPattern.html('');
			for(var i = 0, len = result.data.length; i < len; i++){
				var temp = item.clone();
				temp.find('h3').html('<a href="/details/' + result.data[i].id + '">' + result.data[i].title + '</a>');
				temp.find('li:nth(0)').html('<a href="">' + result.data[i].authorName + '</a>');
				temp.find('li:nth(1)').html(result.data[i].createDate);
				temp.find('li:nth(2)').html(result.data[i].itemCount);
				temp.find('li:nth(3)').html(result.data[i].views + ' views');
				listPattern.append(temp);
			}
		}
	});
} 

function nextButton1() {
	$('#btnNext').click(function(){
		if(checkInput()){
			var form = $('#create1');
			
			$.ajax({
				type: POST,
				url: '',
				data: form.serialize(),
				
			}).done(function(data){
				
			});
		}
	});
	
	function checkInput(){
		return true;
	}
}