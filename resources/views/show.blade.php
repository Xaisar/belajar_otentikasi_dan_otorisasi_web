<!DOCTYPE html>
<html> 
    <head> 
        <title>CONTROL STRUKTUR PADA BLADE TEMPLATE</title>
    </head> 
    <body> 
        @if (count($produk)==1) 
            <p>Jumlah Produk adalah satu</p> 
        @elseif(count($produk)>1) 
            <p>Jumlah Produk Lebih dari satu</p> 
        @else 
            <p>Tidak Ada Data Produk</p> 
        @endif
    </body> 
</html> 