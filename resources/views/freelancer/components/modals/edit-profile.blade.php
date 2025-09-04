<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/update/profile" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName"
                                value="{{ $profile['fullName'] ?? '' }}" placeholder="Enter full name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $profile['username'] ?? '' }}" placeholder="Enter username">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" rows="3" name="bio" placeholder="Tell us about yourself">{{ $profile['bio'] ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="profileImageUrl" class="form-label">Profile Image URL</label>
                        <input type="url" class="form-control" id="profileImageUrl" name="profileImageUrl"
                            value="{{ $profile['profileImageUrl'] ?? '' }}" placeholder="Enter image URL">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $profile['address'] ?? '' }}" placeholder="Enter address">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="postalCode" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postalCode" name="postalCode"
                                value="{{ $profile['postalCode'] ?? '' }}" placeholder="Enter postal code">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ $profile['country'] ?? '' }}" placeholder="Enter country">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ $profile['city'] ?? '' }}" placeholder="Enter city">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                                value="{{ $profile['phoneNumber'] ?? '' }}" placeholder="Enter phone number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $profile['email'] ?? '' }}" placeholder="Enter email">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="websiteUrl" class="form-label">Website URL</label>
                        <input type="url" class="form-control" id="websiteUrl" name="websiteUrl"
                            value="{{ $profile['websiteUrl'] ?? '' }}" placeholder="Enter website URL">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="hourlyRate" class="form-label">Hourly Rate</label>
                            <input type="number" class="form-control" id="hourlyRate" name="hourlyRate"
                                value="{{ $profile['hourlyRate'] ?? 0 }}" placeholder="Enter hourly rate"
                                min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="experienceLevel" class="form-label">Experience Level</label>
                            <input type="number" class="form-control" id="experienceLevel" name="experienceLevel"
                                value="{{ $profile['experienceLevel'] ?? 0 }}" placeholder="Enter experience level"
                                min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="availabilityStatus" class="form-label">Availability Status</label>
                        <select class="form-select" id="availabilityStatus" name="availabitlityStatus">
                            <option value="0"
                                {{ ($profile['availabilityStatus'] ?? '') == 0 ? 'selected' : '' }}>
                                Available</option>
                            <option value="1"
                                {{ ($profile['availabilityStatus'] ?? '') == 1 ? 'selected' : '' }}>
                                Partially Available</option>
                            <option value="2"
                                {{ ($profile['availabilityStatus'] ?? '') == 2 ? 'selected' : '' }}>
                                Not Available</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="languages" class="form-label">Languages</label>
                        <input type="text" class="form-control" id="languages" name="languages"
                            value="{{ $profile['languages'] ?? '' }}"
                            placeholder="Enter languages (e.g., English, Spanish)">
                    </div>

                    <div class="mb-3">
                        <label for="isActive" class="form-label">Active Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="isActive" name="isActive"
                                {{ $profile['isActive'] ?? false ? 'checked' : '' }}>
                            <label class="form-check-label" for="isActive">Is Active</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="submit">
            </div>

            </form>
        </div>
    </div>
</div>
