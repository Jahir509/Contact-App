<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use App\Scopes\ContactSearchScope;

class Contact extends Model
{
    //
    protected $fillable = ['first_name','last_name','email','phone','address','company_id','user_id'];
    public $filterColumns = ['company_id'];

    public function company(){
        return $this->belongsTo(Company::class)->withoutGlobalScopes();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Create A  Local Scope 
    public function scopeLatestFirst($query){
        return $query->orderBy('id','desc');
    }
    
    // Override Method of Model
    protected static function boot(){
       
       parent::boot();
       static::addGlobalScope(new FilterScope);
       static::addGlobalScope(new ContactSearchScope);
    
    }

}

