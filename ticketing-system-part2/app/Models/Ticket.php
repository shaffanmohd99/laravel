<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'user_id',
        'title',
        'priority_level_id',
        'status_id',
        'categories_id',
        'description',
        'assign_user_id',
    ];

    public function priorityLevel(){
        return $this->belongsTo(PriorityLevel::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function categories(){
        return $this->belongsTo(Categories::class);

    }
    public function user(){
        return $this->belongsTo(User::class);
}
}
