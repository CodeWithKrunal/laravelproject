<?php


use App\Models\Listing;
use App\Models\ListingTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Database\Factories\ListingFactory;
use App\Http\Controllers\userController;
use App\Http\Controllers\listinController;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

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




// ALl Listing on listing index blade pages
Route::get('/', [listinController::class, 'index'])->name('homepage');

// All listing on listings.listings blade pages
Route::get('/index', [listinController::class, 'indexLisitng']);

// listing insert view crete on listing.create blade page
Route::get('/listings/create', [listinController::class, 'create'])->middleware('auth');

// Listing date Store
Route::post('/insert', [listinController::class, 'store']);

// Register Form
Route::get('/register', [userController::class, 'register'])->middleware('guest');
Route::post('/user/register', [userController::class, 'registerInsert'])->middleware('guest');

Route::post('/logout', [userController::class, 'logout'])->middleware('auth');

Route::get('/login', [userController::class, 'login'])->name('login')->middleware('guest');

Route::post('/user/login', [userController::class,'loginauthentication'])->middleware('guest');
// update Listing
Route::get('/listings/{listing}/edit', [listinController::class, 'edit'])->middleware('auth');

Route::put('/insert/{listing}', [listinController::class, 'update'])->middleware('auth');
Route::get('/listings/manage', [listinController::class, 'manage'])->middleware('auth');

Route::delete('/listings/{listing}/delete', [listinController::class, 'destroy'])->middleware('auth');

//SIngle lisitng on  listings.show blade pages
Route::get('/show/{listing}',[listinController::class, 'show'])->middleware('auth');

//SIngle lisitng on  listings.listing blade pages
Route::get('/listings/{listing}', [listinController::class, 'showLisitng'])->middleware('auth');










// Route::get('/', function () {
//     return view('listing');
// });

// Route::get('/hello', function(){
//     //return "Hello Krunal. You are with Krunal";
//     return response('<h1>Hello Krunal. You are with Krunal</h1>')
//     ->header('Content-Type', 'text/plain')
//     ->header('foo','bar');
// });

// Route::get('/post/{id}', function($id){
//     //ddd($id);
//     return response('Post '. $id);
// })->where('id','[0-9]+');

// Route::get('/search', function(Request $request){
//   //dd($request);
//   //dd($request->name .' '. $request->city);
//   return $request->name .' '. $request->city;
// });

// Route::get('/', function () {
//     return view('listings',[
//         'heading' => 'Krunal Latest News',
//         'listings' => [
//             [
//                 'id' => 1,
//                 'title' => 'Krunal One',
//                 'description' => 'Loream ipsum description'
//             ],
//             [
//                 'id' => 1,
//                 'title' => 'Krunal One',
//                 'description' => 'Loream ipsum description'
//             ]
//         ]
//     ]);
// });


// Route::get('/', function () {
//     return view('listings',[
//         'heading' => 'Krunal Latest News',
//         'listings' => [
//             [
//                 'id' => 1,
//                 'title' => 'Krunal One',
//                 'description' => 'Loream ipsum description'
//             ],
//             [
//                 'id' => 1,
//                 'title' => 'Krunal One',
//                 'description' => 'Loream ipsum description'
//             ]
//         ]
//     ]);
// });



// all Listing

// Route::get('/', function () {
//     return view('listings',[
//         'heading' => 'Krunal Latest News',
//         'listings' => ListingTest::all()
//     ]);
// });

// // single Listing
// Route::get('/listings/{id}', function($id){
//     return view('listing', [
//         'listing'=> ListingTest::find($id)
//     ]);
// });


// Route::get('/', function () {
//     return view('listings',[
//         'heading' => 'Krunal Latest News',
//         'listings' => Listing::all()
//     ]);
// });


// single Listing

// Route::get('/listings/{id}', function($id){
//     $listingMo = Listing::find($id);
//     if($listingMo){
//     return view('listing', [
//         'listing'=> $listingMo
//     ]);
// } else
// {
//     abort(404);
// }
// });
