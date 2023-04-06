<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Урок 8.2. Работа с XML. Создадим функцию для записи данных из XML в MySQL</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <header></header>
    <h1>
        Урок 8.2. Работа с XML. Создадим функцию для записи данных из XML в MySQL
    </h1>
    <div class="block_title_php">
        <?php
        $nickname = " Александр!";
        $hello = "Привет ";
        $offer = "На этом занятии создадим функцию для записи данных из файла XML в MySQL и подготовим структуру базы данных MySQL для вставки данных из XML файла";
        echo "<h2 class='title_php'>" . $hello . $nickname . "</h2>";
        echo "<h4 class='subtitle_php'>" . $offer . "</h4>";
        ?>
    </div>
    <section class="begin">
        <div class="begin_step1">
            <p>
                На этом занятии продолжим изучение работы с файлами XML, с БД MySQL и РНР.<br>
                Продолжим работать с тем изучили на прошлом уроке.
            </p>
            <p>
                На прошлом занятии мы вывели количевство фильмов в нашем файле XML.<br>
                Теперь давайте напишем код и выведем в браузер все названия фильмов на русском языке.
            </p>
        </div>
    </section>
    <section class="step_one">
        <div class="so_1">
            <div>
                <p>
                    Для начала снова создадим переменную с подключением к нашему файлу XML<br>
                    $xml=simplexml_load_file("XML/movies.xml") or die ("Error:Cannot greate object");<br><br>
                    Затем выведем в браузер количество фильмов в нашем файле<br>
                    echo count($xml);
                </p>
                <p>
                    Теперь для вывода названий фильмов на русском языке мы напишем код с использованием цикла foreach.
                </p>
            </div>
            <div class="foreach">
                <h5>
                    Напоминание о цикле FOREACH
                </h5>
                <p>
                    С помощью цикла FOREACH мы можем перебрать все элементы массива и выполнить для них (или только для некоторых из них) какие-либо действия.
                </p>
            </div>
            <div class="cycle_forach">
                <p>
                    Теперь напишем наш код на РНР по выводу названий/наименований фильмов на русском языке из нашего XML файла.
                </p>
                <p>
                    foreach($xml as $movies_key=>$movie){<br>
                    echo $movie->title_russian."/br>";<br>
                    }<br>
                </p>
                <p>
                    Теперь кратко объясню, что мы написали в нашем цикле.<br>
                    В скобках мы указали следующее, а именно цикл обращается к массиву файла XML, по конкретному ключу(пути), а именно к таблице movie и затем после обращения, указываем вывести в браузере из таблицы movie заголовки/названия фильмов на русском языке, каждое название с новой строки.<br>
                    Вот и все.
                </p>
            </div>
            <div class="">
                <p>
                    Теперь немного допишем, а именно давайте повторим ранее полученные знания и снова выведим все содержимое нашего файл XML.<br>
                    Допишем наш код:<br>
                    echo "pre>";<br>
                    print_r($xml);
                    echo "/pre>";
                </p>
                <p>
                    Теперь смотрим в наш браузер на результат.<br>
                    Давайте немного усложним и при выводе в браузер выделим выведенные данные с названиями фильмов в отдельный блок, а список всех фильмов в другой.
                </p>
            </div>

        </div>
    </section>
    <section class="code_php_first">
        <div class="main_php">
            <div class="number_film">
                <?php
                $xml = simplexml_load_file("XML/movies.xml") or die("Error:Cannot greate object");
                echo "<p class='number_films'>" . "В нашем файле XML список из " . "<span class='number'>" . count($xml) . "</span>" . " фильмов и сериалов." . "</p>";

                echo "<p class='russian_title'>" . "Список фильмов с названиями на русском языке:" . "</p>";

                foreach ($xml as $mivies_key => $movie) {
                    echo "<p class='russian_title_1'>" .  $movie->title_russian . "<br>" . "</p>";
                }
                // echo "<pre>";
                // print_r($xml);
                // echo "</pre>";
                ?>
            </div>
        </div>
        <div class="inform">
            <p>
                ВАЖНО!<br>
                Часть кода касающуюся вывода всего списка фильмов, закомментирована, в целях сокращения размера секции :)
            </p>
        </div>
    </section>
    <section class="work_mysql">
        <h4>
            Работа с БД в MySQL
        </h4>
        <div class="table_sql">
            <p>
                Для того, чтобы воспользоваться имеющейся у нас информацией с XML файла, нам необходимо будет первоначально подготовить нашу БД, а конкретно таблицу movie.
            </p>
            <p>
                Заходим в административную панель управления phpMyAdmin и активируем мышкой совю БД, в моем случаи это study7.2lesson.<br>
                Чтобы сохранить нашу таблицу movie, которую мы создали и использовали на предыдущих занятиях, мы создадим новую аналогичную таблицу и назовем её movie_list.<br>
                Эта таблица будет содержать те же стоблцы, что и таблица movie и к ним мы добавми новые.<br>
                Ну, а те кто хочет можем оставить старую таблицу movie и удалив из неё все данные, добавить новые столбцы по аналогии.
            </p>
            <p>
                Создаем новую таблицу movie_list, для этого жмем в левой панели управления прямо под названием нашей БД на вкладку "Новая" и у нас сразу открывается окно для создания новой таблицы.<br>
                В поле "Имя таблицы" пишем название нашей таблицы - movie_list.<br>
                Теперь переходим к заполнению столбцов, они у нас будут таким же как у таблицы movie, а именно:
            </p>
            <ul>
                <li>
                    первая строка(столбец в таблице) в поле "Имя" пишем - id, в поле "Тип" - INT, в поле "Длина/Значение" - 5, в поле "Индекс" - PRIMERY, в параметре "AI" ставим галочку;
                </li>
                <li>
                    вторая строка(столбец в таблице) в поле "Имя" пишем - name, в поле "Тип" - VARCHAR, в поле "Длина/Значение" - 255;
                </li>
                <li>
                    третья строка(столбец в таблице) в поле "Имя" пишем - descriptions, в поле "Тип" - TEXT, в поле "Длина/Значение" - 500;
                </li>
                <li>
                    четвертая строка(столбец в таблице) в поле "Имя" пишем - year, в поле "Тип" - INT, в поле "Длина/Значение" - 5;
                </li>
                <li>
                    пятая строка(столбец в таблице) в поле "Имя" пишем - add_date, в поле "Тип" - DATA_TIME;
                </li>
                <li>
                    шестая строка(столбец в таблице) в поле "Имя" пишем - сcategory_id, в поле "Тип" - tinyint, в поле "Длина/Значение" - 4;
                </li>
            </ul>
            <p>
                Теперь добавми новые столбцы в нашу вышеуказанную таблицу, а именно:
            </p>
            <ul>
                <li>
                    седьмая строка(столбец в таблице) в поле "Имя" пишем - rating, в поле "Тип" - float, в поле "Длина/Значение" - 4;
                </li>
                <li>
                    восьмая строка(столбец в таблице) в поле "Имя" пишем - poster, в поле "Тип" - VARCHAR, в поле "Длина/Значение" - 255;
                </li>
            </ul>
            <p>
                После создания нашей новый таблицы - movie_list, сохраняем её и переходим в наш файл index.php, для написания кода.
            </p>
            <p></p>
        </div>
    </section>
    <section class="code_php_secnd">
        <div class="add_code">
            <h5>
                Код для вставки данных из XML файла в таблицу movie_list БД
            </h5>
            <div class="func_1">
                <p>
                    Теперь переходимм непосредственно к написанию кода.<br>
                    Чтобы вставить данные из XML файла в нашу таблицу movie_list, нам необходимо будет написать функцию.
                </p>
                <p>
                    И так начинаем пишем function(т.е. функция), далее даем ей название(по факту мы используем функцию insert и её название и пишем).<br>
                    Открываем скобки в которых пишем переменные нашей таблицы movie_list, а имеено($name, $descriptions, $year, $rating, $poster, $category_id).<br>
                    Затем в условиях функции(т.е. в фигурных скобках) пишем код подключения нашей БД, а именно<br>
                    { $mysqli=new mysqli('localhost', 'root', '', 'study7.2lesson');<br><br>
                    теперь напишем функцию проверки подключения/соединения нашей БД<br>
                    if (mysqli_connect_errno()){print_f('Соединение не установлено', mysqli_connect_error()); exie();}<br><br>
                    теперь указываем кодировку<br>
                    $mysqli->set_charset('utf8');<br><br>
                    Теперь нам надо написать запрос:<br>
                    $query="INSERT INTO movie_list VALUES(null, '$name', '$descriptions', '$year', '$rating', '$poster', Now(), '$category_id')";<br><br>
                    Далее выводим переменную 'результ' - $result<br>
                    $result=false;<br><br>
                    Теперь напишем проверку на переменную $result<br>
                    if($mysqli->query($query)){<br>
                    $result=true;<br>
                    }<br>
                    return $result;<br>
                    }
                </p>
                <p>
                    Все наша функция для записи данных из файла xml в нашу БД готова.
                </p>
                <p>
                    Ниже смотрим как должен выглядеть наш код без пояснений.
                </p>
                <p>
                    function insert($name, $descriptions, $year, $rating, $poster, $category_id){<br>
                    $mysqli=new mysqli('localhost', 'root', '', 'study7.2lesson');<br>
                    if (mysqli_connect_errno()){<br>
                    print_f('Соединение не установлено', mysqli_connect_error());<br>
                    exit();}<br>
                    $mysqli->set_charset('utf8');<br>
                    $query="INSERT INTO movie_list VALUES(null, '$name', '$descriptions', '$year', '$rating', '$poster', Now(), '$category_id')";<br>
                    $result=false;<br>
                    if($mysqli->query($query)){<br>
                    $result=true;<br>
                    }<br>
                    return $result;<br>
                    }
                </p>
            </div>
            <div class="check_code">
                <p>
                    Теперь проверим наш код ниже.
                </p>
                <?php
                function insert($name, $desc, $year, $category_id, $rating, $poster)
                {
                    $mysqli = new mysqli('localhost', 'root', '', 'study7.2lesson');
                    if (mysqli_connect_errno()) {
                        printf('Соединение не установлено', mysqli_connect_error());
                        exit();
                    }
                    $mysqli->set_charset('utf8');

                    $query = "INSERT INTO movie_list VALUES(null, '$name', '$desc', '$year',  Now(), '$category_id', '$rating', '$poster')";

                    $result = false;

                    if ($mysqli->query($query)) {
                        $result = true;
                    }
                    return $result;
                }
                ?>
            </div>
            <div class="">
                <p>
                    На этом задании мы создали только функцию, но не подключили к ней файл xml, об этом мы будем говорить на следующем занятии.
                </p>
            </div>
        </div>
    </section>
    <section class=""></section>

    <footer></footer>
</body>

</html>