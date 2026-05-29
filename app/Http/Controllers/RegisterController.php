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




class RegisterController extends Controller{
    public function register(Request $request){
        $request->validate([
            "email" => "required|regex:/.*@.*/",
            "tel" => "required|regex:/[0-9]{1}-[0-9]{3}-[0-9]{2}-[0-9]{2}-[0-9]{3}/",
            "username" => "required|min:5|max:15",
            "password" => "required|min:5|max:15",
        ], 
        ["email.required" => "Поле с почтой не должно быть пустым!",
        "tel.required" => "Поле с номером не должно быть пустым!",
        "tel.regex" => "Неверный формат номера",
        "username.required" => "Поле с именем пользователя обязательно!",
        "password.required" => "Пароль обязателен!",
        "username.min" => "Юзернейм должен быть больше 5 символов",
        "username.max" => "Имя не должно привышать 15 символов",
        "password.min" => "Пароль должен быть больше 5 символов",
        "password.max" => "Пароль не должен привышать 15 символов",
        ]);
        $email = $request->get("email");
        $tel = $request->get("tel");
        $username = $request->get("username");
        $password = Hash::make($request->get("password") );
        $user = DB::table("Users")->where("email", $email)->get();
        if($user->count() != 0){
            $error = "Такой пользователь уже существует";
            return redirect()->route("register", )->with("error",$error);
        }else{
            DB::table("Users")->insert(["email"=>$email, "tel" => $tel, "username" => $username, "password" => $password]);
            $id = DB::table("Users")->where("email",$email)->value("id");
            session(["userId" => $id]);
            session(["username" => $username]);
            session(["avatarLink" => "./images/avatar.svg"]);  
            session(["vallet" => 0]);
            session(["isAdmin" => 0]);
            return redirect()->route("main");
        }
    }
    public function login(Request $request){
        $request->validate([
            "email-login" => "required|regex:/.*@.*/",
            "password-login" => "required"
        ],[
            "email-login.regex" => "Неверный формат Почты",
            "email-login.required" => "Поле с почтой обязательно",
            "password-login.required" => "Поле с паролем обязательно"
        ]);
        $email = $request->get("email-login");
        $password = $request->get("password-login");;
        $user = DB::table("Users")->where(["email" => $email])->get();
        if($user->count() == 0){
            $error = "Пользователь с таким email не найден";
            return back()->with(["error_login" =>$error])->withInput();
        }
        if(Hash::check($password, $user->get(0)->password)){
            $avatar = $user->get(0)->avatar;
            if($avatar != "./images/avatar.svg"){
                $avatar = "storage/".$avatar;
            };
            session(["userId" => $user->get(0)->id]);
            session(["username" => $user->get(0)->username]);
            session(["avatarLink" => $avatar]); 
            session(["vallet" => $user->get(0)->vallet]); 
            session(["isAdmin" => $user->get(0)->isAdmin]);
            return redirect()->route("main");
        }else{
            $error = "Неверный пароль";
            return back()->with(["error_login" =>$error])->withInput();
        }
        
    }
    public function logout(){
        session()->remove("userId");
        session()->remove("username");
        session()->remove("avatarLink");
        return redirect()->route("main");
    }
    public function delete(Request $request){
        $password = $request->get("password");
        $hash = DB::table("Users")->where(["id" => session("userId")])->value("password");
        if(Hash::check($password, $hash)){
            DB::table("Users")->delete(session("userId"));
                session()->remove("userId");
                session()->remove("username");
                Storage::disk("public")->delete(session("avatarLink"));
                session()->remove("avatarLink");
                return redirect()->route("main");
        }else{
            $error = "Неверный пароль";
            return back()->with("error", $error);
        }
    }
    public function change(Request $request) {
        $request->validate([
          "newusername" => "min:5|max:15",
          "newpassword" => "min:5|max:15",
          "avatar" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
          "tel"=> "regex:/[0-9]{1}-[0-9]{3}-[0-9]{2}-[0-9]{2}-[0-9]{3}/",
        ],[
            "newusername.min" => "Имя пользователя должен быть не менее 5 символов",
            "newusername.max" => "Имя пользователя долдно быть максимум 15 символов",
            "newpassword.min" => "Пароль должен быть минимум 5 символов",
            "newpassword.max" => "Пароль должен быть максимум 15 символов",
            "avatar.image" => "Неверный формат файла",
            "avatar.max" => "Файл слишком большой",
            "tel.regex" => "Неверный формат номера",
        ]
        );
        $username = $request->get("newusername", null);
        $password = $request->get("newpassword", null);
        $avatar = $request->file("avatar", null);
        $adrees = $request->get("adrees", null);
        $tel = $request->get("tel", null);
        $sucsess = null;
        $error = null;
        if($username != null){
            try{
            DB::table("Users")->where(["id" => session("userId")])->update(["username" => $username]);
            $sucsess = "Юзернейм успешно изменен";
            session(["username" => $username]);
            }catch(Throwable $err){
                $error = "Ошибка смены Юзернейма";
            }
        }
        if($tel != null){
            try{
               DB::table("Users")->where(["id" => session("userId")])->update(["tel" => $tel]);
               $sucsess = "Номер успешно изменен"; 
            }catch(Throwable $err){
                $error = "Ошибка смены Номера";
            }
        }
        if($adrees != null){
            try{
                DB::table("Users")->where(["id" => session("userId")])->update(["adress" => $adrees]);
                $sucsess = "Адрес успешно изменен";
                session(["adrees" => $adrees]);
            }catch(Throwable $err){
                $error = "Ошибка смены Адреса";
            }
        }
        if($password != null){
            try{
            DB::table("Users")->where(["id" => session("userId")])->update(["password" => $password]);
            $sucsess = "Пароль успешно изменен";
            }catch(Throwable $err){
                $error = "Ошибка смены пароля";
            }
        }
        if($avatar != null){
            try{
            $ses = session("avatarLink");
            if($ses != "./images/avatar.svg"){
                Storage::disk("public")->delete($ses);
            }
            $path = $avatar->store("avatars", "public");
            DB::table("Users")->where(["id" => session("userId")])->update(["avatar" => $path]);
            session(["avatarLink" => "storage/".$path]);
            $sucsess = "Аватар успешно изменен";
            }catch(Throwable $err){
                $error = "Ошибка смены аватара";
            }
        }
        return redirect()->route("user", )->with("message", $sucsess)->with( "error", $error);
    }
    public function addBasket(Request $request){
        $productId = $request->get("id");
        $userId = session("userId");
        if($userId == null){
            return back();
        }
        DB::table("Basket")->insert(["product_id" => $productId, "user_id" => $userId]);
        $user = DB::table("Users")->where("id", $userId)->get();
        return back()->with(["user" => $user]);
    }
    public function deleteNotification(Request $request){
        $id = $request->get("id");
        DB::table("Notifications")->delete($id);
        return back();
    }
    public function deleteBasket(Request $request){
        $id = $request->get("id");
        DB::table("Basket")->delete($id);
        return back();
    }
    public function addMoney(Request $request){
        $vallet = DB::table("Users")->where(["id" => session("userId")])->value("vallet");
        $cost = $request->get("cost");
        $vallet += $cost;
        DB::table("Users")->where(["id" => session("userId")])->update(["vallet" => $vallet]);
        session(["vallet" => $vallet]);
        return back();
    }
}
?>