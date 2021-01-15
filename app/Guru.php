<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['nama', 'telepon', 'alamat'];

    public function mapel()
    {
    	return $this->hasMany(Mapel::class);
    }
}
