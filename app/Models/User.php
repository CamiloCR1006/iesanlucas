<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Filament\Erp\Resources\UserResource\Pages\CreateUser;
use App\Filament\Erp\Resources\UserResource\Pages\EditUser;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, HasPanelShield, HasRoles, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $dates = ['deleted_at'];

    public static $NAME = 'Nombre';

    public static $EMAIL = 'Correo electrónico';

    public static $PASSWORD = 'Contraseña';

    public static $PASSWORD_CONFIRMATION = 'Confirmar contraseña';

    public static $ROLES = 'Roles';

    public static function getForm(): array
    {
        return [
            Section::make('')
                ->schema([
                    TextInput::make('name')
                        ->label(self::$NAME)
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                        ->label(self::$EMAIL)
                        ->unique(ignoreRecord: true)
                        ->email()
                        ->required(),

                    Select::make('roles')
                        ->label(self::$ROLES)
                        ->preload()
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->required(),
                    Grid::make(2)
                        ->visibleOn(['create'])
                        ->schema([
                            TextInput::make('password')
                                ->label(self::$PASSWORD)
                                ->revealable()
                                ->confirmed()
                                ->password()
                                ->required(),
                            TextInput::make('password_confirmation')
                                ->label(self::$PASSWORD_CONFIRMATION)
                                ->revealable()
                                ->password()
                                ->live(onBlur: false)
                                ->afterStateUpdated(function (CreateUser|EditUser $livewire): void {
                                    $livewire->validateOnly('data.password');
                                })
                                ->required(),
                        ]),

                    Grid::make(2)
                        ->visibleOn(['edit'])
                        ->schema([
                            TextInput::make('password')
                                ->label(self::$PASSWORD)
                                ->revealable()
                                ->confirmed()
                                ->password(),
                            TextInput::make('password_confirmation')
                                ->label(self::$PASSWORD_CONFIRMATION)
                                ->revealable()
                                ->password()
                                ->live(onBlur: false)
                                ->afterStateUpdated(function (CreateUser|EditUser $livewire): void {
                                    $livewire->validateOnly('data.password');
                                }),
                        ]),
                ]),

        ];
    }

    public static function getColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label(self::$NAME)
                ->searchable(),
            TextColumn::make('email')
                ->label(self::$EMAIL)
                ->searchable(),
            TextColumn::make('roles.name')
                ->label(self::$ROLES)
                ->badge(),
        ];
    }
}
