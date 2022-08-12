<?php

namespace App\Models;

use App\Models\Activity;
use App\Models\CustomerType;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'state_id', 'region_id', 'neighborhood', 'address', 'street', 'mobile', 'mobile2', 'status', 'second_father', 'cus_entry', 'help_jeha_name', 'stage',
        'user_id', 'type', 'researcher_name', 'rejection', 'total',
        'father_name', 'birthday', 'card_no', 'card_no_wife', 'social_id', 'health_id', 'Handicap_type', 'disease', 'qualification_id',
        'family_count', 'male_count', 'female_count', 'other_member', 'other_relation', 'family_count_total', 'child_working', 'child_not_working', 'child_school', 'child_university', 'child_special',
        'job_name', 'income', 'income_sum', 'outcome_sum',
        'house_owner', 'house_type', 'house_material',
        'researcher_opinion', 'researcher_rate'
    ];

    protected $dates = ['birthday'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }

    function incomes()
    {
        return $this->hasMany(CustomerIncome::class, 'customer_id', 'id');
    }

    function social()
    {
        return $this->belongsTo(SocialStatus::class, 'social_id', 'id');
    }

    function health()
    {
        return $this->belongsTo(Health::class, 'health_id', 'id');
    }

    function houseOwner()
    {
        return $this->belongsTo(HouseOwner::class, 'house_owner', 'id');
    }

    function HouseType()
    {
        return $this->belongsTo(HouseType::class, 'house_type', 'id');
    }

    function HouseMaterial()
    {
        return $this->belongsTo(HouseMaterial::class, 'house_material', 'id');
    }

    function qualification()
    {
        return $this->belongsTo(Qualification::class, 'qualification_id', 'id');
    }

    function outcomes()
    {
        return $this->belongsToMany(Outcome::class, 'customer_outcomes', 'customer_id', 'outcome_id')->withPivot('amount');
    }

    function furnitures()
    {
        return $this->belongsToMany(Furniture::class, 'customer_furnitures2', 'customer_id', 'furniture_id')->withPivot('count', 'rate');
    }

//

// additional helper relation for the count
    public function furnituresSum()
    {
        return $this->belongsToMany(Furniture::class,'customer_furnitures2','customer_id')
            ->withPivot('count', 'rate')
            ->selectRaw('sum(customer_furnitures2.rate) as aggregate')
            ->groupBy('customer_id');
    }

// accessor for easier fetching the count
    public function getFurnituresSumAttribute()
    {
        if ( ! array_key_exists('furnituresSum', $this->relations)) $this->load('furnituresSum');

        $related = $this->getRelation('furnituresSum')->first();

        return ($related) ? $related->aggregate : 0;
    }
