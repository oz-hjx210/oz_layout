<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;



class Message extends Component
{
    public $name;
    public $tel;
    public $email;
    public $company;
    public $subject;
    public $content;
    public $captcha;


    public function render()
    {
        return view('livewire.message');
    }


    // 发布留言
    public function createMessage()
    {
//dd($this->captcha );
    //   dd( Session::get('captcha'));
        $this->validate([
            'tel'   =>  'required',
            'name'   =>  'required',
            'captcha' => 'required|captcha',
            'content'   =>  'required'
        ],[
            'tel.required'=>'聯絡電話必須填寫',
            'name.required'=>'姓名内容必須填寫',
            'content.required'=>'留言内容必須填寫',
            'captcha.required'=>'驗證碼必須填寫',
            'captcha.captcha'=>'驗證碼不匹配'
        ]);



        $data=array('name' => $this->name,
                    'tel' => $this->tel,
                    'name' => $this->name,
                    'email' => $this->email,
                    'content' => $this->content,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

         );
        Contact::insert($data);
        // 留言发布成功后清空表单信息



        Mail::send('emails.contact',['info'=>$data],function($message){
            $to_emails=explode(',',config('web.config_contact'));
            $message->from(config('web.config_email'),config('web.config_title'));
            $message->subject(config('web.config_title').'--聯絡我們');
            $message->to($to_emails);//收件人
        });
        $this->email = '';
        $this->company = '';
        $this->tel = '';
         $this->name = '';
        $this->content = '';
        $this->captcha = '';
        Session::forget('captcha');
        $this->emit('refreshMsg');
    }
    // 监听事件
    protected $listeners = ['refreshMsg'];

// 就是这样什么都不要写
    public function refreshMsg()
    {
        session()->flash('message','送出成功，感謝您的留言');
    }
}
