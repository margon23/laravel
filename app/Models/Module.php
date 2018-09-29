<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = "modules";
    protected $fillable = [
        "name",
        "page_id",
        "title",
        "description"
    ];

    public function sayfa(){
        return $this->hasOne(Page::class, "id", "page_id");
    }
}
