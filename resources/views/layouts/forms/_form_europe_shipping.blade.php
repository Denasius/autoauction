<form class="col-md-10 form purchase-form" action="{{ route('seller-form') }}" method="post">
  <input type="hidden" name="type" value="europe_shipping">
     <div class="block">
      <label for="name"><span>Имя</span>
      <input type="text" name="name" id="name"></label>
        <label for="phone"><span>Телефон</span>
      <input type="text" name="phone" id="phone"></label>
    </div>
    <div class="block">
      <label for="country"><span>Страна, город, индекс</span>
      <input type="text" name="country" id="country"></label>
        <label for="car_model"><span>Марка, модель авто</span>
      <input type="text" name="car_model" id="car_model" placeholder="Модель автомобиля"></label>
    </div>
    
    <div class="block">
      <label for="info"><span>Дополнительная информация</span>

      <textarea type="text" rows="5" name="info" id="info"></textarea></label>
        <button type="submit">Отправить</button>
    </div>
  </form>