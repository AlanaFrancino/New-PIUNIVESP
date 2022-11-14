<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EspApiController extends Controller
{
    public function search(Request $request)
    {
        $UIDresult = $request->UIDresult;
        $Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
        file_put_contents(resource_path('views/UIDContainer.blade.php'),$Write);
        return view('api', compact('Write'));
    }

}
