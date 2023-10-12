<x-error-validation/>

<x-input :value="$user->name??old('name')" :col="6" :label="'Name'" :type="'text'" :name="'name'" :required="true"></x-input>
<x-input :value="$user->email??old('email')" :col="6" :label="'Email'" :type="'text'" :name="'email'" :required="true"></x-input>
<x-select :options="[1=>'Superadmin',2=>'Kasir',3=>'Customer']" :value="$user->role_id??old('role_id')" :col="6" :label="'Role'" :type="'select'" :name="'role_id'" :required="true"></x-select>
<x-input :value="$user->phone??old('phone')" :col="6" :label="'Phone'" :type="'text'" :name="'phone'" :required="true"></x-input>
<x-input :value="$user->address??old('address')" :col="6" :label="'Address'" :type="'textarea'" :name="'address'" :required="true"></x-input>
<x-input :value="old('password')" :col="6" :label="'Password'" :type="'text'" :name="'password'" :required="true"></x-input>
<hr>
