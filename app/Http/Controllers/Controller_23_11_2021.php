<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerProject;
use App\Models\Jeha;
use App\Models\Project;
use App\Models\Setting;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static $data = [];
    protected $user;
    public $my_arr = [];

    public function __construct()
    {
        $this->middleware('auth');

        $setting = Setting::find(1);

        self::$data['sys_title'] = $setting->name.'-'.$setting->sys_name;
        self::$data['sys_name'] = $setting->name;
        self::$data['sys_address'] = $setting->address;
        self::$data['sys_mobile'] = $setting->mobile;
        self::$data['sys_phone'] = $setting->phone;
        self::$data['sys_site'] = $setting->site;
        self::$data['sys_email'] = $setting->email;
        self::$data["date"]=date('Y-m-d');
        self::$data["days"]=array("1"=>"يوم" , "2"=>"يومين" ,"3"=>"3 ايام" ,
                                   "4"=>"4 ايام" , "5"=>"5 ايام","6"=>" 6 ايام" ,
                                   "7"=>"اسبوع","14"=>"اسبوعين","30"=>"شهر");
        self::$data["state_char"]=array(1=>"GZ",2=>"NR",3=>"MS",4=>"KH",5=>"RF");

        //  self::$data["myOnDoing"]=$this->myOnDoing();
    }



    public function myDepartment(){
        return auth()->user()->jeha_id;

    }
    public function treeView($id){

        if($id == NULL)
            $Categorys = Jeha::where('parent_id',NULL)->get();
        else
        $Categorys = Jeha::where('id',$id)->get();

        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
        foreach ($Categorys as $Category) {
            $tree .='<li class="tree-view closed"<a class="tree-name"><input name="jehas_refer[]" type="checkbox" value="'.$Category->id.'">'.$Category->name.'</a>';
            if(count($Category->childs)) {
                $tree .=$this->childView($Category);
            }
        }
        $tree .='<ul>';
        return $tree;
    }
    public function childView($Category){
        $html ='<ul>';
        foreach ($Category->childs as $arr) {
            if(count($arr->childs)){
                $html .='<li class="tree-view closed"><a class="tree-name"><input name="jehas_refer[]" type="checkbox" value="'.$arr->id.'">'.$arr->name.'</a>';
                $html.= $this->childView($arr);
            }else{
                $html .='<li class="tree-view"><a class="tree-name" value="'.$arr->id.'"><input name="jehas_refer[]" type="checkbox" value="'.$arr->id.'">'.$arr->name.'</a>';
                $html .="</li>";
            }

        }

        $html .="</ul>";
        return $html;
    }

    public function IsJehaGeneralManeger(){
        if (auth()->user()->is_maneger == 1 && auth()->user()->department_id == NULL){
            return true;
        }
        return false;
    }

    public function GetJehaChildAsArray($id){
        $Categorys = Jeha::where('id',$id)->get();

        $tree='';
        foreach ($Categorys as $Category) {
            $this->my_arr[] =$Category->id;
            if(count($Category->childs)) {
                $this->getInnerChild($Category);
            }
        }

        return $this->my_arr;
    }

    public function getInnerChild($Category){
        $text ='';
        foreach ($Category->childs as $arr) {
            if(count($arr->childs)){
                $this->my_arr[]=$arr->id;
                 $this->getInnerChild($arr);
            }else{
                $this->my_arr[]=$arr->id;
            }

        }
       // return $text;

    }

//    public function myWaredCount()
//    {
//
//        if( Auth()->user()->is_maneger == 1){
//
//        return PostJeha::all()->where('status', '3')->where('user_id',auth()->user()->id)->count();
//
//       }
//
//        else{
//            return PostUser::all()->where("status", '3')->where('user_id', auth()->user()->id)->count();
//        }
//     //   return 25;
//    }

public function getDataCounters(){

    self::$data["customer_cnt"]=Customer::count();
    self::$data["project_cnt"]=Project::count();
    self::$data["user_cnt"]=User::count();
    self::$data["reciever_cnt"]=CustomerProject::count();

}

}
