<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['name', 'user_id'];

    public function tasks()
  {
    return $this->hasMany(Task::class)->orderBy('order');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function getProjectsWithTasks()
    {
      return self::where('user_id', Auth::user()->id)->with('tasks')->get();
    }
}
