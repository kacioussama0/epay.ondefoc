<div class="table-responsive">

    <table class="table table-primary text-center table-striped table-bordered align-middle">
        <thead class="table-dark">
        <tr>
            @foreach ($headers as $header)
                <th class="py-3">{{ $header }}</th>
            @endforeach

            @if ($hasActions)
                <th class="border px-4 py-2">الإجراءات</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                @foreach ($row as $cell)
                        <td>{!! $cell !!}</td>
                @endforeach

                @if ($hasActions)
                    <td class="border px-4 py-2 text-center">
                        {!! $actions($row)  !!}
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">لا توجد بيانات</td>
            </tr>
        @endforelse
        </tbody>
    </table>


</div>
