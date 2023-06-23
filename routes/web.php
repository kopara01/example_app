<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');

    // $users = DB::select("select * from users");
    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)',[
    //     'Piotr',
    //     'email@email.com',
    //     'Tilly2013'
    // ]);
    // $user = DB::update('update users set name=? where id=3',['pejoter']);
    // $user = DB::delete('delete from users where id=3');

    // $users = DB::table('users')->get();
    // $users = DB::table('users')->insert([
    //     'name'=>'pejoter1',
    //     'email'=>'pejoter1@gmail.com',
    //     'password'=>'Tilly2013'
    // ]);
    // $users = DB::table('users')->where('id',5)->update(['email'=>'pejoter2@gmail.com']);
    // $users = DB::table('users')->where('id',5)->delete();

    // $users = User::get();
    // $users = User::create([
    //     'name' => 'pjoter',
    //     'email' => 'pjoter5@gmail.com',
    //     'password' => 'Tilly2013',
    // ]);
    // $users = User::where('id', 11)->first();
    // $users = User::first();
    // $users->update([
    //     'email' => 'pojtra@gmail.com',
    // ]);
    // $users = User::find(6);
    // $users->delete();

    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
