<x-error-validation/>

<x-input :value="$productcategory->name??old('name')" :col="6" :label="'Nama Kategori'" :type="'text'" :name="'name'" :required="true"></x-input>
<x-input :value="$productcategory->icon??old('icon')" :col="6" :label="'Icon'" :type="'text'" :name="'icon'" :required="true"></x-input>
<x-input :value="$productcategory->slug??old('slug')" :col="6" :label="'Slug'" :type="'text'" :name="'slug'" :required="true"></x-input>
<x-input :value="$productcategory->description??old('description')" :col="6" :label="'Deskripsi'" :type="'textarea'" :name="'description'" :required="true"></x-input>
