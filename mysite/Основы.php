<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Title</title>
		<link type="text/css" rel="stylesheet" href="style.css">
		<style type="text/css">
		
		</style>
		<script type="text/javascript">
			window.onload = function() {}
		</script>
	</head>
	<body>
	
	&#x1f63; <!-- вставка символа из таблицы юникода. x означает, что код в 16 системе -->
	&#8035; <!-- вставка символа из таблицы юникода. код в 10 системе -->
	
		<?php
	
			$bool = TRUE;
			unset($bool);
			$bool = false;
			if ($bool == false) echo 0; else echo 1;
			
			// при выводе булевского типа true даст 1, false выдаст пустую строку.
			// ПЕРЕД ВЫДАЧЕЙ БРАУЗЕРУ, ВСЯ ИНФОРМАЦИЯ ПРИВОДИТСЯ В СТРОКОВЫЙ ТИП
			
			error_reporting(E_ALL); // включаем отображение всех ошибок. в зависимости от передаваемого значения, будут выдаваться ошибки разного типа
			// PARSE --> ошибка при разборе парсером кода перед выполнением
			// FATAL ERROR --> ошибка при выполнении
			// WARNING --> ошибка при выполнении (предупреждение. код работать будет)
			// NOTICE --> уведомление
			
			echo "<br>" , phpversion();
			echo "<br>" , "The text";
		
			$max = 0xfffffff; // max for x86 in php
			echo "<br>" , $max;
			$expValue = 0.0000000007; // 7e-10
			$expValue = 25e-5; // 0.00025 // 5 символов после точки, в числе которых 25
			$expValue = 259e+6; // 259 000000 // 6 нулей после значения 259
			$expValue = 125e-6; // 0.000125; // 1.25 * 10^2 * 10^-6 = 1.25 * 10^-4
			$expValue = 125e-7; // 0.0000125; // 1.25e-5, так как 1.25 * 100 * 10^-7 = 1.25 * 10^2 * 10^-7 = 1.25 = 10^ +2 - 7 = 1.25 * 10^-5
			$expValue = 1.25e-4; // 0.000125 // спереди 4 нуля, первый учитывается в счете, так как значение 1.25 дробное
			echo "<br>" , $expValue;
			
			/* Math
			1 * 10^-6  = 1 * 0.000001
			а^(-n)=1/а^n.
			10^-6 = 1 / 10^6 = 1 / 1 000 000
			*/
			
			// СТРОКИ
			// разница между одинарными и двойными кавычками
			// !! в двойные кавычки можно помещать переменные !!
			$name = 'John';
			echo "<br>" , "Hello, \n\t$name<br>\n"; // экранированные команды. в самом браузере этого не видно. но будет видно в исходном коде и в при записи в файл. если нужно вывести знак доллара или двойные кавычки или обратный слэш, их тоже нужно заекранировать \$ \" \\, \r - возврат каретки
			
			// !! в одинарных кавычках все выведется так, как оно есть !!
			
			// Heredoc
			$Hdoc = 'Heredoc';
echo <<<DOC

	<div>$Hdoc --> Документ можно формировать произвльно, используя различные пробельные символы.
Для браузера это будет просто текст, так как он пропустит пробельные символы.
Также можно всталвять кавычки и переменные, которые бубут интерпретироваться.
Подробнее о Heredoc: https://ru.wikipedia.org/wiki/Heredoc-синтаксис</div>
DOC;

echo <<<TEXT

дичь
TEXT;
echo <<<TEXT

