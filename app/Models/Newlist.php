<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newlist extends Model
{
    use HasFactory;

    public function list()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'task',
        'description',
        'due',
        'user_id'
    ];



}
