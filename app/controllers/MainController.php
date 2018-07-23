<?php

namespace app\controllers;

use app\models\Main;
use R;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Helper;

class MainController extends AppController
{
    public $view = 'index';
    public $layout = 'default';
    /**
     * главная страница.
     */
    public function indexAction()
    {
        if(!isset($_SESSION['user_data'])) {
            Helper::redirect('/user/login');
        }

        // сортировка (login, name, role)
        if(isset($_GET['order'])) {
            $order = Helper::cleanStrData($_GET['order']);
        } else {
            $order = 'role';
        }

        if(isset($_GET['sort'])) {
            $sort = Helper::cleanStrData($_GET['sort']);
        } else {
            $sort = 'ASC';
        }

        // поиск
        if(isset($_GET['search'])) {
            $search = Helper::cleanStrData($_GET['search']);
            $users = R::find('user', " name LIKE :search ORDER BY {$order} $sort", [':search' => '%' . $search . '%']);
        } else {
            if (!empty($_POST['search'])) {
                $search = Helper::cleanStrData($_POST['search']);
                $users = R::find('user', " name LIKE :search ORDER BY {$order} $sort", [':search' => '%' . $search . '%']);
            } else {
                //получаем все записи.
                $users = \R::findAll('user', " ORDER BY {$order} $sort");
                $search = '';
            }
        }

        // устанавливаем мета.
        View::setMeta('Index title admin', 'some description use in admin', 'keywords');

        // устанавливаем обратную сортировку.
        ($sort == 'DESC') ? $sort = 'ASC' : $sort = 'DESC';

        // передаем переменную в вид
        $this->set( compact('users', 'sort', 'order','search'));
    }
}