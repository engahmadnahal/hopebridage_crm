<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrphanResource;
use App\Models\Orphan;
use Illuminate\Http\Request;


class OrphanController extends Controller
{

    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'personal','index','offline_save']]);
    }

    public function index(){
        $forms = OrphanResource::collection(Orphan::get());

        return $this->apiResponse($forms);

    }


    public function show($id)
    {
        $form = new OrphanResource(Orphan::find($id));   // but here we will limit some fields to return

        if (!Orphan::find($id)) {
            return response()->json(['status' => 404, 'error' => 'not found']);
        } else {
            return response()->json(
                [
                    $form
                ]
            );

        }
    }

    function personal($id = 0, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'guardian_name' => 'required',
            'state_id' => 'required',
            'region_id' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'mobile2' => '',
        ]);
        $data = $request->only('name', 'guardian_name', 'state_id', 'region_id', 'address', 'mobile', 'mobile2','user_id');
        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $data['updated_id'] = auth()->id();
            $data['file_no'] = $this->state_char($request->state_id) . '-' . $id;
            $orphan = Orphan::where('id', $id)->update($data);

        } else {

//            $data['user_id'] = auth()->id();
            $data['user_id'] = 20;
            $data['type'] = 2;
            $orphan = Orphan::create($data);
            $orphan->file_no =  $this->state_char($request->state_id) . '-' . $orphan->id;
            $orphan->save();
        }

        return response()->json(
            [
                new OrphanResource($orphan)
            ]
        );

    }

    public function state_char($char) {
        if($char == 1) {
            return "GZ";
        }elseif($char == 2) {
            return "NR";
        }elseif($char == 3) {
            return "MS";
        }elseif($char == 4) {
            return "KH";
        }else {
            return "RF";
        }

    }

    public function offline_save(Request $request)
    {
        foreach($request->data as $data)
        {
            if($data['personal'])
            {
                $id_number = $data['personal']['id_number'];
                $check = Orphan::where('id_number',$id_number)->first();
                $request->only('', '', '', '', '', '', '','user_id');
                if($check){
                    $Orphan = Orphan::find($check->id);
                    $Orphan->updated_id = auth()->id();
                    $Orphan->file_no = $this->state_char($data['personal']['state_id']) . '-' . $Orphan->id;
                    $Orphan->name = $data['personal']['name'];
                    $Orphan->guardian_name = $data['personal']['guardian_name'];
                    $Orphan->state_id = $data['personal']['state_id'];
                    $Orphan->region_id = $data['personal']['region_id'];
                    $Orphan->address = $data['personal']['address'];
                    $Orphan->mobile = $data['personal']['mobile'];
                    $Orphan->mobile2 = $data['personal']['mobile2'];
                }else{
                    $Orphan = new Orphan();
                    $Orphan->name = $data['personal']['name'];
                    $Orphan->guardian_name = $data['personal']['guardian_name'];
                    $Orphan->state_id = $data['personal']['state_id'];
                    $Orphan->region_id = $data['personal']['region_id'];
                    $Orphan->address = $data['personal']['address'];
                    $Orphan->mobile = $data['personal']['mobile'];
                    $Orphan->mobile2 = $data['personal']['mobile2'];
                    $Orphan->save();
                    $Orphan->file_no =  $this->state_char($data['personal']['state_id']) . '-' . $Orphan->id;
                    $Orphan->save();
                }

            }
        }

        return response()->json(
            [
                new OrphanResource(Orphan::get())
            ]
        );

    }
}