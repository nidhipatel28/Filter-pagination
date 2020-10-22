<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employees Management</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4 filter-input">
                                        <select class="form-control valid" style="width: 100%;" id="role_id"
                                                name="role_id">
                                            <option value="0">Please select</option>
                                            <option value="1">Employee</option>
                                            <option value="2">Designation</option>
                                            <option value="3">Salary</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 filter-input">
                                        <input type="text" name="searchText" id="searchText" class="form-control float-right search"
                                                       placeholder="Search" value=""/>
                                    </div>
                                    <div class="col-xl-4 col-sm-5">
                                        <input type="button" value="Filter" class="btn btn-primary filter-button" disabled>
                                        <a href="#" class="btn btn-primary reset-button">Reset</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="card-body table-responsive p-0 custom_table">
                            @if ($viewEmployees->count() == 0)
                                <div class="no-data">No Data Available</div>
                            @else
                                <table class="table table-hover" id="employee-data">
                                    <thead>
                                    <tr>
                                        <th span class="column-name-color">#sr.no</span> </th>
                                        <th span class="column-name-color">Employee</span> </th>
                                        <th span class="column-name-color">Designation</span> </th>
                                        <th span class="column-name-color">Salary</span> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewEmployees as $key => $employe)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $employe->name }}</td>
                                            <td>{{ $employe->Designation ? $employe->Designation->name : '-' }}</td>
                                            <td>{{ $employe->salary ? $employe->salary->salary : '-'}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        @if ($viewEmployees->count() == 0)
                            <div class="no-data"></div>
                        @else
                            <div class="row pagination">
                                <div class="col-sm-12 col-md-12">
                                    {{$viewEmployees->links("pagination::bootstrap-4")}}
                                </div>
                            </div>
                        @endif
                        </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>