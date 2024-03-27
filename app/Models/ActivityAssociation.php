<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityAssociation extends Model
{
    public function associated()
    {
        return $this->morphTo();
    }
}
