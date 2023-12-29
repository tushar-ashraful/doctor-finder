<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Patient extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function image()
    {
        $url = asset('uploads').'/'.$this->image; 
        return $url;
    }

    public function age()
    {
       $bday = new DateTime(str_replace('/','.',$this->dateOfBirth)); 
       $today = new Datetime(date('d.m.y'));
       $diff = $today->diff($bday);
        return "{$diff->y} years, {$diff->m} month, {$diff->d} days";
    }
}
