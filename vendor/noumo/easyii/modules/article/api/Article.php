<?php

namespace yii\easyii\modules\article\api;

use Yii;
use yii\data\ActiveDataProvider;
use yii\easyii\models\Tag;
use yii\easyii\modules\article\models\Category;
use yii\easyii\modules\article\models\Item;
use yii\easyii\widgets\Fancybox;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;

/**
 * Article module API
 * @package yii\easyii\modules\article\api
 *
 * @method static CategoryObject cat(mixed $id_slug) Get article category by id or slug
 * @method static array tree() Get article categories as tree
 * @method static array cats() Get article categories as flat array
 * @method static array items(array $options = []) Get list of articles as ArticleObject objects
 * @method static ArticleObject get(mixed $id_slug) Get article object by id or slug
 * @method static mixed last(int $limit = 1) Get last articles
 * @method static void plugin() Applies FancyBox widget on photos called by box() function
 * @method static string pages() returns pagination html generated by yii\widgets\LinkPager widget.
 * @method static \stdClass pagination() returns yii\data\Pagination object.
 */
class Article extends \yii\easyii\components\API {

    private $_cats;
    private $_items;
    private $_adp;
    private $_item = [];
    private $_last;

    public function api_cat($id_slug) {
        if (!isset($this->_cats[$id_slug])) {
            $this->_cats[$id_slug] = $this->findCategory($id_slug);
        }
        return $this->_cats[$id_slug];
    }

    public function api_tree() {
        return Category::tree();
    }

    public function api_cats() {
        return Category::cats();
    }

    public function api_catRoot() {
        return Category::getRootCates();
    }

    public function api_items($options = []) {
        if (!$this->_items) {
            $this->_items = [];

            $with = ['seo', 'category'];
            if (Yii::$app->getModule('admin')->activeModules['article']->settings['enableTags']) {
                $with[] = 'tags';
            }
            $query = Item::find()->with($with)->status(Item::STATUS_ON);

            if (!empty($options['where'])) {
                $query->andFilterWhere($options['where']);
            }
            if (!empty($options['tags'])) {
                $query
                        ->innerJoinWith('tags', false)
                        ->andWhere([Tag::tableName() . '.name' => (new Item())->filterTagValues($options['tags'])])
                        ->addGroupBy('item_id');
            }
            if (!empty($options['orderBy'])) {
                $query->orderBy($options['orderBy']);
            } else {
                $query->sortDate();
            }

            $this->_adp = new ActiveDataProvider([
                'query' => $query,
                'pagination' => !empty($options['pagination']) ? $options['pagination'] : []
            ]);

            foreach ($this->_adp->models as $model) {
                $this->_items[] = new ArticleObject($model);
            }
        }
        return $this->_items;
    }

    public function api_last($limit = 1, $where = null) {
        if ($limit === 1 && $this->_last) {
            return $this->_last;
        }

        $result = [];

        $with = ['seo'];
        if (Yii::$app->getModule('admin')->activeModules['article']->settings['enableTags']) {
            $with[] = 'tags';
        }
        $query = Item::find()->with($with)->status(Item::STATUS_ON)->where(['not', ['type' => 4]])->sortDate()->limit($limit);
        if ($where) {
            $query->andFilterWhere($where);
        }

        foreach ($query->all() as $item) {
            $result[] = new ArticleObject($item);
        }

        if ($limit > 1) {
            return $result;
        } else {
            $this->_last = count($result) ? $result[0] : null;
            return $this->_last;
        }
    }

    public function api_mostView($limit = 1) {

        $result = [];

        $with = ['seo'];
        if (Yii::$app->getModule('admin')->activeModules['article']->settings['enableTags']) {
            $with[] = 'tags';
        }
        $query = Item::find()->with($with)->status(Item::STATUS_ON)->sortView()->limit($limit);

        foreach ($query->all() as $item) {
            $result[] = new ArticleObject($item);
        }

        return $result;
    }
    
    public function api_media($limit = 1) {

        $result = [];

        $with = ['seo'];
        if (Yii::$app->getModule('admin')->activeModules['article']->settings['enableTags']) {
            $with[] = 'tags';
        }
        $query = Item::find()->with($with)->where(['in', 'type', [2, 3]])->status(Item::STATUS_ON)->sortDate()->limit($limit);

        foreach ($query->all() as $item) {
            $result[] = new ArticleObject($item);
        }

        return $result;
    }

