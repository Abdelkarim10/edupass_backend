<?php

namespace App\Models;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone_number',
        'date_of_birth',
        'grade_id',
        'school',
        'nationality_id',
        'country_id',
        'governorate_id',
        'district_id',
        'city_id',
        'role_id',
        'profile_pic'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'created_at',
        'updated_at',
        'grade_id',
        'nationality_id',
        'country_id',
        'governorate_id',
        'district_id',
        'city_id',
        'role_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date:d-m-y',
    ];
    protected $table = 'users';

    public function ContactsUs()
    {
        return $this->hasMany(ContactUs::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function assessmentTakens()
    {
        return $this->hasMany(AssessmentTaken::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, "assistant_courses");
    }

    public function chats()
    {
        if ($this->role->name == "assistant") {
            return $this->hasMany(Chat::class, "assistant_id");
        } else {
            return $this->hasMany(Chat::class, "user_id");
        }
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Country::class,"nationality_id");
    }

}
