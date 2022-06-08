<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\{Course};

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        "full_name", "email", "contact", "region", "course_id", "section", "status_id", "created_by", "updated_by"
    ];

    public function course(){
        return $this->hasMany(Course::class, "course_id", "id");
    }
}
