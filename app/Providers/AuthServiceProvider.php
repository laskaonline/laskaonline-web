<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\ItemDeposit;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Wartelsuspas;
use App\Policies\ItemDepositPolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\UserPolicy;
use App\Policies\WartelsuspasPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Appointment::class => AppointmentPolicy::class,
        ItemDeposit::class => ItemDepositPolicy::class,
        Wartelsuspas::class => WartelsuspasPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
