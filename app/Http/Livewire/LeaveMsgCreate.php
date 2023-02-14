<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LeaveMsgCreate extends Component
{
    public $title;
    public $content;

    public function render()
    {
        return view('livewire.leave-msg-create');
    }

    // 发布留言
    public function createLeaveMsg()
    {

        $this->validate([
        'content'   =>  'required'
        ],[
            'content.required'=>'留言内容必须填写'
        ]);
            // 用户必须登录才能发布留言
        if (auth()->check()) {
            auth()->user()->leageMsg()->create([
                'title' => $this->title,
                'content' => $this->content
            ]);
        }
        // 留言发布成功后清空表单信息
        $this->title = '';
        $this->content = '';
        $this->emit('refreshMsg');
    }

}
