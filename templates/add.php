
<main>
  <nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="all-lots.html">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Разное</a>
      </li>
    </ul>
  </nav>
<form class="form form--add-lot container <?php if($_SERVER['REQUEST_METHOD'] == 'POST' and count($errors) > 0): ?> form--invalid<?php endif;?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
<div class="form__item <?php if(isset($errors['lot-name'])): ?>form__item--invalid<?php endif; ?>" > <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?php if(isset($lot['lot-name'])) {echo $lot['lot-name'];}?>" >
        <span class="form__error">Введите наименование лота</span>
      </div>
      <div class="form__item <?php if(isset($errors['category'])): ?> form__item--invalid<?php endif;?>">
        <label for="category">Категория</label>
        <select id="category" name="category" value="<?php if(isset($lot['category'])){echo $lot['category']; }?>"   >
          <option>Выберите категорию</option>
          <option>Доски и лыжи</option>
          <option>Крепления</option>
          <option>Ботинки</option>
          <option>Одежда</option>
          <option>Инструменты</option>
          <option>Разное</option>
        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>
    <div class="form__item form__item--wide <?php if(isset($errors['message'])): ?> form__item--invalid<?php endif;?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота"><?php if(isset($lot['message'])){echo $lot['message'];} ?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file <?php if(isset($errors['lot-img'])): ?>form__item--invalid<?php endif; ?>"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file <?php if(isset($errors['lot-img'])): ?>form__item--invalid<?php endif; ?>">
        <input class="visually-hidden" type="file" id="photo2" name="lot_img" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
        <span class="form__error">Добавьте изображение</span>
      </div>
    </div>
    <div class="form__container-three <?php if(isset($errors['lot-rate'])): ?>form__item--invalid<?php endif; ?>">
      <div class="form__item form__item--small">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0"  value ="<?php if(isset($lot['lot-rate'])){echo $lot['lot-rate'];} ?>" >
        <span class="form__error">
        <?php if($errors['lot-rate'] == 'Значение  должно больше 0'): ?>
          Введите значение больше 0
        <?php elseif($errors['lot-rate'] == 'Значение  должно быть числом'): ?>
          Введите число
        <?php else :?>
          Введите нальную ставку
        <?php endif; ?>
        </span>
      </div>
      <div class="form__item form__item--small <?php if(isset($errors['lot-step'])): ?>form__item--invalid<?php endif; ?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?php if(isset($lot['lot-step'])){echo $lot['lot-step'];} ?>" >
        <span class="form__error">
        <?php if($errors['lot-step'] == 'Значение  должно больше 0'): ?>
          Введите значение больше 0
        <?php elseif($errors['lot-step'] == 'Значение  должно быть числом'): ?>
          Введите число
        <?php else :?>
          Введите шаг ставки
        <?php endif; ?>
        </span>
      </div>
      <div class="form__item <?php if(isset($errors['lot-date'])): ?>form__item--invalid<?php endif; ?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?php if(isset($lot['lot-date'])){echo $lot['lot-date'];} ?>" >
        <span class="form__error">Введите дату завершения торгов</span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.
    <?= print_r($errors) ?>
    </span>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>



