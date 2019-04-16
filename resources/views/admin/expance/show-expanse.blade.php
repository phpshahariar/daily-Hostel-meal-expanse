<table class="table table-bordered table-responsive-md" style="text-align: center; margin-top: 8px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Expanse</th>
    </tr>
    </thead>
    <tbody>
    @php( $i = 1);
    @foreach($show_expanse as $key => $show)
        <tr>
            <td width="5%">{!! $i++ !!}</td>
            <td>{!! $show->date !!}</td>
            <td>TK.{!! $show->expanse !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>