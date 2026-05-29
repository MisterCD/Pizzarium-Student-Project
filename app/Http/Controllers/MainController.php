<?php


namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class MainController extends Controller{
    private function filter(Request $request, int $pagination) {
    $min = $request->get("min", null);
    $max = $request->get("max", null);
    $reverse = $request->get("reverse", "asc");
    $types = array_filter([
        $request->get("pizza"),
        $request->get("drink"),
        $request->get("eat")
    ]);
    $query = DB::table("Products");
    if(!empty($types)){
        $query->whereIn("type_id", $types);
    }
    if($min != null){
        $query->where("cost", ">=", $min); 
    }
    if($max != null){
        $query->where("cost", "<=", $max);
    }

        return $query->orderBy("cost", $reverse)->paginate($pagination);
    }
    private function rewiews_filter(Request $request){
        $stars = $request->get("stars", null);
        $reverse = $request->get("reverse", "desc");
        $rewiews = DB::table("Rewiews")->join("Users", "Rewiews.user_id", "=", "Users.id");
        if($stars != null){
            $rewiews->where("stars", $stars);
        }
        switch($reverse){
            case "old_id":
                $rewiews->orderBy("id", "desc");
                break;
            case "new_id":
                $rewiews->orderBy("id", "asc");
                break;
            default:
                $rewiews->orderBy("stars", $reverse);
                break;
        }
        return $rewiews;
    }

    public function main(){
        return view("main");
    }
    public function menu(Request $request){
        $products = self::filter($request, 9);
        return view("menu", ["products" => $products]);
    }
    public function special(){
        return view("special");
    }
    public function notification(Request $request){
        $userId = session("userId");
        $notifications = DB::table("Notifications")->where("user_id", $userId)->get();
        return view("notifications", ["Notifs" => $notifications]);
    }
    public function basket(){
        $id = session("userId");
        if($id == null){
            return back();
        }
        $Products = DB::table("Basket")->where("user_id", $id)
        ->join("Products", "Basket.product_id", "=", "Products.id")
        ->select("Basket.*","Products.name", "Products.description", "Products.cost", "Products.img","Products.id as product_id")->get();
        return view("basket", ["Products" => $Products]);
    }
    public function about(){

        return view("about");
    }
    public function rewiews(Request $request){
        $rewiews = self::rewiews_filter($request);
        return view("rewiews", ["rewiews" => $rewiews->paginate(6)]);
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
    public function product(Request $request){
        $id = $request->get("id");
        $product = DB::table("Products")->where(["id" => $id])->get();
        return view("product", ["product" => $product->get(0)]);   
    }
    public function admin_user(){
        $users = DB::table("Users")->paginate(8);
        return view("admin/users-admin", ["users" => $users]);
    }
    public function admin_change_product(Request $request){
        $id = $request->get("productId");
        $product = DB::table("Products")->where(["id" => $id])->get();
        return view("admin/product-change", ["product" => $product->get(0)]);
    }
    public function admin_product(Request $request){
        $products = self::filter($request, 8);
        return view("admin/products-admin", ["products" => $products]);
    }
    public function admin_add_product(){
        return view("admin/product-add");
    }
    public function admin_rewiews(Request $request){
        $rewiews = self::rewiews_filter($request);
        return view("admin/rewiews-admin", ["rewiews" => $rewiews->paginate(6)]);
    }
}








?>









