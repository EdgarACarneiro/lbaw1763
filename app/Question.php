<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;

    public function message() {
        return $this->hasOne('App\Message', 'id');
    }

    public function answers() {
        return $this->hasMany('App\Answer')->get();
    }

    public function get_num_answers() {
        return $this->answers()->count();
    }

    public function hasCorrectAnswer() {
        return $this->belongsTo('App\Answer', 'correct_answer')->first();
    }

    public function scopeHighlyVoted($query) {

        return $query->join('messages', "messages.id", "questions.id")
                     ->orderBy('messages.score', 'DESC')->get();
    }

    public function commentable() {
        return $this->belongsTo('App\Commentable');
    }

}