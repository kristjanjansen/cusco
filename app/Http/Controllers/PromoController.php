<?php

namespace App\Http\Controllers;

use App;

class PromoController extends Controller {

    public function getRandom() {

        return (new App\Promo)->getRandom();

    }

}
