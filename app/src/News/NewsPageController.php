<?php
namespace App\News;

use App\News\News;
use PageController;
use App\Events\Event;
use SilverStripe\ORM\PaginatedList;

/**
 * Class \App\Events\EventPageController
 *
 * @property \App\News\NewsPage dataRecord
 * @method \App\News\NewsPage data()
 * @mixin \App\News\NewsPage dataRecord
 */
class NewsPageController extends PageController {

    private static $allowed_actions = array (
        "view"
    );

    public function getNews() {
        $news = News::get();
        $pagelist = new PaginatedList($news, $this->request);
        $pagelist->setPageLength(10);
        return $pagelist;
    }

    public function getEvents() {
        $news = Event::get();
        $pagelist = new PaginatedList($news, $this->request);
        $pagelist->setPageLength(3);
        return $pagelist;
    }

    public function view() {
        $id = $this->getRequest()->param("ID");
        $article = News::get()->byId($id);
        return array(
            "News" => $article,
        );
    }
}
