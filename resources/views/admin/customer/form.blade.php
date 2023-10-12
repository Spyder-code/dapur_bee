<x-error-validation/>

<x-input :value="$customer->ip_address??old('ip_address')" :col="6" :label="'Ip_address'" :type="'text'" :name="'ip_address'" :required="true"></x-input>
<x-input :value="$customer->name??old('name')" :col="6" :label="'Name'" :type="'text'" :name="'name'" :required="true"></x-input>
<x-input :value="$customer->phone??old('phone')" :col="6" :label="'Phone'" :type="'text'" :name="'phone'" :required="true"></x-input>
<x-input :value="$customer->address??old('address')" :col="6" :label="'Address'" :type="'textarea'" :name="'address'" :required="true"></x-input>