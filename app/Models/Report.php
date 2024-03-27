<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function fields()
    {
        return $this->hasMany(ReportField::class);
    }

    public function filters()
    {
        return $this->hasMany(ReportFilter::class);
    }
}
