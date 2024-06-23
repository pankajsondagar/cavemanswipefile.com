<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    protected $table = 'email_templates';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'subject',
        'description',
        'status',
        'copy_to_admin',
    ];

    public function getList()
    {
        return self::get();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function getBySlug($slug)
    {
        return self::where('slug',$slug)->firstOrFail();
    }
}
