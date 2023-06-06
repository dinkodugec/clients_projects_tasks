<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'status',
        'client_id',
        'user_id',
        'deadline'
    ];

    public const STATUS = ['open', 'in progress', 'blocked', 'cancelled', 'completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}