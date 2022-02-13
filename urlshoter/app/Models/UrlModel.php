<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UrlModel extends Model
{
    use HasFactory;

   public function getAllurls($userid){
       $urlTable =DB::table('url_models')->where('Userid',$userid)->get();
       return $urlTable;
   } 
   public function findUrl($code){
    $urlData =DB::table('url_models')->where('Code',$code)->first();
     return $urlData;
   }
   public function updateCount($id){
    $urlList=UrlModel::find($id);
    $urlList->Clicks++;
    $urlList->save();
   }
}
