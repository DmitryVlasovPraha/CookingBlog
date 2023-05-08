@extends('layout.admin', ['title' => 'Все посты блога'])

@section('content')
    <h1>Все посты блога</h1>
    @if($items->count())
            <<table class="table table-bordered">
                <tr>
                    <th width="10%">Дата</th>
                    <th width="40%">Наименование</th>
                    <th width="20%">Автор публикации</th>
                    <th width="20%">Разрешил публикацию</th>
                    <th><i class="fas fa-eye"></i></th>
                    <th><i class="fas fa-toggle-on"></i></th>
                    <th><i class="fas fa-edit"></i></th>
                    <th><i class="fas fa-trash-alt"></i></th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->name }}</td>

                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <a href="{{ route('admin.ingredient.edit', ['ingredient' => $item->id]) }}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>


                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $items->links() }}
    @else
        Пока нет
    @endif

@endsection
