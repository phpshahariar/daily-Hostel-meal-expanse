<table class="table table-bordered table-responsive-md" style="text-align: center; margin-top: 8px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Balance</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php( $i = 1);
    @foreach($deposit as $key => $show)
        <tr>
            <td width="5%">{!! $i++ !!}</td>
            <td>{!! $show->name !!}</td>
            <td>{!! $show->balance !!}</td>
            <td>{!! date("y-m-d", strtotime($show->date)) !!}</td>
            <td width="15%">
                <div class="btn-group">
                    <a href="{!! url('view/border/data') !!}" data-id="{!! $show->id !!}" id="view" class="btn btn-outline-primary">View</a>
                    <a href="{!! url('edit/border/data') !!}" data-id="{!! $show->id !!}" id="edit" class="btn btn-outline-success">Edit</a>
                    <a onclick="return confirm('Are You sure Delete This!')" href="{!! url('delete/border/data') !!}" data-id="{!! $show->id !!}" id="delete" class="btn btn-outline-danger">Delete</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{--{{$deposit->render()}}--}}