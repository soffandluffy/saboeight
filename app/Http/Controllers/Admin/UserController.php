<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index(){

    	
    	// Breadcrumbs  
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Users"], ['name' => "Index"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
     
            
		return view('user.index',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);

    }

    public function view($id){

    	

    }

    public function edit($id){

    }



}
