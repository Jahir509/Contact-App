<?php

namespace App;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name', 'address', 'email', 'website'];
 
    public $searchColumns = ['name', 'address', 'email', 'website'];
    
    // Methods
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SearchScope);
    }

    public static function userCompanies(){
        // return auth()->user()->companies()->orderBy('name')->pluck('name','id')->prepend('All Companies','');
        return self::withoutGlobalScopes()->where('user_id', auth()->id())->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');

    }

    // Relationship
    public function contacts(){
        return $this->hasMany(Contact::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
