<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Customer;
use App\Models\CustomerType;
use App\Models\Education;
use App\Models\Family;
use App\Models\FoodGaz;
use App\Models\Furniture;
use App\Models\Health;
use App\Models\HelpType;
use App\Models\HouseGeneralCondition;
use App\Models\HouseMaterial;
use App\Models\HouseOwner;
use App\Models\HouseRoom;
use App\Models\HouseShower;
use App\Models\HouseType;
use App\Models\HouseWallMaterial;
use App\Models\Jender;
use App\Models\main_reason;
use App\Models\Orphan;
use App\Models\OrphanSponser;
use App\Models\Outcome;
use App\Models\Project;
use App\Models\ProjectSponser;
use App\Models\Qualification;
use App\Models\Region;
use App\Models\RegionType;
use App\Models\RelationType;
use App\Models\Salary;
use App\Models\SocialStatus;
use App\Models\State;
use App\Models\UserOpinion;
use App\Models\Work;
use App\Models\WorkRegion;
use App\Models\Yatem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class YatemController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        parent::$data['title'] = 'ادارة كفالة الايتام';
        parent::$data["breadcrumb"] = "كفالة الايتام";
        parent::$data["page_name"] = 'كفالة يتيم';
        parent::$data["route"] = 'Orphan';
        parent::$data["perm"] = 15;
    }

    public function index()
    {

        parent::getDataCounters();

        if (!in_array(35, parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::$data["Projects"] = Project::where('status', 1)->get();
        parent::$data["ProjectSponser"] = ProjectSponser::where('status', 1)->get();
        parent::$data["States"] = State::where('status', 1)->get();
        parent::$data['Regions'] = Region::all();

        return view('yatem.search', parent::$data);

    }

    public function store(Request $request)
    {
        if ($request->ajax()) {

            $child = Family::find($request->child_id);
            if (!isset($child))
                return response(["status" => false, "message" => "لا يوجد بيانات لهذا الابن"], 402);

            $val = Yatem::validateData($request);

            if ($val->fails())
                return response(["status" => false, "message" => $val->messages()], 422);

            $child_id = $request->get('child_id');
            $customer_id = $child->customer_id;
            $project_id = $request->get('project_id');
            $salary = $request->get('salary');
            $currency = $request->get('currency');
            $start_dt = $request->get('start_dt');
            $end_dt = $request->get('end_dt');
            $bank = $request->get('bank');
            $note = $request->get('note');
            $status = $request->get('status');

            $obj = new Yatem();
            $obj->saveData($child_id, $customer_id, $project_id, $salary, $currency, $start_dt, $end_dt, $bank, $note, $status);

            $child->is_yatem = 3;
            $child->save();

            $message = trans("ar.created_successfully");
            return response(["status" => true, "message" => $message], 201);

        }

    }

    public function getAll(Request $request)
    {
        return DataTables::of(Orphan::with('getstate', 'getregion', 'user')->withCount('projects')->filter()
        )
            ->addColumn('action', function ($query) {
                $link = "";
                if (in_array(30, parent::$data["allowedActions"]))
                    $link = $link . '<a href="Orphan/v1/' . $query->id . '/show"  class="btn btn-circle btn-icon-only btn-primary" title="عرض" id="show_btn"> <i class="fa fa-eye"></i> </a>';
                if (in_array(27, parent::$data["allowedActions"]))
                    $link = $link . '<a href="Orphan/v1/' . $query->id . '/edit"  class="btn btn-circle btn-icon-only btn-green" title="تعديل" id="edit_btn"> <i class="fa fa-edit"></i> </a>';
                if (in_array(30, parent::$data["allowedActions"]))
                    $link = $link . '<a href="' . url('' . parent::$data["route"] . '/delete/' . $query->id . '') . '" class="btn btn-circle btn-icon-only btn-danger" id="delete_btn" title="حذف"><i class="fa fa-trash"></i> </a>';
                if (in_array(30, parent::$data["allowedActions"])) {
                    if (!$query->rejection)
                        $link = $link . '<a href="' . url('' . parent::$data["route"] . '/reject/' . $query->id . '') . '" class="btn btn-circle btn-icon-only btn-info reject_btn" title="رفض"><i class="fa fa-ban"></i> </a>';
                    else
                        $link = $link . '<a href="' . url('' . parent::$data["route"] . '/recovery/' . $query->id . '') . '" class="btn btn-circle btn-icon-only btn-success recovery_btn"  title="استرجاع"><i class="fa fa-undo"></i> </a>';

                }
                $link = $link . '<a href="' . url('orphanProject2/' . $query->id) . '" id="project_count" class="btn btn-success">عرض المشاريع</a>';

                return $link;
            })
            ->make(true);
    }

    function reject($id, Request $request)
    {
        $this->validate($request, [
            'rejection' => 'required',
        ], [
            'rejection.required' => 'الرجاء ادخل سبب الرفض'
        ]);

        Orphan::where('id', $id)->update(['rejection' => $request->rejection]);
        return redirect()->back()->with('msg', 'تم رفض اليتيم بنجاح');
    }

    function recovery($id)
    {
        Orphan::where('id', $id)->update(['rejection' => NULL]);

        return redirect()->back()->with('msg', 'تم استرجاع اليتيم بنجاح');

    }

//    public function delete($id){
//
//        $obj=WorkRegion::find($id);
//        if(isset($obj)){
//            $obj->delete();
//            return response(['status'=>true,'message'=>trans('ar.delete_successfully'),201]);
//        }
//        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);
//    }

    public function delete($id)
    {

        $orphan = Orphan::find($id);
        if (isset($orphan)) {
            if ($orphan->delete())
                return response(["status" => true, "message" => trans('ar.delete_successfully'), 200]);
            else  return response(["status" => true, "message" => "حدث مشكلة في الحذف ", 200]);
        } else
            return response(["status" => true, "message" => "لا يوجد يتيم بهدا الاسم ", 200]);

    }

    public function edit($id)
    {

        $obj = Yatem::find($id);
        if (isset($obj)) {

            return response(['status' => true, 'items' => $obj]);
        }
        return response(["status" => false, "message" => trans('ar.unsuccessful_state'), 401]);

    }

    public function update(Request $request, $id)
    {

        if ($request->ajax()) {
            $val = Yatem::validateData($request);

            if ($val->fails())
                return response($val->errors(), 401);

            $obj = Yatem::find($id);
            if (!isset($obj))
                return response(["status" => false, "message" => trans('ar.unsuccessful_state'), 401]);

            $child_id = $obj->child_id;
            $customer_id = $obj->customer_id;
            $project_id = $request->get('project_id');
            $salary = $request->get('salary');
            $currency = $request->get('currency');
            $start_dt = $request->get('start_dt');
            $end_dt = $request->get('end_dt');
            $bank = $request->get('bank');
            $note = $request->get('note');
            $status = $request->get('status');

            if ($obj->saveData($child_id, $customer_id, $project_id, $salary, $currency, $start_dt, $end_dt, $bank, $note, $status))
                return response(["status" => true, "message" => trans("ar.update_successfully")], 201);
            else return response(["status" => false, "errors" => "hello"]);

        }
    }

    public function createsalary()
    {

        parent::getDataCounters();

        parent::$data["route"] = 'OrphanSalary';
        parent::$data["Projects"] = Project::where('status', 1)->get();
        parent::$data["States"] = State::where('status', 1)->get();

        return view('yatem.salary_store', parent::$data);

    }

    public function salaryStore(Request $request)
    {

        $month = $request->get('month');
        $year = $request->get('year');
        $project = $request->get('project');

        $yatems = Yatem::where(function ($q) use ($project) {
            if (isset($project))
                $q->where('project_id', $project);
        })->where('status', 1)->get();

        foreach ($yatems as $yatem) {
            $obj = new Salary();
            $obj->child_id = $yatem->child_id;
            $obj->customer_id = $yatem->customer_id;
            $obj->project_id = $yatem->project_id;
//            $obj->yatem_id = $yatem->id;
            $obj->salary = $yatem->salary;
            $obj->currency = $yatem->currency;
            $obj->month = $month;
            $obj->year = $year;
            $obj->bank = $yatem->bank;
            $obj->note = $yatem->note;
            $obj->user_id = auth()->user()->id;
            $obj->save();

        }

        return response(["status" => true, "message" => trans('ar.created_successfully')]);

    }

    public function details($id)
    {

        parent::getDataCounters();

        parent::$data["route"] = 'OrphanSalary';
        parent::$data["Projects"] = Project::where('status', 1)->get();
        parent::$data["States"] = State::where('status', 1)->get();
        parent::$data["States"] = State::where('status', 1)->get();

        $child = Yatem::with('customer', 'projects', 'child')->where('id', $id)->get()->first();
        parent::$data["yatem"] = $child;

        return view('yatem.details', parent::$data);

    }

    public function getOrphanSalary($id)
    {

        return DataTables::of(Salary::with('project')
            ->where(function ($q) use ($id) {
                $q->where('child_id', $id);
            }))->make(true);

    }

    function create_1()
    {
        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['ProjectSponser'] = ProjectSponser::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseGeneralCondition'] = HouseGeneralCondition::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 2)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();
        parent::$data['orphan'] = $orphan = Orphan::find(session()->get('orphan_id')) ?? (new Orphan());
        parent::$data['stage2'] = session()->get('stage') ?? 0;

        parent::$data['stage'] = $orphan->stage ?? session()->get('stage') ?? 0;
        parent::$data['Qualifications'] = Qualification::orderBy('id', 'asc')->get();
        parent::$data['outcomes'] = Outcome::orderBy('id', 'asc')->get();

        return view('yatem.create', parent::$data);
    }

    function show_1($id)
    {
        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['ProjectSponser'] = ProjectSponser::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 2)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();
        parent::$data['orphan'] = $orphan = Orphan::findOrFail($id);
        parent::$data['Qualifications'] = Qualification::orderBy('id', 'asc')->get();
        parent::$data['outcomes'] = Outcome::orderBy('id', 'asc')->get();
        parent::$data['stage2'] = session()->get('stage') ?? 0;
        parent::$data['help_count'] = OrphanSponser::where('orphan_id', $id)->get()->count();

        return view('yatem.show', parent::$data);
    }

    function edit_1($id)
    {
        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['ProjectSponser'] = ProjectSponser::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 2)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();
        parent::$data['orphan'] = $orphan = Orphan::findOrFail($id);
        parent::$data['orphan']->calculatePoint();
        parent::$data['Qualifications'] = Qualification::orderBy('id', 'asc')->get();
        parent::$data['outcomes'] = Outcome::orderBy('id', 'asc')->get();
        parent::$data['stage2'] = session()->get('stage') ?? 0;
        parent::$data['help_count'] = OrphanSponser::where('orphan_id', $id)->get()->count();

        return view('yatem.create', parent::$data);
    }

    function personal($id = 0, Request $request)
    {
        $this->validate($request, [
            'card_no' => 'required',
            'name' => 'required',
            'state_id' => 'required',
            'region_id' => 'required',
            'guardian_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'mobile2' => '',
        ]);

        $id = $id ?: session()->get('orphan_id');
        if ($request->card_no_wife) {
            $cards = explode(',', $request->card_no_wife);
            $cards = array_map('trim', $cards);
        } else
            $cards = [];
        $cards[] = trim($request->card_no);

        $rs = Customer::query()
            ->where(function ($q) use ($cards) {

                foreach ($cards as $card) {
                    $q->orWhere('card_no', $card)
                        ->orWhere('card_no_wife', 'like', '%' . $card . '%');
                }
            });
        $rs = $rs->first();
        if ($rs)
            return response(['status' => 'fail', 'msg' => 'رقم الهوية متكرر في مستفيد أخر' . $rs->card_no . 'id:' . $rs->id]);


        $find = Orphan::where('id', '!=', $id)->where('card_no', $request->get('card_no'))->get()->first();

        if (isset($find))
            return response(['status' => 'fail', 'msg' => 'رقم الهوية متكرر في سجل الأيتام  ' . ' id:' . $find->id, 'id' => $find->id]);


        $data = $request->only('card_no', 'name', 'state_id', 'region_id', 'guardian_name', 'address', 'mobile', 'mobile2');

        if ($id) {
            $data['updated_id'] = auth()->id();
            $data['file_no'] = $this->state_char([$request->state_id]) . '-' . $id;
            Orphan::where('id', $id)->update($data);
            return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'file_no' => $data['file_no']]);

        } else {
            $data['user_id'] = auth()->id();
            $data['type'] = 2;
            $orphan = Orphan::create($data);
            $data['file_no'] = $this->state_char([$request->state_id]) . '-' . $orphan->id;
            $orphan->file_no = $data['file_no'];
            $orphan->save();
            session()->put('orphan_id', $orphan->id);
            return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'file_no' => $data['file_no']]);

        }
    }

    public function state_char($char)
    {
        if ($char == 1) {
            return "O-GZ";
        } elseif ($char == 2) {
            return "O-NR";
        } elseif ($char == 3) {
            return "O-MS";
        } elseif ($char == 4) {
            return "O-KH";
        } else {
            return "O-RF";
        }

    }

    function information_of_orphan($id = 0, Request $request)
    {

        $this->validate($request, [
            'name' => '',
            'gender' => '',
            'birthday' => '',
            'orphan_missing' => '',
            'academic_achievement' => '',
            'classroom' => '',
            'classroom_subjects_need_support' => '',
            'talents' => '',
            'child_guaranteed' => '',

        ]);

        $data = $request->only('name', 'gender', 'birthday', 'orphan_missing', 'academic_achievement',
            'classroom', 'classroom_subjects_need_support', 'talents', 'child_guaranteed');
        if (!$id)
            $data['stage'] = 2;
        else
            $data['updated_id'] = auth()->id();

        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->first();
            if ($orphan) {
                $orphan->update($data);
                $points = $orphan->calculatePoint();
            }
            $guarantees = [];
            foreach ($request->guaranteed_source ?? [] as $key => $guarantee) {
                $guarantees [] = [
                    'guaranteed_source' => $guarantee,
                    'guaranteed_amount' => $request->guaranteed_amount[$key] ?? '',
                    'guaranteed_period' => $request->guaranteed_period[$key] ?? '',
                ];
            }

            $orphan->guarantees()->delete();
            $orphan->guarantees()->createMany($guarantees);
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function fatherInfo($id = 0, Request $request)
    {

        $this->validate($request, [
            'father_name' => '',
            'father_date_death' => '',
            'father_death_reason' => '',
            'father_previous_profession' => '',
            'father_previous_income' => '',
            'father_savings' => '',

        ]);

        $data = $request->only('father_name', 'father_date_death', 'father_death_reason', 'father_previous_profession', 'father_previous_income', 'father_savings');
        if (!$id)
            $data['stage'] = 3;
        else
            $data['updated_id'] = auth()->id();

        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->first();
            if ($orphan) {
                $orphan->update($data);
                $points = $orphan->calculatePoint();
            }

        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function information_guardian($id = 0, Request $request)
    {

        $this->validate($request, [
            'guardians_name' => '',
            'guardians_age' => '',
            'guardians_card_no' => '',
            'guardians_relative_relation' => '',
            'guardians_qualification' => '',
            'guardians_profession' => '',
            'guardians_income' => '',
            'do_children_live_with_their_mother' => '',
            'do_children_live_with_their_mother_reason' => ''
        ]);

        $data = $request->only('guardians_name', 'guardians_age', 'guardians_card_no', 'guardians_relative_relation', 'guardians_qualification', 'guardians_profession', 'guardians_income', 'do_children_live_with_their_mother', 'do_children_live_with_their_mother_reason');
        if (!$id)
            $data['stage'] = 4;
        else
            $data['updated_id'] = auth()->id();

        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->first();
            if ($orphan) {
                $orphan->update($data);
                $points = $orphan->calculatePoint();
            }

        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function familyComposition($id = 0, Request $request)
    {
        $this->validate($request, [
            'family_count' => 'required|integer',
            'male_count' => 'required|integer',
            'female_count' => 'required|integer',
            'other_member' => 'required|in:0,1',
            'other_relation' => 'required_if:other_member,1',
            'family_count_total' => 'required|integer',
        ]);
        $data = $request->only('family_count', 'male_count', 'female_count', 'other_member', 'other_relation', 'family_count_total');
        if (!$id)
            $data['stage'] = 5;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->first();
            if ($orphan) {
                $orphan->update($data);
                $points = $orphan->calculatePoint();
            }
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function familyEducationalStatus($id = 0, Request $request)
    {
        $this->validate($request, [
            'school_stage_students' => 'required|integer',
            'undergraduate_students' => 'required|integer',
        ]);
        $data = $request->only('school_stage_students', 'undergraduate_students');
        if (!$id)
            $data['stage'] = 6;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->first();
            if ($orphan) {
                $orphan->update($data);
                $points = $orphan->calculatePoint();
            }
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function childPsychologicalHealthCondition($id = 0, Request $request)
    {
        $this->validate($request, [
            'child_health_condition' => 'required|integer',
            'child_psychological_behavioral_state' => 'required|integer',
        ]);
        $data = $request->only('child_health_condition', 'child_psychological_behavioral_state');
        if (!$id)
            $data['stage'] = 7;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->first();
            if ($orphan) {
                $orphan->update($data);
                $points = $orphan->calculatePoint();
            }
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function workInfo($id = 0, Request $request)
    {
        $this->validate($request, [
            'income_source.*' => 'nullable',
            'income_amount' => 'nullable|array|min:1',
            'income_amount.*' => 'nullable|integer',
            'income_side.*' => 'nullable',
        ], [
            'income_amount.required' => 'الرجاء اضافة بيانات الدخل'
        ]);
        $data = array();
        if (!$id)
            $data['stage'] = 8;
        else
            $data['updated_id'] = auth()->id();

        $data['income_sum'] = array_sum($request->income_amount ?? []);
        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->firstOrFail();
            $orphan->update($data);
            $points = $orphan->calculatePoint();
            $incomes = [];
            foreach ($request->income_source ?? [] as $key => $income) {
                $incomes [] = [
                    'income_source' => $income,
                    'income_amount' => $request->income_amount[$key] ?? '',
                    'income_side' => $request->income_side[$key] ?? '',
                ];
            }

            $orphan->incomes()->delete();
            $orphan->incomes()->createMany($incomes);
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function housingData($id = 0, Request $request)
    {
        $this->validate($request, [
            'house_owner' => 'required',
            'house_type' => 'required|integer',
            'house_material' => 'required',
            'other_available' => '',
            'furnitures' => 'required|array',
            'furnitures_rate' => 'required|array',
        ], [
            'house_owner.required' => 'الرجاء اخنر بيانات السكن',
            'house_type.required' => 'الرجاء اخنر نوع السكن',
            'house_material.required' => 'الرجاء اخنر بناء السقف',
        ]);
        $data = $request->only('house_owner', 'house_type', 'house_material', 'other_available');
        if (!$id)
            $data['stage'] = 9;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->firstOrFail();
            $orphan->update($data);
            $points = $orphan->calculatePoint();
            $furnitures = [];

            foreach ($request->furnitures as $key => $furniture) {

                $furnitures [$key] = [
                    'count' => $furniture ?? 0,
                    'rate' => $request->furnitures_rate[$key] ?? 0,
                    'user_id' => auth()->id(),
                ];

            }
            $orphan->furnitures()->sync($furnitures);

            $needs = [];
            foreach ($request->need ?? [] as $key => $need) {
                $needs [] = [
                    'need' => $need,
                    'description' => $request->description[$key] ?? '',
                    'count' => $request->count[$key] ?? '',
                ];
            }

            $orphan->needs()->delete();
            $orphan->needs()->createMany($needs);


        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function researcher($id = 0, Request $request)
    {
        $this->validate($request, [
            'researcher_opinion' => 'required',
            'researcher_rate' => 'required|integer',
        ]);
        $data = $request->only('researcher_opinion', 'researcher_rate');
//        $data = $request->only('researcher_opinion');
        if (!$id)
            $data['stage'] = 10;
        else
            $data['updated_id'] = auth()->id();

        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->firstOrFail();
            $orphan->update($data);
            $points = $orphan->calculatePoint();
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function familyCompositionDetails($id = 0, Request $request)
    {
        $this->validate($request, [
            'child_name' => 'nullable|array',
            'child_dob' => 'nullable|array',
            'child_dob.*' => 'nullable|date_format:Y',
            'child_jender' => 'nullable|array',
            'child_card_no.*' => 'nullable|integer',
            'child_card_no' => 'nullable|array',
            'child_relation' => 'nullable|array',
            'child_qualification' => 'nullable|array',
            'child_social' => 'nullable|array',
            'child_health' => 'nullable|array',
            'child_job' => 'nullable|array',
            'child_salary' => 'nullable|array',
            'child_salary.*' => 'nullable|integer',

        ], [
            'child_dob.*.date_format' => 'يجب ان يكون سنة الميلاد صحيحا',
            'child_card_no.*.integer' => 'يجب ان يكون رقم الهوية رقما صحيحا',
            'child_salary.*.integer' => 'يجب ان يكون الراتب رقما صحيحا',
        ]);

        $data = $request->only('house_owner', 'house_type', 'house_material');
        if (!$id)
            $data['stage'] = 7;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('orphan_id');


        if ($id) {
            $orphan = Orphan::where('id', $id)->firstOrFail();
            $orphan->update($data);
            $points = $orphan->calculatePoint();

            $children = [];
            foreach ($request->child_name ?? [] as $key => $child) {
                $children[] = [
                    'name' => $child,
                    'card_no' => $request->child_card_no[$key] ?? '',
                    'dob' => Carbon::createFromFormat('Y', $request->child_dob[$key]) ?? '',
                    'jender_id' => $request->child_jender[$key] ?? '',
                    'relation' => $request->child_relation[$key] ?? '',
                    'health_id' => $request->child_health[$key] ?? '',
                    'qualification_id' => $request->child_qualification[$key] ?? '',
                    'social_id' => $request->child_social[$key] ?? '',
                    'job' => $request->child_job[$key] ?? '',
                    'salary' => $request->child_salary[$key] ?? '',
                    'is_yatem' => 0,
                    'user_id' => auth()->id()
                ];
            }


            $orphan->childs()->delete();
            $orphan->childs()->createMany($children);
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد يتيم الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function attachments($id = 0, Request $request)
    {

        $this->validate($request, [
            'title.*' => '',
            'name.*' => '',
        ]);

        $data = [];
        foreach ($request->title ?? [] as $key => $title) {
            if ($title) {
                if (isset($request->name[$key]))
                    $path = $request->name[$key]->store('attachments');
                else
                    $path = '';
                $data[] = ['name' => $path, 'title' => $request->title[$key]];
            }
        }
        $id = $id ?: session()->get('orphan_id');

        if ($id) {

            $orphan = Orphan::where('id', $id)->first();
            $orphan->attachments()->whereNotIn('id', $request->ids ?? [])->delete();

            $orphan->attachments()->createMany($data);

        } else {
            return redirect()->back()->with('error', 'لا يوجد يتيم الرجاء البدء من جديد');

        }

        foreach ($request->attachment ?? [] as $key => $attachment) {
            $path = $attachment->store('attachments');
            $orphan->attachments()->where('id', $key)->update(['name' => $path]);

        }


        return redirect()->back()->with('msg', 'تم الحفظ بنجاح')->with('stage', 13);

    }

    function orphan_guarantees($id = 0, Request $request)
    {
        $this->validate($request, [
            'projectSponser.*' => '',
        ]);


        $id = $id ?: session()->get('orphan_id');

        if ($id) {
            $orphan = Orphan::where('id', $id)->first();
            $proj_id = $request->projectSponser;
            if (!isset($proj_id)) {
                return response(["status" => false, "message" => "يجب اختيار الكفلاء", 401]);
            }

            $max_print_id = OrphanSponser::max('print_id') + 1;
            $coupon_no = OrphanSponser::where('sponser_id', $proj_id)->max('coupon_no');

            if (isset($proj_id)) {
                $orphan->projects()->delete();
                $orphan->save();
                $points = $orphan->calculatePoint();

                foreach ($proj_id as $sponser) {
                    $obj = new OrphanSponser();
                    $obj->sponser_id = $sponser;
                    $obj->orphan_id = $orphan->id;
                    $obj->user_id = auth()->user()->id;
                    $obj->note = $request->note;
                    $obj->print_id = $max_print_id;
                    $obj->coupon_no = ++$coupon_no;
                    $obj->save();
                }
            }
            return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);

        } else {
            return redirect()->back()->with('error', 'لا يوجد يتيم الرجاء البدء من جديد');

        }

    }


}