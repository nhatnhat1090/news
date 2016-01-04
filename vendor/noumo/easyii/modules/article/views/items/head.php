<?php
use yii\easyii\modules\article\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\Pagination;

$this->title = Yii::t('easyii/article', 'Headnews');

$module = $this->context->module->id;
?>


<?php if(count($data)) : ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <?php if(IS_ROOT) : ?>
                <th width="30">#</th>
            <?php endif; ?>
            <th><?= Yii::t('easyii', 'Title') ?></th>
            <th width="100"><?= Yii::t('easyii', 'Views') ?></th>
            <th width="100"><?= Yii::t('easyii', 'Status') ?></th>
            <?php  if(IS_ROOT || (ROLE == 'admin')): ?>
            <th width="190"></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php 
            foreach($data as $key => $item) :
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
                <td class="status">
                    <?= Html::checkbox('', $item->status == Item::STATUS_ON, [
                        'class' => 'switch',
                        'data-id' => $item->primaryKey,
                        'data-link' => Url::to(['/admin/'.$module.'/items']),
                    ]) ?>
                </td>
                <td class="text-right">
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="<?= Url::to(['/admin/'.$module.'/items/up', 'id' => $item->primaryKey, 'category_id' => $model->primaryKey]) ?>" class="btn btn-default move-up" title="<?= Yii::t('easyii', 'Move up') ?>"><span class="glyphicon glyphicon-arrow-up"></span></a>
                        <a href="<?= Url::to(['/admin/'.$module.'/items/down', 'id' => $item->primaryKey, 'category_id' => $model->primaryKey]) ?>" class="btn btn-default move-down" title="<?= Yii::t('easyii', 'Move down') ?>"><span class="glyphicon glyphicon-arrow-down"></span></a>
                        <a href="<?= Url::to(['/admin/'.$module.'/items/delete', 'id' => $item->primaryKey]) ?>" class="btn btn-default confirm-delete" title="<?= Yii::t('easyii', 'Delete item') ?>"><span class="glyphicon glyphicon-remove"></span></a>
                        <a href="<?= Url::to(['/admin/'.$module.'/items/head', 'id' => $item->primaryKey]) ?>" class="btn btn-default" title="<?= Yii::t('easyii', ($item->head == 0) ? 'Set Head' : 'Unset Head') ?>"><span <?= ($item->head == 1) ? 'style="color: red;"' : '' ?> class="glyphicon glyphicon-star"></span></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p><?= Yii::t('easyii', 'No records found') ?></p>
<?php endif; ?>