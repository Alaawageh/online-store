


<div class="row specs" id="specs_<?= $id ?>" data-id="<?= $id ?>">
    <div class="hidden">
        <input name="id[<?= $id ?>]" value="<?= isset($specification) ? $specification->id : '' ?>">
    </div>
    <div class="col-md-5 col-12">
        <label>Key</label>
        <div class="form-label-group">
            <input type="text" id="key-column" class="form-control" placeholder="Key" name="key[<?= $id ?>]" value="<?= isset($specification) ? $specification->key : '' ?>">
            <label for="first-name-column">Key</label>
            <div class="danger">@error('key'){{$message}}@enderror</div>
        </div>
    </div>
    <div class="col-md-5 col-12">
        <label>Value</label>
        <div class="form-label-group">
            <input type="text" id="value-column" class="form-control" placeholder="Value" name="value[<?= $id ?>]" value="<?= isset($specification) ? $specification->value : '' ?>">
            <label for="first-name-column">Value</label>
            <div class="danger">@error('value'){{$message}}@enderror</div>
        </div>
    </div>
    <div class="col-md-2">
        <button type="button" class="delete_spces btn btn-sm btn-danger" data-id="<?= $id ?>"><i class="fa fa-trash"></i></button>
    </div>
</div>