дичь2
TEXT;

			// СТРОКИ
			$string = 'Alex';
			echo "<br>",$string{0}; // доступ к символу в строке по его номеру // можно использовать квадратные скобки [] НО строка != массив
			echo "<br>",$string{ strlen($string)-1 }; // последний символ в строке
			// . в php означает конкатенация строк
			$part1 = 'Wind';
			$part2 = 'Earth';
			echo "<br>" . $part1 . " and " . $part2;
			
			$fruit = 'apple';
			echo "<br>","I like $fruit's!"; // апостроф - недопустимый символ для имени переменной, поэтому именем переменной будет считаться  то, что после $ и до апострофа - fruit 
			echo "<br>","I like ${fruit}'s!"; // выделение/экранирование переменных при выводе во избежание ошибок при разборе их имен (можно ставить фигурную скобку и перед $)
			
			echo '<br>' , 'Новая строка' , '<hr>'; // то же самое, что вызвать трижды echo
			echo 'Новая' . ' ' . 'строка' . '<hr>' ; // слепка в одну строку. команда echo вызывается одинажды
			
			$h = 'Hello, ';
			$w = 'World!';
			echo '<br>' . $h .= $w; // .= как в математических $a += $b;
			
			// ПРИВЕДЕНИЕ ТИПОВ
			// УСЛОВИЯ
			// ОПЕРАТОРЫ
			// при арифметических операциях, когда есть число и не число, то приводится все будет к числу. true = 1, false = 0, null = 0, '5' = 5, 'John' = 0, '5John' = 5
			
			// $a == $b; // true, если значения равны. выполнится приведение типов (таблица в Dropbox/PHP)
			// $a === $b; // true только если типы данных и значения равны (таблица в Dropbox/PHP)
			
			// $a != $b; // true, если значения не равны. выполнится приведение типов
			// $a !== $b; // true, если значения ИЛИ данные не равны
			
			/* && и || выше по приоритету за and и or, но круглые скобки имет приоритет еще выше
			логические И ==  && == and (result of and == true)
			логические ИЛИ ==  || ==or (result of or == true, если 1 из операторов true)
			!$a --> если true, получил false, или наоборот
			*/
			
			$a = false;
			$b = false;
			$c = ($a or $b);
			echo "<br>$c";
			if ($c) {
				echo '<br>result of OR == true';
			} else { echo '<br>result of OR == false'; }
			
			// тернарный оператор как в С-подобных
			$a = 1;
			echo $a==1 ? "<br>One" : "<br>Not One";
			
			// elseif
			$day = 4;
			if ($day == 1) 
				echo 'Пн';
			elseif ($day == 2)
				echo 'Вт';
			elseif ($day == 3)
				echo 'Ср';
			elseif ($day == 4)
				echo 'Чт';
			elseif ($day == 5)
				echo 'Пт';
			elseif ($day == 6)
				echo 'Cб';
			elseif ($day == 7)
				echo 'Вс';
			else echo 'Нет такого дня';
			
			$age = 12;
			if ( $age >= 18 and $age <= 59 ) {
				echo '<br>Go working hard!';
			}
			elseif ($age < 18)
				echo '<br>So young!';
			elseif ($age > 59)
				echo '<br>So old';
				
			// альтернативный синтаксис. без {}	
			$age = 89;
			if ( $age >= 18 and $age <= 59 ) :
				echo '<br>Go working hard!';
			elseif ($age < 18) :
				echo '<br>So young!';
			elseif ($age > 59) :
				echo '<br>So old';
			endif;
			
			// switch
			$numm = 5;
			switch($numm) {
				case 0: echo '<br>Zeno'; break;
				case 1: echo '<br>One'; break;
				case 2: echo '<br>Two'; break;
				case 4: echo '<br>Three'; break;
				default: echo '<br>another';
			}
			
			/* !!!
			Для PHP, в случае разрыва конструкции при помощи <?php ?>, не будет никакой разницы. Все блоки <?php ?> считаются одним единым кодом
			*/
			
			// ТИПЫ ДАННЫХ
			/*
			8 типов данных:
		скалярные
			boolean
			integer
			float
			string
		смешанные
			array
			object
		специальные
			resource
			null
			*/
			
			// ПЕРЕМЕННЫЕ (табл. в Dropbox/PHP)
			// ОПЕРАТОРЫ
			isset($v1); // существует ли переменная, возвр. boolean. falsse только если перменной нет вообще или ее значение == null
			empty($v1); // пустая ли переменная, возвр. boolean. true: 0, "0", false, "", пустой массив, неопределенная переменная или null
			
			$v1 = 3.14;
			echo "\n<br>type: ".gettype($v1); // получить тип
			echo (integer)$v1; // взять копию переменной, изменить тип и вывести. сама переменная не изменится // по умолчанию приведение типов делается неявно
			$Z = 2;
			$X = 3.14;
			$C = $Z + $X;
			echo $C; // неявное приведение типов
			echo (integer)$C; // явное приведение типов
			
			settype($v1, 'integer'); // изменить тип
			echo $v1,"<br>";


			/* СРАВНЕНИЕ
			
			==  - сранвение значений
			=== - сравниение типов (в JS приводится в строку, в PHP - сравниваются типы)
			
			*/			
			
		?>
			<h3><?='Сокращенное echo'?></h3> // short open tags ON
			
			
			
	</body>
</html>