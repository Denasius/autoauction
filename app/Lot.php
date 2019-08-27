<?php

namespace App;

use App\LotAttributes;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DebugBar\DebugBar;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;
use App\Attribute;
use App\Bet;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

class Lot extends Model
{
    use Sluggable;


    const TYPE = 'lot';

    const STATUS_ALLOW = 1;
    const STATUS_DISALLOW = 0;

    protected $fillable = ['title', 'desr', 'car_model', 'vin', 'category_id', 'address', 'car_mileage','car_options', 'status', 'views', 'meta_title', 'meta_description', 'image', 'fuel', 'date', 'price', 'currency', 'shipping', 'fees', 'lot_step', 'lot_time', 'lot_start', 'car_brend', 'buy_one_click_price', 'min_bet', 'lot_bet', 'fees_all'];

    public function attributes()
    {
        return $this->belongsToMany(LotAttributes::class);
    }

    public static function add($fields, $main_img) {

        $lot = new Lot();
        $lot->fill($fields);
        $lot->addCheckboxFields( $fields );

        //Главная картинка
        $parth = false;
        if ($main_img) {
            $main_img_name = Lot::generate_image_name($main_img);
            $parth = $main_img->storeAs('uploads', $main_img_name);
        }
        $lot->image = $parth;

        $lot->save();

        //Добавляем ЧПУ
        Aliase::add($lot->title, Lot::TYPE, $lot->id, $lot->template);


        //Добавляем атрибуты
        if (isset($fields['attrs'])) {
            $lot_attr = new LotAttributes();
            foreach ($fields['attrs'] as $value) {
                if ($value) {
                    $lot_attr->create([
                        'attr_id'   => $value,
                        'lot_id'    => $lot->id,
                    ]);
                }
            }
        }

        //Добавляем картинки
        if (isset($fields['images']) && $fields['images'] != null){
            // foreach ( $fields['images']['src'] as $key => $src ) {
            //     $main_img_name = Lot::generate_image_name_base64($src, $fields['images']['name'][$key]);
            //     $img = Image::make($src);
            //     $img->save('uploads/'. $main_img_name);
            //     LotImage::create([
            //         'lot_id'        => $lot->id,
            //         'image_src'     => 'uploads/'. $main_img_name,
            //         'image_alt'     => $fields['images']['alt'][$key],
            //         'image_title'   => $fields['images']['title'][$key],
            //         'image_descr'   => $fields['images']['descr'][$key],
            //     ]);
            // }
            foreach ( $fields['images']['src'] as $key => $src ) {
                if (strripos($src,'uploads/') !== false) {
                    LotImage::create([
                        'lot_id'        => $lot->id,
                        'image_src'     => $src,
                        'image_alt'     => $fields['images']['alt'][$key],
                        'image_title'   => $fields['images']['title'][$key],
                        'image_descr'   => $fields['images']['descr'][$key],
                    ]);
                }else {
                    $main_img_name = Lot::generate_image_name_base64($src, $fields['images']['name'][$key]);
                    $img = Image::make($src);
                    $img->save('uploads/'. $main_img_name);
                    LotImage::create([
                        'lot_id'        => $lot->id,
                        'image_src'     => 'uploads/'. $main_img_name,
                        'image_alt'     => $fields['images']['alt'][$key],
                        'image_title'   => $fields['images']['title'][$key],
                        'image_descr'   => $fields['images']['descr'][$key],
                    ]);
                }
            }
        }

        //Добавляем Тегов
        if (isset($fields['tags'])) {
            $lot_tag = new LotTag();
            foreach ($fields['tags'] as $value) {
                if ($value) {
                    $lot_tag->create([
                        'tag_id' => $value,
                        'lot_id' => $lot->id,
                    ]);
                }
            }
        }
    }

