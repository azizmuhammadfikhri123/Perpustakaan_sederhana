<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class buku extends Model
{
    use SoftDeletes;
    protected $table = 'books';
    protected $fillable = ['bukuID', 'judul', 'penerbitID', 'pengarang'];

    public function penerbit()
    {
        return $this->hasOne('App\penerbit', 'id', 'penerbitID')->withTrashed();
    }
}
