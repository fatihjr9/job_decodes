<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    protected $table = 'job_applies';
    protected $fillable = [
        'job_list_id',
        'user_id',
        'photo',
        'name',
        'email',
        'phone',
        'cv',
        'cover_letter',
    ];
    public function jobList()
    {
        return $this->belongsTo(JobList::class, 'job_list_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
