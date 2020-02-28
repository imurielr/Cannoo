<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Certificate;

class CertificateController extends Controller {

    public function get($id) {
        $data = []; //to be sent to the view
        $certificate = Certificate::findOrFail($id);
        $data["title"] = "certificate";
        $data["certificate"] = $certificate;
        return view('certificate.show')->with("data",$data);
    }
}
?>
