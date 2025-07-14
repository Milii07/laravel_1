<?php
use App\Http\Requests\TaskRequest;
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



//comment test
Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  return view('index', [Task::latest()->paginate(10)]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
  ->name('task.create');

Route::get('/tasks/{task}/edit', function (Task $task) {

  return view('edit', ['task' => $task]);
})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task) {

  return view('show', ['task' => $task]);
})->name('task.show');

Route::post('/task', function (TaskRequest $request) {

  //$data = $request->validated();
  //$task = new Task;
  //$task->title = $data['title'];
  //$task->description = $data['description'];
  //$task->long_description = $data['long_description'];
  //$task->save();
  $task = Task::create($request->validated());

  return redirect()->route('task.show', ['task' => $task->id])
    ->with('success', 'Task create successfully!');
})->name('task.store');


Route::put('/task/{task}', function (Task $task, TaskRequest $request) {


  //$data = $request->validated();
  //$task->title = $data['title'];
  //$task->description = $data['description'];
  //$task->long_description = $data['long_description'];

  //$task->save();
  $task->update($request->validated());

  return redirect()->route('task.show', ['task' => $task->id])
    ->with('success', 'Task update successfully!');
})->name('task.update');

Route::delete('/task/{task}', function (Task $task) {
  $task->delete();

  return redirect()->route('tasks.index')
    ->with('success', 'Task delete successfully');
})->name('tasks.destroy');

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

