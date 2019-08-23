$(document).ready(function(){
	//nav bar live search functionality
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

    //footer search
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
				if(!response.posts.length && !response.pages.length && !response.faqs.length){
					var htmlResponse = 
						`
						<h4 class="list-group-item searchResultsTitle">
							<i class="et-sad"></i> 
							We couldn't find any results
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
    	var pages = response.pages;
    	var faqs = response.faqs;

     	posts.length ? results += appendResults(posts, 'Posts') : null; 
     	pages.length ? results += appendResults(pages, 'Pages') : null; 
     	faqs.length ? results += appendResults(faqs, 'FAQs') : null;

     	var total = posts.length + pages.length + faqs.length;
     	results += `
			<small class="m-0 text-muted fs-11"> 
				about<span class="text-success"> ${total} results </span>total
			</small>
     	`;
    	return results;
    }

    function appendResults(items, title){
    	results = `<h4 class="list-group-item searchResultsTitle">${title}</h4>`;
    	for(var i = 0; i<items.length; i++){
    		results += 
    			`<a class="list-group-item list-group-item-action href="${items[i].route}">
    				${items[i].title}
    			</a>`;
    	}

    	return results;
    }
});