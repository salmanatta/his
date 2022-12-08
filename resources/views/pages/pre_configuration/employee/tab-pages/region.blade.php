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
{{--                    <tr>--}}
{{--                        <td class="text-center">--}}
{{--                            <input type="checkbox" name="activeCheck" {{ isset($supplier->supplier_id) ? 'checked' : '' }} id="activeCheck_{{ $supplier->id }}" onclick="getSupplier({{ $supplier->id }})">--}}
{{--                            <input type="hidden" name="supplier_id" id="supplier_id" value="supplier_id">--}}
{{--                            <input type="hidden" name="employee_id" id="employee_id" value="{{ $employee->id }}">--}}
{{--                        </td>--}}
{{--                        <td>{{ $supplier->name }}</td>--}}
{{--                    </tr>--}}
                </tbody>
            </table>
        </div>
    </div>
</div>
