<table border="1">
    <th>nama </th>
    <th>harga</th>

    @foreach($produk1 as $data)
    <tr>
        <td>{{$data->nama}}</td>
        <td>{{$data->harga}}</td>
    </tr>
    @endforeach

</table>