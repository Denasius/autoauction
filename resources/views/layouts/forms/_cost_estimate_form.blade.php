<form class="col-md-10 form purchase-form" action="{{ route('seller-form') }}" method="post">
  <input type="hidden" name="type" value="cost_estimate">
     <div class="block">
      <label for="name"><span>Имя</span>
      <input type="text" name="name" id="name" placeholder="Имя"></label>
        <label for="phone"><span>Телефон</span>
      <input type="text" name="phone" id="phone" placeholder="Телефон"></label>
    </div>
    <div class="block">
      <label for="car_brand"><span>Марка</span>
      <input type="text" name="car_brand" id="car_brand" placeholder="Марка автомобиля"></label>
        <label for="car_model"><span>Модель</span>
      <input type="text" name="car_model" id="car_model" placeholder="Модель автомобиля"></label>
    </div>
    <div class="block">
      <label for="year"><span>Год выпуска</span>
      <input type="text" name="year" id="year" placeholder="Год выпуска"></label>

      <label for="engine_size"><span>Объем двигателя</span>
      <input type="text" name="engine_size" id="engine_size" placeholder="Объем двигателя"></label>
      
    </div>

    <div class="block">
      <label for="engine_type"><span>Тип двигателя</span>
      <input type="text" name="engine_type" id="engine_type" placeholder="дизель/бензин/ газ-бензин"></label>

      <label for="kpp"><span>КПП</span>
      <input type="text" name="kpp" id="kpp" placeholder="механика/автомат"></label>
      
    </div>
    <div class="block">
      <label for="min_price_customer"><span>Минимальная цена</span>
      <input type="text" name="min_price_customer" id="min_price_customer" placeholder="Минимальная цена, за которую готовы продать"></label>
        <button type="submit">Отправить</button>
    </div>
  </form>