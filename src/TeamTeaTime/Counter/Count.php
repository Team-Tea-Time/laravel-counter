<?php namespace TeamTeaTime\Filer;

use Eloquent;

class Count extends Eloquent
{

    // Eloquent properties
    protected $table      = 'counter_counts';
    public    $timestamps = true;
    protected $fillable   = ['user_id', 'key'];
    protected $with       = ['model', 'attachment'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(config('filer.user.model'), 'user_id');
    }

    public function model()
    {
        return $this->morphTo();
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeKey($query, $key)
    {
        return $query->where('key', '=', $key);
    }

}
