<?php

Route::group(["prefix" => "admin", "as" => "backend", "namespace" => "Backend"], function(){
    Route::group(["prefix" => "settings", "as" => ".settings", "namespace" => "Settings"], function(){
        Route::get("/", "SettingsController@show")->name(".show");
        Route::post("/update", "SettingsController@update")->name(".update");
        Route::post("/create", "SettingsController@create")->name(".create");
        Route::post("/delete", "SettingsController@delete")->name(".delete");


    });

    Route::group(["prefix" => "static", "as" => ".static", "namespace" => "Statics"], function (){
       Route::get("/", "StaticController@show")->name(".show");
       Route::get("/yeni-sayfa", "StaticController@newPageShow")->name(".newPageShow");
       Route::post("/yeni-sayfa-olustur", "StaticController@create")->name(".newPageCreate");
       Route::get("/sayfa-duzenle/{slug}", "StaticController@editPageShow")->name(".pageEditShow");
       Route::post("/edit/{slug}", "StaticController@update")->name(".pageEdit");
       Route::post("/delete}", "StaticController@delete")->name(".delete");

        Route::group(["prefix" => "modul", "as" => ".module"], function (){
            Route::get("/", "ModuleController@show")->name(".show");
            Route::get("/yeni-modul", "ModuleController@newModuleShow")->name(".newModuleShow");
            Route::post("/yeni-modul-kaydet", "ModuleController@create")->name(".newModuleCreate");
            Route::get("/duzenle/{id}", "ModuleController@editModuleShow")->name(".editModuleShow");
        });

    });

});

