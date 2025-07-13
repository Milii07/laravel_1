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



Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/', function () {
  return view('index', ['tasks' => Task::all()]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
  ->name('task.create');

Route::get('/tasks/{id}/edit', function ($id) {

  return view('edit', ['task' => Task::findOrFail($id)]);
})->name('task.edit');

Route::get('/tasks/{id}', function ($id) {

  return view('show', ['task' => Task::findOrFail($id)]);
})->name('task.show');

Route::post('/task', function (Request $request) {
  $data = $request->validate([
    'title' => 'required|max:250',
    'description' => 'required',
    'long_description' => 'required'
  ]);

  $task = new Task;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];

  $task->save();

  return redirect()->route('task.show', ['id' => $task->id])
    ->with('success', 'Task create successfully!');
})->name('task.store');


Route::put('/task/{id}', function ($id, Request $request) {
  $data = $request->validate([
    'title' => 'required|max:250',
    'description' => 'required',
    'long_description' => 'required'
  ]);

  $task = Task::findOrFail($id);
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];

  $task->save();

  return redirect()->route('task.show', ['id' => $task->id])
    ->with('success', 'Task update successfully!');
})->name('task.update');



//Route::get('/hello',function(){
//  return 'Hello';
//});
//Route::get('/hll',function(){
//  return redirect('/hello');
//});
//Route::get('/greet/{name}', function($name){
//  return $name;
//});
Route::fallback(function () {
  return "me nxirr me nje faqe";
});

