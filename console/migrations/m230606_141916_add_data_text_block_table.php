<?php

use common\models\TextBlock;
use yii\db\Migration;

/**
 * Class m230606_141916_add_data_text_block_table
 */
class m230606_141916_add_data_text_block_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = TextBlock::tableName();
        $columns = ['shortcut', 'text'];
        $data = [
            [
                'shortcut' => 'about1',
                'text' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut lao dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper lobortis
                nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hend rerit in vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odioqui blandit
                praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dol ore eu feugiat nulla facilisis at vero
                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod
                mazim placerat facer possim assum."
            ],
            [
                'shortcut' => 'about2',
                'text' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut lao dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper lobortis
                nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hend rerit in vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odioqui blandit
                praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse."
            ],
            [
                'shortcut' => 'about3',
                'text' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laodolore magna aliquam erat volutpat. Ut wisi minim veniam, quis nostrud exerci tation ullamcorper lobortis nisl ut
                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in v esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio diqui blandit praesent
                luptatum zzril delenit aug s dolore te feugait nulla facilisi.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laodolore magna m erat volutpat. Ut wisi enim ad minim
                veniam, quis nostrud exerci tation ullamcorper lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel riure dolor in hendrerit in vulputateesse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                at vero eros et accumsan et iusto odio diqui blandit nt luptatum zzril delenit augue duis dolore te feugait nulla facilisi."
            ],
        ];

        $this->batchInsert($tableName, $columns, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('text_block');
    }
}
