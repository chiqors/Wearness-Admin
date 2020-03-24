<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function device(Request $request)
    {
      $location = 'image/asset/device/'.$request->name;

      move_uploaded_file($_FILES["file"]["tmp_name"], $location);

      echo $location;
    }
}
