<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskLists extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        "title",
        "description",
        "status",
        "priority_level",
        "due_date",
        "assigned_to",
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
