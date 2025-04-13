<?php

namespace gadixsystem\visitors\Models;

use Illuminate\Database\Eloquent\Model;

class Unique extends Model
{
    public const IP = 'ip';
    public const ACTIVE = 'active';

    protected $fillable = [
        self::IP,
        self::ACTIVE,
    ];
    public function visitors()
    {
        return $this->hasMany('gadixsystem\visitors\Models\Visitor')->orderBy('created_at', 'desc');
    }

    protected $guarded = [];

    protected $table = 'system_uniques_visitors';
}
