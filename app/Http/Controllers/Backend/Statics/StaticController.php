<?php

namespace App\Http\Controllers\Backend\Statics;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    public function show(){
        $pages = Page::all();
        return view("backend.static.index",compact("pages"));
    }

    public function newPageShow(){
        return view("backend.static.new-page");
    }

    public function editPageShow($slug){
        $page = Page::where("slug", $slug)->first();
        return view("backend.static.new-page", compact("page"));
    }

    public function update(Request $request, $slug){

        if($request->slug == NULL){
            $slugNew = str_slug($request->name);
        }else{
            $slugNew = str_slug($request->slug);
        }

        $page = Page::where("slug", $slug)->update([
            "title" => $request->title,
            "name" => $request->name,
           "keywords" => $request->keywords,
            "description" => $request->description,
            "slug" => $slugNew
        ]);

        if($page){
            return "Oldu";
        }
    }

    public function create(Request $request){
        $page = new Page();

        if($request->slug == NULL){
            $slug = str_slug($request->name);
        }else{
            $slug = str_slug($request->slug);
        }

        $page->title = $request->title;
        $page->name = $request->name;
        $page->keywords = $request->keywords;
        $page->description = $request->description;
        $page->slug = $slug;

        if($page->save()){
            return [
                "status" => "success",
                "title" => "Başarılı",
                "message" => "Yeni sayfa kaydedildi"
            ];
        }

        return [
            "status" => "error",
            "title" => "Hatalı",
            "message" => "Yeni sayfa kaydedilemedi"
        ];
    }

    public function delete(Request $request){
        $page =  Page::where("id", $request->id)->delete();
        if($page){
            return [
                "status" => "success",
                "title" => "Başarılı",
                "message" => "Sayfa Silindi"
            ];
        }

        return [
            "status" => "error",
            "title" => "Başarılı",
            "message" => "Sayfa silinemedi"
        ];
    }
}
