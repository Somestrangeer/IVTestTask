<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<div class="container mt-5 justify-content-center align-item-center">
			<?php 

				function trimText($text, $wordLimit) {
					//clear text of garbage to get all words
    				$words = preg_split('/[-\s:,."]/', strip_tags($text), 0, PREG_SPLIT_NO_EMPTY);

					$trimmedText = implode(' ', array_slice($words, 0, $wordLimit + 1));
					
					return $trimmedText. "...";
				}

				$text = '<p class="big">
					Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
				</p>
				<p class="float">
					<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
					<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
				</p>
				<p>
					<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
				</p>';

				echo trimText($text, 29);

			?>
			
		</div>
	</body>
</html>