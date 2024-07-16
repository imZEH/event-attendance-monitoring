<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'studentId',
        'birthday',
        'yearlevel',
        'course',
        'userType',
        'userId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
