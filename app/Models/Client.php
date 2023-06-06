<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'company_address',
        'email',
        'company_city',
        'contact_person',

    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }


}
