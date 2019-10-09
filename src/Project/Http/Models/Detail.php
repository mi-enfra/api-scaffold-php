<?php
    namespace App\Project\Http\Models;

/**
 * @method static mixed where(string $column, string $value)
 */
class Detail extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $connection = 'sqlite';
    protected $fillable = [
        'version',
        'author',
    ];
    protected $table = 'project_history';
}