//

    public static function validateData($request, $obj = "")
    {

        $rules = [
            'cus_name' => "required",
//            'email' => 'unique:users,email_address,'.$user->id
//            'name' => "unique:meals,name," . ($obj ? $obj->id : ""),

            'card_no' => "required|integer|unique:customers,card_no," . ($obj ? $obj->id : ""),
            'card_no_wife' => "required|integer",
            'type' => "required",
            'mobile' => "required",
            'state_id' => "required",
            'region_id' => "required",
            'father_name' => "required",
            'address' => "required",
            'citizin' => "required",
            'region_type' => "required",
            'main_reason' => "required",
            'child_not_working' => "required|integer",
            'child_no' => "required|integer",
            'child_working' => "required|integer",
            'child_yatem_no' => "required|integer",
            'child_university' => "required|integer",
            'child_special' => "required|integer",
            'recieve_help' => "required",
//            'shown_help' => "required",
//            'unrwa_help' => "required",
            'work_day_no' => "required",
            'education' => "required",
            'work' => "required",
            'work_region' => "required",
            'house_owner' => "required",
            'house_type' => "required",
            'house_room' => "required",
            'house_material' => "required",
            'wall_material' => "required",
            'house_shower' => "required",
            'food_gaz' => "required",
            'user_pinion' => "required",
        ];

        $msg = [
            'cus_name.required' => ' الاسم مطلوب',
            'card_no.required' => ' رقم الهوية مطلوب',
            'card_no.unique' => ' رقم الهوية مسجل مسبقا',
            'card_no_wife.required' => "الحقل مطلوب",
            'type.required' => "نوع الحالة مطلوب",
            'mobile.required' => "الجوال مطلوب",
            'state_id.required' => "المحافظة مطلوب",
            'region_id.required' => "المنطقة مطلوب",
            'father_name.required' => "رب الاسرة مطلوب",
            'address.required' => "العنوان مطلوب",
            'citizin.required' => "المواطنة مطلوب",
            'region_type.required' => "نوع السكن مطلوب",
            'main_reason.required' => "سبب الاحتياج مطلوب",
            'child_not_working.required' => "العدد مطلوب",
            'child_working.required' => "العدد مطلوب",
            'child_yatem_no.required' => "العدد مطلوب",
            'child_university.required' => "العدد مطلوب",
            'child_special.required' => "العدد مطلوب",
            'recieve_help.required' => "الحقل مطلوب",
//            'shown_help.required' => "الحقل مطلوب",
//            'unrwa_help.required' => "الحقل مطلوب",
            'work_day_no.required' => "الحقل مطلوب",
            'education.required' => "الحقل مطلوب",
            'work.required' => "الحقل مطلوب",
            'work_region.required' => "الحقل مطلوب",
            'house_owner.required' => "الحقل مطلوب",
            'house_type.required' => "الحقل مطلوب",
            'house_room.required' => "الحقل مطلوب",
            'house_material.required' => "الحقل مطلوب",
            'wall_material.required' => "الحقل مطلوب",
            'house_shower.required' => "الحقل مطلوب",
            'food_gaz.required' => "نوع الوقود مطلوب",
            'user_pinion.required' => "رأي الاخصائي مطلوب",
        ];

        return \Validator::make($request->all(), $rules, $msg);
    }

    protected static function boot()
    {
        parent::boot();

        self::updated(function ($product) {

            $changes = $product->isDirty() ? $product->getDirty() : false;

            if ($changes) {
                $data = "";
                foreach ($changes as $attr => $value) {
                    $data .= $attr . ":{" . $product->getOriginal($attr) . '=>' . $product->$attr . "},";
                }
                Activity::log('customer', " تمت تعديل بيانات المستفيد ({$product->name}) ", $data);

            }

        });

        self::created(function ($model) {
            Activity::log('customer', "تمت اضافة مستفيد جديد برقم " . $model->id);
        });

        self::deleting(function ($model) {
            Activity::log('customer', "تمت حذف مستفيد باسم " . $model->name);

        });


    }

    public function saveData($card_no, $name, $mobile, $email)
    {

        return $this;
    }

    public function getState()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function attachments()
    {
        return $this->hasMany(\App\Models\Attachment::class);
    }

    public function needs()
    {
        return $this->hasMany(\App\Models\CustomerNeed::class, 'customer_id', 'id');
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region_id');

    }

    public function getType()
    {
        return $this->belongsTo(CustomerType::class, 'type')->withDefault(['name' => '']);

    }

    public function childs()
    {
        return $this->hasMany(Family::class, 'customer_id', 'id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault(['name' => 'غير مدخل']);
    }

    public function userUpdated()
    {
        return $this->belongsTo(User::class, 'updated_id');
    }

    function projects()
    {
        return $this->belongsToMany(Project::class, 'customer_projects', 'customer_id', 'project_id')->withPivot('print_id', 'coupon_no', 'note');
    }


    function scopeFilter($q)
    {
        if (request('name'))
            $q->where('name', 'like', "%" . request('name') . "%");
        if (request('type'))
            $q->where('type', request('type'));
        if (request('card_no')) {
            $q->where(function ($q) {
                $q->where('card_no', request('card_no'));
                $q->orWhere('card_no_wife', 'like', '%' . request('card_no') . '%');
            });

        }
        if (request('file_no'))
            $q->where('file_no', 'like', "%" . request('file_no') . "%");
        if (request('total'))
            $q->where('total', '>=', request('total'));
        if (request('total_to'))
            $q->where('total', '<=', request('total_to'));
        if (request('child_no'))
            $q->where('child_no', '>=', request('child_no'));
        if (request('child_no_to'))
            $q->where('child_no', '<=', request('child_no_to'));
        if (request('state'))
            $q->where('state_id', request('state'));
        if (request('region'))
            $q->where('region_id', request('region'));
        if (request('housetype'))
            $q->where('house_type', request('housetype'));
        if (request('material'))
            $q->where('house_material', request('material'));
        if (request('citizin'))
            $q->where('citizin', request('citizin'));
        if (request('region_type'))
            $q->where('region_type', request('region_type'));
        if (request('main_reason'))
            $q->where('main_reason', request('main_reason'));
        if (request('education'))
            $q->where('education', request('education'));
        if (request('work'))
            $q->where('work', request('work'));
        if (request('work_region'))
            $q->where('work_region', request('work_region'));
        if (request('beneficiary_count'))
            $q->has('projects', '>=', request('beneficiary_count'));
        if (request('beneficiary_count_to'))
            $q->has('projects', '<=', request('beneficiary_count_to'));
        if (request('customer_id'))
            $q->where('id', '>=', request('customer_id'));
        if (request('customer_id_to'))
            $q->where('id', '<=', request('customer_id_to'));

        if (request('child_university'))
            $q->where('child_university', '>=', request('child_university'));

        if (request('child_special'))
            $q->where('child_special', '>=', request('child_special'));

        if (request('work_day_no'))
            $q->where('work_day_no', '<=', request('work_day_no'));
        if (request('rejection')) {
            if (request('rejection') == 'reject')
                $q->whereNotNull('rejection');
            else
                $q->whereNull('rejection');
        }

    }

    function calculatePoint()
    {
        $points = 0;
//        add social
        if ($this->social)
            $points += $this->social->values;
//        add health
        if ($this->health)
            $points += $this->health->value;
//        add qualification
        if ($this->qualification)
            $points += $this->qualification->values;

//        add family count
        if ($this->family_count) {
            if (intval($this->family_count) < 5) {
                $points += 4;
            } else if (intval($this->family_count) <= 9) {
                $points += 7;
            } else {
                $points += 9;
            }
        }

//        add other family

        if ($this->other_member == '1') {
            $points += 5;
        }

//        add child working
        if (intval($this->child_working) == 0) {
            $points += 1;
        } else if (intval($this->child_working) <= 2) {
            $points += 3;
        }

        if (intval($this->child_not_working) >= 4) {
            $points += 2;
        } else {
            $points += 1;
        }

        if (intval($this->child_school) >= 5) {
            $points += 3;
        } else if (intval($this->child_school) >= 3) {
            $points += 2;
        } else {
            $points += 1;
        }

        if (intval($this->child_university) >= 4) {
            $points += 4;
        } elseif (intval($this->child_university) >= 2) {
            $points += 3;
        } elseif (intval($this->child_university) >= 1) {
            $points += 2;
        }


        if (intval($this->child_special) >= 3) {
            $points += 5;
        } elseif (intval($this->child_special) >= 1) {
            $points += 3;
        }

//        father income
        if (intval($this->income)) {
            if (intval($this->income) < 1000) {
                $points += 9;
            } elseif (intval($this->income) <= 1500) {
                $points += 7;
            } else {
                $points += 3;
            }
        }


        $remain = intval($this->income) - intval($this->outcome_sum);
        if ($remain < 500) {
            $points += 8;
        } elseif ($remain == 500) {
            $points += 5;
        } else {
            $points += 2;
        }


//        house info

        if ($this->houseOwner) {
            $points += intval($this->houseOwner->values);
        }
        if ($this->HouseType) {
            $points += intval($this->HouseType->values);
        }
        if ($this->HouseMaterial) {
            $points += intval($this->HouseMaterial->values);
        }

        $furnitures_points = $this->furnituresSum;
        $points += $furnitures_points;

        if ($this->researcher_rate) {
            $points += intval($this->researcher_rate);
        }

        $this->update(['total' => $points]);
        return $points;
    }
}
