<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EspApiController extends Controller
{
    public function search(Request $request)
    {
        $UIDresult = $request->UIDresult;
        dd($UIDresult);
        $Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
        return view('api', compact('Write'));
    }

}
