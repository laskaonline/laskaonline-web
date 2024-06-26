<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $no_ktp
 * @property string $phone
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $photo
 * @property string|null $job_title
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Collection<int, \App\Models\ItemDeposit> $deposits
 * @property-read int|null $deposits_count
 * @property-read Collection<int, \App\Models\GuestBook> $guestBook
 * @property-read int|null $guest_book_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection<int, \App\Models\Wartelsuspas> $wartelsuspas
 * @property-read int|null $wartelsuspas_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereAddress($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereJobTitle($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereNoKtp($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User wherePhoto($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @property-read Collection<int, \App\Models\Appointment> $appointmentApprove
 * @property-read int|null $appointment_approve_count
 * @property-read Collection<int, \App\Models\Appointment> $appointmentApprove
 * @property-read Collection<int, \App\Models\ItemDeposit> $deposits
 * @property-read Collection<int, \App\Models\GuestBook> $guestBook
 * @property-read Collection<int, \App\Models\ItemDepositApprove> $itemDepositApprove
 * @property-read int|null $item_deposit_approve_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read Collection<int, Permission> $permissions
 * @property-read Collection<int, Role> $roles
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read Collection<int, \App\Models\Wartelsuspas> $wartelsuspas
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';
    protected $guarded = [];

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

    public function photoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->photo ? Storage::url($this->photo) : asset('images/default.png'),
        );
    }

    public function wartelsuspas(): HasMany
    {
        return $this->hasMany(Wartelsuspas::class, 'created_by', 'id');
    }

    public function guestBook(): HasMany
    {
        return $this->hasMany(GuestBook::class, 'created_by', 'id');
    }

    public function deposits(): HasMany
    {
        return $this->hasMany(ItemDeposit::class, 'created_by', 'id');
    }

    public function itemDepositApprove(): HasMany
    {
        return $this->hasMany(ItemDepositApprove::class, 'user_id', 'id');
    }

    public function appointmentApprove(): HasMany
    {
        return $this->hasMany(Appointment::class, 'approve_by', 'id');
    }
}
