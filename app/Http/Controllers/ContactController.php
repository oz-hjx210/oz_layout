<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function create()
    {
        $data=request()->all();
        //  dd( $data['capatcha'] );

        if ($data['capatcha'] != Session::get('code')){
           // return redirect(url('/contact'))->withErrors(['error' => '验证码错误']);
        }
        unset($data['capatcha']);
        unset($data['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] =date('Y-m-d H:i:s');
        Contact::insert($data);
        return view('contact');
    }
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(1);//设置背景前面线条
        $builder->setMaxFrontLines(1);//设置背景后面线条
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 50, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        Session::put('captcha', $phrase);//需要在头部 use Illuminate\Support\Facades\Session;引入session类
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

}
