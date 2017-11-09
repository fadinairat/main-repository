<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "HomeController@Index");

Route::get("Page/{page}","PageController@Index");
//Route::get("Page","PageController@Index");
Route::get("About","PageController@getAbout");
//Route::Resource("pages","BlogsController");
Route::Resource("pages", "PagesController");


Route::get("Category/{c_id}/{title?}", "CategoryController@Index");
Route::get("Video/{v_id}/{title?}", "CategoryController@Video");
Route::get("Photo-Gallery", "CategoryController@Photo_Gallery");
Route::get("Test", "TestController@Index");
Route::get("Events","EventsController@Index");

Route::POST("Search/Index","SearchController@Index");
Route::get("Article/{page}/{title?}", "ArticleController@Index");

Route::get("Form","FormController@Index");
Route::POST("Form/Insert","FormController@Insert");
Route::get("Login","LoginController@Index");
Route::POST("Login","LoginController@Index");
Route::get("Logout","LoginController@Logout");
Route::get("Register","RegisterController@Index");
Route::POST("Register/Insert","RegisterController@Insert");
Route::get("Graph","GraphController@Index");
Route::get("Contactus","ContactusController@Index");
Route::POST("Contactus","ContactusController@Index");
Route::get("Ajax/Service/{p_id}","AjaxController@Service");

//Control Routing functions
Route::resource("Control/Categories","Control\CategoriesController@Index");
Route::resource("Control/Templates","Control\TemplatesController");


/*
Route::get("Control/Home","Control\HomeController@Index");

Route::get("Control/Articles","Control\ArticlesController@Index");
Route::get("Control/Tags","Control\TagsController@Index");
Route::get("Control/Files","Control\FilesController@Index");
Route::get("Control/Galleries","Control\GalleriesController@Index");
Route::get("Control/Settings","Control\SettingsController@Index");
Route::get("Control/Users","Control\UsersController@Index");
Route::get("Control/Profile","Control\ProfileController@Index");
Route::get("Control/Menus","Menus\ProfileController@Index");
*/

/*
Route::get('test',function(){
	echo "<form name='form1' method='POST' action='test' >";
	echo "<input type='submit' text='Submit' >";
	echo "<input type='hidden' value='PUT' name='_method' >";

	echo "</form>";
});

Route::put('test', function(){
	echo "PUT";

});


Route::get("Page/About","PageController@About");
Route::get("Page/{Index?}","PageController@Index");



Route::get("page/{id}",function($id){
	$pages = App\Page::where("p_id","=",$id)->first();
	echo $pages->p_subtitle;
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
