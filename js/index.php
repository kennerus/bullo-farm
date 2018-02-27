<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин \"Bullofarm\"");
?>    <body>
    <!-- start header_index.html-->
    <header class="header header_index">
        <nav class="header__nav">
            <div class="container">
                <div class="logo">
                    <a href="/">
                        <picture>
                            <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/logo-small.svg" media="(max-width: 767px)">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.svg" alt="Bullo Farm">
                        </picture>
                    </a>
                </div>

                <div class="header__menu">
                    <div class="menu">
                        <a href="/catalog/">Каталог ферм</a>
                        <a href="/about/">О нас</a>
                    </div>

                    <div class="phone">
                        <span>8 (800) 123 45 67</span>
                    </div>
                </div>
            </div>
        </nav>

        <div class="header__mine">
            <div class="container">
                <div class="mine__desc">
                    <h2 class="mine__title">Продажа, аренда и размещение майнинг ферм</h2>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/farm.png" width="534" height="296" alt=""
                         class="mine__farm">
                </div>
                <div class="mine__calculator">
                    <h3 class="calculator__title">Калькулятор доходности</h3>
                    <div class="calculator__filter">
                        <div class="filter__buttons">
                            <button class="filter__button active_btn">Покупка</button>
                            <button class="filter__button">Аренда</button>
                            <button class="filter__button">Покупка и обслуживание</button>
                        </div>

                        <div class="filter__list-button">
                            <div class="filter__select_wrap" id="header_select">
                                <p class="filter__select_title">Ферма</p>

                                <div class="filter__select">
                                    <span class="filter__select_active">Майнер PANTECH WX6 — 230 000 &#8381;</span>
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/dropdown.jpg" width="9" height="5" alt="">
                                </div>

                                <ul class="filter__select_list">
                                    <li>Майнер PANTECH WX6 — 230 000 &#8381;</li>
                                    <li>Майнер PANTECH WX7 — 460 000 &#8381;</li>
                                    <li>Майнер PANTECH WX8 — 690 000 &#8381;</li>
                                    <li>Майнер PANTECH WX9 — 920 000 &#8381;</li>
                                    <li>Майнер PANTECH WX0 — 100 500 &#8381;</li>
                                </ul>
                            </div>

                            <button class="filter__recount">Пересчитать</button>
                        </div>
                    </div>
                    <div class="calculator__desc">
                        <div class="calculator__desc_block">
                            <p>Вложения <br> <span>230 000 &#8381;</span></p>
                        </div>
                        <div class="calculator__desc_block">
                            <p>Доходность <br> <span>~43 234 &#8381;</span></p>
                        </div>
                        <div class="calculator__desc_block">
                            <p>Окупаемость <br> <span>6 мес</span></p>
                        </div>
                        <div class="calculator__desc_block">
                            <p>Через год <br> <span>~480 000 &#8381;*</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header__pros">
            <div class="container">
                <div class="pension">
                    <div class="pension__desc">
                        <h4>Отличная прибавка к пенсии</h4>
                        <p>Майнер PANTECH SX6, приносит 56 000 000 Р в месяц</p>
                        <a href="#">Подробнее</a>
                    </div>

                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/b1.png" width="258" height="235" alt=""
                         class="pension__img">
                </div>

                <div class="tarifs">
                    <h4>Куй пока горячо</h4>
                    <p>Снижение тарифов на электричество</p>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/b2.png" alt="" width="100" height="138" class="tarifs__img">
                </div>

                <div class="tablet">
                    <h4>Планшет в подарок</h4>
                    <p>При аренде оборудования от 50 000 Р/мес. Планшет со всеми необходимыми программами в подарок</p>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/b3.png" alt="" width="168" height="84" class="tablet__img">
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- end header_index.html-->
    <!-- start content.html-->
    <main class="main">
        <section class="catalogue-index">
            <a class="down" href="#"><img alt="" src="img/down.svg"></a>
            <div class="container dflexcolumn">
                <div class="catalogue-index__head">
                    <h2>Каталог ферм</h2>
                    <div class="catalogue-index__nav"></div>
                </div>
                <div class="catalogue__slider">
                    <?
                    if (CModule::IncludeModule('iblock')) {
                        $num = 0;
                        $arSort = Array("NAME" => "ASC");
                        $arSelect = Array('NAME',
                            'ID',
                            'PREVIEW_PICTURE',
                            'PROPERTY_PROFIT',
                            'PROPERTY_YEARPROFIT',
                            'PROPERTY_RENT',
                            'PROPERTY_YEARRENT',
                            'PROPERTY_PRICE',
                            'PROPERTY_AVAILABLE'
                        );
                        $arFilter = Array("IBLOCK_ID" => 5);

                        $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);

                        while ($ob = $res->GetNextElement()) {
                            $num++;
                            $arFields = $ob->GetFields();
                            //var_dump($arFields);
                            ?>
                            <div class="catalogue__slide">
                                <header class="catalogue__slide_header">
                                    <div class="slide__img"><img alt="" height="182"
                                                                 src="<?= CFile::GetPath($arFields["PREVIEW_PICTURE"]) ?>"
                                                                 width="185"></div>
                                    <div class="cripto-icons"><img alt="" height="24"
                                                                   src="<?= SITE_TEMPLATE_PATH ?>/img/icons/bitcoin.svg"
                                                                   width="24"> <img alt="" height="30"
                                                                                    src="<?= SITE_TEMPLATE_PATH ?>/img/icons/etherium.svg"
                                                                                    width="12"> <img alt="" height="24"
                                                                                                     src="<?= SITE_TEMPLATE_PATH ?>/img/icons/lightcoin.svg"
                                                                                                     width="24"></div>
                                </header>
                                <div class="catalogue__slide_desc">
                                    <h4 class="farm-title"><?= $arFields['NAME'] ?></h4>
                                    <div class="farm-income">
                                        <div class="income__month">
                                            <p>Доходность<span
                                                        class="purple-text"><?= $arFields['PROPERTY_PROFIT_VALUE'] ?></span>
                                            </p>
                                        </div>
                                        <div class="income__year">
                                            <p>Через год<span
                                                        class="purple-text fs18"><?= $arFields['PROPERTY_YEARPROFIT_VALUE'] ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="farm-cost">
                                        <p>Стоимость<span class="fs18"><?= $arFields['PROPERTY_PRICE_VALUE'] ?></span>
                                        </p>
                                        <a class="buy-button" data-fancybox data-src="#modal_desc<?= $arFields['ID'] ?>"
                                           href="javascript:;">Купить</a>
                                    </div>
                                    <div class="farm-rent">
                                        <div class="rent__month">
                                            <p>Аренда<span
                                                        class=" dashedBorder"><?= $arFields['PROPERTY_RENT_VALUE'] ?></span>
                                            </p>
                                        </div>
                                        <div class="rent__service">
                                            <p>Через год<span><?= $arFields['PROPERTY_YEARRENT_VALUE'] ?></span></p>
                                        </div>
                                    </div>
                                    <div class="availability">
                                        <p class="aval">
                                            <? if (intval($arFields['PROPERTY_AVAILABLE_VALUE']) == 1): ?>
                                                <span><img alt=""
                                                           src="<?= SITE_TEMPLATE_PATH ?>/img/check.jpg"></span> Есть в наличии
                                            <? else : ?>
                                                Нет в наличии
                                            <?endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?
                            //print_r($arFields['PROPERTY_PROFIT_VALUE']);
                            //print_r($arFields['PROPERTY_TKAN_VALUE']);
                        }
                    }
                    ?>
                </div>
                <div class="catalogue-index__all">
                    <a class="all-farms" href="/catalog/">Все фермы (<?= $num ?>)</a>
                </div>
            </div>
        </section>

        <section class="cloud dflexcolumn">
            <div class="container">
                <h2 class="cloud__title">Облачный майнинг</h2>
                <div class="cloud__blocks">
                    <div class="cloud__block">
                        <header class="cloud__header">
                            <h3 class="cloud__block_title">White Bull</h3><img alt="" height="47" src="img/bull_w.png"
                                                                               width="43">
                        </header>
                        <div class="cloud__content">
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Минимальный<br>
                                    Хэшрейт
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    1 MH/s
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Плата за<br>
                                    обслуживание
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    0.005 $ / 1 MH/s / 24h
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Оборудование
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    HashCoins SCRYPT
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Контракт
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    1 год
                                </div>
                            </div>
                            <div class="cloud__content-autoBtc">
                                <p class="fs13 greytext ">Автоматические начисления в BTC</p>
                            </div>
                        </div>
                        <footer class="cloud__footer">
                            <p>699 &#8381; <span class="fs13 greytext">за 100 KH/s</span></p>
                            <button class="arend">Арендовать</button>
                        </footer>
                    </div>
                    <div class="cloud__block">
                        <header class="cloud__header">
                            <h3 class="cloud__block_title">White Bull</h3><img alt="" height="47" src="img/bull_g.png"
                                                                               width="43">
                        </header>
                        <div class="cloud__content">
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Минимальный<br>
                                    Хэшрейт
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    1 MH/s
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Плата за<br>
                                    обслуживание
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    0.005 $ / 1 MH/s / 24h
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Оборудование
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    HashCoins SCRYPT
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Контракт
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    1 год
                                </div>
                            </div>
                            <div class="cloud__content-autoBtc">
                                <p class="fs13 greytext ">Автоматические начисления в BTC</p>
                            </div>
                        </div>
                        <footer class="cloud__footer">
                            <p>1299 &#8381; <span class="fs13 greytext">за 100 KH/s</span></p>
                            <button class="arend">Арендовать</button>
                        </footer>
                    </div>
                    <div class="cloud__block">
                        <header class="cloud__header">
                            <h3 class="cloud__block_title">White Bull</h3><img alt="" height="47" src="img/bull_p.png"
                                                                               width="43">
                        </header>
                        <div class="cloud__content">
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Минимальный<br>
                                    Хэшрейт
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    1 MH/s
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Плата за<br>
                                    обслуживание
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    0.005 $ / 1 MH/s / 24h
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Оборудование
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    HashCoins SCRYPT
                                </div>
                            </div>
                            <div class="table">
                                <div class="fs13 greytext cell">
                                    Контракт
                                </div>
                                <div class="cell-dot"></div>
                                <div class=" cell width160">
                                    1 год
                                </div>
                            </div>
                            <div class="cloud__content-autoBtc">
                                <p class="fs13 greytext ">Автоматические начисления в BTC</p>
                            </div>
                        </div>
                        <footer class="cloud__footer">
                            <p>2399 &#8381; <span class="fs13 greytext">за 100 KH/s</span></p>
                            <button class="arend">Арендовать</button>
                        </footer>
                    </div>
                </div>
            </div>
        </section>

        <section class="techpark">
            <div class="techpark__desc">
                <div class="container">
                    <h2 class="techpark__desc-title">5000 м<sup>2</sup><br>
                        цифрового<br>
                        удовольствия</h2>
                    <h3>Технопарк</h3>
                    <p>BulloFarm входит в Резиденты индустриального технопарка «Усолье-Промтех» и пользуется льготами,
                        предусмотренными как «Законом Иркутской области об индустриальных (промышленных) парках,
                        технопарках в Иркутской области», так и Федеральным законом «О территориях опережающего
                        социально-экономического развития в Российской Федерации».</p><a href="#">Подробнее</a>
                </div>
            </div>
            <div class="techpark__features">
                <div class="container">
                    <h2 class="techpark__features-title">Особенности</h2>
                    <div class="features__blocks">
                        <div class="features__block">
                            <img alt="" src="img/pick1.svg">
                            <h4>Зона ТОР</h4>
                            <p>Площадка находится на Территории опережающего социально-экономического развития в
                                Российской Федерации</p>
                        </div>
                        <div class="features__block">
                            <img alt="" src="img/pick2.svg">
                            <h4>Бесперебойный канал электричества</h4>
                            <p>Своя подстанция и круглосуточное наблюдение специалистов. А так же аварийная
                                подстанция.</p>
                        </div>
                        <div class="features__block">
                            <img alt="" src="img/pick3.svg">
                            <h4>Обслуживание 23 часа</h4>
                            <p>Три смены специалистово обслуживают фермы о следят чтобы всё было ок.</p>
                        </div>
                        <div class="features__block">
                            <img alt="" src="img/pick4.svg">
                            <h4>Дешевое электричество</h4>
                            <p>Технопарк входит в зону льготной электроэнергии, что делает майнинг ещё прибыльнее.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bid">
            <div class="container">
                <div class="bid__desc">
                    <h2 class="bid__title">Совместная покупка</h2>
                    <p>Вы оставляете заявку на определенную сумму и ожидаете подтверждения на дополнительного обладателя
                        оборудования. После этого с вами заключается договор на покупку оборудования и на дальнейшую его
                        установку в Усолье Промтех. </p>
                    <a href="#">Оставить заявку</a>
                </div>
            </div>
        </section>

        <section class="provider">
            <div class="container">
                <h2>Надёжный поставщик</h2>
                <div class="provider__desc">
                    <div class="provider__text">
                        <p>Мы официальные поставщики оборудования компании Bitmain.</p>
                        <p>Работаем с сентября 2017 года.</p>
                        <p>За это время в Россию мы привезли и продали 512 ферм Bitmain разной модификации.</p>
                    </div>

                    <div class="provider__serts">
                        <img src="img/sert-01.jpg" alt=""><img src="img/sert-02.jpg" alt=""><img src="img/sert-03.jpg"
                                                                                                 alt=""><img
                                src="img/sert-04.jpg" alt=""><img src="img/sert-05.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="warranty">
            <div class="container">
                <h2>Гарантийное обслуживание</h2>
                <div class="warranty__blocks">
                    <div class="warranty__block">
                        <div class="warranty__number">
                            <span>1</span><img class="warranty__arrow" src="img/arrow.jpg" alt="">
                        </div>

                        <div class="warranty__text">
                            <p>Оставляете заявку <br> на ремонт</p>
                        </div>
                    </div>

                    <div class="warranty__block">
                        <div class="warranty__number">
                            <span>2</span><img class="warranty__arrow" src="img/arrow.jpg" alt="">
                        </div>

                        <div class="warranty__text">
                            <p>Оператор <br> связывается с вами</p>
                        </div>
                    </div>

                    <div class="warranty__block">
                        <div class="warranty__number">
                            <span>3</span><img class="warranty__arrow" src="img/arrow.jpg" alt="">
                        </div>

                        <div class="warranty__text">
                            <p>Курьер забирает <br> оборудование</p>
                        </div>
                    </div>

                    <div class="warranty__block">
                        <div class="warranty__number">
                            <span>4</span>
                        </div>

                        <div class="warranty__text">
                            <p>Через 3 дня вы получаете <br> отремонтированное оборудование</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="delivery">
            <div class="container">
                <div class="delivery__wrap">
                    <h2>Доставка</h2>

                    <div class="delivery__blocks">
                        <div class="delivery__block">
                            <p class="fs13">Куда доставить</p>

                            <form class="delivery__choise" id="where_deliver">
                                <input id="to_techpark" type="radio" name="where_deliver" checked>
                                <label for="to_techpark">В технопарк</label>

                                <input class="another_place" id="another_place" type="text" placeholder="В другое место"
                                       name="where_deliver">
                            </form>
                        </div>

                        <div class="delivery__block">
                            <p class="fs13">Компания</p>

                            <form class="delivery__choise" id="how_deliver">
                                <input id="ems" type="radio" name="how_deliver" checked>
                                <label for="ems">EMS</label>

                                <input id="dhl" type="radio" name="how_deliver">
                                <label for="dhl">DHL</label>
                            </form>
                        </div>

                        <div class="delivery__block filter__select_wrap" id="delivery_select">
                            <p class="fs13">Ферма</p>

                            <div class="filter__select">
                                <span class="filter__select_active">Майнер PANTECH WX6 — 230 000 &#8381;</span>
                                <img src="img/dropdown.jpg" width="9" height="5" alt="">
                            </div>

                            <ul class="filter__select_list">
                                <li>Майнер PANTECH WX6 — 230 000 &#8381;</li>
                                <li>Майнер PANTECH WX7 — 460 000 &#8381;</li>
                                <li>Майнер PANTECH WX8 — 690 000 &#8381;</li>
                                <li>Майнер PANTECH WX9 — 920 000 &#8381;</li>
                                <li>Майнер PANTECH WX0 — 100 500 &#8381;</li>
                            </ul>
                        </div>

                        <div class="delivery__block delivery__count">
                            <button class="filter__recount filter__recount_delivery">Пересчитать</button>
                            <span class="final__cost">5 531 &#8381;</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="news news_index">
            <div class="container">
                <header class="news__header">
                    <h2>Новости</h2>
                    <a href="/news/">Все новости</a>
                </header>

                <div class="news__blocks news__blocks_slick">
                    <?
                    if (CModule::IncludeModule('iblock')) {
                        $num = 0;
                        $arSort = Array("NAME" => "ASC");
                        $arSelect = Array();
                        $arFilter = Array("IBLOCK_ID" => 4);

                        $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);

                        while ($ob = $res->GetNextElement()) {
                            $num++;
                            $arFields = $ob->GetFields();
                            //var_dump($arFields);
                            ?>
                            <acticle class="news__block">
                                <div class="article__content">
                                    <a class="featured_img" href="/news/detail.php?ID=<?= $arFields['ID'] ?>">
                                        <img src="<?= CFile::GetPath($arFields["PREVIEW_PICTURE"]) ?>" alt="">
                                    </a>
                                    <h4 class="article__title">
                                        <a href="/news/detail.php?ID=<?= $arFields['ID'] ?>"><?= $arFields['NAME'] ?></a>
                                    </h4>
                                    <p class=" article__text"><?= $arFields['PREVIEW_TEXT'] ?></p>
                                </div>
                                <time class="fs13 greytext"><?= $arFields['DATE_CREATE'] ?></time>
                            </acticle>
                            <?
                            //print_r($arFields['PROPERTY_PROFIT_VALUE']);
                            //print_r($arFields['PROPERTY_TKAN_VALUE']);
                        }
                    }
                    ?>


                </div>
            </div>
        </section>
        </div>
    </main>
    <!-- end content.html-->

    <!-- start contacts.html-->
    <section class="footer__contacts">
        <div class="container container_contacts">
            <div class="contacts">
                <h2 class="contacts__title">Контакты</h2>

                <div class="contacts__block">
                    <img src="img/phone-call.svg" alt="">

                    <div>
                        <p>Единый телефон</p>
                        <p class="contacts__block_phone">8 800 123 45 67</p>
                    </div>
                </div>

                <div class="contacts__block">
                    <img src="img/telegram.svg" alt="">

                    <div>
                        <p>Телеграм канал</p>
                        <a class="contacts__block_telegram" href="#">@bullofarm</a>
                    </div>
                </div>

                <div class="contacts__block">
                    <img src="img/envelope.svg" alt="">

                    <div>
                        <p>E-mail</p>
                        <a class="contacts__block_email" href="mailto:info@bullofarm.ru">info@bullofarm.ru</a>
                    </div>
                </div>
            </div>

            <div class="address">
                <div class="address__city">
                    <h4 class="address__city_title">Иркутск</h4>
                    <p class="address__city_address">г.Усолье-Сибирское, <br> ул. Дзержинского, 1</p>
                    <iframe class="address__city_map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2415.745891189998!2d103.66358131581553!3d52.73677767985574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d070dc970d59d43%3A0xd1b9ca7c458c9acf!2z0YPQuy4g0JTQt9C10YDQttC40L3RgdC60L7Qs9C-LCAxLCDQo9GB0L7Qu9GM0LUt0KHQuNCx0LjRgNGB0LrQvtC1LCDQmNGA0LrRg9GC0YHQutCw0Y8g0L7QsdC7Liwg0KDQvtGB0YHQuNGPLCA2NjU0NjA!5e0!3m2!1sru!2sua!4v1516976954665"
                            width="353" height="310" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div class="address__city">
                    <h4 class="address__city_title">Москва</h4>
                    <p class="address__city_address">Москва, ул. Новозаводская, <br> д. 8/8, к. 5 пом. 11</p>
                    <iframe class="address__city_map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.382175926856!2d37.505835316054565!3d55.751862999531674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b5495c54c0a319%3A0x7386f9bd7b8f78f8!2z0J3QvtCy0L7Qt9Cw0LLQvtC00YHQutCw0Y8g0YPQuy4sIDgvOCwg0JzQvtGB0LrQstCwLCDQoNC-0YHRgdC40Y8sIDEyMTA4Nw!5e0!3m2!1sru!2sua!4v1516977040009"
                            width="353" height="310" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        </div>
        <?
        if (CModule::IncludeModule('iblock')) {
            $num = 0;
            $arSort = Array("NAME" => "ASC");
            $arSelect = Array('NAME',
                'ID',
                'PREVIEW_DESC',
                'PREVIEW_PICTURE',
                'PROPERTY_PROFIT',
                'PROPERTY_YEARPROFIT',
                'PROPERTY_RENT',
                'PROPERTY_YEARRENT',
                'PROPERTY_PRICE',
                'PROPERTY_AVAILABLE',
                'PROPERTY_ALGORITM',
                'PROPERTY_HASHRATE',
                'PROPERTY_CHIPTYPE',
                'PROPERTY_TECHPROCESS',
                'PROPERTY_CHIPCOUNT',
                'PROPERTY_WORKCONDITION',
                'PROPERTY_ENERGYEFFICIENCY',
                'PROPERTY_ENERGYCONSUME',
                'PROPERTY_DEFAULTFREQ',
                'PROPERTY_INTERFACE',
                'PROPERTY_COOL',
                'PROPERTY_VOLTAGE',
                'PROPERTY_POWERSUPPLY',
                'PROPERTY_SIZE',
                'PROPERTY_QUANTITY',
                'PROPERTY_PREPAY',
                'PROPERTY_RECOUPMENT',
                'PROPERTY_SERVICE'
            );
            $arFilter = Array("IBLOCK_ID" => 5);

            $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);

            while ($ob = $res->GetNextElement()) {
                $num++;
                $arFields = $ob->GetFields();
                //var_dump($arFields);
                ?>
                <div class="modal_desc" id="modal_desc<?= $arFields['ID'] ?>">
                    <div class="catalogue-pre__block">
                        <div class="catalogue-pre__block-main">
                            <div class="catalogue-pre__block-title">
                                <h2><?= $arFields['NAME'] ?></h2>
                                <div class="crypto-img"><img alt="" class="crypto-icon"
                                                             src="<?= SITE_TEMPLATE_PATH ?>/img/icons/bitcoin.svg"> <img
                                            alt="" class="crypto-icon"
                                            src="<?= SITE_TEMPLATE_PATH ?>/img/icons/etherium.svg"> <img alt=""
                                                                                                         class="crypto-icon"
                                                                                                         src="<?= SITE_TEMPLATE_PATH ?>/img/icons/lightcoin.svg">
                                </div>
                            </div>
                            <div class="catalogue-pre__product">
                                <div class="product__img">
                                    <img alt="" class="catalogue-pre__product-img" height="115"
                                         src="<?= CFile::GetPath($arFields["PREVIEW_PICTURE"]) ?>" width="190">
                                </div>
                                <p class="catalogue-pre__product-desc"><?= $arFields['PREVIEW_DESC'] ?> </p>
                            </div>
                            <div class="catalogue-pre__table">
                                <div class="table">
                                    <div class="cell">
                                        Алгоритм хэширования
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_ALGORITM_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Общий хэшрейт
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_HASHRATE_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Вид чипа
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_CHIPTYPE_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Техпроцесс
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_TECHPROCESS_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Количество чипов
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_CHIPCOUNT_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Условия работы
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_WORKCONDITION_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Энергоэффективность
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_ENERGYEFFICIENCY_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Энергопотребление
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_ENERGYCONSUME_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Рабочая частота по умолчанию
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_DEFAULTFREQ_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Интерфейс сетевого подключения
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_INTERFACE_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Охлаждение
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_COOL_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Напряжение
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_VOLTAGE_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Блок питания
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_POWERSUPPLY_VALUE'] ?>
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Габаритные размеры устройства
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        <?= $arFields['PROPERTY_SIZE_VALUE'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="catalogue-pre__block-nav">
                            <button class="modal__nav tablinks modal__nav_active" onclick="openTab(event, 'order1')">
                                Заказ
                            </button>
                            <button class="modal__nav tablinks" onclick="openTab(event, 'return1')">Доходность</button>
                            <button class="modal__nav tablinks" onclick="openTab(event, 'specs1')">Характеристики
                            </button>
                        </div>

                        <div class="catalogue-pre__block-aside">
                            <?php $isInStock = (intval($arFields['PROPERTY_AVAILABLE_VALUE']) == 1) ? '' : 'catalogue-pre__prepay' ?>
                            <div class="aside__content <?= $isInStock ?>">
                                <div class="catalogue-pre__aval">
                                    <? if (intval($arFields['PROPERTY_AVAILABLE_VALUE']) == 1): ?>
                                        <div class="in-stock">
                                            <img alt="" src="<?= SITE_TEMPLATE_PATH ?>/img/check.jpg">
                                            <p>В наличии в Москве</p>
                                        </div>
                                    <? else : ?>
                                        <div class="not-in-stock">
                                            <p>Нет в наличии</p>
                                            <p class="greytext fs13">Доставка в Москву — 21 день</p>
                                            <p class="greytext fs13">Доставка в Иркутск — 17 дней</p>
                                        </div>
                                    <?endif; ?>


                                </div>
                                <div class="catalogue-pre__number">
                                    <div class="catalogue-pre__number-preorder">
                                        <div class="quantity">
                                            <p class="fs13">Количество</p>
                                            <div class="catalogue-pre__number-count">
                                                <div class="minus"><img alt=""
                                                                        src="<?= SITE_TEMPLATE_PATH ?>/img/minus.png">
                                                </div>
                                                <input type="text" value="<?= $arFields['PROPERTY_QUANTITY_VALUE'] ?>">
                                                <div class="plus"><img alt=""
                                                                       src="<?= SITE_TEMPLATE_PATH ?>/img/plus.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prepay">
                                            <p class="fs13">Предоплата</p>
                                            <div class="catalogue-pre__number-count">
                                                <div class="minus-p"><img alt=""
                                                                          src="<?= SITE_TEMPLATE_PATH ?>/img/minus.png">
                                                </div>
                                                <input type="text" value="<?= $arFields['PROPERTY_PREPAY_VALUE'] ?>">
                                                <div class="plus-p"><img alt=""
                                                                         src="<?= SITE_TEMPLATE_PATH ?>/img/plus.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="catalogue-pre__number-buy">
                                        <div class="catalogue-pre__buy">
                                            <div class="catalogue-pre__buy-cost">
                                                <p class="fs13">Покупка</p>
                                                <p class="catalogue-pre__number-price"><?= $arFields['PROPERTY_PRICE_VALUE'] ?>
                                                    <sup class="fs13">Р</sup></p>
                                            </div>
                                            <a class="buy-button" data-fancybox data-src="#modal3<?= $arFields['ID'] ?>"
                                               href="javascript:;">Купить</a>
                                        </div>

                                        <div class="catalogue-pre__rent">
                                            <div class="catalogue-pre__buy-cost">
                                                <p class="fs13">Аренда</p>
                                                <p class="catalogue-pre__number-price"><?= $arFields['PROPERTY_RENT_VALUE'] ?>
                                                    <sup class="fs13">Р/МЕС</sup></p>
                                            </div>
                                            <button class="rent__btn">Арендовать</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="catalogue-pre__cost">
                                    <p class="fs13">Стоимость</p>
                                    <div class="catalogue-pre__cost-content">
                                        <div class="price">
                                            <p class="fs13 greytext"><?= $arFields['PROPERTY_OLDPRICE_VALUE'] ?></p>
                                            <p class="price__number"><span class="price__one-item"><?= $arFields['PROPERTY_PRICE_VALUE'] ?></span> <sup
                                                        class="fs13">Р</sup></p>
                                        </div>
                                        <div class="preorder">
                                            <a class="preorder__btn" data-fancybox
                                               data-src="#modal2<?= $arFields['ID'] ?>"
                                               href="javascript:;">Предзаказать</a>

                                            <div class="modal" id="modal2<?= $arFields['ID'] ?>">
                                                <div class="modal__overlay"></div>

                                                <div class="container modal__content">
                                                    <div class="modal__order">
                                                        <h2>Предзаказ</h2>

                                                        <form class="order-form">
                                                            <input type="hidden" id="prod_id"
                                                                   value="<?= $arFields['ID'] ?>">
                                                            <input type="hidden" id="order__desc-number2"
                                                                   value="<?= $arFields['PROPERTY_QUANTITY_VALUE'] ?>"/>
                                                            <label class="order__row">
                                                                <span class="fs13 label">Ваше имя</span>
                                                                <input type="text" class="text-input" id="order__name">
                                                            </label>

                                                            <label class="order__row">
                                                                <span class="fs13 label">Телефон</span>
                                                                <input type="text" class="text-input tel-input"
                                                                       id="order__tel">
                                                            </label>

                                                            <label class="order__row">
                                                                <span class="fs13 label">E-mail</span>
                                                                <input type="email" class="text-input"
                                                                       id="order__email">
                                                            </label>

                                                            <div class="order__delivery order__row">
                                                                <p class="fs13 label">Куда доставить</p>

                                                                <div class="delivery__choise">
                                                                    <input id="to_techpark" type="radio"
                                                                           name="where_deliver" checked>
                                                                    <label for="to_techpark">В технопарк</label>

                                                                    <input class="another_place" id="another_place"
                                                                           type="text" placeholder="В другое место"
                                                                           name="where_deliver">

                                                                </div>
                                                            </div>

                                                            <div class="order__company order__row">
                                                                <p class="fs13 label">Компания</p>

                                                                <div class="delivery__choise">
                                                                    <input id="ems" type="radio" name="how_deliver"
                                                                           checked>
                                                                    <label for="ems">EMS</label>

                                                                    <input id="dhl" type="radio" name="how_deliver">
                                                                    <label for="dhl">DHL</label>
                                                                </div>
                                                            </div>

                                                            <div class="order__address order__row">
                                                                <p class="fs13 label">Адрес</p>
                                                                <p class="fs13">г.Усолье-Сибирское, ул. Дзержинского,
                                                                    1</p>
                                                            </div>

                                                            <input class="send-request" type="submit"
                                                                   value="Отправить заявку">
                                                        </form>
                                                    </div>

                                                    <div class="modal__order-desc">
                                                        <h3 class="modal__mine-name"><?= $arFields['NAME'] ?></h3>

                                                        <div class="order__desc">
                                                            <div class="order__quantity">
                                                                <p class="fs13 greytext">Количество</p>
                                                                <p class="order__desc-number"><?= $arFields['PROPERTY_QUANTITY_VALUE'] ?>
                                                                    шт.</p>

                                                            </div>

                                                            <div class="order__prepay">
                                                                <p class="fs13 greytext">Предоплата</p>
                                                                <p class="order__desc-number">60%</p>
                                                            </div>

                                                            <div class="order__total-cost">
                                                                <p class="fs13 greytext">Итоговая стоимость</p>
                                                                <p class="order__desc-number"><span
                                                                            class="fs18 crossed">1 536 000 Р</span>
                                                                    <br>
                                                                    <span class="final__pirce">1 236 000 Р</span></p>
                                                            </div>
                                                        </div>

                                                        <div class="order__instructions">
                                                            <p>После отправки с вами свяжется наш оператор и уточнит
                                                                детали заказа.</p>
                                                            <p class="purple-text">Обращаем ваше внимание, предоплата
                                                                вносится в течении 7 дней после подписания договора.</p>
                                                        </div>
                                                    </div>
                                                    <!-- <button class="modal__close">
                                                        <img src="img/cross.png" width="14" height="14" alt="">
                                                    </button> -->
                                                </div>
                                            </div>
                                            <div class="modal" id="modal3<?= $arFields['ID'] ?>">
                                                <div class="container modal__content">
                                                    <div class="modal__order">
                                                        <h2>Заявка на покупку</h2>
                                                        <form class="order-form">
															<input type="hidden" id="prod_id"
                                                                   value="<?= $arFields['ID'] ?>">
                                                            <input type="hidden" id="order__desc-number3"
                                                                   value="<?= $arFields['PROPERTY_QUANTITY_VALUE'] ?>"/>
                                                            <label class="order__row">
                                                                <span class="fs13 label">Ваше имя</span>
                                                                <input class="text-input" id="order__name" type="text">
                                                            </label>
                                                            <label class="order__row">
                                                                <span class="fs13 label">Телефон</span>
                                                                <input class="text-input tel-input" id="order__tel"
                                                                       type="text">
                                                            </label>
                                                            <label class="order__row">
                                                                <span class="fs13 label">E-mail</span>
                                                                <input class="text-input" id="order__email"
                                                                       type="email">
                                                            </label>
                                                            <div class="order__delivery order__row">
                                                                <p class="fs13 label">Куда доставить</p>
                                                                <div class="delivery__choise">
                                                                    <input checked id="to_techpark" name="where_deliver"
                                                                           type="radio">
                                                                    <label for="to_techpark">В технопарк</label>
                                                                    <input class="another_place" id="another_place" type="text" placeholder="В другое место" name="where_deliver">

                                                                </div>
                                                            </div>
                                                            <div class="order__company order__row">
                                                                <p class="fs13 label">Компания</p>
                                                                <div class="delivery__choise">
                                                                    <input checked id="ems" name="how_deliver"
                                                                           type="radio">
                                                                    <label for="ems">EMS</label>
                                                                    <input id="dhl" name="how_deliver" type="radio">
                                                                    <label for="dhl">DHL</label>
                                                                </div>
                                                            </div>
                                                            <div class="order__address order__row">
                                                                <label class="order__row" for="address">
                                                                    <span class="fs12 label">Адрес</span>
                                                                    <input class="text-input" id="order__address"
                                                                           type="text">
                                                                </label>

                                                            </div>
                                                            <input class="send-request" type="submit"
                                                                   value="Отправить заявку">
                                                        </form>
                                                    </div>
                                                    <div class="modal__order-desc">
                                                        <h3 class="modal__mine-name">Ebit Miner E9 Plus - 9 TH/s</h3>
                                                        <div class="order__desc">
                                                            <div class="order__quantity">
                                                                <p class="fs13 greytext">Количество</p>
                                                                <p class="order__desc-number">4 шт.</p>
                                                            </div>

                                                            <div class="order__total-cost">
                                                                <p class="fs13 greytext">Итоговая стоимость</p>
                                                                <p class="order__desc-number">1 536 000 Р</p>
                                                            </div>
                                                        </div>
                                                        <div class="order__instructions">
                                                            <p>После отправки с вами свяжется наш оператор и уточнит
                                                                детали заказа.</p>
                                                        </div>
                                                    </div>
                                                    <!-- <button class="modal__close"><img alt="" height="14" src="img/cross.png" width="14"></button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="catalogue-pre__service">
                                    <p class="fs13">Обслуживание</p>
                                    <p class="catalogue-pre__service-rent"><?= $arFields['PROPERTY_SERVICE_VALUE'] ?>
                                        <sup class="fs13">Р/МЕС</sup></p>
                                </div>
                            </div>
                            <div class="catalogue-pre__return tabcontent" id="return1">
                                <div class="return-rate">
                                    <p class="fs13">Доходность</p>
                                    <p class="return-rate__number"><?= $arFields['PROPERTY_PROFIT_VALUE'] ?> <sup
                                                class="fs13">Р/МЕС</sup></p>
                                </div>
                                <div class="recoupment">
                                    <p class="fs13">Окупаемость</p>
                                    <p class="recoupment__number"><?= $arFields['PROPERTY_RECOUPMENT_VALUE'] ?> <sup
                                                class="fs13">МЕС</sup></p>
                                </div>
                                <div class="after-year">
                                    <p class="fs13">Через год</p>
                                    <p class="after-year__number"><?= $arFields['PROPERTY_YEARPROFIT_VALUE'] ?> <sup
                                                class="fs13">Р</sup></p>
                                </div>
                            </div>

                            <div class="catalogue-pre__table tabcontent" id="specs1">
                                <div class="table">
                                    <div class="cell">
                                        Алгоритм хэширования
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        SHA-256 (подходит для майнинга Bitcoin (BTC), Peercoin (PPC), eMark (DEM) и
                                        других криптовалют.)
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Общий хэшрейт
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        14 TH/s ±5%
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Вид чипа
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        BM1387
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Техпроцесс
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        16nm
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Количество чипов
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        189 шт
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Условия работы
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        0 °C to 40 °C
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Энергоэффективность
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        0.1 W/GH/s
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Энергопотребление
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        1320W +10% при использовании
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Рабочая частота по умолчанию
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        600МГц
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Интерфейс сетевого подключения
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        Ethernet
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Охлаждение
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        2 вентилятора 12038 фирменного блока питания Bitmain APW3 1600W
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Напряжение
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        11.60 ~13.00В
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Блок питания
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        Блок питания входит в комплект Bitmain APW3 1600W
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="cell">
                                        Габаритные размеры устройства
                                    </div>
                                    <div class="cell-dot"></div>
                                    <div class="cell width450">
                                        350мм (длина) x 135мм (ширина) x 158мм (высота)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                //print_r($arFields['PROPERTY_PROFIT_VALUE']);
                //print_r($arFields['PROPERTY_TKAN_VALUE']);
            }
        }
        ?>
    </section>
    <!-- end contacts.html-->
    <script>
        $('document').ready(function () {
            $('.send-request').click(function (e) {

                name = $(this).parent('form').find('#order__name').val();
                tel = $(this).parent('form').find('#order__tel').val();
                email = $(this).parent('form').find('#order__email').val();
                delivery_place = $(this).parent('form').find('#another_place').val();
                prod_id = $(this).parent("form").find('#prod_id').val();
                count = ($(this).parent("form").find('#order__desc-number2').val());
                console.log($(this).parent(".modal__order-desc").find('#order__desc-number2'))
                /*$.ajax({
                    type: "GET",
                    url: "/catalog/ajax_order.php",
                    // The key needs to match your method's input parameter (case-sensitive).
                    data: JSON.stringify({ name: name, tel : tel, email: email, delivery_place: delivery_place, prod_id : prod_id }),
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    complete: function(data){alert(data);},
                    failure: function(errMsg) {
                        alert(errMsg);
                    }
    });*/
                //BX.showWait();

                BX.ajax({
                    url: "/catalog/ajax_order.php",
                    data: {
                        name: name,
                        tel: tel,
                        email: email,
                        delivery_place: delivery_place,
                        prod_id: prod_id,
                        count: count
                    },
                    method: 'POST',
                    dataType: 'json',
                    cache: false,
                    onsuccess: function (arResult) {
                        /* что-то делаем с результатом */
                        //BX.closeWait();
                    },
                    onfailure: function (XMLHttpRequest, textStatus) {
                        console.log(XMLHttpRequest);
                        console.log(textStatus);
                    }
                });
                return false;
            })

            $('[data-fancybox]').fancybox({});

            $('.preorder__btn, .buy-button').fancybox({
                afterShow: function () {
                    $(".fancybox-close-small").click(function (e) {
                        e.preventDefault();
                        $(".fancybox-close-small").click();
                    });
                }
            })
        })
    </script><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>