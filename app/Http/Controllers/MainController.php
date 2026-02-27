<?php


namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class MainController extends Controller{

    public function main(){
        return view("main");
    }
    public function menu(Request $request){
        $products = DB::table("Products")->paginate(8);
        return view("menu", ["products" => $products]);
    }
    public function special(){
        
        return view("special");
    }
    public function about(){

        return view("about");
    }
    public function rewiews(){
        $rewiews = DB::table("rewiews")->paginate(8);
        return view("rewiews");
    }
    public function registration(){
        return view("registration");
    }
    public function User(){
        $userId = session("userId", null);
        if($userId == null){
            return redirect()->route("register");
        }else{
            $user = DB::table("Users")->where(["id" => $userId])->get();
            return view("user", ["user" => $user->get(0)]);
        }
    }
    public function admin_user(){
        $users = DB::table("Users")->paginate(8);
        return view("admin/users-admin", ["users" => $users]);
    }
    public function admin_product(){
        $products = DB::table("Products")->paginate(7);
        return view("admin/products-admin", ["products" => $products]);
    }
}








?>









