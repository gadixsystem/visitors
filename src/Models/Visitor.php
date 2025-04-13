<?php

namespace gadixsystem\visitors\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public const UNIQUE_ID = 'unique_id';
    public const HEADER = 'header';
    public const ROUTE = 'route';
    public const PATH = 'path';
    public const METHOD = 'method';

    protected $fillable = [
        self::UNIQUE_ID,
        self::HEADER,
        self::ROUTE,
        self::PATH,
        self::METHOD,
    ];
    protected $guarded = [];
    protected $table = 'system_visitors';
}
