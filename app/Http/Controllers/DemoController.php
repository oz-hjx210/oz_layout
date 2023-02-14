<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use  Illuminate\Support\Facades\Storage;

class DemoController extends Controller
{
    public function live()
    {

        $users=array('hong','ivy','kerry');
        return view('live', ['name' => 'James']);
    }

    function storage_link(){

        $dir="storage";


        self::deleteDir($dir);
        echo  Artisan::call('storage:link');
    }

    public function deleteDir($dir)
    {
        if (rmdir($dir)==false && is_dir($dir)) {
            if ($dp = opendir($dir)) {
            while (($file=readdir($dp)) != false) {
            if (is_dir($file) && $file!='.' && $file!='..') {
            deleteDir($file);
            } else {
                unlink($file);
            }
        }
         closedir($dp);
        } else {
            exit('Not permission');
        }
    }
}

}
