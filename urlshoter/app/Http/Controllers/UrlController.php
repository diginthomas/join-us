<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlModel;
use Illuminate\Support\Facades\Auth;
class UrlController extends Controller
{
    public function home(){
      return view('dashboard');
    }

    public function generateUrl(Request $req){
       $urlmodel=new UrlModel();
       $req->validate(['url'=>['required','url','max:250']]);
        $urlmodel->Url= $req->post('url');
        $urlmodel->Code=codeGenerator();
        $urlmodel->Userid=$req->post('id');
        $urlmodel->save();
      return  response()->json($urlmodel);
    }

    public function getAllUrl($id){
      $urlmodel=new UrlModel();
      $urlData= $urlmodel->getAllurls($id);
        return view('urltables',['allUrls'=>$urlData,'id'=>0]);
    }

    public function toOrginalUrl($code){
      $urlmodel=new UrlModel();
       $urlData= $urlmodel->findUrl($code);
       if($urlData==null){
         return view('error404');
       }else{ 
       $urlmodel->updateCount($urlData->id);
       return redirect()->to($urlData->Url);}
    }
    
    public function delteUrl($id){
      $urlmodel=UrlModel::findOrFail($id);
      $urlmodel->delete();
      return redirect()->back();
    }
    
}

function codeGenerator() {
    $characters = 'hijklmnNOPQRSTUVopqrstuvwxy0123456789abcdefgzABCDEFGHIJKLMWXYZ';
    $randomString = '';
   for ($i = 0; $i <5; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
   return $randomString;
}
  
