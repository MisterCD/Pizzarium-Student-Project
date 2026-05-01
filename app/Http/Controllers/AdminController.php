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
    public function add_product( Request $request){
        
        $request->validate([
            "title" => "required|max:100",
            "img" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "descriptionTitle" => "required|max:200",
            "description" => "required",
            "price" => "required",
        ]);
        $title = $request->get("title");
        $image = $request->file("img");
        $descriptionTitle = $request->get("descriptionTitle");
        $description = $request->get("description");
        $price = $request->get("price");
        $type = $request->get("type");
        $path = $image->store("images", "public");

        DB::table("Products")->insert([
        "type_id" => $type,
        "name" => $title,
        "description" => $descriptionTitle,
        "description_full" => $description,
        "img" => "storage/".$path,
        "cost" => $price, 
        ]);
        return redirect()->route("product-add");
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
    public function add_image(Request $request){
        if(session("isAdmin") == 0){
            return redirect()->route("main");   
        }
        $request->validate(
            ["image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"], 
            ["image.image" => "Неверный формат фалйа", "image.max" => "Файл слишком большой"]);
        $image = $request->file("image");
        $path = $image->store("images", "public");
        return response()->json(["link" => "storage/".$path]);

    }
}