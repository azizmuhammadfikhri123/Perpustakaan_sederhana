<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class penerbit extends Model
{
    use SoftDeletes;
    protected $table = 'penerbit';
    protected $fillable = ['penerbitID', 'nama'];

    public function buku()
    {
        return $this->belongsTo('App\buku')->withTrashed();
    }
}
