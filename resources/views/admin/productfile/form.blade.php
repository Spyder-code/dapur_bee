<x-error-validation/>

<x-input :value="$productfile->filename??old('filename')" :col="6" :label="'Filename'" :type="'text'" :name="'filename'" :required="true"></x-input>
<x-input :value="$productfile->path??old('path')" :col="6" :label="'Path'" :type="'text'" :name="'path'" :required="true"></x-input>
<x-input :value="$productfile->mime??old('mime')" :col="6" :label="'Mime'" :type="'text'" :name="'mime'" :required="true"></x-input>
<x-input :value="$productfile->size??old('size')" :col="6" :label="'Size'" :type="'text'" :name="'size'" :required="true"></x-input>
<x-input :value="$productfile->product_id??old('product_id')" :col="6" :label="'Product_id'" :type="'select'" :name="'product_id'" :required="true"></x-input>
<x-input :value="$productfile->order??old('order')" :col="6" :label="'Order'" :type="'number'" :name="'order'" :required="true"></x-input>