<x-error-validation/>

<x-input :value="$order->customer_id??old('customer_id')" :col="6" :label="'Customer_id'" :type="'select'" :name="'customer_id'" :required="true"></x-input>
<x-input :value="$order->message??old('message')" :col="6" :label="'Message'" :type="'textarea'" :name="'message'" :required="true"></x-input>
<x-input :value="$order->status??old('status')" :col="6" :label="'Status'" :type="'number'" :name="'status'" :required="true"></x-input>