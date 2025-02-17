<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model {
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'Ref';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'Ref', 'idClient', 'phone', 'mail', 'address', 'monthSalary',
        'currSalary', 'decision', 'limitItog'
    ];
}
