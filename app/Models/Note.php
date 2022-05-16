<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'content',
        'image',
        'type',
    ];

    protected $casts = [
        'type'=> NoteType::class,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


     /**
     * Get the parent imageable model (urgent or normal or date).
     */
    // public function noteable()
    // {
    //     return $this->morphTo();
    // }

     /**
     * Get the user that owns the notes.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