    public static function edit($id ,$fields, $main_img){
        $lot = Lot::find($id);
        $lot->fill($fields);
        $lot->addCheckboxFields( $fields );


        //Главная картинка
        $parth = false;
        if ($main_img) {
            if (strripos($main_img,'uploads/') === false) {
                $main_img_name = Lot::generate_image_name($main_img);
                $parth = $main_img->storeAs('uploads', $main_img_name);
                $lot->image = $parth;
            }
        }

        $lot->save();


        //Добавляем ЧПУ
        Aliase::add($lot->title, Lot::TYPE, $lot->id, $lot->template);


        //Добавляем атрибуты
        $lot_attr = new LotAttributes();
        $lot_attr->where('lot_id', $fields['id'])->delete();
        if (isset($fields['attrs'])) {
            foreach ($fields['attrs'] as $value) {
                if ($value) {
                    $lot_attr->create([
                        'attr_id' => $value,
                        'lot_id' => $fields['id'],
                    ]);
                }
            }
        }

        //Добавляем Тегов
        $lot_tag = new LotTag();
        $lot_tag->where('lot_id', $fields['id'])->delete();
        if (isset($fields['tags'])){
            foreach ($fields['tags'] as $value) {
                if ($value) {
                    $lot_tag->create([
                        'tag_id' => $value,
                        'lot_id' => $fields['id'],
                    ]);
                }
            }
        }

        //Добавляем картинки
        LotImage::where('lot_id', $id)->delete();
        if (isset($fields['images']) && $fields['images'] != null){
            foreach ( $fields['images']['src'] as $key => $src ) {
                if (strripos($src,'uploads/') !== false) {
                    LotImage::create([
                        'lot_id'        => $lot->id,
                        'image_src'     => $src,
                        'image_alt'     => $fields['images']['alt'][$key],
                        'image_title'   => $fields['images']['title'][$key],
                        'image_descr'   => $fields['images']['descr'][$key],
                    ]);
                }else {
                    $main_img_name = Lot::generate_image_name_base64($src, $fields['images']['name'][$key]);
                    $img = Image::make($src);
                    $img->save('uploads/'. $main_img_name);
                    LotImage::create([
                        'lot_id'        => $lot->id,
                        'image_src'     => 'uploads/'. $main_img_name,
                        'image_alt'     => $fields['images']['alt'][$key],
                        'image_title'   => $fields['images']['title'][$key],
                        'image_descr'   => $fields['images']['descr'][$key],
                    ]);
                }
            }
        }

    }

    public function addCheckboxFields($values)
    {
        if ( empty($values['lot_vip']) ) {
            $this->lot_vip = null;
        }else{
            $this->lot_vip = $values['lot_vip'];
        }

        if ( empty($values['car_from_europe']) ) {
            $this->car_from_europe = null;
        }else{
            $this->car_from_europe = $values['car_from_europe'];
        }

        if ( empty($values['buy_one_click']) ) {
            $this->buy_one_click = null;
        }else{
            $this->buy_one_click = $values['buy_one_click'];
        }

        if ( empty($values['tax']) ) {
            $this->tax = null;
        }else{
            $this->tax = $values['tax'];
        }
    }

    public static function remove($id){

        LotAttributes::where('lot_id', $id)->delete();
        LotImage::where('lot_id', $id)->delete();
        LotTag::where('lot_id', $id)->delete();
        Bet::where('lot_id', $id)->delete();
        Aliase::remove(self::TYPE, $id);
        Lot::destroy($id);
    }

    //Генерируем чпу урл для картинки
    public static function generate_image_name($image){
        //Вырезам название файла до первой точки
        $result = stristr($image->getClientOriginalName(), '.', true);
        //Переводим имя в ЧПУ
        $result = SlugService::createSlug(Lot::class, 'image', $result, ['unique' => false]);
        //Добавляем размер файла(для уникальности) и расширение
        $result .= '-' . $image->getClientSize() . '.' . $image->getClientOriginalExtension();
        return $result;
    }

