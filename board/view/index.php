<!DOCTYPE html>
<html>
	<head>
		<?php require_once("../../lib/db.php"); ?>
		<?php
			$DB = new GalleryDB();

			$DB->incrementView($_GET["id"]);

			$d = $DB->getPost($_GET["id"]);
		?>


		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content="<?=$d["content"]?>"/>
		<meta name="author" content="<?=$d["writerName"] . "(" . $d["writerIP"] . ")"?>"/>
		
		<link type="text/css" rel="stylesheet" href="index.css"/>

		<title><?=$d["title"]?></title>
	</head>
	<body>
		<main id="main_content">
			<article id="post_view">
				<header>
					<h1 id="title">
						<?=$d["title"]?>
					</h1>
					<div id="info">
						<div id="fl">
							<span class="nickname">
								<?=$d["writerName"]?>
							</span>
							<span class="ip">
								(<?=$d["writerIP"]?>)
							</span>
							<time class="timestamp" datetime="<?=$d["timestamp"]?>">
								<?=$d["timestamp"]?> 
							</time>
						</div>
					</div>
				</header>
				<div id="content">
					<?=$d["content"]?>
				</div>
			</article>
		</main>
	</body>
</html>