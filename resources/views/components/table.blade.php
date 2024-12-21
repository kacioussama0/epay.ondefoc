<div class="table-responsive">

    <table class="table table-primary text-center table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            @foreach ($headers as $header)
                <th class="py-3">{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">لا توجد بيانات</td>
            </tr>
        @endforelse
        </tbody>
    </table>


</div>
