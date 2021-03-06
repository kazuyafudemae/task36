@extends('layouts.address')

@section('title', 'Address')

@section('menubar')
@parent
@endsection

@section('content')
<h2>お届け先一覧</h2>
@if (0 < $addresses->count())
<table border="1">
<tr style="background-color:yellow">
<th>名前</th>
<th>郵便番号</th>
<th>住所</th>
<th>電話番号</th>
<th>編集</th>
<th>削除</th>
</tr>
@foreach ($addresses as $address)
<tr>
{{ csrf_field() }}
<td>{{ $address->name }}</td>
<td>{{ $address->first_code }}-{{ $address->last_code }}</td>
<td>{{ $address->state . $address->city . $address->street }}</td>
<td>{{ $address->tel }}</td>
<td align="center"><button><a href="{{ route('address.edit', ['id' => $address->id]) }}">編集</a></button></td>
<td align="center">
<form method="post" action="{{ route('address.delete') }}">
{{ csrf_field() }}
<input type="hidden" name="address_id" value="{{ $address->id }}">
<button type="submit" class="btn btn-danger btn-sm btn-dell">削除</button>
</form>
</td>
</tr>
@endforeach
</table>
@else
<p>お届け先は登録されていません</p>
@endif
<br>
<button><a href="{{ route('address.add') }}">お届け先追加</a></button>
<button><a href="{{ route('address.choice') }}">お届け先選択</a></button>
<br>
@endsection
