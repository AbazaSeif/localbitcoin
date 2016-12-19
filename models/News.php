<?php
defined('_JEXEC') or die('Restricted access');
/**
 * Description of News
 *
 * @author NewEXE
 */
class News
{

    const SHOW_BY_DEFAULT = 1;
    
    private $id_news;
    private $title;
    private $short_news;
    private $full_news;
    private $user_id;

    public static function getNewsList($page)
    {
        $page = intval($page);
        $limit = self::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        $db = $GLOBALS['DB'];
        
        
        $sql = 'SELECT * FROM News '
                . 'ORDER BY id_news ASC LIMIT :limit OFFSET :offset';
        
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        if(!$result)
            return false;

        $newsList = array();

        $i = 0;
        while ($row = $result->fetch())
        {
            $newsList[$i]['id_news'] = $row['id_news'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['short_news'] = $row['short_news'];
            $newsList[$i]['full_news'] = $row['full_news'];
            $newsList[$i]['user_id'] = $row['user_id'];
            $i++;
        }

        return $newsList;
    }

    public static function getNewsById($id_news)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM News WHERE id_news = :id_news';

        $result = $db->prepare($sql);
        $result->bindParam(':id_news', $id_news, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function getTotalNumOfNews()
    {
        //$db = Db::getConnection();
        $db = $GLOBALS['db'];
        $result = $db->query('SELECT count(id_news) AS count FROM News');

        $row = $result->fetch();

        return $row['count'];
    }
    
    public static function checkEnteredId($id)
    {
        
    }

}
