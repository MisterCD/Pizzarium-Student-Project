<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\MainController::class, "main"])->name("main");
Route::get('/menu', [App\Http\Controllers\MainController::class, "menu"])->name("menu");
Route::get("/product", [App\Http\Controllers\MainController::class, "product"])->name("product-page");
Route::get('/special', [App\Http\Controllers\MainController::class, "special"])->name("special");
Route::get('/about', [App\Http\Controllers\MainController::class, "about"])->name("about");
Route::get('/rewiews', [App\Http\Controllers\MainController::class, "rewiews"])->name("rewiews");
Route::get("/user", [App\Http\Controllers\MainController::class, "user"])->name("user");
Route::get("/basket", [App\Http\Controllers\MainController::class, "basket"])->name("basket");
Route::get("/register", [App\Http\Controllers\MainController::class, "registration"])->name("register");
Route::get("/notifications", [App\Http\Controllers\MainController::class, "notification"])->name("notifications");
Route::post("/register/new", [App\Http\Controllers\RegisterController::class, "register"])->name("newUser");
Route::post("/register/login", [App\Http\Controllers\RegisterController::class, "login"])->name("login");
Route::post("/user/change", [App\Http\Controllers\RegisterController::class, "change"])->name("change");
Route::post("/user/add", [App\Http\Controllers\RegisterController::class, "addMoney"])->name("addMoney");
Route::post("/user/delete", [App\Http\Controllers\RegisterController::class, "delete"])->name("delete");
Route::post("/addBasket", [App\Http\Controllers\RegisterController::class, "addBasket"])->name("addBasket");
Route::get("/deleteBasket", [App\Http\Controllers\RegisterController::class, "deleteBasket"])->name("deleteBasket");
Route::get("/deleteNotif", [App\Http\Controllers\RegisterController::class, "deleteNotification"])->name("deleteNotif");
Route::post("/admin/set", [App\Http\Controllers\AdminController::class, "set_admin"])->name("setAdmin");
Route::post("/admin/del",[App\Http\Controllers\AdminController::class, "delete_user"])->name("deleteUser");
Route::get("/logout", [App\Http\Controllers\RegisterController::class, "logout"])->name("logout");
Route::get("/admin", [App\Http\Controllers\MainController::class, "admin_user"])->name("admin");
Route::get("/admin/product", [App\Http\Controllers\MainController::class, "admin_product"])->name("products");
Route::get("/admin/productadd", [App\Http\Controllers\MainController::class, "admin_add_product"])->name("product-add");
Route::post("/admin/newproduct", [App\Http\Controllers\AdminController::class, "add_product"])->name("new-product");
Route::post("/admin/newimage", [App\Http\Controllers\AdminController::class, "add_image"])->name("newImage");
Route::post("/newrewiew", [App\Http\Controllers\AdminController::class, "add_rewiew"])->name("new-rewiew");
Route::get("/admin/rewiews", [App\Http\Controllers\MainController::class, "admin_rewiews"])->name("rewiews-admin");
Route::get("/admin/changePopductPage", [App\Http\Controllers\MainController::class, "admin_change_product"])->name("changeProductPage");
Route::post("/admin/productDelete", [App\Http\Controllers\AdminController::class, "delete_product"])->name("deleteProduct");
Route::post("/admin/changeProduct", [App\Http\Controllers\AdminController::class, "change_product"])->name("changeProduct");
Route::post("/admin/deleteRewiew", [App\Http\Controllers\AdminController::class, "delete_rewiew"])->name("deleteRewiew");
Route::post("/admin/orders", [APP\Http\Controllers\AdminController::class, "admin_orders"])->name("admin:orders");
