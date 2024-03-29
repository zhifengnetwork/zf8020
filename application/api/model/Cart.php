<?php
namespace app\api\model;
use think\Model;
use think\Db;

class Cart extends Model
{
    protected $table = 'cart';

    public function cartList($where = array())
    {   
        $cart_list = $this->field('id cart_id,selected,session_id,user_id,groupon_id,goods_id,goods_sn,goods_name,market_price,goods_price,member_goods_price,subtotal_price,sku_id,goods_num,spec_key_name')->where($where)->order('id DESC')->select();
        
        $arr = [];
        if($cart_list){
            foreach($cart_list as $key=>$value){

                if( isset($arr[$value['goods_id']]) ){
                    $arr[$value['goods_id']]['cart_id'] = $arr[$value['goods_id']]['cart_id'] . ',' . $value['cart_id'];
                    $arr[$value['goods_id']]['subtotal_price'] = sprintf("%.2f",$arr[$value['goods_id']]['subtotal_price'] + $value['subtotal_price']);
                    $arr[$value['goods_id']]['goods_num'] = $arr[$value['goods_id']]['goods_num'] + $value['goods_num'];
                    $arr[$value['goods_id']]['spec'][] = $value;
                }else{
                    $arr[$value['goods_id']]['cart_id'] = $value['cart_id'];
                    $arr[$value['goods_id']]['groupon_id'] = $value['groupon_id'];
                    $arr[$value['goods_id']]['goods_id'] = $value['goods_id'];
                    $arr[$value['goods_id']]['goods_name'] = $value['goods_name'];
                    $arr[$value['goods_id']]['goods_sn'] = $value['goods_sn'];
                    $arr[$value['goods_id']]['img'] = Db::table('goods_img')->where('goods_id',$value['goods_id'])->where('main',1)->value('picture');
                    $arr[$value['goods_id']]['market_price'] = $value['market_price'];
                    $arr[$value['goods_id']]['subtotal_price'] = $value['subtotal_price'];
                    $arr[$value['goods_id']]['goods_num'] = $value['goods_num'];
                    $arr[$value['goods_id']]['spec'][] = $value;
                }
            }
        }
        
        $arr = ota($arr);
        $arr = array_values( $arr );
        return $arr;
    }

    public function cartList1($where = array())
    {   

        $cart_list = $this->field('id cart_id,selected,session_id,user_id,groupon_id,goods_id,goods_sn,goods_name,market_price,goods_price,member_goods_price,subtotal_price,sku_id,goods_num,spec_key_name')->where($where)->order('id DESC')->select();

        $arr = [];
        if($cart_list){
            $flag = false;
            foreach($cart_list as $key=>$value){
                $cart_list[$key]['img'] = Db::table('goods_img')->where('goods_id',$value['goods_id'])->where('main',1)->value('picture');
                $cart_list[$key]['single_number'] = Db::table('goods')->where('goods_id',$value['goods_id'])->value('single_number');
                // $cart_list[$key]['spec'] = action('goods/getGoodsSpec',['goods_id'=>$value['goods_id']]);
            }
        }

        $arr = ota($cart_list);
        $arr = array_values( $arr );
        return $arr;
    }
}
