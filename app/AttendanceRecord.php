<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    protected $table="attendance_record";
    protected $primaryKey="email";
}
