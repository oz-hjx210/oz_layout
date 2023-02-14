<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Demotp;
use App\Models\Demo;
use App\Models\Moduletp;
use App\Models\Module;
use App\Models\Prodtp;
use App\Models\News;
use App\Models\Project;
use App\Models\Webpage;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use  Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function home()
    {

        $lists=Demotp::orderBy('sort_order','desc')->get();

        $file_dir=storage_path().'/app/public/';
        foreach($lists as $val){
            $img=$val->imgurl;

            if(!file_exists($file_dir.'cache/'.$img) && file_exists($file_dir.$img)){
                 $val->thumb= Image::make($file_dir.$img)->resize(300,200)->save($file_dir.'cache/'.$img);
            }

            $val->thumb= url('storage/cache/'.$img);

        }

        $data= array(
                     'lists' => $lists,
                      );
 //dd($data);
        return view('home',   $data);
    }

    public function demos($demotp_id=0)
    {

        $demotps=Demotp::orderBy('sort_order','desc')->get();
        $now_demotp=(Object)array('title'=>'全部','id'=>'');

        Paginator::defaultView('vendor.pagination.simple-default');
        if ($demotp_id) {
             $now_demotp=Demotp::find($demotp_id);

           // $last = Demotp::where('id', '<', $demotp_id)->orderBy('sort_order', 'desc')->first();
          //  $next = Demotp::where('id', '>', $demotp_id)->orderBy('sort_order', 'asc')->first();


             $last=DB::select(" SELECT * FROM `demotp` where  id<>? and (if(sort_order = (select sort_order from `demotp` where id=?),id>?,sort_order > (select sort_order from `demotp` where id=?))) order by sort_order asc, id asc limit 0,1",[$demotp_id,$demotp_id,$demotp_id,$demotp_id] );
             $next=DB::select(" SELECT * FROM `demotp` where  id<>? and (if(sort_order = (select sort_order from `demotp` where id=?),id<?,sort_order < (select sort_order from `demotp` where id=?))) order by sort_order desc, id desc limit 0,1" ,[$demotp_id,$demotp_id,$demotp_id,$demotp_id]);


             $lists =Demo::orderBy('sort_order','desc')->where('demotp_id', $demotp_id)->paginate(100);
        }else{
            $lists = array();
        }



        $file_dir=storage_path().'/app/public/';

        foreach($lists as $val){
            $img=$val->imgurl;

            if(!file_exists($file_dir.'cache/'.$img)){
                $val->thumb= Image::make($file_dir.$img)->resize(300,200)->save($file_dir.'cache/'.$img);
            }

            $val->thumb= url('storage/cache/'.$img);

        }

        $data= array(
            'lists' => $lists,
            'demotps' => $demotps,
            'last'=>$last,
            'next' => $next,
            'demotps' => $demotps,
            'now_demotp' => $now_demotp,

        );

        return view('demos', $data);
    }

    public function projects()
    {

        Paginator::defaultView('vendor.pagination.simple-default');

       $lists =Project::orderBy('sort_order','desc')->paginate(12);


        $data= array(
            'lists' => $lists,

        );

        return view('projects', $data);
    }
    public function about()
  {

    $info=Webpage::orderBy('sort_order','desc')->get()->where('id', '1')->first();

    $data= array(
        'webpage' => $info,
    );

    return view('about', $data);
}
    public function faq()
{

    $info=Webpage::orderBy('sort_order','desc')->get()->where('id', '2')->first();

    $data= array(
        'webpage' => $info,
    );

    return view('faq', $data);
}
    public function frame()
    {

        $moduletps=Moduletp::orderBy('sort_order','desc')->get();

        $data= array(
            'moduletps' => $moduletps,
        );

        return view('frame', $data);
    }

    public function modules($moduletp_id=0)
    {
        $moduletps = Moduletp::orderBy('sort_order','desc')->get();


        Paginator::defaultView('vendor.pagination.simple-default');
        if ($moduletp_id) {

            $now_moduletp=Moduletp::find($moduletp_id);
            $lists =Module::orderBy('sort_order','desc')->where('moduletp_id', $moduletp_id)->paginate(10);
        }else{
            $lists =  '';
        }



        $data= array(
            'lists' => $lists,
            'moduletps' => $moduletps,
            'moduletp_id' => $moduletp_id,
            'now_moduletp' => $now_moduletp,
        );

        return view('modules', $data);
    }


    public function prods($prodtp_id=0)
    {

        $prodtps=Prodtp::orderBy('sort_order','desc')->get();
        $now_prodtp=(Object)array('title'=>'全部','id'=>'');

        Paginator::defaultView('vendor.pagination.simple-default');
        if ($prodtp_id) {
            $now_prodtp=Prodtp::find($prodtp_id);
            // $lists =DB::table('news')->where('newstp_id', $newstp_id)->paginate(1);
            $lists =Prod::orderBy('sort_order','desc')->where('prodtp_id', $prodtp_id)->paginate(10);
        }else{
            $lists = Prod::orderBy('sort_order','desc')->paginate(10);
        }
        $file_dir=storage_path().'/app/public/';

        foreach($lists as $prod){
            $img=$prod->imgurl[0];

            if(!file_exists($file_dir.'cache/'.$img)){
                $prod->thumb= Image::make($file_dir.$img)->resize(300,200)->save($file_dir.'cache/'.$img);
            }

            $prod->thumb= url('storage/cache/'.$img);

        }

        $data= array(
            'lists' => $lists,
            'prodtps' => $prodtps,
            'now_prodtp' => $now_prodtp,

        );

        return view('prods', $data);
    }


    public function prod_detail($id=0)
    {
        $prodtps = Prodtp::orderBy('sort_order','desc')->get();


        Paginator::defaultView('vendor.pagination.simple-default');

        // $lists =DB::table('news')->where('newstp_id', $newstp_id)->paginate(1);
        $info =Prod::find($id);
         $prodtp_id=$info->prodtp_id;



        $data= array(
            'info' => $info,
            'newstps' => $prodtps,
            'prodtp_id' => $prodtp_id,

        );

        return view('prod_detail', $data);
    }



    public function newses($newstp_id=0)
    {
        $newstps = Newstp::orderBy('sort_order','desc')->get();


        Paginator::defaultView('vendor.pagination.simple-default');
        if ($newstp_id) {

            // $lists =DB::table('news')->where('newstp_id', $newstp_id)->paginate(1);
            $lists =News::orderBy('sort_order','desc')->where('newstp_id', $newstp_id)->paginate(10);
        }else{
            $lists = News::orderBy('sort_order','desc')->paginate(10);
        }

        $file_dir=storage_path().'/app/public/';

        foreach($lists as $val){
            $img=$val->imgurl;

            if(!file_exists($file_dir.'cache/'.$img)){
                $val->thumb= Image::make($file_dir.$img)->resize(300,200)->save($file_dir.'cache/'.$img);
            }

            $val->thumb= url('storage/cache/'.$img);

        }

        $data= array(
            'lists' => $lists,
            'newstps' => $newstps,
            'newstp_id' => $newstp_id,

        );

        return view('newses', $data);
    }
    public function news_detail($id=0)
    {
        $newstps = Newstp::orderBy('sort_order','desc')->get();


        Paginator::defaultView('vendor.pagination.simple-default');

        // $lists =DB::table('news')->where('newstp_id', $newstp_id)->paginate(1);
            $info =News::find($id);

         $newstp_id=$info['newstp_id'];



        $data= array(
            'info' => $info,
            'newstps' => $newstps,
            'newstp_id' => $newstp_id,

        );

        return view('news_detail', $data);
    }

    public function sitemap(Request $request) {
        // create new sitemap object
        $sitemap = App::make("sitemap");
        $sitemap->setCache('laravel.sitemap', 60);

        // get all posts from db
        $posts = DB::table('articles')
            ->where('publish', 1)
            ->orderBy('id', 'desc')
            ->get();

        // add every post to the sitemap
        foreach ($posts as $post) {
            $sitemap->add("https://www.sunzhongwei.com/".$post->slug, $post->created_at, 0.9, 'monthly');
        }

        return $sitemap->render('xml');
    }

}
