<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
    protected $table = 'dashboards'; // Correct table name as per your database

    protected $fillable = ['websiteUrl', 'yourEmail', 'yourPassword', 'user_id']; // Ensure these fields match your database columns

}
