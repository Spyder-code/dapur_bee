<x-error-validation/>

<x-input :value="$product->name??old('name')" :col="4" :label="'Nama Produk'" :type="'text'" :name="'name'" :required="true"></x-input>
<x-input :value="$product->price??old('price')" :col="4" :label="'Harga Produk'" :type="'number'" :name="'price'" :required="true"></x-input>
<x-input :value="$product->stock??old('stock')" :col="4" :label="'Stock'" :type="'number'" :name="'stock'" :required="true"></x-input>
<x-select :value="$product->product_category_id??old('product_category_id')" :col="4" :label="'Kategori'" :options="$product_categories" :name="'product_category_id'" :required="true"></x-select>
<x-input :value="$product->description??old('description')" :col="6" :label="'Deskripsi'" :type="'textarea'" :name="'description'" :required="true"></x-input>
<x-input :value="$product->image??old('image')" :col="6" :label="'Foto'" :type="'file'" :name="'image'" :required="true"></x-input>
