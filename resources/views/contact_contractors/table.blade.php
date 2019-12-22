<div class="table-responsive">
    <table class="table" id="contactContractors-table">
        <thead>
            <tr>
                <th>Country</th>
        <th>City</th>
        <th>Adr</th>
        <th>Contacts</th>
        <th>Name</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contactContractors as $contactContractor)
            <tr>
                <td>{{ $contactContractor->country }}</td>
            <td>{{ $contactContractor->city }}</td>
            <td>{{ $contactContractor->adr }}</td>
            <td>{{ $contactContractor->contacts }}</td>
            <td>{{ $contactContractor->name }}</td>
            <td>{{ $contactContractor->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['contactContractors.destroy', $contactContractor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contactContractors.show', [$contactContractor->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('contactContractors.edit', [$contactContractor->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