    public function api_byRoot($limit = 1, $id) {

        $result = [];

        $with = ['seo'];
        if (Yii::$app->getModule('admin')->activeModules['article']->settings['enableTags']) {
            $with[] = 'tags';
        }
        $cate = Category::find()->select('category_id')->where(['tree' => $id])->sort()->asArray()->all();
        $query = Item::find()->with($with)->status(Item::STATUS_ON)->sortDate()->limit($limit)->where(['category_id' => ArrayHelper::map($cate, 'category_id', 'category_id')]);

        foreach ($query->all() as $item) {
            $result[] = new ArticleObject($item);
        }

        return $result;
    }

    public function api_topOfRootCate($id) {
        $record = null;
        $cate = Category::find()->select('category_id')->where(['tree' => $id])->sort()->asArray()->all();
        $query = Item::find()->status(Item::STATUS_ON)->sortDate()->where(['category_id' => ArrayHelper::map($cate, 'category_id', 'category_id'), 'head' => 1]);
        $query1 = Item::find()->status(Item::STATUS_ON)->sortDate()->where(['category_id' => ArrayHelper::map($cate, 'category_id', 'category_id')]);
        $record = $query->one();
        if (!$record) {
            $record = $query1->one();
        }

        return $record ? new ArticleObject($record) : $record;
    }

    public function api_CateChild($id) {
        $result = [];
        $category = Category::find()->where(['and', 'tree=:tree', 'depth <> 0'], [':tree' => $id])->status(Category::STATUS_ON)->all();
        foreach ($category as $item) {
            $result[] = new CategoryObject($item);
        }
        return $result;
    }

    public function api_CateParent($tree, $id) {
        $result = null;
        $category = Category::find()->where(['and', 'tree=:tree', 'depth = 0', 'category_id <> :id'], [':tree' => $tree, ':id' => $id])->status(Category::STATUS_ON)->one();
        if ($category) {
            $result = new CategoryObject($category);
        }

        return $result;
    }

    public function api_get($id_slug) {
        if (!isset($this->_item[$id_slug])) {
            $this->_item[$id_slug] = $this->findItem($id_slug);
        }
        return $this->_item[$id_slug];
    }

    public function api_related($id_cate, $id_exclude, $limit, $text = true) {
        $result = [];
        $condition = (!$text) ? ['and', 'type<>1', ['not', ['item_id' => $id_exclude]]] : ['not', ['item_id' => $id_exclude]];

        $related = Category::findOne($id_cate)->hasMany(Item::className(), ['category_id' => 'category_id'])->where($condition)->sortDate()->limit($limit)->all();

        foreach ($related as $item) {
            $result[] = new ArticleObject($item);
        }

        return $result;
    }

    public function api_plugin($options = []) {
        Fancybox::widget([
            'selector' => '.easyii-box',
            'options' => $options
        ]);
    }

    public function api_pagination() {
        return $this->_adp ? $this->_adp->pagination : null;
    }

    public function api_pages() {
        $html = '';
        if ($this->_adp) {
            $this->_adp->pagination->defaultPageSize = $this->_adp->pagination->pageSize;
            
            $html = LinkPager::widget(['pagination' => $this->_adp->pagination]);
        } 
       
        return $html;    
    }

    private function findCategory($id_slug) {
        $category = Category::find()->where(['or', 'category_id=:id_slug', 'slug=:id_slug'], [':id_slug' => $id_slug])->status(Item::STATUS_ON)->one();

        return $category ? new CategoryObject($category) : null;
    }

    private function findItem($id_slug) {
        $article = Item::find()->where(['or', 'item_id=:id_slug', 'slug=:id_slug'], [':id_slug' => $id_slug])->status(Item::STATUS_ON)->one();
        if ($article) {
            $article->updateCounters(['views' => 1]);
            return new ArticleObject($article);
        } else {
            return null;
        }
    }

    public function api_shortcut($text, $num) {
        $limit = $num - 1;
        $str_tmp = '';
        //explode -- Split a string by string
        $arrstr = explode(" ", $text);
        if (count($arrstr) <= $num) {
            return $text;
        }
        if (!empty($arrstr)) {
            for ($j = 0; $j < count($arrstr); $j++) {
                $str_tmp .= " " . $arrstr[$j];
                if ($j == $limit) {
                    break;
                }
            }
        }
        
        return $str_tmp . '...';
    }

}
