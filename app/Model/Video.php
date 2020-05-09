<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create(array $all)
 */
class Video extends Model
{
    protected $fillable = ['subject_id', 'name', 'embed_code', 'thumbnail'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
