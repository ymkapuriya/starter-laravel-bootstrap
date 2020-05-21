<?php

namespace App\Models;

use App\Models\Designation;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class StaffMember extends Model
{
    //
    protected $table = 'staff_members';
    public $timestamps = true;

    //id field can not be mass assigned
    protected $gurarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'birthdate' => 'date',
    ];

    /**
     * Relationships
     */
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }

    /**
     * Derived attributes - Accessors & Mutators
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    public function setQualificationAttribute($value)
    {
        $this->attributes['qualification'] = strtoupper($value);
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getMiddleNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
    public function getFormattedBirthdateAttribute()
    {
        return $this->birthdate ? $this->birthdate->format('M d, Y') : '';
    }
    public function getFullGenderAttribute()
    {
        return Config::get('constants.GENDERS')[$this->gender];
    }

    /**
     * Add new staff member detail
     *
     * @param array $data
     * @return void
     */
    public static function add($data)
    {
        //d($data);
        $sm = new StaffMember();
        foreach ($data as $key => $value) {
            $sm->$key = $value;
        }
        try {
            $sm->save();
        } catch (\Throwable $th) {
            throw new Exception("Save : " . $th->getMessage(), 1);
        }
    }

    /**
     * Update staff member detail
     *
     * @param array $data
     * @return void
     */
    public function safeUpdate($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        try {
            $this->save();
        } catch (\Throwable $th) {
            throw new Exception("Save : " . $th->getMessage(), 1);
        }
    }
}
