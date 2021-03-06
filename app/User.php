<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use \Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'town', 'entity', 'user_name', 'user_surname', 'user_company', 'user_addres', 'user_addres_2',
        'user_country', 'user_region', 'user_index', 'user_phone', 'user_dob', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->confirm_register = Str::random(100);
        $user->save();

        return $user;
    }

    /*
    * метод возвращает изображение, которое загрузил пользователь
    * если пользователь нихера не загрузил, то назначаем ему картинку по дефолту
    */
    public function getImage()
    {
        if ( $this->avatar == null ) {
            return '/img/no-user-image.png';
        }

        return '/uploads/' . $this->avatar;
    }

    public function get_avatar($image){
        return '/uploads/' . $image;
    }


    /*
    * метод для загрузки аватара
    * если ничего не пришло, то выходим отсюда
    * иначе удаляем аватар (при редактировании пользователя) и формируем новый
    */
    public function uploadAvatar($image)
    {
        if ( $image == null ) return;

        $this->removeAvatar();

        $filename = str_random(10) . '.' . $image->extension(); // переименовываю картинку
        $image->storeAs('uploads', $filename); // сохраняю в папку uploads
        $this->avatar = $filename;
        $this->save(); 
    }

    public function edit($fields)
    {
        $this->fill($fields);

        $images = json_encode($fields['images']);
        $this->images = $images;

        $this->save();
    }

    /*
    * генерирую пароль
    * если в глобальном массиве пришло значение null - значит пользователь редактирует свой профиль 
    * значит с паролем ничего не делаем
    * на моменте регистрации идет проверка на заполнение поля password
    */
    public function generatePassword($password)
    {
        if ( $password != null ) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    /*
    * удаляем пользователя вместе с картинкой
    */
    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    /*
    * удаляем аватар, если аватар не пришел в значении null
    */
    public function removeAvatar()
    {
        if ( $this->avatar != null ) 
            Storage::delete('uploads/' . $this->avatar);
    }
}
