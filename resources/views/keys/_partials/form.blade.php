{{ csrf_field() }}
<div class="form-group">
    <label for="type">Type: </label>
    <select class="form-control" id="type" name="type" placeholder="Select Type..." value="{{ old('type', $key->type ?? null) }}" required>
        <option value="">Select Type</option>
        <option value="Key" {{ (old('type', $key->type ?? null)  == "Key") ? 'selected="selected"' : null }}>Key</option>
        <option value="Fob" {{ (old('type', $key->type ?? null)  == "Fob") ? 'selected="selected"' : null }}>Fob</option>
    </select>
</div>
<div class="form-group">
    <label for="code">Code: </label>
    <input type="text" class="form-control" id="code" name="code" placeholder="Code..." value="{{ old('code', $key->code ?? null) }}" required>
</div>
<div class="form-group">
    <label for="description">Description: </label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Description..." value="{{ old('description', $key->description ?? null) }}" required>
</div>