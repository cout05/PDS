<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $table = 'personal_information';
    protected $guarded = [];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'personal_information_id');
    }
    public function spouse()
    {
        return $this->hasOne(Spouse::class, 'personal_information_id');
    }
    public function children()
    {
        return $this->hasMany(Child::class, 'personal_information_id');
    }
    public function parents()
    {
        return $this->hasMany(ParentRecord::class, 'personal_information_id');
    }
    public function education()
    {
        return $this->hasMany(Education::class, 'personal_information_id');
    }
    public function civilServiceEligibilities()
    {
        return $this->hasMany(CivilServiceEligibility::class, 'personal_information_id');
    }
    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class, 'personal_information_id');
    }
    public function voluntaryWorks()
    {
        return $this->hasMany(VoluntaryWork::class, 'personal_information_id');
    }
    public function learningDevelopments()
    {
        return $this->hasMany(LearningDevelopment::class, 'personal_information_id');
    }
    public function otherInformation()
    {
        return $this->hasOne(OtherInformation::class, 'personal_information_id');
    }
    public function declarations()
    {
        return $this->hasMany(Declaration::class, 'personal_information_id');
    }
    public function references()
    {
        return $this->hasMany(ReferencePerson::class, 'personal_information_id');
    }
    public function identification()
    {
        return $this->hasOne(Identification::class, 'personal_information_id');
    }
}
