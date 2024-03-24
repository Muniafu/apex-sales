<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $table = 'deals';
    protected $guarded = [];

    // Define relationship with the Account and Contact models
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
