<?php


namespace App\Http\Controllers;

use App;
use Hash;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Log;
use Throwable;
use function PHPUnit\Framework\returnArgument;




class AdminController extends Controller{
    public function delete_user(Request $request){
        if(session("isAdmin") == 0){
            return redirect()->route("main");   
        }
        $id = $request->get("userId");
        DB::table("Users")->delete($id);
        return back();
    }
    public function set_admin(Request $request){
        if(session("isAdmin") == 0){
            return redirect()->route("main");   
        }
        $id = $request->get("userId");
        DB::table("Users")->where(["id" => $id])->update(["isAdmin" => 1]);
        return back();
    }
    public function add_product(){
        if(session("isAdmin") == 0){
            return redirect()->route("main");   
        }
    }
    public function delete_product(){
        if(session("isAdmin") == 0){
            return redirect()->route("main");   
        }
    }
    public function change_product(){
        if(session("isAdmin") == 0){
            return redirect()->route("main");   
        }
    }
    public function delete_rewiew(){
        if(session("isAdmin") == 0){
            return redirect()->route("main");   
        }
    }
}