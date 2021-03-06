<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','UserController@timeline');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
Route::get('about', function(){
   return view("about");
});
Route::get('feedback',function(){
   return view('feedback');
});

Route::post('feedback', ['as' => 'giveFeedback', 'uses' => 'PostController@feedback']);
Route::get('requests', ['as' => 'requests','uses' => 'TagController@requests']);
Route::get('tags/subscribe/{tags}',['as' => 'subscribe','uses' => 'TagController@subscribe']);
Route::get('tags/unsubscribe/{tags}',['as' => 'unsubscribe','uses' => 'TagController@unsubscribe']);
Route::post('tags/request', 'TagController@request_tag');
Route::post('/tags/requests/accept', 'TagController@accept_requested_tag');
Route::get("posts/upvote/{posts}", ['as' => 'postUpVote', 'uses' => 'PostController@upVote']);
Route::get("posts/downvote/{posts}", ['as' => 'postDownVote', 'uses' => 'PostController@downVote']);
Route::get("comments/upvote/{comments}", ['as' => 'commentsUpVote', 'uses' => 'CommentController@upVote']);
Route::get("comments/downvote/{comments}", ['as' => 'commentsDownVote', 'uses' => 'CommentController@downVote']);
Route::get('/timeline', 'UserController@timeLine');
Route::get('/{posts}/comments', 'PostController@getComments');
Route::post('/admins/invite', 'UserController@inviteAdmin');
Route::get('/admins/invitations', 'UserController@invitation_data');
Route::get('/admins/{token}', 'UserController@acceptInvitation');
Route::get('/{users}/history', 'UserController@history');

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');
Route::resource('tags','TagController');
Route::resource('comments', 'CommentController');