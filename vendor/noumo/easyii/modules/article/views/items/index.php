<?php
use yii\easyii\modules\article\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\Pagination;

$this->title = Yii::t('easyii/article', 'Articles');

$module = $this->context->module->id;

$query = $model->getItems();
$countQuery = clone $query;
// get the total number of articles (but do not fetch the article data yet)
$count = $countQuery->count();

// create a pagination object with the total count
$pagination = new Pagination(['totalCount' => $count]);
//$pagination->pageSize = 2;
//$pagination->defaultPageSize = 2;
$pagination->route = Url::to(['/admin/'.$this->context->module->id.'/items']);
// limit the query using the pagination and retrieve the articles
$articles = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

?>
<?= $this->render('_menu', ['category' => $model]) ?>

<?php if(count($articles)) : ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <?php if(IS_ROOT) : ?>
                <th width="50">#</th>
            <?php endif; ?>
            <th><?= Yii::t('easyii', 'Title') ?></th>
            <th width="120"><?= Yii::t('easyii', 'Views') ?></th>
            <th width="100"><?= Yii::t('easyii', 'Status') ?></th>
            <?php  if(IS_ROOT || (ROLE == 'admin')): ?>
            <th width="150"></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php 
            foreach($articles as $key => $item) :
                $typeIcon = '';
                if ($item->type == '2') {
                    $typeIcon = '<span class="glyphicon glyphicon-picture"></span>';
                } elseif($item->type == '3') {
                    $typeIcon = '<span class="glyphicon glyphicon-facetime-video"></span>';
                }
        ?>
            <tr data-id="<?= $item->primaryKey ?>">
                <?php if(IS_ROOT) : ?>
                    <td><?= $item->primaryKey ?></td>
                <?php endif; ?>
                <td><a href="<?= Url::to(['/admin/'.$module.'/items/edit', 'id' => $item->primaryKey]) ?>"><?= $typeIcon ?> <?= $item->title ?></a></td>
                <td><?= $item->views ?></td>
                <?php  if(IS_ROOT || (ROLE == 'admin')): ?>
                <td class="status">
                    <?= Html::checkbox('', $item->status == Item::STATUS_ON, [
                        'class' => 'switch',
                        'data-id' => $item->primaryKey,
                        'data-link' => Url::to(['/admin/'.$module.'/items']),
                    ]) ?>
                </td>
                <td class="text-right">
                    <div class="btn-group btn-group-sm" role="group">
                        <?php if($key == 0): ?>
                        <a class="btn btn-default disabled" href="#"><span style="color: red;" class="glyphicon glyphicon-pushpin"></span></a>
                        <?php else: ?>
                            <a href="<?= Url::to(['/admin/'.$module.'/items/pin', 'id' => $item->primaryKey]) ?>" class="btn btn-default" title="<?= Yii::t('easyii', 'Pin') ?>"><span class="glyphicon glyphicon-pushpin"></span></a>
                        <?php endif; ?>
                        <a href="<?= Url::to(['/admin/'.$module.'/items/up', 'id' => $item->primaryKey, 'category_id' => $model->primaryKey]) ?>" class="btn btn-default move-up" title="<?= Yii::t('easyii', 'Move up') ?>"><span class="glyphicon glyphicon-arrow-up"></span></a>
                        <a href="<?= Url::to(['/admin/'.$module.'/items/down', 'id' => $item->primaryKey, 'category_id' => $model->primaryKey]) ?>" class="btn btn-default move-down" title="<?= Yii::t('easyii', 'Move down') ?>"><span class="glyphicon glyphicon-arrow-down"></span></a>
                        <a href="<?= Url::to(['/admin/'.$module.'/items/delete', 'id' => $item->primaryKey]) ?>" class="btn btn-default confirm-delete" title="<?= Yii::t('easyii', 'Delete item') ?>"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </td>
                <?php else: ?>
                    <td class="status"><?= ($item->status == '1') ? '<span style="color: #27b6af;">' . Yii::t('easyii', 'Approved') . '</span>' : '<span style="color: #C92F74;">' . Yii::t('easyii', 'Unapproved') . '</span>' ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?= yii\widgets\LinkPager::widget([
        'pagination' => $pagination
    ]) ?>
<?php else : ?>
    <p><?= Yii::t('easyii', 'No records found') ?></p>
<?php endif; ?>