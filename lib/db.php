<?php
	class GalleryDB {
		public $pdo = null;

		public function __construct() {
			$this->pdo = new PDO("mysql:host=localhost;dbname=hello;charset=utf8mb4", "root", "");
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public function __destruct() {
			$this->pdo = null;
		}

		public function getPostList(): array {
			$stmt = $this->pdo->prepare("SELECT * FROM board ORDER BY id DESC LIMIT 50");
			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function getPost(int $id): array {
			$stmt = $this->pdo->prepare("SELECT * FROM board WHERE id = :id");
			$stmt->bindValue(":id", $id);
			$stmt->execute();

			return $stmt->fetch();
		}

		public function incrementView(int $id): void {
			$stmt = $this->pdo->prepare("UPDATE board SET views = views + 1 WHERE id = :id");
			$stmt->bindValue(":id", $id);
			$stmt->execute();
		}

		public function writePost(string $title, string $content, string $writerName, string $writerIP): int {
			$stmt = $this->pdo->prepare("INSERT INTO board (title, content, writerName, writerIP) VALUES (:title, :content, :writerName, :writerIP)");
			$stmt->bindValue(":title", $title);
			$stmt->bindValue(":content", $content);
			$stmt->bindValue(":writerName", $writerName);
			$stmt->bindValue(":writerIP", $writerIP);
			$stmt->execute();

			return $this->pdo->lastInsertId();
		}
	}