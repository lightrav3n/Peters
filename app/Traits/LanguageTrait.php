<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

trait LanguageTrait {

    protected function LangSetTrait($id) {
        Session::put('language', $id);
        Session::save();
        App::setLocale($id);
    }

}
