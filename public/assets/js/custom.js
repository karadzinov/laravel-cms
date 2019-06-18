


$(document).ready( function() {
	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});


	$('#deleteuser').click(function(e) {
		e.preventDefault();
		var msg = 'Are you sure?';
		bootbox.confirm(msg, function(result) {
			if (result) {
				$('#deleteuser').submit();
			}
		});
	});



	$('#deleteproduct').click(function(e) {
		e.preventDefault();
		var msg = 'Are you sure?';
		bootbox.confirm(msg, function(result) {
			if (result) {
				$('#deleteproduct').submit();
			}
		});
	});

	$('#deletecategory').click(function(e) {
		e.preventDefault();
		var msg = 'Are you sure?';
		bootbox.confirm(msg, function(result) {
			if (result) {
				$('#deletecategory').submit();
			}
		});
	});

	$('#deletesourcepartner').click(function(e) {
		e.preventDefault();
		var msg = 'Are you sure?';
		bootbox.confirm(msg, function(result) {
			if (result) {
				$('#deletesourcepartner').submit();
			}
		});
	});

		$('#deleteblog').click(function(e) {
		e.preventDefault();
		var msg = 'Are you sure?';
		bootbox.confirm(msg, function(result) {
			if (result) {
				$('#deleteblog').submit();
			}
		});
	});


});




$(document).ready( function() {
	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
		
		var input = $(this).parents('.input-group').find(':text'),
		log = numFiles > 1 ? numFiles + ' files selected' : label;
		
		if( input.length ) {
			input.val(log);
		} else {
			if( log ) alert(log);
		}
		
	});
	//nav bar live search functionality
	$('#search_box').keyup($.debounce(700, function (e) {
		var responseDiv = $('#searchResponse');;
		var search = $('#search_box').val();
        if(search!=''){
	        searchInDatabase(search, responseDiv);
        }else{
            responseDiv.html('');
        }
    }));

    //main search on errors pages
    $('#main_search_box').keyup($.debounce(700, function (e) {
		var responseDiv = $('#mainSearchResponse');;
		var search = $('#main_search_box').val();
        if(search){
	        searchInDatabase(search, responseDiv);
        }else{
            responseDiv.html('');
        }
    }));
    
    function searchInDatabase(search, responseDiv){
    	responseDiv.html('')
        $.ajax({
            type: 'GET',
            url: '/search-ajax',
            data: {
                search: search
                },
            success: function(response){
            	responseDiv.html('');
				if(response.length == 0){
					var htmlResponse = '<ul class="list-group">';
					htmlResponse+= '<li class="list-group-item alert alert-warning">There is no results.</li> ';
	                responseDiv.append(htmlResponse);
				}else{
					var resultsList = '<ul class="list-group">';
	                for(var i = 0; i<response.length; i++){
	                	var tagClass = response[i].type + 'Response';
	                	resultsList += '<li class="list-group-item"><a href="' + response[i].route + '" class="searchResults">';
	                	resultsList +=  '<span class="'+tagClass+'"> ' + response[i].type;
	                	resultsList += '</span> '+ response[i].title + '</a> <br/>';

	                }
	                	resultsList += '</ul>'
	                	responseDiv.append(resultsList);
				}
            },
            error: function(response){
                console.log('Something went wrong.');
            }
       });
    }
});

