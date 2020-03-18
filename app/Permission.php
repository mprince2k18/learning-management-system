<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use LogsActivity;

    protected $table = 'permissions';

    protected $fillable = [
      'name',
      'description',
    ];


    //END
}
