<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedRecord extends Model
{
    protected $table  = 'borrowed_records';

    protected $fillable = [
        'name',
        'bookTitle',
        'status'
    ];
}
