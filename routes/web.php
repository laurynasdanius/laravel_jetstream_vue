<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Workspaces
use App\Http\Controllers\WorkspacesController;
use App\Models\Workspace;

// use App\Models\Workspace;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/test', function () {
    return Inertia::render('TestPage');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/workspace', function () {
        return Inertia::render('Workspace',[
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        ]);
    })->name('workspace');
});
*/
/* 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::resource('workspaces', WorkspacesController::class);
    });
    */ 
   
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        /* Rendering the TestPage.vue file and passing the workspaces variable to it. */
        /* Getting all the workspaces from the database and mapping them to the workspace_name
        variable. */
        Route::get('/workspaces', function () {
            return Inertia::render('TestPage',[
                'workspaces' => Workspace::paginate(3)->through(fn($workspace) => [
                    'id' => $workspace->id,
                    'workspace_name'=> $workspace->workspace_name,
                    'workspace_description'=> $workspace->workspace_description
                ])
            ]);
        })->name('workspaces');
    });
    