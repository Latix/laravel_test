<?php

use App\PostCard;
use App\Models\Post;
use App\Events\NewPost;
use Illuminate\Support\Str;
use App\PostCardSendingService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ChannelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    $post = Post::create([
        'title' => "Testing 123",
        'body'  => "This is the body!"
    ]);

    // event(new NewPost($post));
    // dd(Str::partNumber(3450983443));
    // return Post::all();
    // return Response::errorJson();
    // return;

    // Post::chunk(500, function($posts) {
    //     $count = 0;
    //     foreach ($posts as $post) {
    //         echo "{$count} $post->title <br/>";
    //         $count++;
    //     }
    // });
    // $posts = Post::paginate(10);
    // foreach ($posts as $post) {
    //    echo "{$post->id} $post->title <br/>";
    // }
    // echo $posts->links();
});

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/payment')->namespace('App\Http\Controllers')->group(function()
{
    Route::get('/', 'BankController@index');
});

Route::get('channels',    [ChannelController::class, 'index']);
Route::get('post/create', [PostController::class, 'create']);
Route::get('postcards', function ()
{
    $postcardservice = new PostCardSendingService('us', 4, 6);

    $postcardservice->hello('Hello from coder\'s tape USA!', "kamsikodi@gmail.com");
});

Route::get('facades', function ()
{
    PostCard::hello('Hello Boy', 'kamsikodi@gmail.com');
});
