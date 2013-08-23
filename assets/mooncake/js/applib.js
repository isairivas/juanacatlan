var _appLib = {};
_appLib.alerts = {};
_appLib.alerts.confirm = function(options) {
    var text = 'Esta seguro que desea eliminar el elemento seleccionado';
    var url = null;
    if (options.text != null) {
        text = options.text;
    }
    if (options.url != null) {
        url = options.url;
    } else {
        console.log('_appLib.alerts.confirm; dice: no existe una url destino ');
    }


    $.msgbox(text, {
        type: "confirm",
        buttons: [
            {type: "submit", value: "Si"},
            {type: "submit", value: "No"},
            {type: "cancel", value: "Cancelar"}
        ]
    }, function(result) {
        if( result == 'Si' ){
            window.location = url;
        }
    }
    );
}


