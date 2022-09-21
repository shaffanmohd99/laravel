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
        'status_type_id',
        'category_id',
        'description'
    ];

    public function priorityLevel(){
        return $this->belongsTo(PriorityLevel::class);
    }

    public function statusType(){
        return $this->belongsTo(StatusType::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);

    }
    public function user(){
        return $this->belongsTo(User::class);
}
}
