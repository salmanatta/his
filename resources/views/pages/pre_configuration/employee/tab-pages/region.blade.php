<div class="tab-pane" id="tab-2" role="tabpanel">
    <br>
    <h4 class="tab-title">Select Regions</h4>
    <div class="row">
        <div class="col-2">
            <label for="RegionName" class="form-label">Select Region</label>
            <select name="RegionName" id="selectRegion" class="form-select">
                <option value="">-- Select Region --</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
