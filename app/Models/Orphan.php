<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orphan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'user_id', 'type', 'name', 'guardian_name', 'mobile', 'mobile2', 'state_id', 'region_id', 
        'address',  'deleted_at', 'birthday', 'researcher_opinion', 'researcher_rate', 'updated_id', 
        'file_no', 'father_name', 'father_date_death', 'father_death_reason', 'father_previous_profession',
        'father_previous_income', 'father_savings', 'stage','gender', 'card_no', 'orphan_missing', 'classroom', 
        'classroom_subjects_need_support', 'talents', 'child_guaranteed', 'academic_achievement',
        'guardians_name', 'guardians_age', 'guardians_card_no', 'guardians_relative_relation', 'guardians_qualification',
        'guardians_profession', 
        'guardians_income', 'do_children_live_with_their_mother', 'do_children_live_with_their_mother_reason',
        'school_stage_students', 'undergraduate_students', 'child_health_condition', 'child_psychological_behavioral_state',
        'family_count', 'male_count', 'female_count', 'other_member', 'other_relation', 'family_count_total',
        'income_sum',
        'house_owner', 'house_type', 'house_material', 'house_general_condition', 'other_available','total','rejection'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
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
                Activity::log('customer', " تمت تعديل بيانات اليتيم ({$product->name}) ", $data);

            }

        });

        self::created(function ($model) {
            Activity::log('customer', "تمت اضافة يتيم جديد برقم " . $model->id);
        });

        self::deleting(function ($model) {
            Activity::log('customer', "تمت حذف يتيم باسم " . $model->name);

        });


    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault(['name' => 'غير مدخل']);
    }

    function guarantees()
    {
        return $this->hasMany(OrphanGuarantee::class, 'orphan_id', 'id');
    }

    function incomes()
    {
        return $this->hasMany(OrphanIncome::class, 'orphan_id', 'id');
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

    function furnitures()
    {
        return $this->belongsToMany(Furniture::class, 'orphan_furnitures', 'orphan_id', 'furniture_id')->withPivot('count', 'rate');
    }

    public function needs()
    {
        return $this->hasMany(\App\Models\OrphanNeed::class, 'orphan_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(\App\Models\OrphanAttachment::class);
    }

    public function childs()
    {
        return $this->hasMany(OrphanFamily::class, 'orphan_id', 'id');

    }

    public function getState()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region_id');

    }

    function projects()
    {
        return $this->hasMany(OrphanSponser::class, 'orphan_id', 'id');
    }



    protected $dates = ['birthday','father_date_death'];


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
