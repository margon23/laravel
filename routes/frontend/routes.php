<?php


Route::group([ "as" => "frontend", "namespace" => "Frontend"], function(){

        Route::get("/", "HomeController@index")->name(".index");

});