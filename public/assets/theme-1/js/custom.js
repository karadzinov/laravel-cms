


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
	
	////nav bar live search functionality
	$('#search_box').keyup($.debounce(700, function (e) {
		var responseDiv = $('#searchResponse');
		var search = $('#search_box').val();
        if(search.length > 2){
	        searchInDatabase(search, responseDiv);
        }else{
            responseDiv.html('');
        }
    }));

    //large page search
    $('#main_search_box').keyup($.debounce(700, function (e) {
		var responseDiv = $('#mainSearchResponse');
		var search = $('#main_search_box').val();
        if(search.length > 2){
	        searchInDatabase(search, responseDiv);
        }else{
            responseDiv.html('');
        }
    }));

    //sidebar search
    $('#sidebar_search').keyup($.debounce(700, function (e) {
		var responseDiv = $('#sidebarSearchResults');
		var search = $('#sidebar_search').val();
        if(search.length > 2){
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
				if(!response.posts.length && !response.products.length && !response.pages.length && !response.faqs.length){
					var htmlResponse = 
						`
						<h4 class="list-group-item searchResultsTitle">
							<i class="et-sad"></i> 
							${response.translations.noResults}
						</h4>`;
	                responseDiv.append(htmlResponse);
				}else{
					var resultsList = prepareList(response);
	                responseDiv.append(resultsList);
				}
            },
            error: function(response){
                console.log('Something went wrong.');
            }
       });
    }

    function prepareList(response){
    	var results = '';
    	var posts = response.posts;
    	var products = response.products;
    	var pages = response.pages;
    	var faqs = response.faqs;
        var translations = response.translations;

     	posts.length ? results += appendResults(posts, translations.posts) : null; 
     	products.length ? results += appendResults(products, translations.products) : null; 
     	pages.length ? results += appendResults(pages, translations.pages) : null; 
     	faqs.length ? results += appendResults(faqs, translations.faqs) : null;

     	results += `
			<small class="m-0 text-muted fs-11"> 
				${translations.total}
			</small>
     	`;
    	return results;
    }

    function appendResults(items, title){
    	results = `<h4 class="list-group-item searchResultsTitle">${title}</h4>`;
    	for(var i = 0; i<items.length; i++){
    		results += 
    			`<a class="list-group-item list-group-item-action" href="${items[i].route}">
    				${items[i].title}
    			</a>`;
    	}

    	return results;
    }

});
function flashMessage(type="warning", message){

	message = `
	<div class="alert alert-${type} flash-alerts" role="alert">
		${message}
	</div>`;
	$('body').prepend(message);
	setTimeout(function(){ $('.flash-alerts').fadeOut('slow'); }, 3000);
}

