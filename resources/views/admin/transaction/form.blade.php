<x-error-validation/>

<x-select :value="$transaction->status??old('status')" :col="6" :label="'Status'" :options="['process'=>'process','delivery'=>'delivery','complete'=>'complete']" :type="'select'" :name="'status'" :required="true"></x-select>
{{-- <x-input :value="$transaction->user_id??old('user_id')" :col="6" :label="'User_id'" :type="'select'" :name="'user_id'" :required="true"></x-input>
<x-input :value="$transaction->invoice??old('invoice')" :col="6" :label="'Invoice'" :type="'text'" :name="'invoice'" :required="true"></x-input>
<x-input :value="$transaction->amount??old('amount')" :col="6" :label="'Amount'" :type="'number'" :name="'amount'" :required="true"></x-input>
<x-input :value="$transaction->receiver??old('receiver')" :col="6" :label="'Receiver'" :type="'text'" :name="'receiver'" :required="true"></x-input>
<x-input :value="$transaction->phone??old('phone')" :col="6" :label="'Phone'" :type="'text'" :name="'phone'" :required="true"></x-input>
<x-input :value="$transaction->province_id??old('province_id')" :col="6" :label="'Province_id'" :type="'select'" :name="'province_id'" :required="true"></x-input>
<x-input :value="$transaction->city_id??old('city_id')" :col="6" :label="'City_id'" :type="'select'" :name="'city_id'" :required="true"></x-input>
<x-input :value="$transaction->district_id??old('district_id')" :col="6" :label="'District_id'" :type="'select'" :name="'district_id'" :required="true"></x-input>
<x-input :value="$transaction->expedition_name??old('expedition_name')" :col="6" :label="'Expedition_name'" :type="'text'" :name="'expedition_name'" :required="true"></x-input>
<x-input :value="$transaction->expedition_type??old('expedition_type')" :col="6" :label="'Expedition_type'" :type="'text'" :name="'expedition_type'" :required="true"></x-input>
<x-input :value="$transaction->expedition_price??old('expedition_price')" :col="6" :label="'Expedition_price'" :type="'number'" :name="'expedition_price'" :required="true"></x-input>
<x-input :value="$transaction->address??old('address')" :col="6" :label="'Address'" :type="'textarea'" :name="'address'" :required="true"></x-input>
<x-input :value="$transaction->city??old('city')" :col="6" :label="'City'" :type="'text'" :name="'city'" :required="true"></x-input>
<x-input :value="$transaction->postcode??old('postcode')" :col="6" :label="'Postcode'" :type="'text'" :name="'postcode'" :required="true"></x-input>
<x-input :value="$transaction->total??old('total')" :col="6" :label="'Total'" :type="'number'" :name="'total'" :required="true"></x-input>
<x-input :value="$transaction->is_paid??old('is_paid')" :col="6" :label="'Is_paid'" :type="'number'" :name="'is_paid'" :required="true"></x-input>
<x-input :value="$transaction->payment_status_id??old('payment_status_id')" :col="6" :label="'Payment_status_id'" :type="'select'" :name="'payment_status_id'" :required="true"></x-input>
<x-input :value="$transaction->token??old('token')" :col="6" :label="'Token'" :type="'text'" :name="'token'" :required="true"></x-input> --}}
