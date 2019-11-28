var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
    // ... more custom settings?
});

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
				if(!response.posts.length && !response.pages.length && !response.faqs.length && !response.products.length){
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
			<small class="text-muted fs-11"> 
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


    // cart
    function countNavCartItems(){
        const items = $('.nav-cart-item').length;
        $('.nav-cart-count').text(items);
    }
    function navCartTotal(){
        const products = $('.nav-cart-price');
        let total = 0;
        for(let i = 0; i<products.length; i++){
            total += cleanPrice($(products[i]).text());
        }

        $('#nav-cart-total').text(formatMoney(total));
    }

    if($('.nav-cart-item').length){
        countNavCartItems();
        navCartTotal();
    }

    function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = " ") {
      try {
        decimalCount = Math.abs(decimalCount);
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

        const negativeSign = amount < 0 ? "-" : "";

        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
        let j = (i.length > 3) ? i.length % 3 : 0;

        return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
      } catch (e) {
        console.log(e)
      }
    };

    function cleanPrice(price){

        return Number(price.replace(' ', '').replace(',',''))
    }

    function countCartItems(){
        const items = $('.cart-item').length;
        $('#items-count').text(items);
    }
    
    function countTotal(){
        let prices = $('.product-times-quantity');
        let totalPrice = 0;
        const currency = $('#currency-symbol').val()
        for(let i = 0; i< prices.length; i++){
            totalPrice += cleanPrice($(prices[i]).text());
        }
        totalPrice= formatMoney(totalPrice.toFixed(2).toString());
        $('#total-amount').text(totalPrice + currency)

    }

    $('.product-quantity').on('change', function(){
        
        changeQuantity($(this));
    });

    function changeQuantity(obj){
        const productId = obj.data('product');
        let quantity = obj.val();
        $.ajaxSetup({
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });
        $.ajax({
            type: 'POST',
            url: '/cart/change-quantity',
            data:{
                product_id: productId,
                quantity: quantity,
            },
            success: function (response){
                if(response.status === "success"){

                    flashMessage('success', response.message);
                }else if(response.status === "warning"){
                    
                    flashMessage('warning', response.message);
                    obj.val(response.quantity)
                    quantity = response.quantity;
                }
                
                //update price
                const currnetPrice = $('#product-'+productId+'-price').text();
                let totalPriceForProduct = $('#product-'+productId+'-total');
                totalPriceForProduct.html(formatMoney((cleanPrice(currnetPrice)*cleanPrice(quantity)).toFixed(2)));
                
                countTotal();
            },
            error: function(error){
                flashMessage('danger', error.message);
            }

        });
    }

    if($('.product-times-quantity')){
        countTotal();
    }
    if( $('.cart-item').length){
        countCartItems();
    }

    $('.remove-from-cart').on('click', function(){
        const product = $(this).data('product');
        var remove = $(this).parent().closest('tr');
        $.ajaxSetup({
            headers:
                    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });
        $.ajax({
            type: 'DELETE',
            url: '/cart/delete-from-cart',
            data:{
                product_id: product
            },
            success: function(response){
                flashMessage('success', response.message);
                remove.remove();
                countTotal();
                countTotal();
                removeFromNavCart(product);
            },
            error: function(error){
                flashMessage('danger', response.message);
            }
        });
    });

    function removeFromNavCart(id){
        const x = $('*[data-nav-cart-product="' + id + '"]');

        $(x).remove();
        countNavCartItems();
                navCartTotal();
    }

    $('.add-to-cart').on('click', function(){
        const product_id = $(this).data('product');
        let element = $(this);

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({

           type:'POST',
           url:'/cart/add-to-cart',
           data:{
                product_id
           },
           success:function(response){
            
                if(response.status === "already-added"){
                    flashMessage("success", response.message);
                    return;
                }else if(response.status==='new'){
                    $('#cart-placeholder').replaceWith(response.view);
                    flashMessage("success", response.message);
                    countNavCartItems();
                    navCartTotal();

                    return;
                }else if(response.status === 'failed'){
                    flashMessage("danger", response.message);
                    return;
                }
                $('.quick-cart-wrapper').prepend(response.view);
                flashMessage("success", response.message);
                element.html(response.message + " <i class='fa fa-check'></i>");
                countNavCartItems();
                navCartTotal();
           },
           error:function(response){
            
                flashMessage("danger", response.message);
           }

        });
    });


    // wishlist
    $(document).on('click', '.add-to-wishlist', function(){
        const product = $(this).data('product');
        const button = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({

           type:'POST',
           url:'/wishlist/add',
           data:{
                product_id: product
           },
           success:function(response){
            
            if(response.status === "already-added"){
                flashMessage("success", response.message);
                return;
            }
            
            flashMessage("success", response.message);
            button.toggleClass('add-to-wishlist remove-from-wishlist');
            button.html("<i class='fa fa-heart in-wishlist'></i>");
            button.prop('title', response.button);
           },
           error:function(response){
                flashMessage("danger", response.message);
           }

        });
    });

    $(document).on('click', '.remove-from-wishlist', function(){
        const product = $(this).data('product');
        const button = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({

            type:'POST',
            url:'/wishlist/delete',
            data:{
                product_id: product
            },
            success:function(response){
                flashMessage("success", response.message);
                button.toggleClass('add-to-wishlist remove-from-wishlist');
                button.html("<i class='fa fa-heart-o'></i>");
                button.prop('title', response.button);

            },
            error:function(response){
                flashMessage("danger", response.message);
           }

        });
    });
    
    setTimeout(function(){
        $('.my-alert').fadeOut('slow');
    }, 4000);

    function flashMessage(type="warning", message){

        message = `
        <div class="alert alert-${type} flash-alerts" role="alert">
            ${message}
        </div>`;
        $('body').prepend(message);
        setTimeout(function(){ $('.flash-alerts').fadeOut('slow'); }, 3000);
    }
});