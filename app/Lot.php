<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;
use Illuminate\Support\Facades\Storage;

class Lot extends Model
{
	use Sluggable;
    protected $fillable = ['title', 'text', 'car_model', 'vin', 'year', 'car_mileage', 'tyres', 'car_options', 'status'];
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    /*
    * ***** belongsTo - значит, что Лот принадлежит одной категории, но категория может иметь множество лотов
    */
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    // теги, по типу аварийный, новый и т.д
    public function tags()
    {
    	return $this->belongsToMany(
    		Tag::class,
    		'lot_tags',
    		'lot_id',
    		'tag_id'
    	);
    }

    // марка авто
    public function brands()
    {
    	return $this->belongsToMany(
    		Carbrand::class,
    		'lot_brands',
    		'lot_id',
    		'brand_id'
    	);
    }

    // кол-во цилиндров
    public function cylinders()
    {
    	return $this->belongsToMany(
    		Carcylinders::class,
    		'lot_cylinders',
    		'lot_id',
    		'cylinder_id'
    	);
    }

    // диски
    public function disks()
    {
    	return $this->belongsToMany(
    		Cardisks::class,
    		'lot_disks',
    		'lot_id',
    		'disk_id'
    	);
    }

    // привод
    public function drives()
    {
    	return $this->belongsToMany(
    		Cardrive::class,
    		'lot_drives',
    		'lot_id',
    		'drive_id'
    	);
    }

    // топливо
    public function fuels()
    {
    	return $this->belongsToMany(
    		Carfuel::class,
    		'lot_fuels',
    		'lot_id',
    		'fuel_id'
    	);
    }

    // пробег
    public function mileages()
    {
    	return $this->belongsToMany(
    		Carmileage::class,
    		'lot_mileages',
    		'lot_id',
    		'mileage_id'
    	);
    }

    // объем двигателя
    public function potencias()
    {
    	return $this->belongsToMany(
    		Carpotencia::class,
    		'lot_potencias',
    		'lot_id',
    		'potencia_id'
    	);
    }

    // коробка передач
    public function transmissions()
    {
    	return $this->belongsToMany(
    		Cartransmission::class,
    		'lot_transmissions',
    		'lot_id',
    		'transmission_id'
    	);
    }

    /*
    * Добавляю лот
    * Создаю новый объект
    * заполняю все поля, которые определены в массиве fillable
    * Заплняю id пользователя (всегда будет id админа, но на всякий случай)
    * Сохраняю в бд
    */
    public static function add($fields)
    {
        $lot = new static;
        $lot->fill($fields);
        $lot->save();

        return $lot;
    }

    /*
    * Метод для редактирования 
    */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /*
    * Метод для удаления лота
    * Сначала удаляю картинку, потом весь лот
    */
    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    /*
    * Метод для занрузки картинки
    * Если картинки нет, то и выходим из метода
    * Первым делом удалю картинку, если она есть
    * Формирую название картинки
    * сохраняю
    * Объекту image присваиваю название моей картинки
    * Ложу в таблицу
    */
    public function uploadImage($image)
    {
        if ( $image == null ) return;

        $this->removeImage();

        $filename = str_random(10) . '.' . $image->extension(); // переименовываю картинку
        $image->storeAs('uploads', $filename); // сохраняю в папку uploads
        $this->image = $filename;
        $this->save(); 
    }

    /*
    * Метод для удаления картинки
    */
    public function removeImage()
    {
        if ( $this->image != null )
            Storage::delete('uploads/' . $this->image);
    }

    /*
    * Метод для установления картинки для каждого поста
    * Если картинки нет, то устанавливаю по дефолту
    * Иначе вытаскиваю из папки uploads
    */
    public function getImage()
    {
        if ( $this->image == null )
            return '/img/no-image.png';

        return '/uploads/' . $this->image;
    }

    /*
    * Черновик
    */
    public function setDraft()
    {
        $this->status = Lot::IS_DRAFT;
        $this->save();
    }