    //Генерируем чпу урл для картинки из base64 кода
    public static function generate_image_name_base64($src, $name) {

        //Имя в нижний регист и получаем расширение файла после
        $name = Str::lower($name);
        $extension = stristr($name, '.');

        //Сохраняем картинку во временнный каталог для получения размера изображения
        $img = Image::make($src);
        $img->save('uploads/temp/size'. $extension);

        //Получаем ия изображения и делаем его ЧПУ
        $result = stristr($name, '.', true);
        $result = SlugService::createSlug(Lot::class, 'image', $result, ['unique' => false]);

        //Добавляем к имени размер файла и расширения)) Все блеать!!!! Ебаный кастыль
        $result .= '-' . $img->filesize() . $extension;

        $img->save('uploads/'. $result);

        return $result;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getFormatString($string, $number = 40)
    {
        return str_limit($string, $number, '...');
    }

    public function getFormatStringWithoutHtml($string, $sympols = 40)
    {
        return strip_tags(str_limit( $string, $sympols, '...' ));
    }

    public function getImage()
    {
        if ( $this->image == null )
            return '/img/no-image.png';

        return '/uploads/' . $this->image;
    }

    public function getSliderThumbnails()
    {
        if ( $this->image == null )
            return '/img/no-image.png';

        $manager = new ImageManager(array('driver' => 'gd'));
        //dd($this->image);
        $image = $manager->make($this->image);
        $image->resize(100, 70, function ($img) {
            $img->aspectRatio();
            $img->upsize();
        });
        $image->save($this->image);
        return '/uploads/' . $image->filename . '-thumb.' . $image->extension;
    }

    public function getFormatDate($value) {
        Date::setLocale('ru_RU');
        return Date::parse($value)->format('d M, Y');
    }

    public function getBrandTitle($brand_id)
    {
        if ( $brand_id != null ){
            $title = CarBrand::where('id', $brand_id)->first();
            return $title->title;
        }
        
    }

    public static function getAllBrands()
    {
        return CarBrand::all();
    }

    public function getCarModelsByBrandId($brand_id)
    {        
        return CarModel::get_models_by_brand($brand_id);
    }

    
    public static function getAttr($filter = false)
    {
        return Attribute::getTreeAttrCategoies($filter);
    }

    public function getPrice($price, $currency)
    {
        if ( $currency == 'BYN' ) {
            return number_format($price, 0, ' ', ' ') . ' ' . $currency;
        }

        if ( $currency == 'EUR' ) {
            return '&#8364; ' . number_format($price, 0, ' ', ' ');
        }
    }

    

    public function getCurrentPrice( $maxBet,  $startPrice, $currency)
    {
        if ( $currency == 'BYN' ) {
            return number_format( ( (int)$maxBet + (int)$startPrice ), 0, ' ', ' ' ) . ' ' . $currency;
        }

        if ( $currency == 'EUR' ) {
            return '&#8364; ' . number_format( ( (int)$maxBet + (int)$startPrice ), 0, ' ', ' ' );
        }
    } 

    public function allow()
    {
        $this->status = Lot::STATUS_ALLOW;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = Lot::STATUS_DISALLOW;
        $this->save();
    }


    public function changeLotStatus()
    {
        if ( $this->status == PageComment::IS_DISALLOW ) {
            return $this->allow();
        }

        return $this->disAllow();
    }

    // Получаю ссылку и название подкатегории на разводящей аукционов
    public static function showSubcategoriesOnAuctionTemlates($template)
    {
        if ( $template === 'auctions' )
            return DB::table('categories')
                    ->join('aliases', 'categories.id', '=', 'aliases.type_id')
                    ->where('aliases.type', 'category')
                    ->where('categories.template', $template)
                    ->where('categories.parent_category', '!=', 0)
                    ->select('categories.title', 'aliases.slug', 'categories.id')
                    ->get();
    }

    public static function getCategoryID($template, $id)
    {
        if ( $template === 'auctions' )
            return Category::where('id', $id)->where('parent_category', '!=', 0)->pluck('id')->first();
            
    }

    // // Устанавливаю mutator для изменения формата даты
    // public function setDateAttribute($value)
    // {
    //     $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
    //     $this->attributes['date'] = $date;
    // }

    // // Устанавливаю accessor для вывода даты из БД в нужном мне формате
    // public function getDateAttribute($value)
    // {
    //     $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
    //     return $date;
    // }
}
