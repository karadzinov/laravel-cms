<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Settings;
use Illuminate\Http\Request;

class RssFeedController extends Controller
{
    private $domtree;

	/**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->domtree = new \DOMDocument('1.0', 'UTF-8');
    }

    public function index(){
    	
    	$appUrl = config('app.url');
        $appName = config('app.name');
        $appLocale = config('app.locale');
        $posts = Post::latest()->take(10)->get();
        $settings = Settings::first();

        $xmlRoot = $this->createXmlElement('rss', null, $this->domtree);
        $content = $this->addAttribute('xmlns:content', 'http://purl.org/rss/1.0/modules/content/', $xmlRoot);
        $wfw = $this->addAttribute('xmlns:wfw', 'http://wellformedweb.org/CommentAPI/', $xmlRoot);
        $dc = $this->addAttribute('xmlns:dc', 'http://purl.org/dc/elements/1.1/', $xmlRoot);
        $atom = $this->addAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom', $xmlRoot);
        $sy = $this->addAttribute('xmlns:sy', 'http://purl.org/rss/1.0/modules/syndication/', $xmlRoot);
        $slash = $this->addAttribute('xmlns:slash', 'http://purl.org/rss/1.0/modules/slash/', $xmlRoot);
        $version = $this->addAttribute('version', '2.0', $xmlRoot);

        
        $channel = $this->createXmlElement('channel', null, $xmlRoot);
        $title = $this->createXmlElement('title', $appName, $channel);
        
        $atom = $this->createXmlElement('atom:link', null, $channel);
        $atomHref   = $this->addAttribute('href', asset('feed'), $atom);
        $atomRel    = $this->addAttribute('rel', 'self', $atom);
        $atomtype   = $this->addAttribute('type', 'application/rss+xml', $atom);
        
        $link = $this->createXmlElement('link', $appUrl, $channel);

        $metaDescription = $settings->meta_description ?? null;
        $description = $this->createXmlElement('description', $metaDescription, $channel);

        $lastBuild = $this->createXmlElement('lastBuildDate', now(), $channel);

        $language = $this->createXmlElement('language', $appLocale, $channel);
        $updatePeriod = $this->createXmlElement('sy:updatePeriod', 'hourly', $channel);
        $updateFrequesncy = $this->createXmlElement('sy:updateFrequency', '1', $channel);
        $image = $this->createXmlElement('image', null, $channel);
        
        $meta_image = $settings->logo ?? null;
        $url = $this->createXmlElement('url', $meta_image, $image);

        $imageTitle = $this->createXmlElement('title', $appName, $image);
        $imageLink = $this->createXmlElement('link', $appUrl, $image);
        $width = $this->createXmlElement('width', 32, $image);
        $height = $this->createXmlElement('heigth', 32, $image);

        $items = $this->makeItems($posts);
        $items = $this->addItemsToTree($channel, $items);
        

        return response()->make($this->domtree->saveXML(), '200')
        				->header('Content-Type', 'text/xml');
    }

    public function addAttribute($name, $value, $element){

        $attribute = $this->domtree->createAttribute($name);
        $attribute->value = $value;
        $element->appendChild($attribute);

        return;
    }

    public function makeItems($data){
        $items = [];
        foreach($data as $item){
            $item = $item->makeItem();
            $items[] = $item;
        }

        return $items;
    }

    public function createXmlElement($name, $value=null, $parent){

        $element = $this->domtree->createElement($name, $value);
        $element = $parent->appendChild($element);

        return $element;
    }

    public function addItemsToTree($parent, array $items){
        
        foreach($items as $item){

            $xmlItem = $this->createXmlElement('item', null, $parent);
            $title = $this->createXmlElement('title', $item->title, $xmlItem);
            $link = $this->createXmlElement('link', $item->link, $xmlItem);
            $pubDate = $this->createXmlElement('pubDate', $item->pubDate, $xmlItem);
            
            $creator = $this->createXmlElement('creator', null, $xmlItem);
            $creator->appendChild(new \DOMCdataSection($item->creator));

            $category = $this->createXmlElement('category', null, $xmlItem);
            $category->appendChild(new \DOMCdataSection($item->category));

            $guid = $this->createXmlElement('guid', $item->guid, $xmlItem);
            $isPermaLink = $this->addAttribute('isPermaLink', 'true', $guid);
            
            $description = $this->createXmlElement('description', null, $xmlItem);
            $description->appendChild(new \DOMCdataSection($item->description));

            $content = $this->createXmlElement('content', null, $xmlItem);
            $content->appendChild(new \DOMCdataSection($item->content));

            $postId = $this->createXmlElement('post-id', $item->id, $xmlItem);
            $xmlnsValue = $this->makeXmlns();
            $xmlns = $this->addAttribute('xmlns', $xmlnsValue, $postId);
        }

        return $items;
    }

    public function makeXmlns(){
        $domain = config('app.url');
        $domainParts = explode('.', $domain);
        $domainExtension = trim($domainParts[count($domainParts)-1], '/');
        array_pop($domainParts);
        $restOfDomain = implode('', $domainParts);
        $domain = explode('//', $restOfDomain);
        $domain = $domain[count($domain)-1];
        $domain = str_replace('www.', '', $domain);
        $xmlns = $domainExtension . '-' . $domain . ':feed-additions:1';
        
        return $xmlns;
    }
}
