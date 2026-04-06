<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'price',
        'position_id',
        'location_id',
        'image',
        'status',
        'languages',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Position()
    {
        return $this->belongsTo(Position::class);
    }
    public function Location()
    {
        return $this->belongsTo(Location::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'worker_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'worker_id');
    }

    public function averageRating()
    {
        $totalReviews = $this->reviews->count();
        if ($totalReviews > 0) {
            $totalRatings = $this->reviews->sum('rating');
            return $totalRatings / $totalReviews;
        }
        return 0;
    }
}
