
<div class="form-group">
    
     {{ Datatable::table()
        ->addColumn('OC','Distrito','Precio','Fecha Creación') 
        ->setUrl(route('api.getruta'))  
        ->render() }}
    
</div>

