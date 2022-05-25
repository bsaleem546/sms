@foreach ($data as $key => $d)
    <tr>
        <td>
            <input type="checkbox" id="{{ 'chk_'.$d->id }}" value="{{ $d->id }}">
        </td>
        <td>{{ $d->id }}</td>
        <td>{{ $d->students->admission->gr_no }}</td>
        <td>{{ \Carbon\Carbon::parse($d->_session->start_date)->format('Y')." - ".\Carbon\Carbon::parse($d->_session->end_date)->format('Y') }}</td>
        <td>{{ $d->students->name }}</td>
        <td>{{ $d->students->_class->name." - ".$d->students->_class->section->name }}</td>
        <td>{{ $d->month_of }}</td>
        <td>{{ \Carbon\Carbon::parse($d->due_date)->format('M d, Y') }}</td>
        <td>{{ $d->arrears }}</td>
        <td>{{ $d->total }}</td>
        <td>
            @if($d->status == 'pending')
                <label class="label label-warning">{{ $d->status }}</label>
            @elseif($d->status == 'paid')
                <label class="label label-success">{{ $d->status }}</label>
            @else
                <label class="label label-danger">{{ $d->status }}</label>
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('fees.print', $d->id) }}">Print</a>
            {{--                                        <a class="btn btn-info" href="{{ route('fees.show',$d->id) }}">Show</a>--}}
            @can('fee-edit')
                <a class="btn btn-primary" href="{{ route('fees.edit',$d->id) }}">Pay</a>
            @endcan
            @can('fee-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['fees.destroy', $d->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
@endforeach
