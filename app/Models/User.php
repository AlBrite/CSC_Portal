<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Advisor;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, CanResetPassword, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'department_id',
        'role'
    ];

    private static $roles = [
        'advisor' => Advisor::class,
        'student' => Student::class,
        'admin'  => Admin::class,
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
        'password' => 'hashed',
    ];





    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public static function getFillables(array $data = [])
    {
        $class = __CLASS__;
        $obj = new $class;

        $fillables = $obj->fillable;
        if (count($data) === 0) {
            return $fillables;
        }
        return Arr::only($data, $fillables);
    }

    public static function store_user(array $data)
    {

        // If role is not specified, make student as default role
        if (!array_key_exists($data['role'] ?? 'none', self::$roles)) {
            $data['role'] = 'student';
        }


        $userData = User::getFillables($data);

        // Create user account for authentification
        $user = User::create($userData);
        $roleClass = self::$roles[$data['role']];


        $fillables = $roleClass::getFillables($data);
        $fillables['id'] = $user->id;

        // Add User to role table
        $roleClass::create($fillables);

        return $user;
    }


    public static function saveUser(array $userData = [])
    {
        $user = new User();

        if (count($userData) === 0) {
            $data = request()->only($user->fillable);
        } else {
            $data = Arr::only($userData, $user->fillable);
        }


        $user = self::create($data);

        self::register($user, $data);

        return $user;
    }


    private static function register(User $user, array $data = [])
    {

        $instance = match ($user->role) {
            'admin' => new Admin(),
            'advisor' => new Advisor(),
            default => new Student(),
        };

        if ($instance) {
            if ($fillables = $instance->getFillables()) {
                foreach ($fillables as $field) {
                    if (request()->has($field)) {
                        $instance->{$field} = request()->input($field);
                    }
                }
            }

            $instance->id = $user->id;
            $instance->save();
        }
    }

    public static function redirectToDashboard()
    {
        $dashboard = 'login';
        if (auth()->check()) {
            $role = auth()->user()->role;

            $dashboard = $role . '.dashboard';
        }

        return redirect()->route($dashboard);
    }





    public function advisor()
    {
        return $this->hasOne(Advisor::class, 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id');
    }

    public function admin()
    {
        return $this->hasOnly(Admin::class, 'id');
    }


    public static function isStudent()
    {
        return auth()->user()->role === 'student';
    }
    public static function isAdmin()
    {
        return auth()->user()->role === 'admin';
    }
    public static function isAdvisor()
    {
        return auth()->user()->role === 'advisor';
    }
}
