<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nf extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'nfs';

    protected $primaryKey = 'id';

    protected $fillable = ['value', 'date_issue', 'sender_cnpj', 'sender_name', 'delivery_cnpj', 'delivery_name'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
