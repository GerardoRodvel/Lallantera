<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //Mas assignment
    protected $fillable = ["status"];
      //relaciones
      public function in_Shopping_Carts(){
        return $this->hasmany("App\InShoppingCart");
      }

      public function products(){
        return $this->belongsToMany("App\Product","in_shopping_carts");
      }

      public function productsSize(){
        //return 3;
        return $this->products()->count();
      }

    public static function findOrCreateBySessionID($shopping_cart_id){
      if ($shopping_cart_id){
          //Buscar en el carrito de compras con este id
        return ShoppingCart::findBySession($shopping_cart_id);
      }else{
          // crear un carrito de compras
          return ShoppingCart::createWithoutSession();
        }
    }
      public static function findBySession($shopping_cart_id){
        return ShoppingCart::find($shopping_cart_id);
      }

      public static function createWithoutSession(){
        return ShoppingCart::create(["status" => "incompleted"]);
      }



}
