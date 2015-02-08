{{ Datatable::table()
    ->addColumn('Id','Producto','Precio','Foto')       // these are the column headings to be shown
    ->setUrl(route('api.productos'))   // this is the route where data will be retrieved
    ->render() }}