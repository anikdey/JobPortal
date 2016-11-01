<?php


Route::get("/","FrontEndController@homePage");
Route::get("/apply-to-job/{jobId}","FrontEndController@showApplicationFormToJob");
Route::post("/apply-to-job/{jobId}","FrontEndController@saveApplication");


Route::post("/login","LoginController@processLogin");
//Route::get("/","LoginController@showLoginPage");
Route::get("/login","LoginController@showLoginPage");
Route::get("/logout","LoginController@processLogout");

Route::group(['middleware' => ['auth', 'roleAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@welcomeScreen');

    Route::get('/department-list', 'DepartmentController@index');
    Route::get('/department/add-new-department', 'DepartmentController@create');
    Route::post('/department/add-new-department', 'DepartmentController@saveDepartment');
    Route::get('/department/edit/{id}', 'DepartmentController@editDepartmentById');
    Route::post('/department/update/{id}', 'DepartmentController@updateDepartmentById');
    Route::get('/department/show/{id}', 'DepartmentController@showDepartmentById');
    Route::get('/department/delete/{id}', 'DepartmentController@deleteDepartmentById');

   // Route::get('/department/download-department-image/{filename}', 'CountryController@downloadAttachment');


    Route::get('/job-list', 'JobPostController@index');
    Route::get('/job/post-new-job', 'JobPostController@create');
    Route::post('/job/post-new-job', 'JobPostController@saveJob');
    Route::get('/job/edit/{id}', 'JobPostController@editJobPostById');
    Route::post('/job/update/{id}', 'JobPostController@updateJobPostById');
    Route::get('/job/show/{id}', 'JobPostController@showJobPostById');
    Route::get('/job/delete/{id}', 'JobPostController@deleteJobPostById');
    Route::get('/job/application-to-job/{id}', 'JobPostController@showApplicationsByJobId');

    Route::post('/job/ajax-delete-application', 'JobPostController@ajaxDeleteApplicationById');

   // Route::get('/job/search-jobPost', 'CityController@searchCity');
   // Route::post('/jobPost/search-jobPost', 'CityController@performSearch');


    Route::get('/download-cv/{filename}', 'AdminController@downloadAttachment');
    Route::get('/show-cv/{filename}', 'AdminController@showAttachment');

    Route::get('/images/{filename}', function ($filename)
    {
        $path = storage_path() . '\app\uploads\\photos\\' . $filename;
        if(!File::exists($path)) abort(404);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });

});





