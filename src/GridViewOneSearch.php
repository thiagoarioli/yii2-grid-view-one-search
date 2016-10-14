<?php
namespace thiagoarioli\onesearch;

use dmstr\helpers\Html;
use yii\grid\GridView;


/**
 * The GridView widget is used to display data in a grid.
 *
 * It provides features like [[sorter|sorting]], [[pager|paging]] and also [[filterModel|filtering]] the data.
 *
 * A basic usage looks like the following:
 *
 * ```php
 * <?= GridView::widget([
 *     'dataProvider' => $dataProvider,
 *     'columns' => [
 *         'id',
 *         'name',
 *         'created_at:datetime',
 *         // ...
 *     ],
 * ]) ?>
 * ```
 *
 * The columns of the grid table are configured in terms of [[Column]] classes,
 * which are configured via [[columns]].
 *
 * The look and feel of a grid view can be customized using the large amount of properties.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */


class GridViewOneSearch extends GridView
{
    public $searchOptions = ["name" =>"search-find", "options" => ["class" => "x"]];

    public $layout =  "<div class='pull-left'>{summary}</div> <div class='pull-right'>{searchInput}</div> {items}{pager} ";

    public function init()
    {
        parent::init();

    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        $view = $this->getView();
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $this->searchOptions['options']['id'] = $this->searchOptions["name"];
        $view->registerJs("searchValue = '" . $search . "';", \yii\web\View::POS_HEAD);
        $view->registerJs("filter_selector = '#" .$this->searchOptions["name"]. "';", \yii\web\View::POS_HEAD);
        GridViewOneSearchAsset::register($view);

        parent::run();
    }

    /**
     * @inheritdoc
     */
    public function renderSection($name)
    {

        switch ($name) {
            case '{searchInput}':
                return Html::input('text',$this->searchOptions["name"],null,$this->searchOptions["options"]);
            default:
                return parent::renderSection($name);
        }
    }




}
