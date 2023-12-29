<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $casts = [
        'documents' => 'array',
    ];


    public function image()
    {
        $url = asset('uploads').'/'.$this->image; 
        return $url;
    }
}
