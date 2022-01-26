<?php

namespace App\Models;

use App\Traits\CanBeFiltered;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes, CanBeFiltered;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'client_id',
        'status',
        'deadline'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'deadline' => 'date',
    ];

    public function getDeadlineAttribute()
    {
        $deadline = new Carbon($this->deadline);

        return $deadline->format('d/m/Y');
    }
    
}
