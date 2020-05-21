<?php

namespace App\Models;

use App\Models\StaffMember;
use Exception;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    protected $table = 'designations';
    public $timestamps = true;
    protected $fillable = [
        'name', 'type',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function staff_members()
    {
        return $this->hasMany(StaffMember::class, 'designation_id', 'id');
    }

    /**
     * Get list of designations [id, value]
     *
     * @return array
     */
    public static function getList()
    {
        return Designation::get()->pluck('name', 'id')->toArray();
    }

    /**
     * Add new designation records
     *
     * @param array $data
     * @return void
     */
    public static function add($data)
    {
        $d = new Designation();
        $d->fill($data);
        try {
            $d->save();
        } catch (\Throwable $th) {
            throw new Exception("Save : " . $th->getMessage(), 1);
        }
    }
}
