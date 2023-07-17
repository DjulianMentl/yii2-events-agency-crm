<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 * 
 * @property array $customersList
 * @property array $statusList
 */
class OrderSearch extends Order
{
    /**
     * @var string
     */
    public $eventDateRange;
    
    /**
     * @var string
     */
    public $eventDateStart;

    /**
     * @var string
     */
    public $eventDateEnd;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'event_id', 'customer_id'], 'integer'],
            [['event_date', 'transaction_id', 'created_at', 'updated_at', 'eventDateRange', 'eventDateStart', 'eventDateEnd'], 'safe'],

            // ['eventDateRange', 'match', 'pattern' => '/^.+\s\-\s.+$/'],
            // [['eventDateStart'. 'eventDateEnd'], 'date', 'format' => 'php:Y-m-d']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
                'attributes' => [
                    'id',
                    'created_at',
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'event_id' => $this->event_id,
            'customer_id' => $this->customer_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterCompare('event_date', $this->eventDateStart, '>=');
        $query->andFilterCompare('event_date', $this->eventDateEnd, '<=');

        // $query->andFilterWhere(['like', 'transaction_id', $this->transaction_id]);

        return $dataProvider;
    }

    public function getCustomersList()
    {
        return ArrayHelper::map(User::find()->all(), 'id', 'fullName');
    }

    public function getStatusList()
    {
        return ArrayHelper::map(Order::find()->all(), 'status', 'statusName');

    }
}
