<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveMsg;
use Illuminate\Pagination\Paginator;
class LeaveMsgIndex extends Component
{


    public function render()
    {
       // $leaveMsgs = LeaveMsg::all();
        Paginator::defaultView('vendor.pagination.simple-default');
        $leaveMsgs = LeaveMsg::paginate(5);;
      //  dd($leaveMsgs->link);
        return view('livewire.leave-msg-index', compact('leaveMsgs'));
    }
    // 监听事件
    protected $listeners = ['refreshMsg'];

// 就是这样什么都不要写
    public function refreshMsg()
    {
    }
}
