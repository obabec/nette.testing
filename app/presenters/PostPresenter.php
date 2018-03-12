<?php
/**
 * Created by PhpStorm.
 * User: obabec
 * Date: 12.3.18
 * Time: 8:00
 */

namespace App\Presenters;


use Nette\Application\UI\Presenter;
use Nette\Database\Context;
use Tracy\Debugger;

class PostPresenter extends Presenter
{


    private $database;

    public function __construct(Context $database)
    {
        $this->database = $database;
    }


    public function renderShow($postId) {
        Debugger::enable();
        $post = $this->database->table('posts')->get($postId);

         if (!$post) {
             $this -> error("Post not found!");
         } else {
             $this->template->post = $post;
         }
    }

}