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
                    $xml=simple.load.file("XML/movies.xml") or die ("Error:Cannot greate object");<br><br>
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
                    echo $movie->title.russian."/br>";<br>
                    }<br>
                </p>
                <p>
                    Теперь кратко объясню, что мы написали в нашем цикле.<br>
                    В скобках мы указали следующее, а именно цикл обращается к массиву файла XML, по конкретному ключу(пути), а именно к таблице movie и затем после обращения, указываем вывести в браузере из таблицы movie заголовки/названия фильмов на русском языке, каждое название с новой строки.<br>
                    Вот и все.
                </p>
            </div>

        </div>
    </section>
    <section class=""></section>
    <section class=""></section>

    <footer></footer>
</body>

</html>