<?php
use Illuminate\HTTP\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;
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



Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/', function(){
    return view('index',['tasks'=>\App\Models\Task::all()]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
->name('task.create');


Route::get('/{id}', function($id) {

    return view('show',['task'=>Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/task', function(Request $request){
    dd($request->all());
})->name('task.store');



//Route::get('/hello',function(){
  //  return 'Hello';
//});
//Route::get('/hll',function(){
  //  return redirect('/hello');
//});
//Route::get('/greet/{name}', function($name){
  //  return $name;
//});
Route::fallback(function(){
    return "me nxirr me nje faqe";
});

