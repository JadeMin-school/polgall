<!DOCTYPE html>
<html>
	<head>
		<?php require_once("../../lib/db.php"); ?>
		<?php
			$DB = new GalleryDB();

			$ID = $DB->writePost(
				$_POST["title"],
				$_POST["content"],
				$_POST["writerName"],
				$_SERVER["REMOTE_ADDR"]
			);
		?>


		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<script type="module">
			alert("게시글이 작성되었습니다.");
			location.href = "../view?id=<?=$ID?>";
		</script>
	</head>
	<body>
	</body>
</html>