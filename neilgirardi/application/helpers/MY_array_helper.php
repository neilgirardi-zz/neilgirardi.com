<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( 'objectToArray', $object );
    }

    //pizza sorting function    
    function pizza_sort($a, $b){
		//push unchecked toppings down
		$a->topping_state = ($a->topping_state == 0) ? 1000 : $a->topping_state;
    	$b->topping_state = ($b->topping_state == 0) ? 1000 : $b->topping_state;
    
    	if($a->topping_state == $b->topping_state){
    		return ($a->topping_id < $b->topping_id) ? -1 : 1;
    	}else{
    		return ($a->topping_state < $b->topping_state) ? -1 : 1;
    	}
    
    }
