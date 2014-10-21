
function createStep1() {
	var fName = 'create1';
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

function createStep3(d){
	
	var size = d.info.columnsize;
	var data = Array();
//	if(d.data == null) {
		for (var i=0; i< 5; i++){
			var row = Array();
			for(var j=0; j<size; j++){
				row[j] = '';
				
			}
			data[i] = row;
//		}
		d.data = data;
	}
	console.log(d.data)
	var h = Array();
	for (var i = 0; i < d.header.length; i++) {
		h[i] = d.header[i].header;
	}
	
	var table = $('table[id="data"]');
	createRow(table, h, -1, true);
	for (var i = 0; i < d.data.length; i++) {
		createRow(table, d.data[i], i, false);
	}
	addDeleteButtonEvent($('.create'));
}

// Add row to table
function createRow(table, rowData, rowNum, isHeader){
	var tr = $('<tr></tr>');
	for(var i = 0; i < rowData.length; i++){
		if(isHeader){
			tr.append('<th>'+rowData[i]+'</th>');
		}else {
			tr.append('<td><input name="column' + rowNum + i + '" type="text" value="'+rowData[i]+'"/></td>');
		}
	}
	if(!isHeader) {
		tr.append('<td><input type="button" value="Xoa" class="delete"/></td>');
	}
	table.append(tr);
}

function review() {	
	var map = {'comma':',', 'space': ' ', 'tab': '\t', 'other':'other'};
	
	// Radio button event
	$('input[name="serapator"]').on('change', function(){
		var data = $('#file-data').val();
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
		
		if(val == '') {
			return;
		}
		var data = $('#file-data').val();
		
		
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
			createRow(table, rows[i], i, false);
		}	
	}
}

function split(contents, wordSerapator){
	var lineSeparator = '\n';
	var lines;
	var result = Array();
	
	contents = contents.replace('\r\n', lineSeparator);
	contents = contents.replace('\r', lineSeparator);
	
	contents = contents.trim();
	lines = contents.split(lineSeparator);
	
	for(var i=0, n = lines.length; i<n; i++){
		var words = lines[i].split(wordSerapator);
		result[i] = words;
	}
	return result;
}

// Add event for delete button
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
			if(i == 0) {
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

function search(url, param){
	console.log('search');
	var postData = null;
	if(param != null) {
		postData = {'title':$(param).val()};
	}
	$.ajax({
		type : "POST",
		url : url,
		data: postData
	}).done(function(data) {
		result = $.parseJSON(data);
		if (result.result == 'OK') {
			listPattern = $('.list-pattern');
			item = $('.list-pattern>li:nth(0)')
			listPattern.html('');
			for(var i = 0, len = result.data.length; i < len; i++){
				var temp = item.clone();
				temp.find('h3').html('<a href="/detail/' + result.data[i].id + '">' + result.data[i].title + '</a>');
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
	$('#btnNextHand').click(function(){
		if(checkInput()){
			var form = $('form[name="create1"');
			$.ajax({
				type: 'POST',
				url: '/api/pattern/checkStep1',
				data: form.serialize()
			}).done(function(data){
				rs = $.parseJSON(data);
				if(rs.valid == 0){
					alert("error");
				} else if(rs.valid == 1) {
					window.location.href = '/new/3';
				}
			});
		}
	});
	
	$('#btnNextFile').click(function(){
		if(checkInput()){
			var form = $('form[name="create1"');
			$.ajax({
				type: 'POST',
				url: '/api/pattern/checkStep1',
				data: form.serialize()
			}).done(function(data){
				rs = $.parseJSON(data);
				if(rs.valid == 0){
					alert("error");
				} else if(rs.valid == 1) {
					window.location.href = '/new/2';
				}
			});
		}
	});
	
	function checkInput(){
		return true;
	}
}
function nextButton2() {
	$('#btnNext').on('click', function(){
		var tr = $('#data').find('tr');
		var count = $(tr[0]).find('input[name^="column"]').length;
		
		if(count < 2 || count > 5) {
			alert('So cot phai 2-5');
			return;
		}
		
		for (var i = 0, len = tr.length; i < len; i++) {
			var currentCount = $(tr[i]).find('input[name^="column"]').length;
			if (currentCount != count) {
				alert('So cot phai giong nhau');
				return;
			}
			count = currentCount;
		}
		
		
		var form = $('form[name="step2"]');
		
		if(currentCount != form.find('[name="columnSize"]').val()) {
			alert('So cot du lieu lon hon so cot da tao');
			return;
		}
		
		$.ajax({
			type: 'POST',
			url: '/api/pattern/checkStep2',
			data: form.serialize()
		}).done(function(data){
			rs = $.parseJSON(data);
			if(rs.valid == 0){
				alert("error");
			} else if(rs.valid == 1) {
				window.location.href = '/new/4';
			}
		});
	});
}

// New row
function addNewRow(table) {
	var rowNum = table.find('tr').length;
	if(rowNum >50){
		return;
	}
	
	var newRow = table.find('tr:last').clone();
	newRow.find('input[type="text"]').val('');
	
	table.append(newRow);
	addDeleteButtonEvent($('.create'));
}

// Upload file
function uploadFile(){
	function getExtension(filename) {
	    var parts = filename.split('.');
	    return parts[parts.length - 1];
	}
	
	$('#file_upload_form').submit(function(e){
		// show loader [optional line]
		$('#msg').html('uploading....').fadeIn();
		
		// Local check
		var fileName = $(this).find('input[type="file"]').val();
		if(fileName == ""){
			$('#msg').html('Chon file').fadeIn();
			e.preventDefault();
			return;
		}
		var extendName = getExtension(fileName).toUpperCase();
		if (extendName != "TXT" && extendName != "CSV") {
			$('#msg').html('txt or csv').fadeIn();
			e.preventDefault();
			return;
		}
		
		if(document.getElementById('upload_frame') == null) {
			// create iframe
			$('body').append('<iframe id="upload_frame" name="upload_frame" style="display:none"></iframe>');
			
			$('#upload_frame').on('load',function(){
				if($(this).contents()[0].location.href.match($(this).parent('form').attr('action'))){
					// Display server response
					var response = $(this).contents().find('body').html();
					var data = $.parseJSON(response);
					$('#data').val(data.data);
					console.log(data)
				    if(data.valid == 0) {
				    	$('#msg').html(data.error).show();
				    } else {
				    	$('#msg').hide();				    	
				    }
				}
			})
			$(this).attr('method','post');	
			$(this).attr('enctype','multipart/form-data');	
			$(this).attr('target','upload_frame').submit();						
		}

});
}