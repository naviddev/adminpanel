<?php



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web','api']], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});
// Admin Route
Route::group(['middlewareGroups' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login', 'AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login', 'AdminAuth\AuthController@login');
    Route::get('/admin/logout', 'AdminAuth\AuthController@getLogout');

    Route::post('admin/password/email', 'AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset', 'AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}', 'AdminAuth\PasswordController@showResetForm');

    Route::get('/admin', 'AdminController@index');
    //admin profile
    Route::get('/admin/changepassword', 'AdminController@changepasswordshow');
    Route::post('/admin/changepassword', 'AdminController@changepassword');
    Route::get('/admin/setting', 'AdminController@setting');
    Route::post('/admin/setting', 'AdminController@settingUpdate');
    //mailing Routes
    Route::get('/admin/mail/inbox', 'AdminController@inbox');
    Route::get('/admin/inbox/{id}', 'AdminController@mail');
    Route::get('/admin/inbox/{id}/delete', 'AdminController@mailDelete');
    Route::get('/admin/mail/compose', 'AdminController@compose');
    Route::post('/admin/send', 'AdminController@send');
    Route::get('/admin/read', 'AdminController@MailRead');
    Route::get('/admin/mail/sent', 'AdminController@mailSent');
    //user show
    Route::get('/admin/users', 'AdminController@UsersShow');
    Route::get('/admin/users/{id}', 'AdminController@UserShow');
    //user Delete
    Route::get('/admin/Users/delete', 'AdminController@UserDeleteShow');
    Route::get('/admin/users/{id}/delete', 'AdminController@UserDelete');
    //user update
    Route::post('/admin/users/{id}', 'AdminController@UserUpdate');
    //user vip
    Route::get('/admin/Users/Vip', 'AdminController@UserVipShow');
    Route::get('/admin/users/vip/{id}', 'AdminController@UserVip');

  
//   Posts Routes

    Route::get('/admin/posts', 'HomeController@ShowPosts');
    Route::get('/admin/post/{id}', 'HomeController@ShowPostPage');
    //add post
    Route::get('/admin/postAdd', 'HomeController@ShowAddPost');
    Route::post('/admin/post/add', 'HomeController@AddPost');
    //Delete post
    Route::get('/admin/post/{id}/delete', 'HomeController@DeletePosts');
    //edit post
    Route::post('/admin/post/{id}', 'HomeController@EditPost');
    //comments Routes

    //comments show
    Route::get('/admin/comments', 'HomeController@CommentsAllShow');
    Route::get('/admin/comments/new', 'HomeController@CommentsNewShow');
    Route::get('/admin/comments/seen', 'HomeController@CommentsSeenShow');
//seen comments
    Route::get('/admin/comments/{id}/seen', 'HomeController@CommentsSeen');

});

//superAdmin Route
Route::group(['middlewareGroups' => ['web','api']], function () {
 
    //Add admin
    Route::get('/superadmin/newadmin','SuperAdminController@showSetForm');
    Route::post('/superadmin/newadmin','SuperAdminController@SetForm');
    //show admins profile 
    Route::get('/superadmin/admins/{id}','SuperAdminController@adminsShow');
    //update admins profile
    Route::post('/superadmin/admins/{id}','SuperAdminController@adminsUpadte');
    //Delete admins Profile
    Route::get('/superadmin/admins/{id}/delete','SuperAdminController@adminsDelete');
    Route::get('/superadmin/delete','SuperAdminController@adminsDeleteShow');
    //admins feature
    Route::get('/superadmin/feature','SuperAdminController@adminsFeatureShow');
    Route::get('/superadmin/feature/{id}','SuperAdminController@adminsFeature');
    Route::post('/superadmin/feature/{id}','SuperAdminController@adminsFeature');

    Route::get('/superadmin', 'SuperAdminController@index');

});


