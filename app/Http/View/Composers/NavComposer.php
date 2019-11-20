<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Scopes\TranslationScope;
use App\Models\{Category, Language, Page, Settings};

class NavComposer
{
    protected $categories;
    protected $pages;
    protected $cart;

    public function __construct()
    {
        $categories = Category::withoutGlobalScope(TranslationScope::class)->where('parent_id','=',NULL)->withDepth()->get();
        $languages = Language::where('active','=','1')
                        ->select('code','native')
                        ->get();
        
        $this->categories = $categories;
        $this->pages = $this->preparePagesForNav();
        $this->languages = $languages;
        $this->cart = $this->cart();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'categories' => $this->categories,
            'pages' => $this->pages,
            'languages' => $this->languages,
            'cart' => $this->cart,
        ]);
    }

    public function preparePagesForNav(){
        $pages = Page::pluck('title', 'slug');
        foreach($pages as $slug => $title){
            $showRoute = route('categories.pages.show', [$slug]);
            $pages[$slug] = (object) compact('title', 'showRoute');
        }

        return $pages;
    }

    public function cart(){
        
        if(auth()->user()){
            $cart = auth()->user()->cart;
            if($cart->isNotEmpty()){
                $currency = Settings::first()->currencySymbol;
                $cart->totalPrice = $this->totalCartPrice($cart).$currency;
                $cart->currency = $currency;

                return $cart;
            }
        }

        return false;
    }

    public function totalCartPrice($cart){
        $sum = 0;
        foreach($cart as $product){
            $sum += $product->currentPrice * $product->pivot->quantity;
        }

        return $sum;
    }
}