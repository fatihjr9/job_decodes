<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    protected $table = 'job_lists';
    protected $fillable = [
        'company_name',
        'company_logo',
        'location',
        'department',
        'job_title',
        'description',
        'published_at',
        'expired_at',
        'status',
    ];
    public function getExpiredDayAttribute()
    {
        return Carbon::parse($this->expired_at)->translatedFormat('l, d F Y');
    }
    public function getPublishedDayAttribute()
    {
        return Carbon::parse($this->published_at)->translatedFormat('l, d F Y');
    }
    public function JobApply()
    {
        return $this->hasMany(JobApply::class, 'job_list_id');
    }
}
