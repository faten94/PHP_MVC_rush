<?php
 
class Articles {
 
    private $id = 0;
        public function  setId($id){ $this->id = $id; }
        public function  getId(){ return $this->id; }
    private $title;
        public function  setTitle($title){ $this->title = $title; }
        public function  getTitle(){ return $this->title; }
    private $sentence;
        public function  setSentence($sentence){ $this->sentence = $sentence; }
        public function  getSentence(){ return $this->sentence; }
    private $content;
        public function  setContent($content){ $this->content = $content; }
        public function  getContent(){ return $this->content; }
    private $created_by;
        public function  setCreatedBy($created_by){ $this->created_by = $created_by; }
        public function  getCreatedBy(){ return $this->created_by; }
    private $article_created_at;
        public function  setCreatedAt($article_created_at){ $this->article_created_at = $article_created_at; }
        public function  getCreatedAt(){ return $this->created_at; }
    private $article_modified_at;
        public function  setModifiedAt($article_modified_at){ $this->article_modified_at = $article_modified_at; }
        public function  getModifiedAt(){ return $this->article_modified_at; }
    private $category;
        public function  setCategory($category){ $this->category = $category; }
        public function  getCategory(){ return $this->category; }
    private $tags;
        public function  setUserStatus($tags){ $this->tags = $tags; }
        public function  getUserStatus(){ return $this->tags; }
    

    public function  __construct(){

    /*    $id = 1;

        $reqUser = $db->prepare('SELECT * FROM users where id = ?');
        $reqUser->execute([$id]);
        $data = $reqUser->fetch();

        $this->id = $id;
        $this->title = $data['title'];
        $this->sentence = $data['sentence'];
        $this->content = $data['content'];
        $this->created_by= $data['created_by'];
        $this->category= $data['category'];
        $this->tags= $data['tags'];
        $this->account_status= $data['account_status'];
        $this->created_at= $data['created_at'];
        $this->modified_at= $data['modified_at'];
  */
    }

    static function getAllArticles($db) {

        $reqUsers = $db->prepare('SELECT * FROM articles');

        $reqUsers->execute([]);

        return $reqUsers->fetchAll();

    }

    static function createArticle($db,$title, $sentence, $content, $created_by, $category, $tags) {

        $sql = 'INSERT INTO articles (title, sentence, content, created_by, category, tags)
                    VALUES(:title, :sentence, :content, :created_by, :category, :tags)';

        $reqUsers = $db->prepare($sql);

        $reqUsers->bindParam(':title', $title);
        $reqUsers->bindParam(':sentence', $sentence);
        $reqUsers->bindParam(':content', $content);
        $reqUsers->bindParam(':created_by', $created_by);
        $reqUsers->bindParam(':category', $category);
        $reqUsers->bindParam(':tags', $tags);
                
        $result = $reqUsers->execute();
    }

    static function displayArticle($db,$id) {
 
     //   echo "testdisplayArticle ". PHP_EOL;

        $sql = 'SELECT * FROM articles WHERE id=:id';

        $reqUsers = $db->prepare($sql);

        $reqUsers->bindParam(':id', $id);
                
        $result = $reqUsers->execute();

        return $reqUsers->fetch() ;
    }

}


