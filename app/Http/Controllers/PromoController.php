<?php

namespace App\Http\Controllers;

use App;
use Response;

class PromoController extends Controller {

    public function getRandom() {

        return Response::json((new App\Promo)->getRandom());

    }

}
