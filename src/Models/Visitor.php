<?php

namespace gadixsystem\visitors\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        "unique_id",
        "header",
        "route",
        "path",
        "method"
    ];
    protected $guarded = [];
    protected $table = 'system_visitors';
}
