
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/cities', function (Request $request) {
    $indonesia = new \Laravolt\Indonesia\Indonesia();
    if ($request->has('province')) {
        $data = $indonesia->findProvince($request->province, ['cities','districts']);
        return response()->json($data);
    }
});

Route::get('/districts', function (Request $request) {
    $indonesia = new \Laravolt\Indonesia\Indonesia();
    if ($request->has('city')) {
        $data = $indonesia->findCity($request->city, ['districts']);
        return response()->json($data);
    }
});

Route::get('/villages', function (Request $request) {
    $indonesia = new \Laravolt\Indonesia\Indonesia();
    if ($request->has('district')) {
        $data = $indonesia->findDistrict($request->district, ['villages']);
        return response()->json($data);
    }
});