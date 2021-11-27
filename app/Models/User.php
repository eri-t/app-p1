<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Work;
use App\Models\Activity;
use App\Models\Project;
use App\Models\Post;
use App\Models\Network;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'job_title',
        'image',
        'phone_number',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class, 'user_id', 'id');
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'user_id', 'id');
    }

    public function works()
    {
        return $this->hasMany(Work::class, 'user_id', 'id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'user_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function networks()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Network::class,
            'networks_users',
            'user_id',
            'network_id'
        );
    }

    public function getGetImageAttribute($key)
    {
        if ($this->image) {
            return url("storage/$this->image");
        }
    }

    public function getUppercaseAttribute($key)
    {
        return strtoupper($this->name);
    }
}
