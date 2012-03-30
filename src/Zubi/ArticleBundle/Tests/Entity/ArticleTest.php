<?php

namespace Zubi\ArticleBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use Symfony\Component\Validator\ValidatorFactory;

use Zubi\ArticleBundle\Entity\Article;

class ArticleTest extends WebTestCase {          
        public function testArticleId() {
            $article= $this->getArticle();
            $this->assertNull($article->getId());
            $article->setId(12);
            $this->assertEquals(12, $article->getId());
        }        
        public function testArticleTitle() {
            $article= $this->getArticle();
            $this->assertNull($article-> getTitle());
            $article->setTitle('Some title');
            $this->assertEquals('Some title', $article->getTitle());
        }        
        public function testArticleContent() {
            $article= $this->getArticle();
            $this->assertNull($article->getId());
            $article->setId(12);
            $this->assertEquals(12, $article->getId());
        }
    
        public function testArticleGroupId() {
            $article= $this->getArticle();
            $this->assertNull($article->getGroupId());
            $article->setGroupId(12);
            $this->assertEquals(12, $article->getGroupId());
        }
 
        public function testArticleStatusId() {
            $article= $this->getArticle();
            $this->assertNull($article->getStatusId());
            $article->setStatusId(12);
            $this->assertEquals(12, $article->getStatusId());
        }    
        public function testArticleUserId() {
            $article= $this->getArticle();
            $this->assertNull($article->getUserId());
            $article->setUserId(12);
            $this->assertEquals(12, $article->getUserId());
        }  
        public function testArticleAuthorId() {
            $article= $this->getArticle();
            $this->assertNull($article->getAuthorId());
            $article->setAuthorId(12);
            $this->assertEquals(12, $article->getAuthorId());
        }
                
         public function getArticle($full = false) {
		if($full) {
			// TODO: return validated measurement
		} else
                    return new Article();
	}
}

?>
