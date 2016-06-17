<?php
/**
 * Author: Yuri Efimov
 * User: octopus
 * Date: 5/16/2016
 * Time: 4:56 AM
 * Filename: ItemsItem.php
 */

namespace Karas\Images\Model;

use Pagekit\Database\ORM\ModelTrait;
use Pagekit\System\Model\DataModelTrait;

/**
 * @Entity(tableClass="@news_item")
 */
class Item implements \JsonSerializable {
    use DataModelTrait, ModelTrait;

    /** @Column(type="integer") @Id */
    public $id;

    /** @Column(type="string") */
    public $title;

    /** @Column */
    public $content = '';

    public function jsonSerialize()
    {
        $data =[
            'id'=>$this->id,
            'title'=>$this->title
        ];
        return $this->toArray($data);
    }

}