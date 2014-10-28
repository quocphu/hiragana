
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
		
	var h = Array();
	for (var i = 0; i < d.header.length; i++) {
		h[i] = d.header[i].header;
	}
	
	var table = $('table[id="data"]');
	createRow(table, h, -1, true, false);
	for (var i = 0; i < d.data.length; i++) {
		createRow(table, d.data[i], i, false, true);
	}
	addDeleteButtonEvent($('.create'));
}

// Add row to table
function createRow(table, rowData, rowNum, isHeader, addDeleteButton){
	var tr = $('<tr row="' + rowNum + '"></tr>');
	for(var i = 0; i < rowData.length; i++){
		if(isHeader){
			tr.append('<th>'+rowData[i]+'</th>');
		}else {
			tr.append('<td><input name="column' + rowNum + i + '" type="text" value="'+rowData[i]+'"/></td>');
		}
	}
	if(addDeleteButton) {
		tr.append('<td><input type="button" value="✗" class="width30percent delete"/><input type="button" value="&#x25B2;" class="width30percent moveup"/><input type="button" value="&#x25BC;" class="width30percent movedown"/></td>');
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
			createRow(table, rows[i], i, false, true);
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
function addDeleteButtonEvent(table, limitRow){
	table.find('.delete').off('click').on('click', function(){
		if(table.find('.delete').length < 2) {
			alert('so dong phai lon hon 1');
			return;
		}
		var del = confirm("Ban muon xoa?");
		if(del){
			$(this).closest('tr').remove();
		}
	});
	
	// Click event
	table.find('.moveup').off('click').on('click', function(){
		var seft = $(this);
		var tr = seft.closest('tr');
		var trSibling = tr.prev().find('input[type="text"]');
		// If cannot find previous row or previous row is header row we will top
		if(tr.prev().length == 0 || tr.prev().attr('row') == -1){
			return;
		}
		
		// Swap value of 2 row
		tr.find('input[type="text"]').each(function(idx, el){
			var tmpVal = $(el).val();
			
			$(el).val(trSibling.eq(idx).val());
			trSibling.eq(idx).val(tmpVal);
		});
	});
	
	table.find('.movedown').off('click').on('click', function(){
		var seft = $(this);
		var tr = seft.closest('tr');
		var trSibling = tr.next().find('input[type="text"]');
		if(tr.prev().length == 0 || tr.next().find('input[type="text"]').length == 0){
			return;
		}
		tr.find('input[type="text"]').each(function(idx, el){
			var tmpVal = $(el).val();
			
			$(el).val(trSibling.eq(idx).val());
			trSibling.eq(idx).val(tmpVal);
		});
		
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

function search(para){
	$.ajax({
		type : 'POST',
		url : '/api/pattern/search',
		data: para
	}).done(function(data) {
		rs = $.parseJSON(data);
		var item = $('.list-pattern>li:nth(0)');
		for (var i = 0; i< rs.data.length; i++) {
			$('.list-pattern').find('li[id="' + rs.data[i].id + '"]').remove();
			var newItem = item.clone();
			getAvatar(rs.data[i].fbId, newItem.find('.avatar'));
			newItem.find('h3 a').attr('href', '/detail/' + rs.data[i].id).html(rs.data[i].title);
			newItem.find('li:eq(0)').html(rs.data[i].authorName);
			newItem.find('li:eq(1)').html(rs.data[i].createDate);
			newItem.find('li:eq(2)').html(numeral(rs.data[i].itemCount).format('0,0'));
			newItem.find('li:eq(3)').html(rs.data[i].views);
			$('.list-pattern').append(newItem);
		}
		$('#nextPage').attr('param', rs.title);
		$('#nextPage').attr('page', rs.nextPage);
		
		if(rs.nextPage == -1){
			$('#nextPage').remove();
		}
	});
} 
function searchNew(url, para){
	$.ajax({
		type : 'POST',
		url : url,
		data: para
	}).done(function(data) {
		rs = $.parseJSON(data);
		var item = $('.list-pattern>li:nth(0)');
		$('.list-pattern>li').remove();
		
		;
		for (var i = 0; i< rs.data.length; i++) {
			var newItem = item.clone();
			getAvatar(rs.data[i].fbId, newItem.find('.avatar'));
			newItem.find('h3 a').attr('href', '/detail/' + rs.data[i].id).html(rs.data[i].title);
			newItem.find('li:eq(0)').html(rs.data[i].authorName);
			newItem.find('li:eq(1)').html(rs.data[i].createDate);
			newItem.find('li:eq(2)').html(numeral(rs.data[i].itemCount).format('0,0'));
			newItem.find('li:eq(3)').html(rs.data[i].views);
			$('.list-pattern').append(newItem);
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
		
		if(form.find('tr').length < 2) {
			alert('so dong phai > 1');
		}
		
		// Rename input
		form.find('tr').each(function(idx, el){
			$(el).attr('row', idx-1)
			$(el).find('input[type="text"]').each(function(idx2, el){
				$(this).attr('name', 'column' + (idx-1) + '' + (idx2))
			})
			
		});
		
		
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

function edit(d) {
	var size = d.info.columnsize;
	var table = $('table[id="data"]');
	
	// Create header
	createRow(table, d.header, -1, false, false);
	// Create data
	for (var i = 0; i < d.data.length; i++) {
		createRow(table, d.data[i], i, false, true);
	}
	
	// Add event for delete button
	addDeleteButtonEvent($('.create'));
	
	
	// add new row event
	$('#btnNewRow').on('click', function(){
		addNewRow($('#data'));
	});
	
	// Add next button event
	$('#btnNext').on('click', function(){
		var form = $('form[name="edit"]');
		
		// Check input here
		// If no row
		if(form.find('tr').length < 2){
			alert('so dong phai > 1');
		}
		
		// Rename input
		form.find('tr').each(function(idx, el){
			$(el).attr('row', idx-1)
			$(el).find('input[type="text"]').each(function(idx2, el){
				$(this).attr('name', 'column' + (idx-1) + '' + (idx2))
			})
			
		});
		
		// Call ajax
		$.ajax({
			type: 'POST',
			url: '/api/pattern/edit',
			data: form.serialize()
		}).done(function(data){
			rs = $.parseJSON(data);
			if(rs.valid == 0){
				alert("error");
				if($.isArray(rs.error)) {
					for (var i = 0; i < rs.error.length; i++) {
						// display error here
					}
				}
			} else if(rs.valid == 1) {
				location.reload(true);
			}
		});
	});
	
}

// SESSION
function setSession(key, value){
	$.ajax({
		type: 'POST',
		url: '/api/globalvar',
		data: {'name': key, 'value':value}
	}).done(function(data){
		//
	});
}

function getAvatar(id, el){
	$.ajax({
		type : 'get',
		url : 'http://graph.facebook.com/' + id + '/picture?redirect=0&height=50&width=50&type=normal'
	}).done(function(data) {
		var _img = el.find('img')[0];
		var newImg = new Image;
		newImg.onload = function() {
		    _img.src = this.src;
		}
		newImg.src = data.data.url;
	});
}
