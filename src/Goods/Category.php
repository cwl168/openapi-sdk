<?php
/**
 * Vendor_Goods_Category
 *
 * PHP version 5.2+
 *
 * @category  Goods
 * @package   Vendor\Goods
 * @author    Guojing Liu <liugj@boqii.com>
 * @copyright 2016-2019 guangcheng Co. All Rights Reserved.
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @version   GIT:<git_id>
 * @link      http://shop.openapi.boqii.com
 */
class Vendor_Goods_Category extends Vendor_Api
{
    /**
     * getList
     *
     * @param mixed $criteria
     * @param mixed $orderSort
     * @param int   $limit
     * @param int   $offset
     *
     * @access public
     *
     * @return mixed
     */
    public function getList($criteria, $orderSort = '', $limit = 0, $offset = -1)
    {
        $url = 'goods/categories?act=getList';
        $orderSort ? $criteria['ordersort'] = $orderSort : '';
        $limit ? $criteria['limit'] = $limit : '';
        $offset >=0? $criteria['offset']    = $offset:'';
       
        return  $this->client->get($url, $criteria);
    }

    /**
     * show
     *
     * @param $id
     * @param array $criteria
     *
     * @return mixed
     */
    public function show($id, $criteria = array())
    {
        $url = sprintf('goods/category/%d', $id);

        return  $this->client->get($url, $criteria)->toArray();
    }
    /**
     * getParentInfo
     *
     * @param  array $criteria
     * @access public
     * @return mixed
     */
    public function getParentInfo($criteria = array())
    {
        $url = 'goods/categories?act=getParentInfo';

        return  $this->client->get($url, $criteria)->toArray();
    }

    /**
     * 根据商品Id 获取分类父ID
     *
     * @param $criteria
     *
     * @return mixed
     */
    public function getParentIdByPid($criteria)
    {
        $url = 'goods/categories?act=getParentIdByPid';

        return $this->client->get($url, $criteria)->firstValue('cid');
    }

    /**
     * 根据ID 获取多个分类
     *
     * @param $criteria
     *
     * @return mixed
     */
    public function getMulti($criteria)
    {
        $url = 'goods/categories?act=getMulti';

        return $this->client->get($url, $criteria)->toArray();
    }
    /**
     * getParentPath
     *
     * @param mixed $criteria
     *
     * @access public
     *
     * @return mixed
     */
    public function getParentPath($criteria)
    {
        $url = 'goods/categories?act=getParentPath';

        return $this->client->get($url, $criteria)->toArray();
    }
}
