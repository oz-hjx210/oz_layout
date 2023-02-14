<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Newstp;
use App\Models\Prod;
use App\Models\Prodtp;
use App\Models\News;
use App\Models\Webpage;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use  Illuminate\Support\Facades\App;

class SitemapController extends Controller
{
    public function index() {
        $xml = $this->sitemap();
        $file = fopen('sitemap.xml', 'w');
        fwrite($file, $xml);
        fclose($file);
        return redirect('sitemap.xml');
    }

    private function sitemap() {
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= '<urlset>';
        $xml .= $this->execute_xml('about');
        $xml .= $this->execute_xml('contact');
        // 文章分类
        $categories = Prodtp::all();
        foreach($categories as $data) {
            $xml .= $this->execute_xml('prods/'.$data->id);
        }
        // 文章
        Prod::chunk(500, function($articles) use(&$xml) {
            foreach($articles as $data) {
                $xml .= $this->execute_xml('prod/'.$data->id);
            }
        });
        $categories = Newstp::all();
        foreach($categories as $data) {
            $xml .= $this->execute_xml('newses/'.$data->id);
        }
        // 文章
        News::chunk(500, function($articles) use(&$xml) {
            foreach($articles as $data) {
                $xml .= $this->execute_xml('news/'.$data->id);
            }
        });

        $xml .= '</urlset>';
        return $xml;
    }


    private function execute_xml($url) {
        $xml_url = '<url>';
        $xml_url .= '<loc>'. config('app.url') . $url .'</loc>';
        $xml_url .= '<lastmod>'. date("Y-m-d", time()) .'</lastmod>';
        $xml_url .= '<changefreq>weekly</changefreq>';
        $xml_url .= '<priority>0.8</priority>';
        $xml_url .= '</url>';
        return $xml_url;
    }



}
