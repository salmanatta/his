<div class="tab-pane" id="tab-2" role="tabpanel">
    <br>
    <h4 class="tab-title">Select Regions</h4>
    <div class="row">
        <div class="col-2">
            <label for="RegionName" class="form-label">Select Region</label>
            <select name="RegionName" id="selectRegion" class="form-select">
                <option value="">-- Select Region --</option>
                @if(isset($regions))
                @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered dt-responsive no-footer"id="datatable-buttons">
                <thead class="table-light">
                <tr>
                    <th class="text-center">Action</th>
                    <th>Region Name</th>
                </tr>
                </thead>
                <tbody class="region_data">
                </tbody>
            </table>
        </div>
    </div>
</div>
