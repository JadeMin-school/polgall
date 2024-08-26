<!DOCTYPE html>
<html>
	<head>
		<?php require_once("../../lib/db.php"); ?>
		<?php
			$DB = new GalleryDB();

			$LIST = $DB->getPostList();
		?>


		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content="<?=$content?>"/>

		<link type="text/css" rel="stylesheet" href="index.css"/>

		<title>게시글 목록</title>
	</head>
	<body>
		<main id="main_content">
			<table id="post_list">
				<colgroup>
					<col style="width: 7%;"/>
					<col style="width: 60px;"/>
					<col style="width: 18%;"/>
					<col style="width: 18%;"/>
					<col style="width: 6%;"/>
				</colgroup>
				<thead>
					<tr>
						<th>번호</th>
						<th>제목</th>
						<th>글쓴이</th>
						<th>작성일</th>
						<th>조회</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($LIST as $d) { ?>
						<tr class="post">
							<td class="id">
								<?=$d["id"]?>
							</td>
							<td class="title">
								<a href="../view?id=<?=$d["id"]?>"><?=$d["title"]?></a>
							</td>
							<td class="writer">
								<span class="nickname"><?=$d["writerName"]?></span>
								<span class="ip">(<?=$d["writerIP"]?>)</span>
							</td>
							<td class="timestamp">
								<time datetime="<?=$d["timestamp"]?>"><?=$d["timestamp"]?></time>
							</td>
							<td class="views">
								<?=$d["views"]?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</main>
	</body>
</html>