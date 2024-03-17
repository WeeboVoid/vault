<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word_list extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'wordlist';

    // Define the fillable columns
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'nickname',
        'DOB',
        'phone',
        'favcolor',
        'petname',
        'partnername',
        'user_id', 
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
