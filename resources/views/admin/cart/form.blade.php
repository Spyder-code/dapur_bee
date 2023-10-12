<x-error-validation/>

<x-input :value="$cart->customer_id??old('customer_id')" :col="6" :label="'Customer_id'" :type="'select'" :name="'customer_id'" :required="true"></x-input>
<x-input :value="$cart->product_id??old('product_id')" :col="6" :label="'Product_id'" :type="'select'" :name="'product_id'" :required="true"></x-input>
<x-input :value="$cart->note??old('note')" :col="6" :label="'Note'" :type="'textarea'" :name="'note'" :required="true"></x-input>