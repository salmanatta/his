<div class="tab-pane active" id="tab-1" role="tabpanel">
    <br>
    <h4 class="tab-title">Select Suppliers</h4>
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered dt-responsive no-footer"id="datatable-buttons">
                <thead class="table-light">
                <tr>
                    <th class="text-center">Action</th>
                    <th>Supplier Name</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($suppliers))
                @foreach($suppliers as $supplier)
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" name="activeCheck" {{ \App\Models\EmployeeSupplier::whereEmployeeId($employee->id)->whereSupplierId($supplier->id)->count() ? 'checked' : '' }} id="activeCheck_{{ $supplier->id }}" onclick="getSupplier({{ $supplier->id }})">
                            <input type="hidden" name="supplier_id" id="supplier_id" value="supplier_id">
                            <input type="hidden" name="employee_id" id="employee_id" value="{{ $employee->id }}">
                        </td>
                        <td>{{ $supplier->name }}</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
