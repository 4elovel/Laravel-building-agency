<link rel="stylesheet" href="{{ asset('build/assets/request-table.css') }}">

<x-app-layout>
    <div class="container py-12">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($requests->isEmpty())
            <p>У вас немає заявок.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Ім'я</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Комплекс</th>
                    <th>Тип квартири</th>
                    <th>Площа</th>
                    <th>Бюджет</th>
                    <th>Статус</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->user_name }}</td>
                        <td>{{ $request->user_email }}</td>
                        <td>{{ $request->user_phone }}</td>
                        <td>{{ $request->complex->name }}</td>
                        <td>{{ $request->apartment_type }}</td>
                        <td>{{ $request->area }}</td>
                        <td>{{ $request->budget }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <form action="{{ route('apartment.requests.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити цю заявку?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red;font-weight: bold;">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
