<?php

namespace gadixsystem\visitors\Models;

use Illuminate\Database\Eloquent\Model;

class Unique extends Model
{
    protected $fillable = [
        'ip', 'active'
    ];
    public function visitors()
    {
        return $this->hasMany('gadixsystem\visitors\Models\Visitor')->orderBy('created_at', 'desc');
    }

    protected $guarded = [];

    protected $table = 'system_uniques_visitors';
}
