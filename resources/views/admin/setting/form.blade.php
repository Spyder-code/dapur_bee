<x-error-validation/>

<x-input :value="$setting->facebook??old('facebook')" :col="6" :label="'Link Facebook'" :type="'text'" :name="'facebook'" :required="true"></x-input>
<x-input :value="$setting->twitter??old('twitter')" :col="6" :label="'Link Twitter'" :type="'text'" :name="'twitter'" :required="true"></x-input>
<x-input :value="$setting->instagram??old('instagram')" :col="6" :label="'Link Instagram'" :type="'text'" :name="'instagram'" :required="true"></x-input>
<x-input :value="$setting->youtube??old('youtube')" :col="6" :label="'Link Youtube'" :type="'text'" :name="'youtube'" :required="true"></x-input>
<x-input :value="$setting->whatsapp??old('whatsapp')" :col="6" :label="'Whatsapp Number'" :type="'text'" :name="'whatsapp'" :required="true"></x-input>
{{-- <x-input :value="$setting->province_id??old('province_id')" :col="6" :label="'Province_id'" :type="'number'" :name="'province_id'" :required="true"></x-input>
<x-input :value="$setting->city_id??old('city_id')" :col="6" :label="'City_id'" :type="'number'" :name="'city_id'" :required="true"></x-input>
<x-input :value="$setting->district_id??old('district_id')" :col="6" :label="'District_id'" :type="'number'" :name="'district_id'" :required="true"></x-input> --}}
<x-input :value="$setting->address??old('address')" :col="6" :label="'Alamat Pengiriman'" :type="'text'" :name="'address'" :required="true"></x-input>
<x-input :value="$setting->distance_price??old('distance_price')" :col="6" :label="'Harga Ongkir/Km (Rp)'" :type="'number'" :name="'distance_price'" :required="true"></x-input>
<x-input :value="$setting->distance_min??old('distance_min')" :col="6" :label="'Harga Ongkir Minimal (Rp)'" :type="'number'" :name="'distance_min'" :required="true"></x-input>
{{-- <x-input :value="$setting->midtrans_client_key??old('midtrans_client_key')" :col="6" :label="'Midtrans client key'" :type="'text'" :name="'midtrans_client_key'" :required="true"></x-input> --}}
{{-- <x-input :value="$setting->midtrans_server_key??old('midtrans_server_key')" :col="6" :label="'Midtrans server key'" :type="'text'" :name="'midtrans_server_key'" :required="true"></x-input> --}}
{{-- <x-input :value="$setting->raja_ongkit_key??old('raja_ongkit_key')" :col="6" :label="'Raja_ongkit_key'" :type="'text'" :name="'raja_ongkit_key'" :required="true"></x-input>
<x-input :value="$setting->raja_ongkir_tipe??old('raja_ongkir_tipe')" :col="6" :label="'Raja_ongkir_tipe'" :type="'select'" :name="'raja_ongkir_tipe'" :required="true"></x-input> --}}

{{-- <div class="col-6">
    <div class="fv-row mb-7">
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">URL Notification Handling</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Input di dashboard MIDTRANS"></i>
        </label>
        <input type="text" disabled class="form-control form-control-solid" value="{{ url('api/notification/handling') }}" />
    </div>
</div> --}}
