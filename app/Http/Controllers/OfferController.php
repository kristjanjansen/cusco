<?php

namespace App\Http\Controllers;

use App;

class OfferController extends Controller {

    public function getRandom() {

        return \App\Offer::getRandom();

    }

}