    /*
    * Опубликованный
    */
    public function setPublic()
    {
        $this->status = Lot::IS_PUBLIC;
        $this->save();
    }

    /*
    * Метод для смены статуса лота (черновик/опубликованный)
    */
    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    /*
    * Присваиваю каждому лоту id категории
    */
    public function setCategory($id)
    {
        if ( $id == null )
            return;

        $this->category_id = $id;
        $this->save();
    }

    /*
    * Присваиваю каждому лоту id тегов
    */
    public function setTags($id)
    {
        if ( $id == null )
            return;

        $this->tags()->sync($id);
    }

    /*
    * Присваиваю каждому лоту id марки авто
    */
    public function setBrands($id)
    {
        if ( $id == null )
            return;

        $this->brands()->sync($id);
    }

    /*
    * Присваиваю каждому лоту id цилиндров
    */
    public function setCylinders($id)
    {
        if ( $id == null )
            return;

        $this->cylinders()->sync($id);
    }

    /*
    * Присваиваю каждому лоту id дисков
    */
    public function setDisks($id)
    {
        if ( $id == null )
            return;

        $this->disks()->sync($id);
    }

    /*
    * Присваиваю каждому лоту id привода
    */
    public function setDrives($id)
    {
        if ( $id == null )
            return;

        $this->drives()->sync($id);
    }

    /*
    * Присваиваю каждому лоту id вида торлива
    */
    public function setFuels($id)
    {
        if ( $id == null )
            return;

        $this->fuels()->sync($id);
    }

    /*
    * Присваиваю каждому лоту id объема движка
    */
    public function setPotencias($id)
    {
        if ( $id == null )
            return;

        $this->potencias()->sync($id);
    }

    /*
    * Присваиваю каждому лоту id вида коробки передач
    */
    public function setTransmissions($id)
    {
        if ( $id == null )
            return;

        $this->transmissions()->sync($id);
    }

    /*
    * Получаю название категории
    */
    public function getCategoryTitle()
    {
        if ( $this->category != null )
            return $this->category->title;

        return 'Нет категории';
    }

    /*
    * Получаю название тегов
    */
    public function getTagsTitle()
    {
        if ( ! $this->tags->isEmpty() ) 
            return implode(', ', $this->tags->pluck('title')->all());

        return 'Нет тегов';
    }

    /*
    * Получаю название марки
    */
    public function getBrandsTitle()
    {
        if ( ! $this->brands->isEmpty() ) 
            return implode(', ', $this->brands->pluck('title')->all());

        return 'Марка не указана';
    }

    /*
    * Получаю название цилиндров
    */
    public function getCylindersTitle()
    {
        if ( ! $this->cylinders->isEmpty() ) 
            return implode(', ', $this->cylinders->pluck('title')->all());

        return 'Цилиндры не указаны';
    }

    /*
    * Получаю название дисков
    */
    public function getDisksTitle()
    {
        if ( ! $this->disks->isEmpty() ) 
            return implode(', ', $this->disks->pluck('title')->all());

        return 'Диски не указаны';
    }

    /*
    * Получаю название привода
    */
    public function getDrivesTitle()
    {
        if ( ! $this->drives->isEmpty() ) 
            return implode(', ', $this->drives->pluck('title')->all());

        return 'Привод не указан';
    }

    /*
    * Получаю название топлива
    */
    public function getFuelsTitle()
    {
        if ( ! $this->fuels->isEmpty() ) 
            return implode(', ', $this->fuels->pluck('title')->all());

        return 'Топливо не указано';
    }

    /*
    * Получаю объем двигателя
    */
    public function getPotenciasTitle()
    {
        if ( ! $this->potencias->isEmpty() ) 
            return implode(', ', $this->potencias->pluck('title')->all());

        return 'Объем не указан';
    }

    /*
    * Получаю название привода
    */
    public function getTransmissionsTitle()
    {
        if ( ! $this->transmissions->isEmpty() ) 
            return implode(', ', $this->transmissions->pluck('title')->all());

        return 'Привод не указан';
    }
}
