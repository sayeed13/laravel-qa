<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];


    // Make Eloquent Relation
    public function user(){
        return $this->belongsTo(User::class);
    }

    // make slug
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Question URl
    public function getUrlAttribute(){
        return route('questions.show', $this->id);
    }

    //create Date
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute() {
        if ($this->answers > 0) {
            if ($this->best_ans) {
                return "answered-accepted";
            }
            return "answered";
        }else {
            return "unanswered";
        }
    }
}
