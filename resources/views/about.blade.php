@extends("./layouts/layaout")
@section("styles")
   <link rel="stylesheet" href="./css/about.css">
@endsection
@section("description")

@endsection
@section("content")
   <section class="about">
        <h1>О нас</h1>
        <img src="{{ asset("/images/about.jpg") }}">
        <div class="info">
            Добро пожаловать в Pizzarium! Мы — не просто еще одна пиццерия. 
            Мы — команда энтузиастов, объединенных страстью к аутентичной итальянской кухне. 
            Наша миссия — создавать место, где встречаются безупречный вкус, теплое общение и традиции.
            Наша философияМы верим, что хорошая пицца способна объединять людей. В Pizzarium мы создаем атмосферу, в которой одинаково комфортно собраться большой семьей, посидеть с друзьями или устроить романтический вечер. 
            Каждый заказ для нас — это история, которой мы делимся с вами.Загляните к нам в гости, чтобы попробовать кусочек Италии, или сделайте заказ, и мы доставим тепло прямо к вашему порогу!
        </div>
   </section>
    <section class="map">
        <h1>Наши заведения</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1358.3160083274615!2d37.451960350469356!3d55.72340842466657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1782763448397!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
         
        </iframe>
        <div class="info" style="text-align:start;">
            <h2>Адреса</h2>
            <ul>
               <li>
                  ул. Льва Толстого, д. 16, стр. 2
               </li>
               <li>
                  ленинградский проспект, д. 74, корп. 4
               </li>
               <li>
                  1-я Тверская-Ямская улица, д. 28
               </li>
               <li>
                  ул. Нижняя Сыромятническая, д. 10, стр. 4
               </li>
            </ul>
            <h2>Контакты</h2>
            <p>Телефон: 7-928-26-78-145</p>
            <p></p>Email: Pizzarium@gmail.com</p>
        </div>
   </section>
@endsection