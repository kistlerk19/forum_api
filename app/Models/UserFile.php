<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toArray()
    {
        return [
            "id"=> $this->id,
            'file_path'=> $this->file_name,
            // 'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ];
    }
}
