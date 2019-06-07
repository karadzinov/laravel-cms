<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $baseUrl;
    protected $firstPriority;
    protected $secondPriority;
    protected $thirdPriority;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    public function __construct()
    {
        parent::__construct();
        $this->baseUrl = config('app.url');
        
        //add routes without / in the begining
        $firstPriority = ['',];
        $secondPriority = [];
        $thirdPriority = ['login', 'register',];

        $this->firstPriority = $this->makeUrls($firstPriority);
        $this->secondPriority = $this->makeUrls($secondPriority);
        $this->thirdPriority = $this->makeUrls($thirdPriority);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
               if (in_array($url->url, $this->firstPriority)) {
                   $url->setPriority(1)
                       ->setLastModificationDate(Carbon::yesterday())
                               ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY);
               }elseif(in_array($url->url, $this->secondPriority)){
                    $url->setPriority(0.9)
                       ->setLastModificationDate(Carbon::yesterday())
                               ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);                  
               }elseif(in_array($url->url, $this->thirdPriority)){
                    $url->setPriority(0.8)
                        ->setLastModificationDate(Carbon::yesterday())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);        
               }else{
                    $url->setPriority(0.7)
                        ->setLastModificationDate(Carbon::yesterday())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);  
               }
               return $url;
           })
        ->writeToFile(public_path('sitemap.xml'));

        echo 'Sitemap generated.' . PHP_EOL;
    }

    private function makeUrls($urls){
            
        foreach($urls as $index=>$url){
            $urls[$index] = $this->baseUrl . $url;
        }
        return $urls;
    }
}