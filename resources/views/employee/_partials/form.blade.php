{{ csrf_field() }}
<div class="form-group">
    <label for="company_name">Company Name: </label>
    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company name..." value="{{ old('company_name', $employee->company_name ?? null) }}">
</div>
<div class="form-group">
    <label for="first_name">First Name: </label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name..." value="{{ old('first_name', $employee->first_name ?? null) }}" required>
</div>
<div class="form-group">
    <label for="last_name">Last Name: </label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name..." value="{{ old('last_name', $employee->last_name ?? null) }}" required>
</div>
<div class="form-group">
    <label for="address">Address: </label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Address..." value="{{ old('address', $employee->address ?? null) }}">
</div>
<div class="form-group">
    <label for="city">City: </label>
    <input type="text" class="form-control" id="city" name="city" placeholder="City..." value="{{ old('city', $employee->city ?? null) }}">
</div>
<div class="form-group">
    <label for="province">Province: </label>
    <input type="text" class="form-control" id="province" name="province" placeholder="Province..." value="{{ old('province', $employee->province ?? null) }}">
</div>
<div class="form-group">
    <label for="postal_code">Postal Code: </label>
    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code..." value="{{ old('postal_code', $employee->postal_code ?? null) }}">
</div>
<div class="form-group">
    <label for="email">Email: </label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email..." value="{{ old('email', $employee->email ?? null) }}">
</div>
<div class="form-group">
    <label for="tel">Phone: </label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone..." value="{{ old('phone', $employee->phone ?? null) }}">
</div>
<div class="form-group">
    <label for="notes">Notes: </label>
    <textarea class="form-control" id="notes" name="notes" placeholder="Notes..." rows="3">{{ old('notes', $employee->notes ?? null) }}</textarea>
</div>