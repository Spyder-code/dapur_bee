<x-error-validation/>

<x-input :value="$transactiondetail->user_id??old('user_id')" :col="6" :label="'User_id'" :type="'select'" :name="'user_id'" :required="true"></x-input>
<x-input :value="$transactiondetail->product_id??old('product_id')" :col="6" :label="'Product_id'" :type="'select'" :name="'product_id'" :required="true"></x-input>
<x-input :value="$transactiondetail->note??old('note')" :col="6" :label="'Note'" :type="'textarea'" :name="'note'" :required="true"></x-input>