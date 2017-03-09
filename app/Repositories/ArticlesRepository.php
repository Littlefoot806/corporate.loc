<?php

namespace Corp\Repositories;

use Corp\Article;

class ArticlesRepository extends Repository {

	public function __construct(Article $articles) {
		$this->model = $articles;
	}

	public function one($alias, $atr = array()) {
		 $article =  parent::one($alias, $atr);

		 if($article && !empty($atr)) {
		 	$article->load('comments');
		 	$article->comments->load('user');
		 }

		 return $article;
	}

}