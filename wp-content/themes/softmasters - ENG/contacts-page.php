<?php get_header();
/*
    * Template name: Контакты
    */
?>

<section class="promo promo--contacts promo--product">
    <div class="container">
        <div class="promo__text-box">
            <h1 class="promo__title promo__title--product">contacts</h1>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="container">
        <div class="contacts__box">
            <div class="contacts__column">
                <p class="contacts__title">«SoftMasters»</p>

                <div class="contacts__block">
                    <p class="contacts__text">Physical address:</p>
                    <p class="contacts__text"><?= get_option('main_fiz')?></p>
                </div>
                <div class="contacts__block">
                    <p class="contacts__text">Legal address:</p>
                    <p class="contacts__text"><?= get_option('main_yr')?></p>
                </div>
            </div>
            <div class="contacts__column">
                <div class="contacts__block">
                    <p class="contacts__text">Postal address:</p>
                    <p class="contacts__text"><?= get_option('main_post')?></p>
                </div>
                <div class="contacts__block">
                    <p class="contacts__text">Tel/Fax:</p>
                    <p class="contacts__text"><?= get_option('main_tel')?></p>
                </div>
                <div class="contacts__block">
                    <p class="contacts__text">e-mail:</p>
                    <p class="contacts__text"><?= get_option('main_mail')?> </p>
                </div>
            </div>
        </div>

        <div class="contacts__map-wrapper" id="contactMap"></div>
    </div>
</section>


<script type="text/javascript" src="http://api-maps.yandex.ru/2.1/?lang=ru_RU&ongVer=4"></script>
<?php get_footer(); ?>