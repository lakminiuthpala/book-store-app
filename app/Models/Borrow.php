<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;
use App\Models\Reader;

class Borrow extends Model
{
    use HasFactory , SoftDeletes;
    
    protected $table = 'borrows';
    protected $fillable = ['book_id', 'user_id','is_returned','returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(Reader::class);
    }

}
