<table border="1">
    <th>nama </th>
    <th>harga</th>

    @foreach($produk as $data)
    <tr>
        <td>{{$data->nama}}</td>
        <td>{{$data->harga_jual}}</td>
    </tr>
    @endforeach
</table>