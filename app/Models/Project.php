<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
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
        return $this->hasMany(Task::class)->latest(); //this is a latest scope define down here - latest task will be listed
    }

    public static function boot()
    {
        parent::boot();

       /*  static::addGlobalScope(new LatestScope);
        //better solution is localScope downhere */

    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }
}
