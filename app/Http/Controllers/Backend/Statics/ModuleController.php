<?php

namespace App\Http\Controllers\Backend\Statics;

use App\Models\Module;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    public function show(){
        $modules = Module::all();

        return view("backend.static.module-index",compact("modules"));
    }

    public function newModuleShow(){
        $pages = Page::all();
        return view("backend.static.new-module", compact("pages"));
    }

    public function editModuleShow($id){
        $pages = Page::all();
        $module = Module::where("id", $id)->first();
        return view("backend.static.new-module", compact("module", "pages"));
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
        $modul = new Module();



        $modul->title = $request->title;
        $modul->name = $request->name;
        $modul->description = $request->description;
        $modul->page_id = $request->page_id;

        if($modul->save()){
            return [
                "status" => "success",
                "title" => "Başarılı",
                "message" => "Yeni mpdül kaydedildi"
            ];
        }

        return [
            "status" => "error",
            "title" => "Hatalı",
            "message" => "Yeni modül kaydedilemedi"
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
