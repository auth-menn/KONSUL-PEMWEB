<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';

    public function dokter()
    {
        return $this->belongsTo(dokter::class, 'dokter');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

}
